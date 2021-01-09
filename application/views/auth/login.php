<div class="clearfix space40"></div>


<div class="account-wrap ">

	<div class="container ">
		<div class="row aduh justify-content-center">

			<div class="card">

				<div class="card-body  col-md-4 col-md-offset-4">

					<div class="row">


						<div class="bglogin justify-content-center col-md-10 col-md-offset-1">

							<div id="account-id text-center">
								<div class="heading-sub text-center">
									<h5>MONITORING SERVER </h5>
								</div>




								<div class="clearfix space10"></div>
								<?= $this->session->flashdata('message'); ?>
								<form class="changepass" method="post" action="<?= base_url('auth/index'); ?>">

									<div class="form-group">
										<label for="inputnama">Username</label>
										<input type="text" class="form-control input-lg" name="username" value="<?= set_value('username'); ?>">
										<?= form_error('username', '<small class="text-danger pl-3">', '</small>'); ?>
									</div>
									<div class="form-group">
										<label for="inputPassword"> Password</label>
										<input type="password" class="form-control input-lg" name="password">
										<?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
									</div>
									<div class="clearfix space20"></div>
									<div class="buttons-set text-center">

										<button class="btn btn-black3" type="submit" data-toggle="modal" data-target="#modalsave">
											<span>LOGIN </span>
										</button>
									</div>



							</div>
						</div>

					</div>
				</div>
			</div>

		</div>





	</div>

</div>

<div class="clearfix space50"></div>