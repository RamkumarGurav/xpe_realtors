<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php echo _project_complete_name_ ?> | Log in</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="<? echo _lte_files_ ?>plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<? echo _lte_files_ ?>dist/css/ionicons.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="<? echo _lte_files_ ?>plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<? echo _lte_files_ ?>dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>

<body class="hold-transition login-page">
  <div class="login-box">
    <div class="login-logo">
      <?php if (!empty($company_logo_file_name)): ?>
        <img src="<?= _uploaded_files_ ?>company_profile/logo/<?= $company_logo_file_name ?>"
          style="height:100px;width:auto;">
      <?php else: ?>
        <img src="<?= IMAGE_ADMIN ?>logo.jpg" style="height:100px;width:auto;">
      <?php endif; ?>
    </div>
    <!-- /.login-logo -->
    <div class="card">
      <div class="card-body login-card-body">
        <p class="login-box-msg">Enter Email / User Name To Reset Password</p>
        <?php echo $alert_message; ?>
        <?php echo form_open(MAINSITE_Admin . 'Login', array('method' => 'post', 'id' => '', 'style' => '', 'class' => '')); ?>
        <div class="input-group mb-3">
          <?php
          $attributes = array(
            'name' => 'username',
            'id' => 'username',
            'value' => set_value('username'),
            'class' => 'form-control',
            'placeholder' => "Email / User Name",
            'autofocus' => 'autofocus',
            'type' => 'text',
            'required' => 'required'
          );
          echo form_input($attributes); ?>
          <?php //echo form_error('username'); ?>

          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>

        <div class="row d-flex justify-content-center">
          <!-- <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="remember">
              <label for="remember">
                Remember Me
              </label>
            </div>
          </div> -->
          <!-- /.col -->


          <button type="button" onclick="forgot_password_func()" name="login_btn" value="1"
            class="btn btn-primary d-block">Reset Password</button>

          <!-- /.col -->
        </div>
        <?php echo form_close() ?>
        <? /* ?>
<div class="social-auth-links text-center mb-3">
<p>- OR -</p>
<a href="#" class="btn btn-block btn-primary">
<i class="fab fa-facebook mr-2"></i> Sign in using Facebook
</a>
<a href="#" class="btn btn-block btn-danger">
<i class="fab fa-google-plus mr-2"></i> Sign in using Google+
</a>
</div>
<!-- /.social-auth-links -->
*/
        ?>
        <p class="message"></p>
        <!-- <p class="mb-1">
        <a href="<?= MAINSITE_Admin . 'forgot-password' ?>">Forgot password</a>
      </p> -->
        <!-- <p class="mb-0">
        <a href="register.html" class="text-center">Register a new membership</a>
      </p> -->
      </div>
      <!-- /.login-card-body -->
    </div>
  </div>
  <? ?>
  <!-- /.login-box -->

  <!-- jQuery -->
  <script src="<? echo _lte_files_ ?>plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="<? echo _lte_files_ ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="<? echo _lte_files_ ?>dist/js/adminlte.min.js"></script>

</body>

</html>
<script type="text/javascript">
  function forgot_password_func() {

    var username = $('#username').val();

    if (username != '') {
      $('.message').text('');
      $(".loader").css("display", "block");

      $.ajax({

        type: "POST",

        url: '<?= MAINSITE_Admin ?>Login/admin_reset_password',

        dataType: "json",

        data: { 'username': username },

        success: function (result) {

          $(".loader").css("display", "none");

          if (result) {

            if (result.status) {
              $('.message').css('color', 'green');
            } else {
              $('.message').css('color', 'red');
            }

            $('.message').text(result.message);
          }

          else {

            alert(result.message)

          }

        }

      });



    }

    else {

      alert("Please Enter Username");

      $('#username').focus();

    }

  }
</script>