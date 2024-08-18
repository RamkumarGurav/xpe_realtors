<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title><?php echo _project_complete_name_ ?></title>
  <link href="https://fonts.googleapis.com/css2?family=Lato:wght@400;700;900&display=swap" rel="stylesheet">
  <!-- <link rel="shortcut icon" type="image/x-icon" href="<?= IMAGE ?>logo-2.png"> -->
  <?
  $csrf = array(
    'name' => $this->security->get_csrf_token_name(),
    'hash' => $this->security->get_csrf_hash()
  );
  ?>
  <meta name="<?php echo $csrf['name']; ?>" content="<?php echo $csrf['hash']; ?>">
  <?
  if (!empty($page_type)) {
    if ($page_type == "list") {
      $this->load->view('secureRegions/inc/files/header-list', $this->data);
    }
  } else {
    $this->load->view('secureRegions/inc/files/header', $this->data);
  }
  ?>
  <style type="text/css">
    .width100,
    .select2-container {
      width: 100% !important;
    }
  </style>
  <script>

    $.ajaxSetup({
      headers: {
        '<?php echo $csrf['name'] ?>': '<?php echo $csrf['hash'] ?>'
      }
    });
  </script>
</head>

<style>
  .custom-file-label.form-control-sm::after {
    height: 1.8rem;
    padding: .2rem 0.75rem;
    height: 30px !important;
    line-height: 1.8em !important;
  }

  .custom-file-label {
    margin-bottom: 0;
    margin-top: 0 !important;
    height: 31px !important;
  }

  input[type="file"] {
    display: block;
    height: calc(1.8125rem + 2px);
    height: 50px;
  }
</style>

<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed pace-primary"
  data-scrollbar-auto-hide="n">
  <div class="wrapper">
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="<?php echo MAINSITE_Admin . "wam" ?>" class="nav-link">Dashboard</a>
        </li>
        <!-- <li class="nav-item d-none d-sm-inline-block">
        <a href="<?php echo MAINSITE_Admin . 'wam/lock-screen' ?>" class="nav-link">Screen Lock</a>
      </li> -->
        <li class="nav-item d-none d-sm-inline-block">
          <a href="<?php echo MAINSITE_Admin . 'wam/lock-screen' ?>" class="btn btn-dark "><b>Screen Lock</b></a>
        </li>
      </ul>

      <!-- SEARCH FORM -->
      <?php  /* ?><form class="form-inline ml-3">
<div class="input-group input-group-sm">
<input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
<div class="input-group-append">
<button class="btn btn-navbar" type="submit">
<i class="fas fa-search"></i>
</button>
</div>
</div>
</form>
<?php  */ ?>
      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">
        <?php
        /*?> <!-- Messages Dropdown Menu -->
<li class="nav-item dropdown">
<a class="nav-link" data-toggle="dropdown" href="#">
<i class="far fa-comments"></i>
<span class="badge badge-danger navbar-badge">3</span>
</a>
<div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
<a href="#" class="dropdown-item">
<!-- Message Start -->
<div class="media">
<img src="<?php  echo _lte_files_?>dist/img/user1-128x128.jpg" alt="User Avatar" class="img-size-50 mr-3 img-circle">
<div class="media-body">
<h3 class="dropdown-item-title">
Brad Diesel
<span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
</h3>
<p class="text-sm">Call me whenever you can...</p>
<p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
</div>
</div>
<!-- Message End -->
</a>
<div class="dropdown-divider"></div>
<a href="#" class="dropdown-item">
<!-- Message Start -->
<div class="media">
<img src="<?php  echo _lte_files_?>dist/img/user8-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
<div class="media-body">
<h3 class="dropdown-item-title">
John Pierce
<span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
</h3>
<p class="text-sm">I got your message bro</p>
<p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
</div>
</div>
<!-- Message End -->
</a>
<div class="dropdown-divider"></div>
<a href="#" class="dropdown-item">
<!-- Message Start -->
<div class="media">
<img src="<?php  echo _lte_files_?>dist/img/user3-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
<div class="media-body">
<h3 class="dropdown-item-title">
Nora Silvester
<span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
</h3>
<p class="text-sm">The subject goes here</p>
<p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
</div>
</div>
<!-- Message End -->
</a>
<div class="dropdown-divider"></div>
<a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
</div>
</li>
<!-- Notifications Dropdown Menu -->
<li class="nav-item dropdown">
<a class="nav-link" data-toggle="dropdown" href="#">
<i class="far fa-bell"></i>
<span class="badge badge-warning navbar-badge">15</span>
</a>
<div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
<span class="dropdown-item dropdown-header">15 Notifications</span>
<div class="dropdown-divider"></div>
<a href="#" class="dropdown-item">
<i class="fas fa-envelope mr-2"></i> 4 new messages
<span class="float-right text-muted text-sm">3 mins</span>
</a>
<div class="dropdown-divider"></div>
<a href="#" class="dropdown-item">
<i class="fas fa-users mr-2"></i> 8 friend requests
<span class="float-right text-muted text-sm">12 hours</span>
</a>
<div class="dropdown-divider"></div>
<a href="#" class="dropdown-item">
<i class="fas fa-file mr-2"></i> 3 new reports
<span class="float-right text-muted text-sm">2 days</span>
</a>
<div class="dropdown-divider"></div>
<a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
</div>
</li>
<?php  */ ?>

        <li class="nav-item dropdown user-menu ">
          <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
            <?php if (!empty($company_logo_file_name)): ?>
              <img src="<?= _uploaded_files_ ?>company_profile/logo/<?= $company_logo_file_name ?>"
                class="user-image img-circle elevation-2">
            <?php else: ?>
              <img src="<?= IMAGE_ADMIN ?>logo.jpg" class="user-image img-circle elevation-2">
            <?php endif; ?>

            <span class="d-none d-md-inline"><?php echo $user_data->admin_user_name ?></span>
          </a>

          <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right card-primary card-outline" style="left: inherit; right: 0px; padding: 5px;
    border-radius: 5%;">
            <!-- User image -->
            <li class="user-header ">
              <?php if (!empty($company_logo_file_name)): ?>
                <img src="<?= _uploaded_files_ ?>company_profile/logo/<?= $company_logo_file_name ?>"
                  style="height:100px;width:auto;" class="img-circle elevation-2" alt="User Image" alt="User Image">
              <?php else: ?>
                <img src="<?= IMAGE_ADMIN ?>logo.jpg" style="height:100px;width:auto;" class="img-circle elevation-2"
                  alt="User Image" alt="User Image">
              <?php endif; ?>

              <p>
                <?php echo $user_data->admin_user_name ?> - <?php echo $user_data->admin_user_role_name ?>
                <small>Member since <?php echo date("M, Y", strtotime($user_data->added_on)) ?></small>
              </p>
            </li>
            <!-- Menu Body -->
            <?php  /*?><li class="user-body">
<div class="row">
<div class="col-4 text-center">
<a href="#">Followers</a>
</div>
<div class="col-4 text-center">
<a href="#">Sales</a>
</div>
<div class="col-4 text-center">
<a href="#">Friends</a>
</div>
</div>
<!-- /.row -->
</li><?php  */ ?>
            <!-- Menu Footer-->
            <li class="user-footer">

              <a href="<?php echo MAINSITE_Admin . 'wam/view-profile' ?>" class="btn btn-primary "><b>Profile</b></a>
              <a href="<?php echo MAINSITE_Admin . 'wam/logout' ?>"
                class="btn btn-default float-right"><b>Logout</b></a>
            </li>
          </ul>
        </li>
        <!-- <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button"><i
            class="fas fa-th-large"></i></a>
      </li> -->
        <?php if (!empty($user_data->roles)) {
          if (count($user_data->roles) > 1) { ?>
            <li class="nav-item">
              <button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-default-using-setting">
                <i class="fas fa-th-large"></i>
              </button>
            </li>
          <?php }
        } ?>
      </ul>
    </nav>
    <?php if (!empty($user_data->roles)) {
      if (count($user_data->roles) > 1) { ?>
        <div class="modal fade" id="modal-default-using-setting">

          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title">Setting</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <?php echo form_open(MAINSITE_Admin . "wam/set-company", array('method' => 'post', 'id' => 'ptype_list_form', "name" => "ptype_list_form", 'style' => '', 'class' => 'form-horizontal', 'role' => 'form', 'enctype' => 'multipart/form-data')); ?>
                <div class="card-body">
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-3 col-form-label">Company</label>
                    <div class="col-sm-9">
                      <select type="text" class="form-control custom-select" name="sess_company_profile_id"
                        onChange="submit()">
                        <?php foreach ($user_data->roles as $r) { ?>
                          <option <?php if ($this->session->userdata('sess_company_profile_id') == $r->company_profile_id) {
                            echo "selected";
                          } ?> value="<?php echo $r->company_profile_id ?>">
                            <?php echo $r->company_unique_name ?>
                          </option>
                        <?php } ?>
                      </select>
                    </div>
                  </div>
                </div>
                <?php echo form_close() ?>

              </div>
              <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
              </div>
            </div>
          </div>
        </div>

      <?php }
    } ?>