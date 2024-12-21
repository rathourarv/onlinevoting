<div class="page-content d-flex align-items-center">
    <div class="container d-flex justify-content-center">
        <div class="col-12 col-sm-10 col-md-8 col-lg-7 col-xl-6 col-xxl-5">
            
            <div class="auth-card">
                <div class="logo-area">
                    <img id="header_logo" class="logo-size" src="../assets/login.png" />
                </div>
                <?php if (session()->getFlashdata('msg')): ?>
                    <div class="alert alert-warning">
                        <?= session()->getFlashdata('msg') ?>
                    </div>
                <?php endif; ?>
                <!-- Login-Form-->
                <form method="POST" action="/Signin/loginAuth">
                    <div class="form-group">
                        <label for="Email">Email ID</label>
                        <input type="text" class="form-control" id="email" name="email" aria-describedby="emailHelp"
                            placeholder="Enter email" required>
                        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone
                            else.</small>
                    </div>
                    <div class="form-group">
                        <label for="Password">Password</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Password"
                            required>
                    </div>
                    <div class="form-group form-check">
                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
                        <label class="form-check-label" for="exampleCheck1">remember me</label>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
                <div>

                </div>
                <p class="text mb-1"><a href="" class="text-link">Forgot Password?</p>
                <p class="text mb-4"><a href="/signup" class="text-link">No Account? Sign Up</>
                </p>
            </div>
        </div>
    </div>
</div>