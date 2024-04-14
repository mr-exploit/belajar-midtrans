<div class="container">

    <div class="card o-hidden border-0 shadow-lg my-5 col-lg-7 mx-auto">
        <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
                <div class="col-lg">
                    <div class="p-5">
                        <div class="text-center">
                            <h1 class="h4 text-white mb-4">Create an Account!</h1>
                        </div>
                        <form class="user" method="post" action="<?= base_url('auth/registration'); ?>">

                            <div class="form-group">
                                <label for="email" class="text-orangecsm">Name</label>
                                <input type="texxt" class="form-control text-white" style="border-color: #E87561; background-color : #0C2030;" id="name" name="name" value="<?= set_value('name') ?>" placeholder="Full name">
                                <?= form_error(
                                    'name',
                                    '<small class="text-danger pl-3">',
                                    '</small>'
                                ); ?>
                            </div>
                            <div class="form-group">
                                <label for="email" class="text-orangecsm">Email</label>
                                <input type="text" class="form-control text-white" style="border-color: #E87561; background-color : #0C2030;" id="email" name="email" value="<?= set_value('email') ?>" placeholder="Email Address">
                                <?= form_error(
                                    'email',
                                    '<small class="text-danger pl-3">',
                                    '</small>'
                                ); ?>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <label for="password" class="text-orangecsm">Password</label>
                                    <input type="password" class="form-control text-white" style="border-color: #E87561; background-color : #0C2030;" id="password1" name="password1" placeholder="Password">
                                    <?= form_error('password1', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                                <div class="col-sm-6">
                                    <label for="password" class="text-orangecsm"> Repeat Password</label>
                                    <input type="password" class="form-control text-white" style="border-color: #E87561; background-color : #0C2030;" id="password2" name="password2" placeholder="Repeat Password">
                                </div>
                            </div>
                            <button href="login.html" type="submit" class="btn btn-orangecsm btn-block font-weight-bold">
                                Register Account
                            </button>
                        </form>
                        <hr>
                        <div class="text-center">
                            <a class="small" href="forgot-password.html">Forgot Password?</a>
                        </div>
                        <div class="btn btn-graycsm btn-user btn-block  font-weight-bold mt-2">
                            <a class="small text-white" href="<?= base_url('auth'); ?>">Already have an account? Login!</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>