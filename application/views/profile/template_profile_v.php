<div class="col-12 ">
    <div class="row">
        <div class="col-6 px-0 py-3">
            <div class="d-grid gap-2">
                <a style="border-radius:0px;" class="text-decoration-none btn btn-coolcool" href="<?php echo base_url('/profile/account');?>">
                    <h5 class="text-center fw-bold text-light">PROFILE</h5>
                </a>
            </div>
        </div>
        <div class="col-6 px-0 py-3">
            <div class="d-grid gap-2">
                <a style="border-radius:0px;" class="text-decoration-none btn btn-coolcool" href="<?php echo base_url('/profile/order-history');?>">
                    <h5 class="text-center fw-bold text-light">ORDER</h5>
                </a>    
            </div>
        </div>
   </div>
</div>
<div class="col-12">
    <div class="container">
        <?php $this->view($detail);?>
    </div>
</div>