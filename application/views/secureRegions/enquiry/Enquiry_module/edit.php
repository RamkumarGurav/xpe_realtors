<?php
$name = "";
$id = 0;
$name = $contactno = $email = $service = $message = "";
$is_consent = 1;
$record_action = "Add New Record";
if (!empty($enquiry_data)) {
	$record_action = "Update";
	$id = $enquiry_data->id;
	$name = $enquiry_data->name;
	$contactno = $enquiry_data->contactno;
	$email = $enquiry_data->email;
	$service = $enquiry_data->service;
	$message = $enquiry_data->message;
	$is_consent = 1;
	$status = $enquiry_data->status;

}



$service_data = [
	(object) ["name" => "Buying a property", "value" => "Buying a property"],
	(object) ["name" => "Selling a property", "value" => "Selling a property"],
	(object) ["name" => "I have property to rent out", "value" => "I have property to rent out"],
	(object) ["name" => "I need rental property", "value" => "I need rental property"],
	(object) ["name" => "Property Document related", "value" => "I have property to rent out"],
	(object) ["name" => "Property Legal Service", "value" => "Property Legal Service"],
];
?>
<!-- /.navbar -->

<!-- Main Sidebar Container -->


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<div class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1 class="m-0 text-dark"><?php echo $page_module_name ?> </small></h1>
				</div><!-- /.col -->
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="<?php echo MAINSITE_Admin . "wam" ?>">Home</a></li>
						<li class="breadcrumb-item"><a
								href="<?php echo MAINSITE_Admin . $user_access->class_name . "/" . $user_access->function_name ?>"><?php echo $user_access->name ?>
								List</a></li>
						<?php if (!empty($enquiry_data)) { ?>
							<li class="breadcrumb-item"><a
									href="<?php echo MAINSITE_Admin . $user_access->class_name . "/view/" . $id ?>">View</a>
							</li>
						<?php } ?>
						<li class="breadcrumb-item"><?php echo $record_action ?></li>
					</ol>
				</div><!-- /.col -->
			</div><!-- /.row -->
		</div><!-- /.container-fluid -->
	</div>
	<!-- /.content-header -->

	<!-- Main content -->
	<?php ?>

	<section class="content">
		<div class="row">
			<div class="col-12">

				<div class="card">

					<div class="card-header">
						<h3 class="card-title"><?php echo $name ?> <small><?php echo $record_action ?></small></h3>
					</div>
					<!-- /.card-header -->
					<?php
					if ($user_access->view_module == 1 || true) {
						?>
						<?php echo $this->session->flashdata('alert_message'); ?>
						<div class="card-body">

							<?php echo form_open(MAINSITE_Admin . "$user_access->class_name/do_edit", array('method' => 'post', 'id' => 'ptype_list_form', "name" => "ptype_list_form", 'style' => '', 'class' => 'form-horizontal', 'role' => 'form', 'enctype' => 'multipart/form-data')); ?>

							<input type="hidden" name="id" id="id" value="<?php echo $id ?>" />
							<input type="hidden" name="redirect_type" id="redirect_type" value="" />
							<div class="form-group row">


								<div class="col-md-4 col-sm-6">
									<label for="name" class="col-sm-12 label_content px-2 py-0">Name <span
											style="color:#f00;font-size: 22px;margin-top: 3px;">*</span></label>
									<div class="col-sm-12">
										<input type="text" class="form-control form-control-sm" required id="name" name="name"
											value="<?= $name ?>" placeholder="Name">
									</div>
								</div>


								<div class="col-md-4 col-sm-6">
									<label for="name" class="col-sm-12 label_content px-2 py-0">Contact <span
											style="color:#f00;font-size: 22px;margin-top: 3px;">*</span></label>
									<div class="col-sm-12">
										<input type="number" class="form-control form-control-sm" pattern="[0-9]{8,15}" required
											id="contactno" name="contactno" value="<?php echo $contactno ?>" placeholder="Contact No.">
									</div>
								</div>



								<div class="col-md-4 col-sm-6">

									<label for="inputEmail3" class="col-sm-12 label_content px-2 py-0">Email <span
											style="color:#f00;font-size: 22px;margin-top: 3px;">*</span></label>
									<div class="col-sm-12">
										<input type="email" class="form-control form-control-sm" required id="email" name="email"
											value="<?php echo $email ?>" placeholder="Email">
									</div>
								</div>
							</div>


							<div class="form-group row">


								<div class="col-md-4 col-sm-6">
									<label for="name" class="col-sm-12 label_content px-2 py-0">Service <span
											style="color:#f00;font-size: 22px;margin-top: 3px;">*</span></label>
									<div class="col-sm-12">
										<select type="text" class="form-control form-control-sm" required id="service" name="service">
											<option value="">Select Service</option>
											<?php foreach ($service_data as $cd) {
												$selected = "";
												if ($cd->value == $service) {
													$selected = "selected";
												}
												?>
												<option value="<?php echo $cd->value ?>" <?php echo $selected ?>>
													<?php echo $cd->name ?>
												</option>
											<?php } ?>
										</select>

									</div>
								</div>


								<div class="col-md-8 col-sm-6">
									<label for="message" class="col-sm-12 label_content px-2 py-0">Message <span
											style="color:#f00;font-size: 22px;margin-top: 3px;">*</span></label>

									<textarea required name="message" id="message" required class="form-control"
										rows="5"><? echo $message; ?></textarea>


								</div>
							</div>

							<div class="form-group row">
								<div class="col-lg-2 col-md-4 col-sm-6">
									<label for="radioSuccess1" class="col-sm-12 label_content px-2 py-0">Status <span
											style="color:#f00;font-size: 22px;margin-top: 3px;"> </span></label>
									<div class="col-sm-12">
										<div class="form-check" style="margin-top:12px">
											<div class="form-group clearfix">
												<div class="icheck-success d-inline">
													<input type="radio" name="status" <?php if ($status == 1) {
														echo "checked";
													} ?> value="1"
														id="radioSuccess1">
													<label for="radioSuccess1"> Active
													</label>
												</div>
												&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
												<div class="icheck-danger d-inline">
													<input type="radio" name="status" <?php if ($status != 1) {
														echo "checked";
													} ?> value="0"
														id="radioSuccess2">
													<label for="radioSuccess2"> Block
													</label>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>

						</div>


						<!-- /.card-body -->
						<div class="card-footer">
							<center>
								<button type="submit" name="save" onclick="return redirect_type_func('')" value="1"
									class="btn btn-info">Save</button>
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								<button type="submit" name="save-add-new" onclick="return redirect_type_func('save-add-new')" value="1"
									class="btn btn-default ">Save And Add New</button>
							</center>
						</div>
						<!-- /.card-footer -->

						<?php echo form_close() ?>
						</table>
					</div>
				<?php } else {
						$this->data['no_access_flash_message'] = "You Dont Have Access To View " . $page_module_name;
						$this->load->view('secureRegions/template/access_denied', $this->data);
					} ?>
				<!-- /.card-body -->
			</div>
		</div>
</div>


</section>
<?php ?>

</div>

<aside class="control-sidebar control-sidebar-dark">
	<!-- Control sidebar content goes here -->
</aside>
<script>
	function redirect_type_func(data) {
		document.getElementById("redirect_type").value = data;
		return true;
	}
</script>