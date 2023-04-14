                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800"><h1><?= $title?></h1></h1>
					<div class="row">
						<div class="col-lg-6">
							<?= $this->session->flashdata('message')?>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-6">
							<form action="<?=base_url('user/ChangePassword');?>" method="post">
							<div class="form-group">
								<label for="Current password">Current Password</label>
								<input type="password" class="form-control" id="current_password" name="current_password" placeholder="password"> <?= form_error('current_password','<small class="text-danger">','</small>')?>
							</div>
							<div class="form-group">
								<label for="New password">New Password</label>
								<input type="password" class="form-control" id="new_password1" name="new_password1" placeholder="New Password"><?= form_error('new_password1','<small class="text-danger">','</small>')?>
							</div>
							<div class="form-group">
								<label for="New password">Repeat Password</label>
								<input type="password" class="form-control" id="new_password2" name="new_password2" placeholder="Repeat New Password"><?= form_error('new_password2','<small class="text-danger">','</small>')?>
							</div>
							<div class="form-group">
								<button type="submit" class="btn btn-primary">Change Password</button>
							</div>
							</form>
						</div>
					</div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->
