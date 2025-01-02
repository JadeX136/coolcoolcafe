<div class="col-sm-12 py-5 firstsectionBG">
    <div class="container">
        <div class="row justify-content-center">
           <div class="col-sm-9 opa">
                <h1 class="text-center py-3 fw-bold text-theme">Signup</h1>
                <div class="row justify-content-center">
                    <div class="col-sm-7">
                        <?php echo form_open_multipart(base_url('/signup'));?>
                        <?php
                            echo "<div class='error_msg'>";
                            if (isset($error_message)) {
                                echo $error_message;
                            }
                            echo validation_errors();
                            echo "</div>";
                        ?>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" placeholder="username" name="username" id="username">
                            <label for="username">username</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="password" class="form-control" placeholder="password" name="password" id="password">
                            <label for="password">password</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" placeholder="name" name="name" id="name">
                            <label for="name">name</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" placeholder="phonenumber" name="phonenumber" id="phonenumber">
                            <label for="phonenumber">phonenumber</label>
                        </div>
                        <div class="py-3">
                            <button class="w-100 btn-lg btn btn-coolcool" type="submit" name="submit">เข้าสู่ระบบ</button>
                        </div>
                        <?php echo form_close();?>
                      
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>