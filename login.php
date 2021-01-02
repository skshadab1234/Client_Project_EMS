<?php
    require_once "session.php";
    require_once "reuse_files/constant.inc.php";
    if (isset($_SESSION['USER_ID'])) {
        header('Location: '.FRONT_SITE_PATH);
        exit();
    }

    
    $sql = "select email from users where id = '1'";
    $res = mysqli_query($con,$sql);
    $row = mysqli_fetch_assoc($res);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
     <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
     <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo FRONT_SITE_PATH ?>plugins/fontawesome-free/css/all.min.css">
  <!-- SweetAlert2 -->
  <link rel="stylesheet" href="<?php echo FRONT_SITE_PATH ?>plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
  <!-- Toastr -->
  <link rel="stylesheet" href="<?php echo FRONT_SITE_PATH ?>plugins/toastr/toastr.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo FRONT_SITE_PATH ?>dist/css/adminlte.min.css">
    <link rel="stylesheet" type="text/css" href="css/login.css">
</head>
<!------ Include the above in your HEAD tag ---------->
<body class="hm-gradient">
    <main>
        <!--MDB Forms-->
        <div class="container mt-4">
            <!-- Grid row -->
            <div class="row">
               <div class="col-md-2"></div>
                <!-- Grid column -->
            <div class="col-md-8 mb-4">
                    <div class="card">
                        <div class="card-body">
                            
                            <!-- Form register -->
                            <form method="post" id="frmsubmit">
                                <h2 class="text-center font-up font-bold deep-orange-text py-4">Login</h2>
                                <div class="md-form">
                                    <i class="fa fa-envelope prefix grey-text"></i>
                                    <input type="text" id="orangeForm-email3" class="form-control email" value="<?= $row['email'] ?>">
                                    <span class="error_span" id="email_error"></span>
                                    <label for="orangeForm-email3">Your email</label>
                                </div>
                                <div class="md-form">
                                    <i class="fa fa-lock prefix grey-text"></i>
                                    <input type="password" id="orangeForm-pass3" class="form-control password">
                                    <span class="error_span" id="password_error"></span>
                                    <label for="orangeForm-pass3">Your password</label>
                                </div>
                                <div class="text-center">
                                    <button class="btn btn-deep-orange" id="submit_form">Login
                                    </button>
                             <div class="container" style="position: relative;">
                                <span id="signup_error" style="color: red"></span>
                                <span id="signup_success" style="color: green"></span>
                                    <h5 class="loader" style="background-image: url(loader.gif);background-size: cover;width: 20px;height: 20px;display: none;position: absolute;left: 50%"></h5>
                                </div>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
               <div class="col-md-2"></div>
            </div>
        </div>
        <!--MDB Forms-->
      
    </main>

        <!-- jQuery -->
    <script src="<?php echo FRONT_SITE_PATH ?>plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="<?php echo FRONT_SITE_PATH ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- SweetAlert2 -->
    <script src="<?php echo FRONT_SITE_PATH ?>plugins/sweetalert2/sweetalert2.min.js"></script>
    <!-- Toastr -->
    <script src="<?php echo FRONT_SITE_PATH ?>plugins/toastr/toastr.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?php echo FRONT_SITE_PATH ?>dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="<?php echo FRONT_SITE_PATH ?>dist/js/demo.js"></script>
    <script type="text/javascript">

       jQuery(document).ready(function(){
            jQuery('#submit_form').click(function(e){
            jQuery('#email_error').html('').hide();
            jQuery('#password_error').html('').hide();
            jQuery('#signup_error').html('').hide();
            var name = jQuery('.name').val();
            var email = jQuery('.email').val();
            var password = jQuery('.password').val();
            var repassword = jQuery('.repassword').val();
             var Toast = Swal.mixin({
                          toast: true,
                          position: 'top-end',
                          showConfirmButton: false,
                          timer: 5000,
                          timerProgressBar: true,
                          didOpen: (toast) => {
                            toast.addEventListener('mouseenter', Swal.stopTimer)
                            toast.addEventListener('mouseleave', Swal.resumeTimer)
                          }
                            });

            // disabling button click on click
            jQuery('#submit_form').attr('disabled',true);
            jQuery('.loader').show();
            jQuery('.loader').fadeIn();
            
            jQuery.ajax({
                url:"verify.php",
                type:"post",
                data: {
                    email:email,
                    password:password,
                },
                success:function(data){
                    jQuery('#submit_form').attr('disabled',false);
                    jQuery('.loader').hide();
                    jQuery('#submit_form').html('Login');
                    var result = jQuery.parseJSON(data);
                    if (result.status == 'error1') {
                             Toast.fire({
                                icon: 'error',
                                text: 'All fields are Required!'
                              });
                    }
                     if (result.status == 'error2') {
                             Toast.fire({
                                icon: 'error',
                                text: 'Email field can not be empty'
                              });
                    }
                     if (result.status == 'error3') {
                             Toast.fire({
                                icon: 'error',
                                text: 'Please Enter Correct Email address...'
                              });
                    }
                   if (result.status == 'error4') {
                             Toast.fire({
                                icon: 'error',
                                text: 'Password Field cannot be empty...'
                              });
                    }
                    if (result.status == 'error5') {
                             Toast.fire({
                                icon: 'error',
                                text: 'Email or password are incorrect'
                              });
                    } 

                    if (result.status == 'success') {
                      jQuery('#submit_form').attr('disabled',true);
                        Toast.fire({
                                icon: 'success',
                                text: 'Signed in Succesfully.We are redirecting to the dashboard'
                              });
                        setTimeout(function() {
                            window.location = '<?php echo FRONT_SITE_PATH ?>';
                        }, 5000);
                    }
                }
            });

        e.preventDefault();
    }); 
});

       
</script>
    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.4.1/js/mdb.min.js"></script>
  
</body>