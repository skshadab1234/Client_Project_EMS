<?php
  include 'reuse_files/header.php';
  $sql = "SELECT status,user_dob FROM users WHERE id = {$admin['id']}"; 
  $res = mysqli_query($con,$sql);
  $readonly = '';
  $dis_able = '';
  if (mysqli_num_rows($res) > 0) {
  	$row = mysqli_fetch_assoc($res);
  	if ($row['status'] == 0) {
  		$readonly = 'readonly';
  		$dis_able = "disabled";
  	}
  }


  $user_dob = explode('-',$row['user_dob']);
?>

 <div class="content-wrapper">
      <!-- Content Header (Page header) -->
     <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Profile</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">User Profile</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>


    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-3">

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center" id="preview">
                  <img class="profile-user-img img-fluid img-circle"
                       src="<?php echo FRONT_SITE_PATH.$admin['picture_link'] ?>"
                       alt="User profile picture">
                </div>

                <h3 class="profile-username text-center"><?= $admin['first_name'].' '.$admin['last_name'] ?></h3>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
          <div class="col-md-9">
            <div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                  <li class="nav-item"><a class="nav-link active" href="#settings" data-toggle="tab">Edit Profile</a></li>
                  <li class="nav-item"><a class="nav-link " href="#change_password" data-toggle="tab">Change Password</a></li>

                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  <div class="tab-pane active" id="settings">
                    <form class="form-horizontal" id="updateForm" method="post">
                      <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label">FirstName</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="first_name" name="first_name" placeholder="FirstName" value="<?= $admin['first_name'] ?>" <?= $readonly ?> >
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputEmail" class="col-sm-2 col-form-label">LastName</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="last_name" name="last_name" placeholder="LastName" value="<?= $admin['last_name'] ?>" <?= $readonly ?> >
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputName2" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                          <input type="email" class="form-control" id="email" name="email" placeholder="Email" value="<?= $admin['email'] ?>" <?= $readonly ?> >
                        </div>
                      </div>


                      <div class="form-group row">
                        <label for="inputName2" class="col-sm-2 col-form-label">DOB</label>
                        <div class="col-sm-2">
                          <select name="day" class="form-input select2" style="width: 100%;">
                            <option value="" disabled selected="">Day</option>
                            <?php
                              for ($i=1; $i < 32; $i++) { 
                                if ($i == $user_dob[2]) {
                                ?>
                                <option value="<?= $i ?>" selected><?= $i ?></option>
                                <?php                                                
                              }else {
                                ?>
                                   <option value="<?= $i ?>" ><?= $i ?></option>
                                <?php
                              }
                             }

                            ?>
                          </select>
                        </div>


                        <div class="col-sm-5">
                          <select name="month" class="form-input select2" style="width: 100%;">
                             <option value="" disabled selected>Month</option>
                            <?php
                                  for ($i = 0; $i < 13; $i++) {
                                      $time = strtotime(sprintf('%d months', $i));   
                                      $label = date('F', $time);
                                      $value = date('n', $time);   
                                      if ($value == $user_dob[1]) {
                                         ?>
                                        <option value="<?= $value ?>" selected><?= $label ?></option>
                                        <?php                                                
                                          }else {
                                            ?>
                                               <option value="<?= $value ?>" ><?= $label ?></option>
                                            <?php
                                        }
                                     }
                              ?>
                          </select>
                        </div>



                        <div class="col-sm-3">
                          <select name="year" class="form-input select2" style="width: 100%;">
                             <option value="" disabled="" selected>Year</option>
                                    <?php
                                          define('DOB_YEAR_START', 1970);
                                            $current_year = date('Y');

                                            for ($count = $current_year; $count >= DOB_YEAR_START; $count--)
                                            {

                                                if ($count == $user_dob[0]) {
                                                   ?>
                                                  <option value="<?= $count ?>" selected><?= $count ?></option>
                                                  <?php                                                
                                                    }else {
                                                      ?>
                                                         <option value="<?= $count ?>" ><?= $count ?></option>
                                                      <?php
                                                  }
                                            }

                                    ?>
                          </select>
                        </div>
                      </div>

                      <div class="form-group row">
                        <label for="inputName2" class="col-sm-2 col-form-label">Profile</label>
                        <div class="col-sm-10">
                          <input id="uploadImage" type="file" name="image" class="form-control" value="<?= $admin['picture_link'] ?>" <?= $dis_able ?>>
                        </div>
                      </div>

                      <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
                          <button type="submit" class="btn btn-danger"  id="updateBtn" <?= $dis_able ?>>Update Profile</button>
                          <span id="err"></span>
                        </div>
                      </div>
                    </form>
                  </div>
                  <!-- /.tab-pane -->

                  <div class="tab-pane " id="change_password">
                    <form class="form-horizontal" method="post" id="change_password_form">
                      <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label">Current Password</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" name="current_password" id="current_password" placeholder="Current Password">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputEmail" class="col-sm-2 col-form-label">New Password</label>
                        <div class="col-sm-10">
                          <input type="password" class="form-control" name="new_password" id="new_password" placeholder="New Password">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputName2" class="col-sm-2 col-form-label">Confirm Password</label>
                        <div class="col-sm-10">
                          <input type="password" class="form-control" name="confirm_password" id="confirm_password" placeholder="Confirm Password">
                        </div>
                      </div>
                      <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
                          <button type="submit" class="btn btn-danger success" id="update_password">Change Password</button>
                        </div>
                      </div>
                    </form>
                    <span id="error_field" style="color: red"></span>
                    <span id="success_field" style="color: green"></span>
                  </div>
                  <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
 </div>   

<?php
include 'reuse_files/footer.php';
?>
 <script>
 	$(document).ready(function (e) {
       
    $("#error_field,#success_field").hide();
	 $("#updateForm").on('submit',(function(e) {
	  e.preventDefault();
			$.ajax({
       url: "update_profile.php",
	   type: "POST",
	   data:  new FormData(this),
	   contentType: false,
	         cache: false,
	   processData:false,
	   beforeSend : function()
	   {
	    //$("#preview").fadeOut();
	    $("#err").fadeOut();
	   },
	   success: function(data)
	      {
	    if(data=='invalid')
	    {
	     // invalid file format.
	     $("#err").html("Invalid File !").fadeIn();
	    }
	    else
	    {
	     // view uploaded file.
       $("#updateBtn").attr("disabled",true);
       $("#updateBtn").html("Saved").css({"background":"green","border":"none"});
	     $("#preview").html(data).fadeIn();
	    }
	      },
	     error: function(e) 
	      {
	    $("#err").html(e).fadeIn();
	      }          
	    });

	 }));


   $("#change_password_form").on('submit',(function(e1) {
    e1.preventDefault();
      $.ajax({
    url: "update_password.php",
     type: "POST",
     data:  new FormData(this),
     contentType: false,
           cache: false,
     processData:false,
     success: function(data)
        {
          var res = jQuery.parseJSON(data);
          if (res.status == 'error') {
            $("#success_field").hide();
            $("#error_field").show();
            $("#"+res.field).html(res.msg);
          }
          if (res.status == 'success') {
            $("#error_field").hide();
            $("#success_field").show();
            $("#"+res.field).html(res.msg);
          }

        
        },
           
      });

   }));
 // setTimeout(()=>{
	//      $("#updateBtn,#first_name, #last_name,#email,#uploadImage").attr("disabled",false);
	//  },30000);
	});
 </script>    


