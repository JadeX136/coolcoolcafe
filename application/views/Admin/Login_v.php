<div class="col-sm-12 py-5 firstsectionBG">
    <div class="container">
        <div class="row justify-content-center py-5">
            <div style="border-radius:25px;" class="col-sm-6 border border-success">
                <h3 class="text-center text-test py-5">เข้าสู่ระบบ</h3>
                <?php echo form_open_multipart(base_url('/admin'));?>
				<?php
                    echo "<div class='error_msg'>";
                    if (isset($error_message)) {
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
                    <div class="py-3">
                    <button class="w-100 btn-lg btn bg-test text-light" type="submit" name="submit">เข้าสู่ระบบ</button>
                    </div>
                <?php echo form_close();?>
            </div>
        </div>
    </div>
</div>