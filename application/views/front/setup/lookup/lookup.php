<div class="row">
    <div class="box col-md-6">
        <div class="box-inner">
            <div class="box-header well" data-original-title="">
            <h2><i class="glyphicon glyphicon-th"></i> Kategori</h2>
            <div class="box-icon">
                <a href="#modalAdd" class="btn btn-round btn-default modalAdd"><i class="glyphicon glyphicon-plus"></i></a>
                <a href="#" class="btn refresh btn-round btn-default" data-toggle="tooltip" title="Refresh"><i class="glyphicon glyphicon-refresh"></i></a>
                <a href="#" class="btn btn-minimize btn-round btn-default"><i class="glyphicon glyphicon-chevron-up"></i></a>
            </div>
            </div>
            <div class="box-content">
                <table id="tableData" class="display" style="width:100%">
                    <thead>
                        <tr>
                            <th>Kode Kategori</th>
                            <th>Nama Kategori</th>
                            <th>Keterangan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Kode Kategori</th>
                            <th>Nama Kategori</th>
                            <th>Keterangan</th>
                            <th>Aksi</th>
                        </tr>
                    </tfoot>
                </table
            </div>
        </div>
    </div>
</div>


  <!-- Modal Add -->
<div class="modal fade" id="modalAdd" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Tambah Kategori</h4>
        </div>
        <div class="modal-body">
           <?php $this->load->view('front/setup/lookup/form')?>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
          <button class="btn btn-default" id="btn-add" data-dismiss="modal">
            <i class="glyphicon glyphicon-floppy-disk icon-white"></i>
          </button>
        </div>
      </div>
      
    </div>
</div>

<script type="text/javascript">

    $(document).ready(function() {

       dt = $('#tableData').DataTable( {
            "ajax": "<?php echo site_url("Lookup/LookupValue");?>",
            "columns": [
                { "data": "type_code" },
                { "data": "type_title" },
                { "data": "type_description" },
                {
                    "class":          "details-control",
                    "orderable":      false,
                    "data":           {"data" : "id"},
                    "defaultContent": ""

                },
            ],
            "language": {     
                "pageLength": "5",
                "lengthMenu": "Tampikan <select>"+
                "<option value=5>5</option>"+
                "<option value=10>10</option>"+
                "<option value=20>20</option>"+
                "<option value=30>30</option>"+
                "<option value=40>40</option>"+
                "<option value=50>50</option>"+
                "<option value=100>100</option>"+
                "<option value=-1>--Semua--</option>"+
                "</select> Data",
                "search": "Cari:",
                "info": "Tampilan halaman _PAGE_ dari _PAGES_",
                "loadingRecords": "Please wait - loading...",
                "infoFiltered": " - Penyaringan dari _MAX_ data",
                "info": "Tampilan halaman _PAGE_ dari _PAGES_",
                "zeroRecords": "Data tidak tersedia",
                "loadingRecords": "Please wait - loading...",
                "infoEmpty": "Data tidak tersedia",
                "emptyTable": "Data tidak tersedia",
                "paginate": {
                    "next": "Selanjutnnya",
                    "previous": "Sebelumnnya",
                    "first": "Halaman pertama"
                    }
                },
            "order": [[1, 'asc']]
        } );

       $(document).on("click", ".modalAdd", function () {
            
            $('#modalAdd').modal('show');

        });
       $(document).on("click", "#btn-add", function () {
            type_code = $('#type_code');
            type_title = $('#type_title');
            description = $('#description');

            allFields = $( [] ).add(type_code).add(type_title).add(description);

          if (allFields.length > 0){

              data= [];

              for(i=0; i < allFields.length;i++){
                key = allFields[i].id;
                value = allFields[i].value;
                data.push(value);
              }

              $.ajax({
               type: 'POST',
               url: '<?php echo site_url("Lookup/insertLookupType");?>',
               data: { data: data },
               success: function(data) { 
                   dt.ajax.reload();                  
                 }
             });

          }else{
              console.log('data tidak boleh kosong');
          }          

        });

       $(document).on("click",".refresh",function(){
    dt.ajax.reload();
})
    });
</script>   