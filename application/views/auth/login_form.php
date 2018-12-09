<?php
$this->load->view('public/header.php'); ?>  

    <nav class="navbar navbar-expand-lg fixed-top navbar-transparent">
        <div class="container">        
            <div class="navbar-translate n_logo">
                <a class="navbar-brand" href="#" title="" target="_blank">HINO</a>
                <button class="navbar-toggler" type="button">
                    <span class="navbar-toggler-bar bar1"></span>
                    <span class="navbar-toggler-bar bar2"></span>
                    <span class="navbar-toggler-bar bar3"></span>
                </button>
            </div>
        </div>
    </nav>

    <!-- End Navbar -->
    <div class="page-header">
        <div class="page-header-image" style="background-image:url(assets/images/login.jpg)"></div>
        <div class="container">
            <div class="col-md-12 content-center">
                <div class="card-plain">
                    <form class="form" method="post" action="<?php echo base_url();?>Authentication/do_login">
                        <div class="header">
                            <div class="logo-container">
                                <img src="assets/images/logo.svg" alt="">
                            </div>
                            <h5>Log in</h5>
                        </div>
                        <div class="content">                                                
                            <div class="input-group input-lg">
                                <input type="text" class="form-control" name="uname" placeholder="Enter User Name">
                                <span class="input-group-addon">
                                    <i class="zmdi zmdi-account-circle"></i>
                                </span>
                            </div>
                            <div class="input-group input-lg">
                                <input type="password" name="pass" placeholder="Password" class="form-control" />
                                <span class="input-group-addon">
                                    <i class="zmdi zmdi-lock"></i>
                                </span>
                            </div>
                        </div>
                        <div class="footer text-center">
                            <input type="submit" class="btn l-cyan btn-round btn-lg btn-block waves-effect waves-light" value="Masuk">
                            <h6 class="m-t-20"><a href="forgot-password.html" class="link">Forgot Password?</a></h6>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <footer class="footer">
            <div class="container">
                <div class="copyright">
                    &copy;
                    <script>
                        document.write(new Date().getFullYear())
                    </script>,
                    <span>Designed by <a href="#" target="_blank">SmartSys Dev  </a></span>
                </div>
            </div>
        </footer>
    </div>
