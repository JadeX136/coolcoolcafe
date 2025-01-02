<div class="col-sm-12 py-5 firstsectionBG">
    <div class="container">
        <div class="row justify-content-center py-5">
            <div style="border-radius:25px;" class="col-sm-6 opa border border-success">
                <h3 class="text-center text-theme py-5">Login</h3>
                <?php echo form_open_multipart(base_url('/login'));?>
                <?php 
                    echo "<div class='error_msg'>";
                    if(isset($error_message)){
                        echo $error_message;
                    }
                    echo validation_errors();
                    echo "</div>";
                ?>
                <div class="form-floating">
                    <input type="text" class="form-control" placeholder="username" name="username" id="username">
                    <label for="username">username</label>
                </div>
                <div class="form-floating">
                    <input type="password" class="form-control" placeholder="password" name="password" id="password">
                    <label for="password">password</label>
                </div>
                <button class="my-3 btn btn-coolcool text-light w-100 btn-lg" type="submit" name="submit">Log in</button>
                <?php echo form_close();?>
                    <a class="text-center text-theme fw-bold py-3" data-toggle="modal" data-target="#forgotpassword" href="#">ลืมรหัสผ่าน</a>
                <hr>
                <div class="d-flex justify-content-center">
                    <a style="text-decoration:none;" class="tetxt-center text-theme fw-bold py-3">สมัครสมาชิก</a>
                </div>
            </div>
        </div>
    </div>
</div>