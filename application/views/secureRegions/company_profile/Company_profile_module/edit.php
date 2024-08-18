<?php
$company_email = $letterhead_header_image = $company_website = $logo = $company_unique_name = $company_name = $gst_no = $mobile_no = $alt_mobile_no = $name = $address1 = $address2 = $address3 = $email = $pincode = "";
$id = 0;
$country_id = 0;
$state_id = 0;
$city_id = 0;
$status = 1;
$record_action = "Add New Record";

if (!empty($company_profile_data)) {
	$record_action = "Update";
	$id = $company_profile_data->id;
	//company_unique_name company_name 
	$company_unique_name = $company_profile_data->company_unique_name;
	$company_name = $company_profile_data->company_name;
	$name = $company_profile_data->name;
	$address1 = $company_profile_data->address1;
	$address3 = $company_profile_data->address3;
	$status = $company_profile_data->status;
	$country_id = $company_profile_data->country_id;
	$state_id = $company_profile_data->state_id;
	$city_id = $company_profile_data->city_id;
	$mobile_no = $company_profile_data->mobile_no;
	$alt_mobile_no = $company_profile_data->alt_mobile_no;
	$email = $company_profile_data->email;
	$pincode = $company_profile_data->pincode;
	$gst_no = $company_profile_data->gst_no;
	$logo = $company_profile_data->logo;
	$letterhead_header_image = $company_profile_data->letterhead_header_image;
	$company_email = $company_profile_data->company_email;
	$company_website = $company_profile_data->company_website;
}

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
						<?php if (!empty($company_profile_data)) { ?>
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
						<h3 class="card-title"><?php echo $company_unique_name ?> <small><?php echo $record_action ?></small></h3>
					</div>
					<!-- /.card-header -->
					<?php
					if ($user_access->view_module == 1 || true) {
						?>
						<?php echo $this->session->flashdata('alert_message'); ?>
						<div class="card-body">


							<?php echo form_open(MAINSITE_Admin . "$user_access->class_name/do_edit", array('method' => 'post', 'id' => 'company_profile_form', "name" => "company_profile_form", 'style' => '', 'class' => 'form-horizontal', 'role' => 'form', 'onsubmit' => 'return validateForm()', 'enctype' => 'multipart/form-data')); ?>
							<input type="hidden" name="id" id="id" value="<?php echo $id ?>" />
							<input type="hidden" name="redirect_type" id="redirect_type" value="" />

							<div class="">


								<div class="form-group row">
									<div class="col-md-4 col-sm-6">
										<label for="inputEmail3" class="col-sm-12 label_content px-2 py-0">Company Unique Name <span
												style="color:#f00;font-size: 22px;margin-top: 3px;">*</span>
											<div class="tooltip1"><i class="fa fa-info-circle" aria-hidden="true"></i>
												<span class="tooltiptext">Unique Company Name. This Name Can Not Be Duplicate. For Internal
													Purpose Only.</span>
											</div>
										</label>
										<div class="col-sm-12">
											<input type="text" class="form-control form-control-sm"
												onfocusout="validate_company_unique_name('no')" required id="company_unique_name"
												name="company_unique_name" value="<?php echo $company_unique_name ?>"
												placeholder="Company Unique Name">
											<span style="color:red" class="error_span" id="company_unique_name_error"></span>
										</div>
									</div>

									<div class="col-md-4 col-sm-6">
										<label for="inputEmail3" class="col-sm-12 label_content px-2 py-0">Company Name <span
												style="color:#f00;font-size: 22px;margin-top: 3px;">*</span></label>
										<div class="col-sm-12	">
											<input type="text" class="form-control form-control-sm" required id="company_name"
												name="company_name" value="<?php echo $company_name ?>" placeholder="Company Name">
										</div>
									</div>
									<div class="col-md-4 col-sm-6">
										<label for="inputEmail3" class="col-sm-12 label_content px-2 py-0">Company Website <span
												style="color:#f00;font-size: 22px;margin-top: 3px;"></span></label>
										<div class="col-sm-12">
											<input type="text" class="form-control form-control-sm" id="company_website" name="company_website"
												value="<?php echo $company_website ?>" placeholder="Company Website">
										</div>
									</div>


								</div>
								<div class="form-group row">


									<div class="col-md-3 col-sm-6">
										<label for="inputEmail3" class="col-sm-12 label_content px-2 py-0">Company Email <span
												style="color:#f00;font-size: 22px;margin-top: 3px;">*</span>
											<div class="tooltip1"><i class="fa fa-info-circle" aria-hidden="true"></i>
												<span class="tooltiptext">Company Email Can Not Be Duplicate</span>
											</div>
										</label>
										<div class="col-sm-12">
											<input type="email" class="form-control form-control-sm" onfocusout="validate_company_email('no')"
												required id="company_email" name="company_email" value="<?php echo $company_email ?>"
												placeholder="Company Email">
											<span style="color:red" class="error_span" id="company_email_error"></span>
										</div>
									</div>



									<div class="col-md-3 col-sm-6">
										<label for="inputEmail3" class="col-sm-12 label_content px-2 py-0">Contact Person Name <span
												style="color:#f00;font-size: 22px;margin-top: 3px;">*</span></label>
										<div class="col-sm-12">
											<input type="text" class="form-control form-control-sm" required id="name" name="name"
												value="<?php echo $name ?>" placeholder="Contact Person Name">

										</div>
									</div>




									<div class="col-md-3 col-sm-6">
										<label for="inputEmail3" class="col-sm-12 label_content px-2 py-0">Contact Person Email <span
												style="color:#f00;font-size: 22px;margin-top: 3px;"></span></label>
										<div class="col-sm-12">
											<input type="text" class="form-control form-control-sm" id="email" name="email"
												value="<?php echo $email ?>" placeholder="Email">
										</div>
									</div>




									<div class="col-md-3 col-sm-6">
										<label for="inputEmail3" class="col-sm-12 label_content px-2 py-0">Mobile No. <span
												style="color:#f00;font-size: 22px;margin-top: 3px;">*</span></label>
										<div class="col-sm-12">
											<input type="number" class="form-control form-control-sm" pattern="[0-9]{8,15}" required
												id="mobile_no" name="mobile_no" value="<?php echo $mobile_no ?>" placeholder="Mobile No.">
										</div>
									</div>


								</div>

								<div class="form-group row">



									<div class="col-md-3 col-sm-6">
										<label for="inputEmail3" class="col-sm-12 label_content px-2 py-0">Alt Mobile No. <span
												style="color:#f00;font-size: 22px;margin-top: 3px;"></span></label>
										<div class="col-sm-12">
											<input type="number" class="form-control form-control-sm" pattern="[0-9]{8,15}" id="mobile_no"
												name="alt_mobile_no" value="<?php echo $alt_mobile_no ?>" placeholder="Alt Mobile No.">
										</div>
									</div>


									<div class="col-md-3 col-sm-6">
										<label for="inputEmail3" class="col-sm-12 label_content px-2 py-0">GST No. <span
												style="color:#f00;font-size: 22px;margin-top: 3px;">*</span></label>
										<div class="col-sm-12">
											<input type="text" class="form-control form-control-sm" maxlength="15" minlength="15" id="gst_no"
												name="gst_no" value="<?php echo $gst_no ?>" placeholder="GST No." required>
										</div>
									</div>
									<div class="col-md-3 col-sm-6">
										<label for="inputEmail3" class="col-sm-12 label_content px-2 py-0">Address 1 <span
												style="color:#f00;font-size: 22px;margin-top: 3px;">*</span></label>
										<div class="col-sm-12">
											<input type="text" class="form-control form-control-sm" required id="address1" name="address1"
												value="<?php echo $address1 ?>" placeholder="Address Line 1">
										</div>
									</div>
									<div class="col-md-3 col-sm-6">
										<label for="inputEmail3" class="col-sm-12 label_content px-2 py-0">Address 2 </label>
										<div class="col-sm-12">
											<input type="text" class="form-control form-control-sm" id="address2" name="address2"
												value="<?php echo $address2 ?>" placeholder="Address Line 2">
										</div>
									</div>


								</div>
								<div class="form-group row">
									<div class="col-md-3 col-sm-6">
										<label for="inputEmail3" class="col-sm-12 label_content px-2 py-0">Address 3 <span
												style="color:#f00;font-size: 22px;margin-top: 3px;"></span></label>
										<div class="col-sm-12">
											<input type="text" class="form-control form-control-sm" id="address3" name="address3"
												value="<?php echo $address3 ?>" placeholder="Address Line 3">
										</div>
									</div>

									<div class="col-md-3 col-sm-6">
										<label for="inputEmail3" class="col-sm-12 label_content px-2 py-0">Pincode <span
												style="color:#f00;font-size: 22px;margin-top: 3px;"></span></label>
										<div class="col-sm-12">
											<input type="text" class="form-control form-control-sm" id="pincode" name="pincode"
												value="<?php echo $pincode ?>" placeholder="Pincode">
										</div>
									</div>
									<div class="col-md-3 col-sm-6">
										<label for="inputEmail3" class="col-sm-12 label_content px-2 py-0">Country <span
												style="color:#f00;font-size: 22px;margin-top: 3px;">*</span></label>
										<div class="col-sm-12">
											<select type="text" class="form-control form-control-sm custom-select" required id="country_id"
												onchange="get_state(this.value ,0)" name="country_id">
												<option value="">Select Country</option>
												<?php foreach ($country_data as $item) {
													$selected = "";
													if ($item->id == $country_id) {
														$selected = "selected";
													}
													?>
													<option value="<?php echo $item->id ?>" <?php echo $selected ?>>
														<?php echo $item->name ?>
														<?php if ($item->status != 1) {
															echo " [Block]";
														} ?>
													</option>
												<?php } ?>
											</select>
										</div>
									</div>
									<div class="col-md-3 col-sm-6">
										<label for="inputEmail3" class="col-sm-12 label_content px-2 py-0">State <span
												style="color:#f00;font-size: 22px;margin-top: 3px;">*</span></label>
										<div class="col-sm-12">
											<select type="text" class="form-control form-control-sm custom-select" required id="state_id"
												name="state_id" onchange="get_city(this.value ,0)">
												<option value="">Select State</option>
											</select>
										</div>
									</div>


								</div>
								<div class="form-group row">
									<div class="col-md-3 col-sm-6">
										<label for="inputEmail3" class="col-sm-12 label_content px-2 py-0">City <span
												style="color:#f00;font-size: 22px;margin-top: 3px;">*</span></label>
										<div class="col-sm-12">
											<select type="text" class="form-control form-control-sm custom-select" required id="city_id"
												name="city_id">
												<option value="">Select City</option>
											</select>
										</div>
									</div>

									<div class="col-md-3 col-sm-6">
										<label for="inputEmail3" class="col-sm-12 label_content px-2 py-0">Upload Company Logo <span
												style="color:#f00;font-size: 22px;margin-top: 3px;"></span></label>
										<div class="col-sm-12 d-flex">
											<div class="input-group" style="width:90%">
												<div class="custom-file">
													<input type="file" name="logo" class="custom-file-input" id="logo" accept="image/*">
													<label class="custom-file-label form-control-sm" for="files"></label>
												</div>
											</div>
											<div class="custom-file-display custom-file-display1">
												<?php if (!empty($logo)) { ?>
													<span class="pip pip1">
														<a target="_blank" href="<?php echo _uploaded_files_ . 'company_profile/logo/' . $logo ?>">
															<img class="imageThumb imageThumb1"
																src="<?php echo _uploaded_files_ . 'company_profile/logo/' . $logo ?>" />
														</a>
													</span>
												<?php } else { ?>
													<span class="pip pip1">
														<img class="imageThumb imageThumb1" src="<?php echo IMAGE_ADMIN ?>no_img.png" />
													</span>
												<?php } ?>
											</div>
										</div>
									</div>

									<div class="col-md-3 col-sm-6">
										<label for="inputEmail3" class="col-sm-12 label_content px-2 py-0">Upload Letterhead Header Image
											<span style="color:#f00;font-size: 22px;margin-top: 3px;"></span></label>
										<div class="col-sm-12 d-flex">
											<div class="input-group" style="width:90%">
												<div class="custom-file">
													<input type="file" name="letterhead_header_image" class="custom-file-input"
														id="letterhead_header_image" accept="image/*">
													<label class="custom-file-label form-control-sm" for="files"></label>
												</div>
											</div>
											<div class="custom-file-display custom-file-display2">
												<?php if (!empty($letterhead_header_image)) { ?>
													<span class="pip pip2">
														<a target="_blank"
															href="<?php echo _uploaded_files_ . 'company_profile/letterhead_header_image/' . $letterhead_header_image ?>">
															<img class="imageThumb imageThumb2"
																src="<?php echo _uploaded_files_ . 'company_profile/letterhead_header_image/' . $letterhead_header_image ?>" />
														</a>
													</span>
												<?php } else { ?>
													<span class="pip pip2">
														<img class="imageThumb imageThumb2" src="<?php echo IMAGE_ADMIN ?>no_img.png" />
													</span>
												<?php } ?>
											</div>
										</div>
									</div>

									<!-- <div class="col-md-3 col-sm-6 col-sm-6">
					<label for="inputEmail3" class="col-sm-12 label_content px-2 py-0">Upload Letterhead Header Image
						<span style="color:#f00;font-size: 22px;margin-top: 3px;"></span></label>
					<div class="col-sm-12 d-flex">
						<div class="input-group" style="width:90%">
							<div class="custom-file">
								<input type="file" name="letterhead_header_image" class="custom-file-input"
									id="letterhead_header_image">
								<label class="custom-file-label form-control-sm" for="files"></label>
							</div>
						</div>
						<div class="custom-file-display1">
							<?php if (!empty($letterhead_header_image)) { ?>
								<span class="pip1">
									<a target="_blank"
										href="<?php echo _uploaded_files_ . 'company_profile/letterhead_header_image/' . $letterhead_header_image ?>">
										<img class="imageThumb"
											src="<?php echo _uploaded_files_ . 'company_profile/letterhead_header_image/' . $letterhead_header_image ?>"
											style="max-width:100%	" />
									</a>
								</span>
							<?php } else { ?>
								<span class="pip">
									<img class="imageThumb" src="<?php echo IMAGE_ADMIN ?>no_img.png" style="max-width:100%	" />
								</span>
							<?php } ?>
						</div>
					</div>
				</div> -->
									<div class="col-md-3 col-sm-6">
										<label for="radioSuccess1" class="col-sm-12 label_content px-2 py-0">Status</label>
										<div class="col-sm-12">
											<div class="form-check" style="">
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
								</div> <!-- /.card-body -->
								<div class="card-footer">
									<center>
										<div id="before_submit">
											<button type="submit" name="save" onclick=" redirect_type_func('');" value="1"
												class="btn btn-info">Save</button>
											&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
											<button type="submit" name="save-add-new" onclick="redirect_type_func('save-add-new'); " value="1"
												class="btn btn-default ">Save And Add New</button>
										</div>

										<div id="after_submit" style="display:none">
											<button class="btn btn-info" type="button" disabled>
												<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
												Loading...
											</button>
										</div>
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
	window.addEventListener('load', function () {




		// Check if the File API is supported by the browser
		if (window.File && window.FileList && window.FileReader) {
			$("#logo").on("change", function (e) {
				var files = e.target.files, // Get the selected files
					filesLength = files.length; // Get the number of selected files

				// Loop through each selected file
				for (var i = 0; i < filesLength; i++) {
					var f = files[i]; // Get the current file
					var fileReader = new FileReader(); // Create a new FileReader object
					fileReader.onload = (function (e) {
						var file = e.target; // Get the file from the event

						// Customized code to display the image
						$(".pip1").remove(); // Remove any existing .pip elements
						$(".custom-file-display1").html("<span class=\"pip pip1\">" + // Insert the new image inside .custom-file-display element
							"<img class=\"imageThumb imageThumb1\" src=\"" + e.target.result + "\" title=\"" + file.name + "\"/>" + "</span>");
					});
					fileReader.readAsDataURL(f);//actualy this triggers the above "	fileReader.onload"  // Read the file as a data URL (base64 encoded string)
				}
			});
		} else {
			alert("Your browser doesn't support to File API"); // Alert the user if the File API is not supported
		}

		// Check if the File API is supported by the browser
		if (window.File && window.FileList && window.FileReader) {
			$("#letterhead_header_image").on("change", function (e) {
				var files = e.target.files, // Get the selected files
					filesLength = files.length; // Get the number of selected files

				// Loop through each selected file
				for (var i = 0; i < filesLength; i++) {
					var f = files[i]; // Get the current file
					var fileReader = new FileReader(); // Create a new FileReader object
					fileReader.onload = (function (e) {
						var file = e.target; // Get the file from the event

						// Customized code to display the image
						$(".pip2").remove(); // Remove any existing .pip1 elements
						$(".custom-file-display2").html("<span class=\"pip pip2\">" + // Insert the new image inside .custom-file-display1 element
							"<img class=\"imageThumb imageThumb2\" src=\"" + e.target.result + "\" title=\"" + file.name + "\"/>" + "</span>");
					});
					fileReader.readAsDataURL(f);//actualy this triggers the above "	fileReader.onload"  // Read the file as a data URL (base64 encoded string)
				}
			});
		} else {
			alert("Your browser doesn't support to File API"); // Alert the user if the File API is not supported
		}

	});
</script>
<script>
	function validateForm() {
		event.preventDefault();
		showFormSubmitLoading();
		validate_company_unique_name('yes');
		validate_company_unique_name('yes');
		$(".error_span").html("");
	}

	function validate_company_unique_name1(is_submit) {
		Pace.restart();
		var company_unique_name = $('#company_unique_name').val();
		var id = $('#id').val();
		$("#company_unique_name").removeClass("is-invalid");
		$("#company_unique_name").removeClass("is-valid");
		$("#company_unique_name_error").html("");
		if (company_unique_name == '') {
			toastrDefaultErrorFunc("Company Unique Name Can Not Be Empty.");
			hideFormSubmitLoading();
			return false;
		}
		$.ajax({
			url: "<?php echo MAINSITE_Admin . 'Validation/isDuplicateCompanyUniqueName' ?>",
			type: 'post',
			dataType: "json",
			data: { 'company_unique_name': company_unique_name, 'id': id, "<?php echo $csrf['name'] ?>": "<?php echo $csrf['hash'] ?>" },
			success: function (response) {
				if (response.boolean_response) {
					toastrDefaultErrorFunc(response.message);
					hideFormSubmitLoading();
					$("#company_unique_name").addClass("is-invalid");
					$("#company_unique_name_error").html("<br>" + response.message);
					return false;
				}
				else {
					$("#company_unique_name").addClass("is-valid");
					if (is_submit == "yes") { validate_company_email(is_submit); }
				}
			},
			error: function (request, error) {
				toastrDefaultErrorFunc("Unknown Error. Please Try Again");
			}
		});
	}

	function validate_company_unique_name(is_submit) {
		Pace.restart();
		var company_unique_name = $('#company_unique_name').val();
		var id = $('#id').val();
		$("#company_unique_name").removeClass("is-invalid");
		$("#company_unique_name").removeClass("is-valid");
		$("#company_unique_name_error").html("");
		if (company_unique_name == '') {
			toastrDefaultErrorFunc("Company Unique Name Can Not Be Empty.");
			hideFormSubmitLoading();
			return false;
		}
		$.ajax({
			url: "<?php echo MAINSITE_Admin . 'Validation/is_duplicate' ?>",
			type: 'post',
			dataType: "json",
			data: {
				'target_column_name_in_message': 'Company Name',
				'target_column_name': 'company_unique_name',
				'target_column_value': company_unique_name,
				'primary_column_name': 'id',
				'primary_column_value': id,
				'table_name': "company_profile",

				"<?php echo $csrf['name'] ?>": "<?php echo $csrf['hash'] ?>"
			},
			success: function (response) {
				if (response.boolean_response) {
					toastrDefaultErrorFunc(response.message);
					hideFormSubmitLoading();
					$("#company_unique_name").addClass("is-invalid");
					$("#company_unique_name_error").html("<br>" + response.message);
					return false;
				}
				else {
					$("#company_unique_name").addClass("is-valid");
					if (is_submit == "yes") { validate_company_email(is_submit); }
				}
			},
			error: function (request, error) {
				toastrDefaultErrorFunc("Unknown Error. Please Try Again");
			}
		});
	}

	function validate_company_email(is_submit) {
		Pace.restart();
		var company_email = $('#company_email').val();
		var id = $('#id').val();
		$("#company_email").removeClass("is-invalid");
		$("#company_email").removeClass("is-valid");
		$("#company_email_error").html("");
		if (company_email == '') {
			toastrDefaultErrorFunc("Company Email Can Not Be Empty.");
			hideFormSubmitLoading();
			return false;
		}
		$.ajax({
			url: "<?php echo MAINSITE_Admin . 'Validation/is_duplicate' ?>",
			type: 'post',
			dataType: "json",
			data: {
				'target_column_name_in_message': 'Company Email',
				'target_column_name': 'company_email',
				'target_column_value': company_email,
				'primary_column_name': 'id',
				'primary_column_value': id,
				'table_name': "company_profile",

				"<?php echo $csrf['name'] ?>": "<?php echo $csrf['hash'] ?>"
			},
			success: function (response) {
				if (response.boolean_response) {
					toastrDefaultErrorFunc(response.message);
					$("#company_email").addClass("is-invalid");
					hideFormSubmitLoading();
					$("#company_email_error").html("<br>" + response.message);
					return false;
				}
				else {
					$("#company_email").addClass("is-valid");
					if (is_submit == "yes") { $('#company_profile_form').attr('onsubmit', ''); $("#company_profile_form").submit(); }
				}
			},
			error: function (request, error) {
				toastrDefaultErrorFunc("Unknown Error. Please Try Again");
			}
		});
	}

	function validate_company_email1(is_submit) {
		Pace.restart();
		var email = $('#email').val();
		var id = $('#id').val();
		$("#email").removeClass("is-invalid");
		$("#email").removeClass("is-valid");
		$("#email_error").html("");
		if (email == '') {
			toastrDefaultErrorFunc("Company Email Can Not Be Empty.");
			hideFormSubmitLoading();
			return false;
		}
		$.ajax({
			url: "<?php echo MAINSITE_Admin . 'Validation/isDuplicateCompanyEmail' ?>",
			type: 'post',
			dataType: "json",
			data: { 'email': email, 'id': id, "<?php echo $csrf['name'] ?>": "<?php echo $csrf['hash'] ?>" },
			success: function (response) {
				if (response.boolean_response) {
					toastrDefaultErrorFunc(response.message);
					$("#email").addClass("is-invalid");
					hideFormSubmitLoading();
					$("#email_error").html("<br>" + response.message);
					return false;
				}
				else {
					$("#email").addClass("is-valid");
					if (is_submit == "yes") { $('#company_profile_form').attr('onsubmit', ''); $("#company_profile_form").submit(); }
				}
			},
			error: function (request, error) {
				toastrDefaultErrorFunc("Unknown Error. Please Try Again");
			}
		});
	}

	function redirect_type_func(data) {
		document.getElementById("redirect_type").value = data;
		return true;
	}

	function get_state(country_id, state_id = 0) {
		$("#state_id").html('')
		$("#city_id").html('');
		if (country_id > 0) {
			Pace.restart();
			$.ajax({
				url: "<?php echo MAINSITE_Admin . 'Ajax/get_state' ?>",
				type: 'post',
				dataType: "json",
				data: { 'country_id': country_id, 'state_id': state_id, "<?php echo $csrf['name'] ?>": "<?php echo $csrf['hash'] ?>" },
				success: function (response) {
					$("#state_id").html(response.state_html);
				},
				error: function (request, error) {
					toastrDefaultErrorFunc("Unknown Error. Please Try Again");
				}
			});
		}
	}

	function get_city(state_id, city_id = 0) {
		$("#city_id").html('');
		if (state_id > 0) {
			Pace.restart();
			$.ajax({
				url: "<?php echo MAINSITE_Admin . 'Ajax/get_city' ?>",
				type: 'post',
				dataType: "json",
				data: { 'city_id': city_id, 'state_id': state_id, "<?php echo $csrf['name'] ?>": "<?php echo $csrf['hash'] ?>" },
				success: function (response) {
					$("#city_id").html(response.city_html);
				},
				error: function (request, error) {
					toastrDefaultErrorFunc("Unknown Error. Please Try Again");
				}
			});
		}
	}

	window.addEventListener('load', function () {
		<?php if (!empty($country_id) && !empty($state_id)) { ?>
			get_state(<?php echo $country_id ?>, <?php echo $state_id ?>)
		<?php } ?>

		<?php if (!empty($city_id) && !empty($state_id)) { ?>
			get_city(<?php echo $state_id ?>, <?php echo $city_id ?>)
		<?php } ?>





	});
</script>