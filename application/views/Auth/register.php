<div class="container">

<!-- Outer Row -->
<div class="row justify-content-center">

		<div class="col-lg-5">

	<div class="card o-hidden border-0 shadow-lg my-5">
		<div class="card-body p-0">
		<!-- Nested Row within Card Body -->
			<div class="row justify-content-center">	
				<div class="col-lg-12">
					<div class="p-5">
						<div class="text-center">
								<h1 class="h4 text-gray-900 mb-4">Create Account</h1>
									</div>
									<form class="user" method="post" action="<?= base_url('auth/registrasi');?>" enctype="multipart/form-data">
                                <div class="form-group">
                                        <input type="text" class="form-control form-control-user" id="username" name="username"
                                            placeholder="Full Name"  value="<?php echo set_value('username'); ?>"> <?= form_error('username','<small class="text-danger">','</small>')?>
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control form-control-user" id="email" name="email"
                                        placeholder="Email Address"  value="<?= set_value('email'); ?>">  <?= form_error('email','<small class="text-danger">','</small>')?>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="password" class="form-control form-control-user"
                                            id="password1" name="password1" placeholder="Password"><?= form_error('password1','<small class="text-danger">','</small>')?>
                                    </div> 
                                    <div class="col-sm-6">
                                        <input type="password" class="form-control form-control-user"
                                            id="password2" name="password2" placeholder="Repeat Password">
                                    </div>
                                </div>
								
								<div class="form-group row">
									<label for="image" class="form-label">Picture</label>
										<input type="file" name="image" id="image" class="form-control" >	
								</div>

                                <button type="submit" class="btn btn-primary btn-user btn-block">
                                    Register Account
								</button>
                            </form>
                            <hr>
                            <div class="text-center">
                                <a class="small" href="forgot-password.html">Forgot Password?</a>
                            </div>
                            <div class="text-center">
                                <a class="small" href="<?= base_url('Auth/index')?>">Already have an account? Login!</a>
                            </div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

