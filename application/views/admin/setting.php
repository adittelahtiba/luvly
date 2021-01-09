<div class="clearfix space40"></div>
<div class="account-wrap">
	<div class="container">
		<div class="row">
			<div class="col-md-4"></div>
			<div class="col-md-4 col-sm-4">

				<div id="account-id">
					<div class="heading-sub text-center">
						<h5>CHANGE PASSWORD </h5>
					</div>




					<form action="<?= base_url('admin/changepass'); ?>/<?= $this->session->userdata('username'); ?>" method="post">
						<input type="text" name="us" value="<?= $this->session->userdata('username'); ?>" hidden>
						<input type="password" name="password" value="<?= $this->session->userdata('password'); ?>" hidden>

						<div class="form-group">
							<label for="inputnama">Curent Password </label>
							<input type="password" class="form-control input-md" name="curentpass">
							<?= form_error('curentpass', '<small class="text-danger pl-3">', '</small>'); ?>

						</div>
						<div class="form-group">
							<label for="inputPassword">New Password</label>
							<input type="password" class="form-control input-md" name="newpass">
							<?= form_error('newpass', '<small class="text-danger pl-3">', '</small>'); ?>
						</div>
						<div class="form-group">
							<label for="inputPassword">Confirm Password</label>
							<input type="password" class="form-control input-md" name="confirmpass">
							<?= form_error('confirmpass', '<small class="text-danger pl-3">', '</small>'); ?>
						</div>
						<div class="clearfix space20"></div>
						<div class="buttons-set text-right">
							<a href="<?= base_url('admin/profil'); ?>"><button class="btn btn-black2" type="button">
									<span>CANCEL</span>
								</button></a>
							<button class="btn btn-black" type="button" data-toggle="modal" data-target="#modalsave">
								<span>SAVE</span>
							</button>
						</div>

				</div>
			</div>
			<div class="col-md-4"></div>
			<div class="clearfix space50"></div>

			<!-- Modal -->
			<div id="modalsave" class="modal fade" role="dialog">
				<div class="modal-dialog modal-sm">

					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal">&times;
							</button>
							<h4 class="modal-title">Do you want to save changes ?</h4>
						</div>
						<div class="modal-footer">
							<div class="buttons-set text-center">
								<button type="submit" class=" btn-black">YES</button>
								<button type="reset" class=" btn-black2" data-dismiss="modal">CANCEL</button>
							</div>
						</div>
					</div>
				</div>
			</div>
			</form>
		</div>
	</div>
</div>