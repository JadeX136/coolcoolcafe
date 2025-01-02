<?php date_default_timezone_set('Asia/Bangkok');?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="en">
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('/assets/css/template_style.css');?>?v=<?php echo date("Ymdhis");?>">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
    <script src="<?php echo base_url('/assets/js/admin.js');?>?v=<?php echo date("Ymdhis");?>"></script>
	
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('/assets/css/prism.css');?>?v=<?php echo date("Ymdhis");?>">
	
    <style>
       	@import url('https://fonts.googleapis.com/css2?family=Kanit:wght@500&display=swap');
		body{font-family: 'Kanit', sans-serif;}
		.bg-theme{background-color:#4a4129 !important}
        html, body { 
            height: 100%; 
        }
    </style>
</head>
<body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <div style="height:100%;" class="d-flex" id="wrapper">

        <!-- Sidebar-->
        <div style="height:100%;"  class="border-end bg-theme pt-5" id="sidebar-wrapper">
            <div class="sidebar-heading border-bottom bg-light">
                <div class="d-flex justify-content-center">
                    <img class="img-fluid" width="100px" height="100px" src="<?php echo base_url('/assets/img/logo/logo_3phinong.jpg');?>?v=<?php echo date("Ymdhis");?>">
                </div>
            </div>
            <div class="list-group list-group-flush">
                <a class="list-group-item list-group-item-action list-group-item-light p-3" href="<?php echo base_url('/');?>">
                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-globe2" viewBox="0 0 16 16">
                        <path d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm7.5-6.923c-.67.204-1.335.82-1.887 1.855-.143.268-.276.56-.395.872.705.157 1.472.257 2.282.287V1.077zM4.249 3.539c.142-.384.304-.744.481-1.078a6.7 6.7 0 0 1 .597-.933A7.01 7.01 0 0 0 3.051 3.05c.362.184.763.349 1.198.49zM3.509 7.5c.036-1.07.188-2.087.436-3.008a9.124 9.124 0 0 1-1.565-.667A6.964 6.964 0 0 0 1.018 7.5h2.49zm1.4-2.741a12.344 12.344 0 0 0-.4 2.741H7.5V5.091c-.91-.03-1.783-.145-2.591-.332zM8.5 5.09V7.5h2.99a12.342 12.342 0 0 0-.399-2.741c-.808.187-1.681.301-2.591.332zM4.51 8.5c.035.987.176 1.914.399 2.741A13.612 13.612 0 0 1 7.5 10.91V8.5H4.51zm3.99 0v2.409c.91.03 1.783.145 2.591.332.223-.827.364-1.754.4-2.741H8.5zm-3.282 3.696c.12.312.252.604.395.872.552 1.035 1.218 1.65 1.887 1.855V11.91c-.81.03-1.577.13-2.282.287zm.11 2.276a6.696 6.696 0 0 1-.598-.933 8.853 8.853 0 0 1-.481-1.079 8.38 8.38 0 0 0-1.198.49 7.01 7.01 0 0 0 2.276 1.522zm-1.383-2.964A13.36 13.36 0 0 1 3.508 8.5h-2.49a6.963 6.963 0 0 0 1.362 3.675c.47-.258.995-.482 1.565-.667zm6.728 2.964a7.009 7.009 0 0 0 2.275-1.521 8.376 8.376 0 0 0-1.197-.49 8.853 8.853 0 0 1-.481 1.078 6.688 6.688 0 0 1-.597.933zM8.5 11.909v3.014c.67-.204 1.335-.82 1.887-1.855.143-.268.276-.56.395-.872A12.63 12.63 0 0 0 8.5 11.91zm3.555-.401c.57.185 1.095.409 1.565.667A6.963 6.963 0 0 0 14.982 8.5h-2.49a13.36 13.36 0 0 1-.437 3.008zM14.982 7.5a6.963 6.963 0 0 0-1.362-3.675c-.47.258-.995.482-1.565.667.248.92.4 1.938.437 3.008h2.49zM11.27 2.461c.177.334.339.694.482 1.078a8.368 8.368 0 0 0 1.196-.49 7.01 7.01 0 0 0-2.275-1.52c.218.283.418.597.597.932zm-.488 1.343a7.765 7.765 0 0 0-.395-.872C9.835 1.897 9.17 1.282 8.5 1.077V4.09c.81-.03 1.577-.13 2.282-.287z"/>
                    </svg> กลับสู่เว็บไซต์
                </a>
                <a class="list-group-item list-group-item-action list-group-item-light p-3" href="<?php echo base_url('/admin/dashboard');?>">
                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-bar-chart-line-fill" viewBox="0 0 16 16">
                        <path d="M11 2a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v12h.5a.5.5 0 0 1 0 1H.5a.5.5 0 0 1 0-1H1v-3a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v3h1V7a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v7h1V2z"/>
                    </svg> Dashboard
                </a>
				<a class="list-group-item list-group-item-action list-group-item-light p-3" href="<?php echo base_url('/admin/menu');?>">
					จัดการเมนู
				</a>
                <a class="list-group-item list-group-item-action list-group-item-light p-3" href="<?php echo base_url('/admin/order');?>">
                    Order
                </a>
                            
                <a class="list-group-item list-group-item-action list-group-item-light p-3" href="<?php echo base_url('/admin/logout');?>">
                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-door-open-fill" viewBox="0 0 16 16">
                        <path d="M1.5 15a.5.5 0 0 0 0 1h13a.5.5 0 0 0 0-1H13V2.5A1.5 1.5 0 0 0 11.5 1H11V.5a.5.5 0 0 0-.57-.495l-7 1A.5.5 0 0 0 3 1.5V15H1.5zM11 2h.5a.5.5 0 0 1 .5.5V15h-1V2zm-2.5 8c-.276 0-.5-.448-.5-1s.224-1 .5-1 .5.448.5 1-.224 1-.5 1z"/>
                    </svg> ออกจากระบบ
                </a>
                    
            </div>
        </div>
        <!-- Page content wrapper-->
        <div style="overflow: scroll;" id="page-content-wrapper">
            <!-- Top navigation-->
            <nav class="navbar navbar-expand-lg fixed-top navbar-light bg-light border-bottom">
                <div class="container-fluid">
                    <!-- <button class="btn btn-primary" id="sidebarToggle">Toggle Menu</button>                         -->
                    <button class="navbar-toggler" id="sidebarToggle" type="button" data-bs-toggle="collapse"  aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                </div>
            </nav>
            <!-- Page content-->
            <div  class="container-fluid pt-5">
                <?php $this->view($content);?>
				<!-- <?php $this->view('Admin/modal_alert_v');?> -->
            </div>
        </div>
    </div>

</body>
</html>