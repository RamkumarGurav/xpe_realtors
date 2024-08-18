
<?php 
$name="";
$id=0;
$status=1;
$record_action = "Add New Record";
if(!empty($admin_user_data))
{
	// $record_action = "Update";
	// $id = $admin_user_data->id;
	// $name = $admin_user_data->name;
	// $status = $admin_user_data->status;
	
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
                    <h1 class="m-0 text-dark"><?php  echo $page_module_name?> <small>Details</small></h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="<?php  echo MAINSITE_Admin."wam"?>">Home</a></li>
						<li class="breadcrumb-item"><a href="<?php  echo MAINSITE_Admin.$user_access->class_name."/".$user_access->function_name?>"><?php  echo $user_access->name?> List</a></li>
                        <li class="breadcrumb-item active">Details</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <?php   ?>
    <section class="content">
        <div class="row">
            <div class="col-12">

                <div class="card ">

                    <div class="card-header">
                        <h3 class="card-title"><?php  echo $admin_user_data->name?></h3>
                        <div class="float-right">
                            <?php  
								if($user_access->add_module==1 && false)	{
								?>
								<a href="<?php  echo MAINSITE_Admin.$user_access->class_name?>/edit"> 
                            <button type="button" class="btn btn-primary btn-sm"><i class="fas fa-plus"></i> Add
                                New</button></a>
                            <?php  } ?>
                            <?php  
							if($user_access->update_module==1)	{
							?>
							<a href="<?php  echo MAINSITE_Admin.$user_access->class_name?>/edit/<?php  echo $admin_user_data->id?>"> 
                            <button type="button" class="btn btn-success btn-sm" ><i
                                    class="fas fa-edit"></i> Update</button>
                            </a>
                            <?php  } ?>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <?php  
						if($user_access->view_module==1)	{
					?>
                    <div class="card-body card-primary card-outline">
                            <?php  echo form_open(MAINSITE_Admin."$user_access->class_name/do_update", array('method' => 'post', 'id' => 'ptype_list_form' , "name"=>"ptype_list_form", 'style' => '', 'class' => 'form-horizontal', 'role' => 'form', 'enctype' => 'multipart/form-data')); ?>
                            
                            <input type="hidden" name="task" id="task" value="" />
                            <?php  echo $this->session->flashdata('alert_message'); ?>
                           
                            
                            <table id="" class="table table-bordered table-hover myviewtable responsiveTableNewDesign"  >
                                <tbody>
								<tr>
										<td >
										<strong class="full">Data Base Id</strong>
										<?php  echo $admin_user_data->id?></td>
										<td >
                                        	<strong class="full">Role</strong>
										<?php  if(count($admin_user_data->roles) >1){ ?>
											<table class="table table-hover text-nowrap" style="width:90%">
											<thead>
												<tr>
												<th style="width: 10px">#</th>
												<th>Company</th>
												<th>Role </th>
												</tr>
											</thead>
											<tbody>
											<?php  $c_count=0;foreach($admin_user_data->roles as $role){$c_count++; ?>
												<tr>
												<td><?php  echo $c_count?>.</td>
												<td><?php  echo $role->company_unique_name?></td>
												<td><?php  echo $role->admin_user_role_name?></td>
												</tr>
											<?php  } ?>
											</tbody>
											</table>
											<?php  }else{ $role = $admin_user_data->roles[0]; ?>
												<?php  echo $role->admin_user_role_name?>
											<?php  } ?>
										</td>
										<td >
										<strong class="full">Designation</strong>
										<?php  echo $admin_user_data->designation_name?></td>
                                          <td >
                                        <strong class="full">Joining Date</strong>
                                        <?php  if(!empty($admin_user_data->joining_date)){echo date("d-m-Y" , strtotime($admin_user_data->joining_date));}else{echo "-";}?></td>
                                        <td >
                                        <strong  class="full">Termination By</strong>
                                        <?php  if(!empty($admin_user_data->termination_date) && $admin_user_data->termination_date != '0000-00-00' && $admin_user_data->termination_date != '01-01-1970' && $admin_user_data->termination_date != '1970-01-01'){echo date("d-m-Y" , strtotime($admin_user_data->termination_date));}else{echo "-";}?></td>

										
									</tr>

									<tr>
                                        <td >
                                        <strong class="full">Employee Name</strong>
                                        <?php  echo $admin_user_data->name?></td>
                                        <td >
                                        <strong class="full">Password</strong>
                                        <?php  echo $admin_user_data->show_password?></td>
                                        <td >
                                        <strong class="full">Email Id</strong>
                                        <?php  echo $admin_user_data->email?></td>
                                    	<td colspan="4">
										<strong class="full">Address</strong>
										<?php  echo $admin_user_data->address1;
											if(!empty($admin_user_data->address1)){echo ", ".$admin_user_data->address2;}
											if(!empty($admin_user_data->address3)){echo ", ".$admin_user_data->address3;}
											echo ", ".$admin_user_data->city_name." ($admin_user_data->pincode) ";
											echo ", ".$admin_user_data->state_name;
											echo ", ".$admin_user_data->country_name." ($admin_user_data->dial_code) ";
										?></td>
										
                                       
									</tr>
                                    <tr>
                                        <td >
                                        <strong class="full">Country</strong>
                                        <?php  echo $admin_user_data->country_name?></td>
                                        <td >
                                        <strong class="full">Mobile No</strong>
                                         <?php  echo $admin_user_data->mobile_no?></td>
                                        <td >
                                        <strong class="full">Alt Mobile No</strong>
                                        <?php  echo $admin_user_data->alt_mobile_no?></td>
                                        <td >
                                        <strong class="full">Fax No</strong>
                                        <?php  echo $admin_user_data->fax_no?></td>
                                        
                                        
                                        
                                                <td >
                                        <strong class="full">Files</strong>
                                        <?php  if(!empty($admin_user_data->files)){ ?>
                                        <ol>
                                        <?php  foreach($admin_user_data->files as $f){ ?>
                                        <li><?php  echo $f->file_title?>  &nbsp;&nbsp;&nbsp;&nbsp;<a target="_blank" href="<?php  echo _uploaded_files_.'admin_user_file/'.$f->file_name?>">View</a></li>
                                        <?php  } ?>
                                        </ol>
                                        
                                                <?php  }else{ ?>-<?php  } ?></td>
                                    </tr>
									<tr>
										
										<td >
										<strong class="full">Last Login IP</strong>
										<?php  echo $admin_user_data->last_loginip?></td>
										<td >
										<strong class="full">Last Login On</strong>
										<?php  if(!empty($admin_user_data->last_login)){echo date("d-m-Y h:i:s A" , strtotime($admin_user_data->last_login));}else{echo "-";}?></td>
										<td >
										<strong class="full">Added On</strong>
										<?php  echo date("d-m-Y h:i:s A" , strtotime($admin_user_data->added_on))?></td>
										<td >
										<strong class="full">Added By</strong>
										<?php  echo $admin_user_data->added_by_name?></td>
										
									</tr>
									
									
                                    
                                    <tr>
                                    <td >
										<strong class="full">Updated On</strong>
										<?php  if(!empty($admin_user_data->updated_on)){echo date("d-m-Y h:i:s A" , strtotime($admin_user_data->updated_on));}else{echo "-";}?></td>
										<td >
										<strong  class="full">Updated By</strong>
										<?php  if(!empty($admin_user_data->updated_by_name)){echo $admin_user_data->updated_by_name;}else{echo "-";}?></td>
										<td colspan="3">
										<strong class="full">Status</strong>
										<?php  if($admin_user_data->status==1){ ?> Active <i class="fas fa-check btn-success btn-sm "></i>
                                                <?php }else{ ?> Block <i class="fas fa-ban btn-danger btn-sm "></i>
                                                <?php  }?></td>
									</tr>
                                    
                                </tbody>
                                
						</table>
						<?php  echo form_close() ?>
                    </div>
                    <?php  }else{ 
						$this->data['no_access_flash_message']="You Dont Have Access To View ".$page_module_name;
						$this->load->view('secureRegions/template/access_denied' , $this->data); 
					} ?>
                    <!-- /.card-body -->
                </div>
            </div>
        </div>


    </section>
    <?php   ?>
</div>

<aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
</aside>

<script type="application/javascript">
function check_uncheck_All_records() // done
{
    var mainCheckBoxObj = document.getElementById("main_check");
    var checkBoxObj = document.getElementsByName("sel_recds[]");

    for (var i = 0; i < checkBoxObj.length; i++) {
        if (mainCheckBoxObj.checked)
            checkBoxObj[i].checked = true;
        else
            checkBoxObj[i].checked = false;
    }
}

function validateCheckedRecordsArray() // done
{
    var checkBoxObj = document.getElementsByName("sel_recds[]");
    var count = true;

    for (var i = 0; i < checkBoxObj.length; i++) {
        if (checkBoxObj[i].checked) {
            count = false;
            break;
        }
    }

    return count;
}

function validateRecordsActivate() // done
{
    if (validateCheckedRecordsArray()) {
        //alert("Please select any record to activate.");
        toastrDefaultErrorFunc("Please select any record to activate.");
        document.getElementById("sel_recds1").focus();
        return false;
    } else {
        document.ptype_list_form.task.value = 'active';
        document.ptype_list_form.submit();
    }
}

function validateRecordsBlock() // done
{
    if (validateCheckedRecordsArray()) {
        //alert("Please select any record to block.");
        toastrDefaultErrorFunc("Please select any record to block.");
        document.getElementById("sel_recds1").focus();
        return false;
    } else {
        document.ptype_list_form.task.value = 'block';
        document.ptype_list_form.submit();
    }
}
</script>
