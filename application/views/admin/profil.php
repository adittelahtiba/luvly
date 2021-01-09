<div class="clearfix space40"></div>
<div class="account-wrap">
	<div class="container">
		<div class="row">
			<div class="col-md-4"></div>
			<div class="col-md-4 col-sm-4">

				<div id="account-id">
					<div class="heading-sub text-center">
						<h5>PROFILE ADMIN </h5>
					</div>



					<?= $this->session->flashdata('message'); ?>



					<div class="form-group">
						<label for="inputnama">Nama Lengkap</label>
						<input type="text" class="form-control input-md" name="namauser" value="<?= $this->session->userdata('nama'); ?>" readonly>
					</div>
					<div class="form-group">
						<label for="inputPassword">Password</label>
						<input type="password" class="form-control input-md" name="passuser" value="<?= $this->session->userdata('password'); ?>" readonly>
					</div>
					<div class="clearfix space20"></div>
					<div class="buttons-set text-right">



						<a href="<?= base_url('admin/setting'); ?>">
							<button class="btn btn-default btn-primary" type="submit" style="background-color: #080745;">
								<span>Change Password</span>
							</button>
						</a>





					</div>


				</div>
			</div>
			<div class="col-md-4"></div>
			<div class="clearfix space50"></div>


			</form>
		</div>
	</div>
</div>