<div class="col-sm-12">
    <div class="container">
        <div class="row">
        <?php foreach($cart_items as $item):?>
            <div class="col-sm-12 py-1">
                <div style="border-style:none;" class="card">
                   <div class="card-body">
                        <h4 class="card-title pb-0"><?=$item['name'];?></h4>
                        <?php foreach ($item['detail'] as $option_value): ?>
                            <span class="card-text py-0 text-muted"><?= $option_value; ?><br></span>
                        <?php endforeach; ?>
                        <div class="d-flex justify-content-between">                           
                            <h4> x <?=$item['qty'];?></h4>
                            <h3><small class="text-body-secondary"><?=$item['subtotal'];?> &#xE3F;</small></h3>
                        </div>
                        <hr style="border-style:dashed;border-color:#4a4129;">
                    </div>
                </div>
            </div>
        <?php endforeach;?>
            <div style="position:fixed;bottom:10px;" class="d-grid gap-2">
                <a href="<?php echo base_url('Order/checkout');?>" class="btn btn-coolcool" type="button">สั่งเลย <?=$total;?> &#xE3F;</a>
            </div>
        </div>
    </div>
</div>
