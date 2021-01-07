<?php
    require_once "session.php";
    require_once "reuse_files/constant.inc.php";
    if (isset($_SESSION['USER_ID'])) {
        header('Location: '.FRONT_SITE_PATH."index");
        exit();
    }
    
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
                    <div class="card" style="overflow: hidden;height: 400px;">
                        <div class="card-body login_form" style="transform: translateX(0px);">
                            <!-- Form register -->
                            <form method="post" id="frmsubmit">
                                <h2 class="text-center font-up font-bold deep-orange-text py-4">Login</h2>
                                <div class="md-form">
                                    <i class="fa fa-envelope prefix grey-text"></i>
                                    <input type="text" id="orangeForm-email3" class="form-control email" >
                                    <span class="error_span" id="email_error"></span>
                                    <label for="orangeForm-email3">Your email</label>
                                </div>
                                <div class="md-form">
                                    <i class="fa fa-lock prefix grey-text"></i>
                                    <input type="password" id="orangeForm-pass3" class="form-control password">
                                    <span class="error_span" id="password_error"></span>
                                    <label for="orangeForm-pass3">Your password</label>
                                </div>
                                <div class="container">
                                  <div class="row">
                                    <div class="col-sm-6">
                                      <button class="btn btn-deep-orange" id="submit_form">Login</button>
                                    </div>
                                    <div class="col-sm-6">
                                      <h5 class="text-right"><a href="javascript:void(0)" id="fg_pass">Forgot Password?</a></h5>
                                    </div>
                                  </div>
                                </div>
                            </form>
                        </div>



                        <!-- password reset by shadab -->
                        <div class="card-body password_reset" style="transform: translateX(1200px);">
                            <!-- Form register -->
                            <form method="post" id="password_reset_submit">
                                <h2 class="text-center font-up font-bold deep-orange-text py-4">Security Question</h2>
                                <h5><strong>Q. What is your birth date ?</strong></h5>
                                <div class="row">
                                  <div class="col-4 col-sm-4">
                                    <div class="form-group">
                                      <label for="day" style="color: #6e6e6e">Day</label>
                                      <select class="custom-select rounded-0" name="day" id="day">
                                        <option value="">Select Day</option>
                                        <?php
                                          for ($i=1; $i < 32; $i++) { 
                                            ?>
                                            <option value="<?= $i ?>"><?= $i ?></option>
                                            <?php                                                
                                          }
                                        ?>
                                      </select>
                                    </div>
                                  </div>

                                  <div class="col-4 col-sm-4">
                                    <div class="form-group">
                                      <label for="month" style="color: #6e6e6e">Month</label>
                                      <select class="custom-select rounded-0" name="month" id="month" style="-webkit-appearance: none;">
                                        <option value="">Select Month</option>
                                         <?php
                                          for ($i = 0; $i < 12; $i++) {
                                              $time = strtotime(sprintf('%d months', $i));   
                                              $label = date('F', $time);
                                              $value = date('n', $time);   
                                              echo "<option value='$value'>$label</option>";
                                          }
                                          ?>
                                      </select>
                                    </div>
                                  </div>

                                  <div class="col-4 col-sm-4">
                                    <div class="form-group">
                                      <label for="day" style="color: #6e6e6e">Year</label>
                                      <select class="custom-select rounded-0" id="year" name="year">
                                        <option value="">Select Year</option>
                                          <?php
                                          define('DOB_YEAR_START', 1970);
                                            $current_year = date('Y');

                                            for ($count = $current_year; $count >= DOB_YEAR_START; $count--)
                                            {
                                                print "<option value='{$count}'>{$count}</option>";
                                            }

                                          ?>
                                      </select>
                                    </div>
                                    <input type="hidden" value="password_reset" name="password_reset">
                                  </div>
                                </div>

                                <div class="text-right">
                                  <button type="submit" class="btn btn-deep-orange" id="next_step_pass_reset">Next</button>
                                </div>
                                <div class="text-right">
                                  <a href="javascript:vod(0)" id="back_to_login">I remember my password..</a>
                                </div>
                            </form>
                        </div>


                        <!-- change password -->

                         <div class="card-body set_password" style="transform: translateX(1200px);">
                            <!-- Form register -->
                            <form method="post" id="change_password">
                                <h2 class="text-center font-up font-bold deep-orange-text py-4">Set Password</h2>
                                <div class="md-form">
                                    <i class="fa fa-lock prefix grey-text"></i>
                                    <input type="text" id="orangeForm-email3" name="password_new" class="form-control " >
                                    <label for="orangeForm-email3">New Password</label>
                                </div>
                                <div class="md-form">
                                    <i class="fa fa-lock prefix grey-text"></i>
                                    <input type="password" id="orangeForm-pass3" name="password_confirm" class="form-control password">
                                    <input type="hidden" name="change_password" value="change_password" class="form-control password">
                                    <label for="orangeForm-pass3">Confirm Password</label>
                                </div>
                                <div class="container">
                                  <div class="row">
                                    <div class="col-sm-12">
                                      <button class="btn btn-deep-orange" type="submit">Change Password</button>
                                    </div>
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
         var Toast = Swal.mixin({
                          toast: true,
                          position: 'top-end',
                          showConfirmButton: false,
                          timer: 3000,
                          timerProgressBar: true,
                          didOpen: (toast) => {
                            toast.addEventListener('mouseenter', Swal.stopTimer)
                            toast.addEventListener('mouseleave', Swal.resumeTimer)
                          }
                   });


            jQuery('#submit_form').click(function(e){
            jQuery('#email_error').html('').hide();
            jQuery('#password_error').html('').hide();
            jQuery('#signup_error').html('').hide();
            var email = jQuery('.email').val();
            var password = jQuery('.password').val();
             

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
                            window.location = '<?php echo FRONT_SITE_PATH.'index' ?>';
                        }, 3000);
                    }
                }
            });

        e.preventDefault();
    }); 



      $("#fg_pass").click( () => {
        $(".login_form").css({"transform":"translateX(-1200px)","transition":".2s ease"});
        $(".password_reset").css({"transform":"translateX(0px)","transition":".2s ease"});
        $(".login_form").hide();
        $(".password_reset").show();
      });

      $("#back_to_login").click( () => {
        $(".login_form").show();
        $(".login_form").css({"transform":"translateX(0px)","transition":".2s ease"});
        $(".password_reset").css({"transform":"translateX(-1200px)","transition":".2s ease"});
      });


        $("#password_reset_submit").on("submit", function(e) {
            var formdata = $(this).serialize();

            $.ajax({
               url:"verify.php",
                type:"post",
                data: formdata,
                success: function(data1) {
                  var result1 = jQuery.parseJSON(data1);
                  if (result1.status == 'error6') {
                             Toast.fire({
                                icon: 'error',
                                text: 'Select all fields'
                              });
                    }
                   if (result1.status == 'error7') {
                             Toast.fire({
                                icon: 'error',
                                text: 'Select Correct Date of Birth'
                              });
                    }  

                   if (result1.status == 'success') {
                        Toast.fire({
                                icon: 'success',
                                text: 'Date of Birth is Correct'
                              });
                        setTimeout(function() {
                           $(".password_reset").css({"transform":"translateX(-1200px)","transition":".2s ease"});
                            $(".password_reset").hide();
                            $(".set_password").show();
                           $(".set_password").css({"transform":"translateX(0px)","transition":".2s ease"});
                        }, 3000);
                    } 
                }
            });
            e.preventDefault();
          });    



         $("#change_password").on("submit", function(e) {
            var formdata = $(this).serialize();
              $.ajax({
               url:"verify.php",
                type:"post",
                data: formdata,
                success: function(data1) {
                  var result1 = jQuery.parseJSON(data1);
                  if (result1.status == 'error8') {
                             Toast.fire({
                                icon: 'error',
                                text: 'password must be greater than 6 letters'
                              });
                    }  


                 if (result1.status == 'error9') {
                             Toast.fire({
                                icon: 'error',
                                text: 'password didn\'t match'
                              });
                    }


                 if (result1.status == 'success') {
                        Toast.fire({
                                icon: 'success',
                                text: 'Password Changed Successfully'
                              });
                        setTimeout(function() {
                           $(".set_password").css({"transform":"translateX(-1200px)","transition":".2s ease"});
                           $(".set_password").hide();
                           $(".login_form").show();
                           $(".login_form").css({"transform":"translateX(0px)","transition":".2s ease"});
                        }, 3000);
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