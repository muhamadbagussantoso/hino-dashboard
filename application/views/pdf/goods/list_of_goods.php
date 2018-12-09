<?php 
header("Content-type: application/octet-stream");
header("Content-Disposition: attachment; filename=exceldata.xls");
header("Pragma: no-cache");
header("Expires: 0");
?>
<style>
#customers {
    font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
    border-collapse: collapse;
    width: 100%;
}

#customers td, #customers th {
    border: 1px solid #ddd;
    padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
    padding-top: 12px;
    padding-bottom: 12px;
    text-align: left;
    background-color: #4CAF50;
    color: white;
}

</style>

 <table id="customers">
    <tr>
      <th class="short">#</th>
      <th class="normal">First Name</th>
      <th class="normal">Last Name</th>
      <th class="normal">Username</th>
    </tr>
    <?php $no=1; ?>
    <?php foreach($users as $user): ?>
      <tr>
      <td><?php echo $no; ?></td>
      <td><?php echo $user['firstname']; ?></td>
      <td><?php echo $user['lastname']; ?></td>
      <td><?php echo $user['email']; ?></td>
      </tr>
    <?php $no++; ?>
    <?php endforeach; ?>

</table>