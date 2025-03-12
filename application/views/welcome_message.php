<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Welcome to CodeIgniter</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<link rel="stylesheet" href="<?php echo base_url('/assets/css/swiper-bundle.min.css');?>?v=<?php echo date("Ymdhis");?>">

	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

<!--AOS Animation-->
<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
	<style type="text/css">
		@import url('https://fonts.googleapis.com/css2?family=Kanit:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');
		body{ font-family: "Kanit", sans-serif;font-weight: 500;font-style: normal; }
		.firstsectionBG{
			background-image: url('<?php echo base_url('/assets/img/home/firstsectionBG.png');?>'); /* Specify the path to your image */
   	 		background-position: center center; /* Center the image horizontally and vertically */
    		background-repeat: no-repeat; /* Prevent the image from repeating */
    		background-size: cover; /* Make sure the image covers the entire element (optional) */
    		width: 100%; /* Set the width of the element */
    		height: 100vh; /* Set the height of the element (or any other value based on your layout) */
		}
		.sectionBG{
			background-image: url('<?php echo base_url('/assets/img/home/firstsectionBG.png');?>'); /* Specify the path to your image */
   	 		background-position: center center; /* Center the image horizontally and vertically */
    		/*background-repeat: no-repeat;  Prevent the image from repeating */
    		/*background-size: cover;  Make sure the image covers the entire element (optional) */
    		width: 100%; /* Set the width of the element */
    		 /* Set the height of the element (or any other value based on your layout) */
		}
		.opa{
			background-color: rgba(255, 255, 255, 0.7); /* Example: black background with 50% opacity */
			border-radius:25px;
   			
		}
		.form-check-label {
    white-space: normal; /* Allow the text to wrap */
    word-wrap: break-word; /* Ensure long words break correctly */
}
		.bg-theme{background-color:#4a4129 !important;}
		.bg-secondtheme{background-color:#d9caa5 !important;}
		.text-theme{color:#74512D !important;}
		.btn-coolcool {
            background-color: #4a4129; /* Custom background color */
            color: white; /* Custom text color */
            border: none; /* Remove border */
			border-radius:25px;
        }

        .btn-coolcool:hover {
            background-color: #d9caa5; /* Darker shade for hover effect */
			color:#4a4129;
			border-color:#4a4129;
			border-radius:25px;
        }
		@media only screen and (max-width: 1920px) {
			.H1Banner{font-size:64px;}
			.H2Banner{font-size:48px;}
		}

		@media only screen and (max-width: 390px){
			.H1Banner{font-size:50px;}
			.H2Banner{font-size:34px;}
		}
		
   /* Make the second navbar horizontally scrollable */
   .scrollable-navbar {
            overflow-x: auto; /* Enable horizontal scrolling */
            white-space: nowrap; /* Prevent nav items from wrapping */
        }

        /* Optional: Hide the scrollbar (for a cleaner look) */
        .scrollable-navbar::-webkit-scrollbar {
            display: none; /* Hide scrollbar in WebKit browsers (Chrome, Safari) */
        }

        .scrollable-navbar {
            -ms-overflow-style: none;  /* Hide scrollbar in IE and Edge */
            scrollbar-width: none;  /* Hide scrollbar in Firefox */
        }
		.progress-container {width: 100%;height: 8px;background: #ccc;}
    .progress-bar {height: 8px;background: #b28e3b;width: 0%;}
    .scrollable-menu {height: auto;max-height: 500px;overflow-x: hidden;}
    @media (max-width: 576px) {
    .card-text {
        font-size: 12px; /* Full width on small screens */
    }
}
	</style>
</head>
<body>
	<a id="button"></a>
<?php $this->view('navbar');?>
 <?php $this->view($content);?>

<?php $this->view('footer');?>
<script>
  AOS.init();
</script>

<div class="progress-container fixed-bottom" style=" height: 10px; background-color: #f3f3f3;">
    <!-- Progress bar -->
    <div class="progress-bar bg-theme" id="myBar" style="height: 100%; position: relative;"></div>

    <!-- Image inside the progress bar -->
    <img id="myPuppy" src="<?php echo base_url('/assets/img/logo/mypuppy.png');?>" style="position: absolute; top: -50px; left: 0; width: 100px; height: auto; transition: left 0.1s;">
</div>

<script>
    // When the user scrolls the page, execute myFunction 
    window.onscroll = function() { myFunction(); };

    function myFunction() {
        var winScroll = document.body.scrollTop || document.documentElement.scrollTop;
        var height = document.documentElement.scrollHeight - document.documentElement.clientHeight;
        var scrolled = (winScroll / height) * 100;

        // Update the progress bar width
        var myBar = document.getElementById("myBar");
        myBar.style.width = scrolled + "%";

        // Update the position of the image
        var puppyImage = document.getElementById("myPuppy");
        puppyImage.style.left = scrolled + "%"; // Move the image in sync with the progress bar
    }
</script>

<script rel="preload" src="<?php echo base_url('/assets/js/swiper-bundle.min.js');?>?v=<?php echo date("Ymdhis");?>"></script>
<script rel="preload" src="<?php echo base_url('/assets/js/script.js');?>?v=<?php echo date("Ymdhis");?>"></script>
<div class="modal fade" id="cart" role="dialog"  arialabeledby="cartLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-header">
				
			</div>
			<div class="modal-body">
			<h2>Your Cart</h2>
<a class="btn btn-success" href="<?php echo base_url('/Order/clear_cart');?>">Clear</a>
<div class="table-responsive">
<table class="table">
    <thead>
        <tr>
            <th>Item</th>
            <th>Quantity</th>
            <th>Price</th>
            <th>Total</th>
            <th>Options</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($cart_items as $item): ?>
            <tr>
                <td><?= $item['name']; ?></td>
                <td><?= $item['qty']; ?></td>
                <td><?= $item['price']; ?></td>
                <td><?= $item['subtotal']; ?></td>
                <td>
                    <?php foreach ($item['detail'] as $option_name => $option_value): ?>
                        <p><?= $option_name . ': ' . $option_value; ?></p>
                    <?php endforeach; ?>
                </td>
            </tr>
        <?php endforeach; ?>
        <tr><td><p>Total: <?= $total; ?></p></td></tr>
    </tbody>
</table>
</div>


			</div>
			<div class="modal-footer">

			</div>
		</div>
	</div>
</div>
</body>
</html>
