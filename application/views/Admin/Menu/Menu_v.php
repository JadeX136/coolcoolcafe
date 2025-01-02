<div class="col-sm-12 py-5">
    <div class="container">
        <h3 class="text-center fw-bold py-3">Menu</h3>
        <div class="d-flex justify-content-between">
            <div>
                <p>เมนูทั้งหมด : xxx เมนู</p>
            </div>
            <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addMenu">Add</button>
        </div>
        <div class="row">
            <?php foreach($query as $row):?>
            <div class="col-sm-4">
                <div class="card">
                    <img class="card-img-top" src="<?php echo base_url("/assets/Menu/thumbnail/{$row->post_date}.jpg");?>?v=<?php echo date("Ymdhis");?>">
                    <div class="card-body">
                        <p class="fw-bold"><?php echo $row->nameTH;?></p>
                        <p class="fw-bold"><?php echo $row->nameEN;?></p>
                        <p><?php echo $row->price;?></p>
                    </div>
                </div>
            </div>
            <?php endforeach;?>
        </div>
    </div>
</div>
<div class="modal fade" role="dialog" id="addMenu" aria-labelledby="addMenuLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Menu</h5>
            </div>
            <?php echo form_open_multipart(base_url('/admin/addMenu'));?>
            <?php echo validation_errors(); ?>
            <div class="modal-body">
                <div class="mb-3">
                    <label class="form-label fw-bold" for="nameTH">ชื่อเมนูภาษาไทย</label>
                    <input class="form-control" name="nameTH" id="nameTH" required type="text">
                </div>
                <div class="mb-3">
                    <label class="form-label fw-bold" for="nameEN">ชื่อเมนูภาษาอังกฤษ</label>
                    <input class="form-control" name="nameEN" id="nameEN" required type="text">
                </div>
                <div class="row">
                    <div class="mb-3 col">
                        <label class="form-label fw-bold" for="price">ราคา</label>
                        <input class="form-control" name="price" id="price" required type="text" inputmode="tel">
                    </div>
                    <div class="mb-3 col">
                        <label class="form-label fw-bold" for="thumbnail">ภาพเมนู</label>
                        <input class="form-control" name="thumbnail" id="thumbnail" required type="file">
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label fw-bold" for="formtype">ประเภทเมนู</label>
                    <select class="form-select" name="formtype" id="formtype">
                        <option value="Black Coffee">Black Coffee</option>
                        <option value="Coffee Milk">Coffee Milk</option>
                        <option value="Green Tea">Grenn Tea</option>
                        <option value="Thai Tea">Thai Tea</option>
                    </select>
                </div>
            </div>
            <div class="modal-footer">
                <div class="d-flex justify-content-end">
                    <button class="btn btn-success" name="submit" type="submit">Submit</button>
                </div>
            </div>
            <?php echo form_close();?>
        </div>
    </div>
</div>