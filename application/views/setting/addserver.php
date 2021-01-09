<div class="clearfix space40"></div>
<div class="account-wrap">
	<div class="container">
		<div class="row">
			<div class="col-md-4"></div>
			<div class="col-md-4 col-sm-4">

				<div id="account-id">
					<div class="heading-sub text-center">
						<h5>FORM ADD SERVER</h5>
					</div>
					<div class="">
						<form class="user" method="post" action="<?= base_url('setting/addserverX'); ?>">

							<div class="form-group">
								<label for="inputnama">Server Name</label>
								<input type="text" class="form-control input-md" name="server" placeholder="Server">
								<?= form_error('server', '<small class="text-danger pl-3">', '</small>'); ?>
							</div>

							<div class="clearfix space20"></div>
							<div class="buttons-set text-right">
								<a href="<?= base_url('control/index/0/1'); ?>"><button class="btn btn-black2" type="button">
										<span>CLOSE</span>
									</button></a>
								<button class="btn btn-black" type="button" data-toggle="modal" data-target="#modalsave">
									<span>SAVE</span>
								</button>
							</div>
					</div>
				</div>
			</div>
			<div class="col-md-4"></div>
			<div class="clearfix space50"></div>


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
								<button type="submit" class="btn-black">YES</button>
								<button type="reset" data-dismiss="modal" class="btn-black2">CANCEL</button>
							</div>
						</div>
					</div>
				</div>
			</div>
			</form>
		</div>
	</div>
</div>