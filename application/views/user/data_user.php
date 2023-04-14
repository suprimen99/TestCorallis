
                <!-- Begin Page Content -->
                <div class="container">
				<div class="row">
					<!-- Earnings (Monthly) Card Example -->
					<div class="col-xl-3 col-md-6 mb-4">
						<div class="card border-left-primary shadow h-100 py-2">
							<div class="card-body">
								<div class="row no-gutters align-items-center">
									<div class="col mr-2">
										<div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
											User</div>
										<div class="h5 mb-0 font-weight-bold text-gray-800"><?= $count?></div>
									</div>
									<div class="col-auto">
										<i class="fas fa-calendar fa-2x text-gray-300"></i>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
					 <!-- DataTales Example -->
					 <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Data User</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Username</th>
                                            <th>Email</th>
                                            <th>Image</th>
                                            <th>Create Date</th>
                                            <th>action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
										<?php $i = 1;?>
										<?php foreach($user as $item): ?>
                                        <tr>
                                            <td><?= $i++ ?></td>
                                            <td><?=  $item['username'];?></td>
                                            <td><?=  $item['email'];?></td>
                                            <td><?=  $item['image'];?></td>
                                            <td><?=  date('d F Y ', $item['create_add']);?></td>
                                            <td>
												<a href="<?= base_url('User/Edit')?>" class="btn btn-success">Edit</a>
											</td>
                                        </tr>
										<?php endforeach ; ?>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
            
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

          
