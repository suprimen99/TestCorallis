 <!-- Begin Page Content -->
 	<div class="container-fluid">
		<h1 class="h3 mb-4 text-gray-800"><h1><?= $title?></h1></h1>
			<div class="row mt-5">
				<div class="col-lg-8">
				<?= form_open_multipart('User/Edit');?>

						<div class="form-group row">
							<label for="email" class="col-sm-2 col-form-label">Email</label>
							<div class="col-lg-10">
								<input type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter email" name="email" value="<?= $user['email'];?>" readonly>
							</div>
						</div>
						<div class="form-group row">
							<label for="username" class="col-sm-2 col-form-label">Username</label>
							<div class="col-lg-10">
								<input type="username" class="form-control" id="username" aria-describedby="usernameHelp" placeholder="Enter username" name="username" value="<?= set_value('username'); ?>">  <?= form_error('username','<small class="text-danger">','</small>')?>
							</div>
						</div>
						<div class="form-group row">
							<div class="col-sm-2">Picture</div>
							<div class="col-sm-10">
								<div class="row">
									<div class="col-sm-3">
										<img src="<?= base_url('assets/img/profile/'). $user['image'];?>" class="img-thumbnail">
									</div>
									<div class="col-sm-9">
										<div class="custom-file">
										<input type="file" class="custom-file-input" name="image" id="image">
										<label class="custom-file-label" for="image">Choose file</label>
										</div>
									</div>

								</div>
							</div>
						</div>

						<div class="form-group row">
 							<div class="col-sm-10">
								<button type="submit" class="btn btn-primary"> Edit</button>
							</div>
						</div>
					</form>
				</div>
			</div>


	</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
