

<div class="page-bar">

	<ul class="page-breadcrumb">

		<li>

			<i class="fa fa-home"></i>

			<a href="<?php echo base_url();?>admin/dashboard">Home</a>

			<i class="fa fa-angle-right"></i>

		</li>

		<li>

			<a href="<?php echo base_url();?>admin/email">Manage Emails</a>

			<i class="fa fa-angle-right"></i>

		</li>

		<li>

					<a href="">Edit Email</a>

					<i class="fa fa-angle-right"></i>

		</li>

		

	</ul>

</div>



<div class="row">

	<div class="col-md-12">

		<div class="portlet box blue-hoki">

							<div class="portlet-title">

								<div class="caption">

									<i class="fa fa-globe"></i>Edit  Email

								</div>

								<div class="tools">

								</div>

							</div>

			

			<div class="portlet-body form">

				<?php foreach($result as $row){?>

				<form action="<?php echo base_url();?>admin/email/update_email?id=<?php echo $row->id;?>" method="post" class="form-horizontal form-bordered">

					<div class="form-body">

						<div class="form-group last">

							<div class="col-md-12">

								<textarea name="data" id ="customck" class="ckeditor form-control" name="editor1" rows="6"><?php echo $row->emails;?></textarea>

					               <?php //echo display_ckeditor($ckeditor);?>

							</div>

						</div>

					</div>

					<div class="form-actions">

						<div class="row">

							<div class="col-md-offset-3 col-md-9">

								<button type="submit" class="btn green">Update</button>

							  <a href="<?php echo base_url();?>admin/email"><button type="button" class="btn green">Cancel</button></a>
													
							</div>

						</div>

					</div>

				</form>

				<?php } ?>

								

			</div>

		</div>

						

	</div>

</div>

			

		

