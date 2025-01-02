<nav style="background-color:#F8F4E1;" class="navbar navbar-expand-lg sticky-top">
  <div class="container">
    <!-- Mobile layout: toggle button on the left, logo in the center, cart and login on the right -->
    <div class="d-flex d-lg-none w-100 align-items-center justify-content-between">
      <button style="border-color:#74512D; width:50px;height:50px;" class="navbar-toggler p-0 order-1" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon">
          <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-list" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5"/>
          </svg>
        </span>
      </button>
      <a class="navbar-brand order-2 mx-auto" href="#">
        <img class="img-fluid" width="50px" height="50px" src="<?php echo base_url('/assets/img/LOGO/coolcoolLogo.png');?>?v=<?php echo date("Ymdhis");?>">
      </a>
      <div class="order-3 d-flex">
       
        <a href="<?php echo base_url('/Order/show_cart');?>">
          <button class="btn btn-coolcool">
            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-cart4" viewBox="0 0 16 16">
              <path d="M0 2.5A.5.5 0 0 1 .5 2H2a.5.5 0 0 1 .485.379L2.89 4H14.5a.5.5 0 0 1 .485.621l-1.5 6A.5.5 0 0 1 13 11H4a.5.5 0 0 1-.485-.379L1.61 3H.5a.5.5 0 0 1-.5-.5M3.14 5l.5 2H5V5zM6 5v2h2V5zm3 0v2h2V5zm3 0v2h1.36l.5-2zm1.11 3H12v2h.61zM11 8H9v2h2zM8 8H6v2h2zM5 8H3.89l.5 2H5zm0 5a1 1 0 1 0 0 2 1 1 0 0 0 0-2m-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0m9-1a1 1 0 1 0 0 2 1 1 0 0 0 0-2m-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0"/>
            </svg>
          </button>
        </a>
      </div>
    </div>

    <!-- Desktop layout: logo on the left, cart and login on the right -->
    <a class="navbar-brand d-none d-lg-block" href="#">
      <img class="img-fluid" width="50px" height="50px" src="<?php echo base_url('/assets/img/LOGO/coolcoolLogo.png');?>?v=<?php echo date("Ymdhis");?>">
    </a>
    <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="<?php echo base_url('/');?>"><h5 class="text-theme fw-bold">HOME</h5></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo base_url('/about-us');?>"><h5 class="text-theme fw-bold">ABOUT US</h5></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo base_url('/menu');?>"><h5 class="text-theme fw-bold">MENU</h5></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo base_url('/how-to-order');?>"><h5 class="text-theme fw-bold">HOW TO ORDER</h5></a>
        </li>
        <?php if($this->session->userdata('customer_login')){?>
          <li class="nav-item d-lg-none">
            <a class="nav-link" href="<?php echo base_url('/profile');?>"><h5 class="text-theme fw-bold"><?php echo $customer_username;?></h5></a>
          </li>
        <?}
       else{?>
          <li class="nav-item d-lg-none">
            <a class="nav-link" href="<?php echo base_url('/login');?>"><h5 class="text-theme fw-bold">Log in</h5>
        </li> 
        <?}?>
      </ul>

      <!-- Login and Cart side by side on desktop -->
      <div class="d-none align-items-center d-lg-flex ms-auto">
        <?php if($this->session->userdata('customer_login')){?>
          <a href="<?php echo base_url('/profile');?>" class="me-3 text-decoration-none">
            <h5 class="text-theme fw-bold">
          <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
              <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0"/>
              <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1"/>
            </svg><span class="px-1"><?php echo $customer_username;?></span></h5>
        </a>
        <?}
        else{?>
        <a href="<?php echo base_url('/login');?>" class="me-3 text-decoration-none">
          <h5 class="text-theme fw-bold">
            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
              <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0"/>
              <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1"/>
            </svg><span class="px-1">Log in</span></h5>
        </a>
        <?}?>
        <a data-bs-target="#cart" data-bs-toggle="modal">
          <button class="btn btn-coolcool">
            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-cart4" viewBox="0 0 16 16">
              <path d="M0 2.5A.5.5 0 0 1 .5 2H2a.5.5 0 0 1 .485.379L2.89 4H14.5a.5.5 0 0 1 .485.621l-1.5 6A.5.5 0 0 1 13 11H4a.5.5 0 0 1-.485-.379L1.61 3H.5a.5.5 0 0 1-.5-.5M3.14 5l.5 2H5V5zM6 5v2h2V5zm3 0v2h2V5zm3 0v2h1.36l.5-2zm1.11 3H12v2h.61zM11 8H9v2h2zM8 8H6v2h2zM5 8H3.89l.5 2H5zm0 5a1 1 0 1 0 0 2 1 1 0 0 0 0-2m-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0m9-1a1 1 0 1 0 0 2 1 1 0 0 0 0-2m-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0"/>
            </svg>
          </button>
        </a>
      </div>
    </div>
  </div>
</nav>
