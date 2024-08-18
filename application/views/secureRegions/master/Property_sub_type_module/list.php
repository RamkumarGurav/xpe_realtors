<!-- /.navbar -->

<!-- Main Sidebar Container -->


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark"><?php echo $page_module_name ?> <small>List</small></h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?php echo MAINSITE_Admin . "wam" ?>">Home</a></li>
                        <li class="breadcrumb-item active"><?php echo $page_module_name ?></li>
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
                <div id="accordion">
                    <!-- we are adding the .class so bootstrap.js collapse plugin detects it -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h4 class="card-title">
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" class=""
                                    aria-expanded="false">
                                    Search Panel
                                </a>
                            </h4>
                        </div>
                        <div id="collapseOne" class="panel-collapse collapse" style="">
                            <div class="card-body">

                                <?php echo form_open(MAINSITE_Admin . "$user_access->class_name/$user_access->function_name", array('method' => 'post', 'id' => 'search_report_form', "name" => "search_report_form", 'style' => '', 'class' => 'form-horizontal', 'role' => 'form', 'enctype' => 'multipart/form-data')); ?>

                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Field</label>
                                                <select name="field_name" id="field_name" class="form-control"
                                                    style="width: 100%;">
                                                    <!-- <option value=''>Select Field</option> -->
                                                    <option value='ft.name' <?php if ($field_name == 'ft.name') {
                                                        echo 'selected';
                                                    } ?>>Property Sub Type
                                                    </option>

                                                </select>

                                            </div>
                                        </div>
                                        <!-- /.col -->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Field Value</label>
                                                <input type="text" name="field_value" id="field_value"
                                                    placeholder="Field Value" style="width: 100%;" class="form-control"
                                                    value="<?php echo $field_value ?>">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Property type</label>
                                                <select type="text" class="form-control" id="property_type_id"
                                                    name="property_type_id" style="width: 100%;">
                                                    <option value="">Select Property Type</option>
                                                    <?php foreach ($property_type_data as $item) {
                                                        $selected = "";
                                                        if ($item->id == $property_type_id) {
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
                                        <!-- /.col -->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Status</label>
                                                <select name="record_status" id="record_status" class="form-control"
                                                    style="width: 100%;">
                                                    <option value=''>Active / Block</option>
                                                    <option value='1' <?php if ($record_status == 1) {
                                                        echo 'selected';
                                                    } ?>>
                                                        Active</option>
                                                    <option value='zero' <?php if ($record_status == 'zero') {
                                                        echo 'selected';
                                                    } ?>>Block</option>
                                                </select>

                                            </div>
                                        </div>





                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Start Date</label>
                                                <div class="input-group date reservationdate" id="reservationdate"
                                                    data-target-input="nearest">
                                                    <input type="text" value="<?php echo $start_date ?>"
                                                        name="start_date" id="start_date" placeholder="Start Date"
                                                        style="width: 100%;" class="form-control datetimepicker-input"
                                                        data-target="#reservationdate" />
                                                    <div class="input-group-append" data-target="#reservationdate"
                                                        data-toggle="datetimepicker">
                                                        <div class="input-group-text"><i class="fa fa-calendar"></i>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                        <!-- /.col -->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>End Date</label>
                                                <div class="input-group date reservationdate1" id="reservationdate1"
                                                    data-target-input="nearest">
                                                    <input type="text" value="<?php echo $end_date ?>" name="end_date"
                                                        id="end_date" placeholder="End Date" style="width: 100%;"
                                                        class="form-control datetimepicker-input"
                                                        data-target="#reservationdate1" />
                                                    <div class="input-group-append" data-target="#reservationdate1"
                                                        data-toggle="datetimepicker">
                                                        <div class="input-group-text"><i class="fa fa-calendar"></i>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>


                                </div>
                                <div class="panel-footer">
                                    <center>
                                        <button type="submit" class="btn btn-info" id="search_report_btn"
                                            name="search_report_btn" value="1">Search</button>
                                        &nbsp;&nbsp;<button type="reset" class="btn btn-default">Reset</button>
                                    </center>
                                </div>
                                <?php echo form_close() ?>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="card">

                    <div class="card-header">
                        <h3 class="card-title"><span style="color:#FF0000;">Total Records:
                                <?php echo $row_count; ?></span></h3>
                        <div class="float-right">
                            <?php
                            if ($user_access->add_module == 1) {
                                ?>
                                <a href="<?php echo MAINSITE_Admin . $user_access->class_name ?>/edit">
                                    <button type="button" class="btn btn-primary btn-sm"><i class="fas fa-plus"></i> Add
                                        New</button></a>
                            <?php } ?>
                            <?php
                            if ($user_access->update_module == 1) {
                                ?>
                                <button type="button" class="btn btn-success btn-sm" onclick="validateRecordsActivate()"><i
                                        class="fas fa-check"></i> Active</button>
                                <button type="button" class="btn btn-dark btn-sm" onclick="validateRecordsBlock()"><i
                                        class="fas fa-ban"></i> Block</button>
                            <?php } ?>
                            <?php
                            if ($user_access->export_data == 1 && false) {
                                ?>
                                <button type="button" class="btn btn-success btn-sm export_excel"><i
                                        class="fas fa-file-excel"></i> Export</button>
                            <?php } ?>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <?php
                    if ($user_access->view_module == 1) {
                        ?>
                        <div class="card-body">

                            <?php echo form_open(MAINSITE_Admin . "$user_access->class_name/do_update_status", array('method' => 'post', 'id' => 'ptype_list_form', "name" => "ptype_list_form", 'style' => '', 'class' => 'form-horizontal', 'role' => 'form', 'enctype' => 'multipart/form-data')); ?>
                            <input type="hidden" name="task" id="task" value="" />
                            <?php echo $this->session->flashdata('alert_message'); ?>
                            <table id="example1" class="table table-bordered table-hover table-striped">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <?php if ($user_access->update_module == 1) { ?>
                                            <th width="4%"><input type="checkbox" name="main_check" id="main_check"
                                                    onclick="check_uncheck_All_records()" value="" /></th>
                                        <?php } ?>
                                        <th>Property Sub Type</th>
                                        <th>Property Type</th>
                                        <th>Added On</th>
                                        <th>Added By</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <?php if (!empty($property_sub_type_data)) { ?>
                                    <tbody>
                                        <?php
                                        $offset_val = (int) $this->uri->segment(5);

                                        $count = $offset_val;

                                        foreach ($property_sub_type_data as $item) {
                                            $count++;
                                            ?>
                                            <tr>
                                                <td><?php echo $count ?>.</td>
                                                <?php if ($user_access->update_module == 1) { ?>
                                                    <td><input type="checkbox" name="sel_recds[]" id="sel_recds<?php echo $count; ?>"
                                                            value="<?php echo $item->id; ?>" /></td>
                                                <?php } ?>
                                                <td><a
                                                        href="<?php echo MAINSITE_Admin . $user_access->class_name . "/view/" . $item->id ?>"><?php echo $item->name ?></a>
                                                </td>
                                                <td><?php echo $item->property_type_name ?></td>

                                                <td><?php echo date("d-m-Y", strtotime($item->added_on)) ?></td>
                                                <td><?php echo $item->added_by_name ?></td>
                                                <td>
                                                    <?php if ($item->status == 1) { ?> <i
                                                            class="fas fa-check btn-success btn-sm "></i>
                                                    <?php } else { ?><i class="fas fa-ban btn-danger btn-sm "></i>
                                                    <?php } ?>

                                                </td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                <?php } ?>
                            </table>
                            <?php echo form_close() ?>
                            <center>
                                <div class="pagination_custum"><?php echo $this->pagination->create_links(); ?></div>
                            </center>
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

<script>

    window.addEventListener('load', function () {

        $(".paginationClass").click(function () {
            // console.log($(this).data('ci-pagination-page'));
            // console.log($(this));
            // console.log($(this).attr('href'));//alert();
            //alert(this.data('ci-pagination-page'));
            $('#search_report_form').attr('action', $(this).attr('href'));
            $('#search_report_form').submit();
            return false;
        });
        $('#reservationdate').datetimepicker({
            format: 'DD-MM-YYYY'
        });
        $('#reservationdate1').datetimepicker({
            format: 'DD-MM-YYYY'
        });

        $(".export_excel").bind("click", function () {

            $('#search_report_form').attr('action', '<?php echo MAINSITE_Admin . $user_access->class_name . "/" . $user_access->function_name . "-export"; ?>');
            $('#search_report_form').attr('target', '_blank');
            $('#search_report_btn').click();

            $('#search_report_form').attr('action', '<?php echo MAINSITE_Admin . $user_access->class_name . "/" . $user_access->function_name; ?>');
            $('#search_report_form').attr('target', '');
        })



    })

</script>