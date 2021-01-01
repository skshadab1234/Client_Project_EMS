<?php
  include 'reuse_files/header.php';
  $get_employee_details = get_employee_details();
?>
<!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
 <?php
  if (isset($_GET['action']) && $_GET['action']!=''  && $_GET['action']=='viewall') {

    if (isset($_GET['delete_employee'])  && $_GET['delete_employee']>0) {
      $delete_employee_id=get_safe_value($_GET['delete_employee']);
      mysqli_query($con,"delete from employees where id='$delete_employee_id'");
      mysqli_query($con,"delete from employee_child_details where employee_id='$delete_employee_id'");
      redirect('features?action=viewall');
    }
    ?>
    
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">Employee's</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item active">Employee's Details</li>
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->

          <?php
            if (isset($_SESSION['error_data_exist'])) {
              echo "<div class='alert alert-danger alert-dismissible'>
                    <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                    <h4><i class='icon fa fa-warning'></i> Error!</h4>
                    " . $_SESSION['error_data_exist'] . "
                  </div>";
                unset($_SESSION['error_data_exist']);
            }
            if (isset($_SESSION['success_data_exist'])) {
              echo "<div class='alert alert-success alert-dismissible'>
                    <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                    <h4><i class='icon fas fa-warning'></i> Success!</h4>
                    " . $_SESSION['success_data_exist'] . "
                  </div>";
                unset($_SESSION['success_data_exist']);
            }
            ?>

        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->

      <!-- Main content -->
      <div class="content">
        <div class="container-fluid">
          <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">List of all Employee's</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive">
               <table id="example" class="table  dataTable no-footer dtr-inline collapsed" role="grid" aria-describedby="example1_info" style="width:100%">
              <thead>
                  <tr>
                      <th style="width: 5%" >Employee ID</th>
                      <th style="width: 10%">Profile</th>
                      <th style="width: 15%">Employee Name</th>
                      <th style="width: 20%">Adhar No.</th>
                      <th style="width: 20%">A/c No.</th>
                      <th style="width: 30%"></th>
                  </tr>
              </thead>
              <tbody>
           
           <?php
            foreach ($get_employee_details as $key => $value) {
              ?>
                <tr role="row" class="odd">
                  <td><?= $value['id'] ?></td>
                  <td>
                    <img src="<?php echo FRONT_SITE_PATH.'media/employee_profile/'.$value['emp_image'] ?>"  class="brand-image img-circle elevation-3" style="width:4rem;height:4rem;opacity: .8">
                  </td>
                  <td><?= $value['emp_name'] ?></td>
                  <td><?= $value['emp_adhar_no'] ?></td>
                  <td><?= $value['emp_bank_account_no'] ?></td>
                   <td class="project-actions">
                          <a class="btn btn-primary btn-sm" href="features?action2=view_employee&id=<?= $value['id'] ?>">
                              <i class="fas fa-folder">
                              </i>
                              View
                          </a>
                          <a class="btn btn-info btn-sm" href="features?action1=new_employee&id=<?= $value['id'] ?>">
                              <i class="fas fa-pencil-alt">
                              </i>
                              Edit
                          </a>
                          <a class="btn btn-danger btn-sm" href="#" onclick="remove_employee('<?php echo $value['emp_name'] ?>', '<?= $value['id']?>')">
                              <i class="fas fa-trash">
                              </i>
                              Delete
                          </a>
                  </td>
                </tr>
              <?php
            }
           ?>
        </tbody>
        <tfoot>
            <tr>
                <th>Employee ID</th>
                <th>Profile</th>
                <th>Employee Name</th>
                <th>Adhar No.</th>
                <th>A/c No.</th>
                <th></th>
            </tr>
        </tfoot>
    </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>    

        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content -->
     

<!-- ======================================================================================================================================================== -->
<!-- add  New Employee -->


   <?php
    } else if (isset($_GET['action1']) && $_GET['action1']!='' && $_GET['action1']=='new_employee') {

      $emp_profile="";
      $emp_sign_upload="";
      $image_status= "required";  
      $id = "";
      $page_name = "Add New Employee";
      $emp_name = "";
      $date_of_birth = "";
      $martial_status ="";
      $date_of_join = "";
      $date_of_leave = "";
      $location = "";
      $pf_no_uan_no = "";
      $esic_no = "";
      $present_address = "";
      $present_pincode = "";
      $permanent_address = "";
      $permanent_pincode = "";
      $mn_no_1 = "";
      $mb_no_2 = "";
      $emp_adhar_no = "";
      $emp_election_id_no = "";
      $emp_passport_no = ""; 
      $emp_pan_no = "";
      $emp_name_of_bank_account_holder = "";
      $emp_bank_account_no = "";
      $emp_bank_ifsc_code = "";
      $emp_father_name = "";
      $emp_father_dob = "";
      $emp_father_age = "";
      $emp_mother_name ="";
      $emp_mother_dob ="";
      $emp_mother_age ="";
      $emp_wife_name = "";
      $emp_wife_dob = "";
      $emp_wife_age = "";
      $emp_profile = "";
      $emp_signature = "";


    if(isset($_GET['id']) && $_GET['id']>0){
      $id=get_safe_value($_GET['id']);
      $row=mysqli_fetch_assoc(mysqli_query($con,"select * from employees where id='$id'"));
      $image_status='';
      $emp_name = $row['emp_name'];
      $page_name="Edit ".$emp_name;
      $date_of_birth = $row['emp_dob'];
      $martial_status = $row['emp_martial_status'];
      $date_of_join = $row['emp_date_of_joining'];
      $date_of_leave = $row['emp_date_of_leaving'];
      $location = $row['location_site'];
      $pf_no_uan_no = $row['pf_no_uan_no'];
      $esic_no = $row['esic_no'];
      $present_address = $row['present_address'];
      $present_pincode = $row['present_pincode'];
      $permanent_address = $row['permanent_address'];
      $permanent_pincode = $row['permanent_pincode'];
      $mn_no_1 = $row['mn_no_1'];
      $mb_no_2 = $row['mb_no_2'];
      $emp_adhar_no = $row['emp_adhar_no'];
      $emp_election_id_no = $row['emp_election_id_no'];
      $emp_passport_no = $row['emp_passport_no'];
      $emp_pan_no = $row['emp_pan_no'];
      $emp_name_of_bank_account_holder = $row['emp_name_of_bank_account_holder'];
      $emp_bank_account_no = $row['emp_bank_account_no'];
      $emp_bank_ifsc_code = $row['emp_bank_ifsc_code'];
      $emp_father_name = $row['emp_father_name'];
      $emp_father_dob = $row['emp_father_dob'];
      $emp_father_age = $row['emp_father_age'];
      $emp_mother_name = $row['emp_mother_name'];
      $emp_mother_dob = $row['emp_mother_dob'];
      $emp_mother_age = $row['emp_mother_age'];
      $emp_wife_name = $row['emp_wife_name'];
      $emp_wife_dob = $row['emp_wife_dob'];
      $emp_wife_age = $row['emp_wife_age'];
      $emp_profile = $row['emp_image'];
      $emp_signature = $row['emp_sign_upload'];
     } 


if(isset($_GET['delete_child']) && $_GET['delete_child']>0){
  $delete_child=get_safe_value($_GET['delete_child']);
  $id=get_safe_value($_GET['id']);
  mysqli_query($con,"delete from employee_child_details where id='$delete_child'");
  redirect('features?action1=new_employee&id='.$id);
}


if(isset($_POST['upload_new_employee']))
{
    $emp_name = get_safe_value($_POST['emp_name']);
    $date_of_birth = get_safe_value($_POST['date_of_birth']);
    $martial_status = get_safe_value($_POST['martial_status']);
    $date_of_join = get_safe_value($_POST['date_of_join']);
    $date_of_leave = get_safe_value($_POST['date_of_leave']);
    $location = get_safe_value($_POST['location']);
    $pf_no_uan_no = get_safe_value($_POST['pf_no_uan_no']);
    $esic_no = get_safe_value($_POST['esic_no']);
    $present_address = get_safe_value($_POST['present_address']);
    $present_pincode = get_safe_value($_POST['present_pincode']);
    $permanent_address = get_safe_value($_POST['permanent_address']);
    $permanent_pincode = get_safe_value($_POST['permanent_pincode']);
    $mn_no_1 = get_safe_value($_POST['mn_no_1']);
    $mb_no_2 = get_safe_value($_POST['mb_no_2']);
    $emp_adhar_no = get_safe_value($_POST['emp_adhar_no']);
    $emp_election_id_no = get_safe_value($_POST['emp_election_id_no']);
    $emp_passport_no = get_safe_value($_POST['emp_passport_no']);
    $emp_pan_no = get_safe_value($_POST['emp_pan_no']);
    $emp_name_of_bank_account_holder = get_safe_value($_POST['emp_name_of_bank_account_holder']);
    $emp_bank_account_no = get_safe_value($_POST['emp_bank_account_no']);
    $emp_bank_ifsc_code = get_safe_value($_POST['emp_bank_ifsc_code']);
    $emp_father_name = get_safe_value($_POST['emp_father_name']);
    $emp_father_dob = get_safe_value($_POST['emp_father_dob']);
    $emp_father_age = get_safe_value($_POST['emp_father_age']);
    $emp_mother_name = get_safe_value($_POST['emp_mother_name']);
    $emp_mother_dob = get_safe_value($_POST['emp_mother_dob']);
    $emp_mother_age = get_safe_value($_POST['emp_mother_age']);
    $emp_wife_name = get_safe_value($_POST['emp_wife_name']);
    $emp_wife_dob = get_safe_value($_POST['emp_wife_dob']);
    $emp_wife_age = get_safe_value($_POST['emp_wife_age']);
    $emp_profile=rand(111111111,999999999).'_'.$_FILES['profile_upload']['name'];
    $emp_signature=rand(111111111,999999999).'_'.$_FILES['sign_upload']['name'];

 if($id==''){
    $sql="select * from employees where pf_no_uan_no='$pf_no_uan_no' or esic_no='$esic_no' or mn_no_1='$mn_no_1' or mb_no_2='$mb_no_2' or emp_adhar_no='$emp_adhar_no' or emp_election_id_no='$emp_election_id_no' or emp_passport_no='$emp_passport_no' or emp_pan_no='$emp_pan_no' or emp_bank_account_no='$emp_bank_account_no'";
  }else{
    $sql="select * from employees where pf_no_uan_no = '$pf_no_uan_no' and id!='$id'";
  } 

if(mysqli_num_rows(mysqli_query($con,$sql))>0){
    $_SESSION['error_data_exist'] = "Employee Eixsts";
  }else {
    if($id==''){
       move_uploaded_file($_FILES['profile_upload']['tmp_name'],'media/employee_profile/'.$emp_profile);
       move_uploaded_file($_FILES['sign_upload']['tmp_name'],'media/employee_signature/'.$emp_signature);
       mysqli_query($con,"insert into employees(emp_image,emp_sign_upload,emp_name,emp_dob,emp_martial_status,emp_date_of_joining,emp_date_of_leaving,location_site,pf_no_uan_no,esic_no,present_address,present_pincode,permanent_address,permanent_pincode,mn_no_1,mb_no_2,emp_adhar_no,emp_election_id_no,emp_passport_no,emp_pan_no,emp_name_of_bank_account_holder,emp_bank_account_no,emp_bank_ifsc_code,emp_father_name,emp_father_dob,emp_father_age,emp_mother_name,emp_mother_dob,emp_mother_age,emp_wife_name,emp_wife_dob,emp_wife_age,emp_status) values('$emp_profile','$emp_signature','$emp_name','$date_of_birth','$martial_status','$date_of_join','$date_of_leave','$location','$pf_no_uan_no','$esic_no','$present_address','$present_pincode','$permanent_address','$permanent_pincode','$mn_no_1','$mb_no_2','$emp_adhar_no','$emp_election_id_no','$emp_passport_no','$emp_pan_no','$emp_name_of_bank_account_holder','$emp_bank_account_no','$emp_bank_ifsc_code','$emp_father_name','$emp_father_dob','$emp_father_age','$emp_mother_name','$emp_mother_dob','$emp_mother_age','$emp_wife_name','$emp_wife_dob','$emp_wife_age',1)");
        $eid=mysqli_insert_id($con);

        if (isset($_POST['emp_child_name']) && $_POST['emp_child_dob'] &&  $_POST['emp_child_age'] ) {
            $emp_child_nameArr = $_POST['emp_child_name'];
            $emp_child_dobArr = $_POST['emp_child_dob'];
            $emp_child_ageArr = $_POST['emp_child_age'];

            foreach ($emp_child_nameArr as $key => $val) {
              $emp_child_name_db = $val;
              $emp_child_dob_db = $emp_child_dobArr[$key];
              $emp_child_age_db = $emp_child_ageArr[$key];
              mysqli_query($con,"insert into employee_child_details(employee_id,emp_child_name,emp_child_dob,emp_child_age,emp_child_status) values('$eid','$emp_child_name_db','$emp_child_dob_db','$emp_child_age_db',1)");
              $_SESSION['success_data_exist'] = "Employee Data Inserted";
            }  
        }
          redirect('features?action=viewall');

      }
     else {
      $emp_profile_update  ='';
      if($_FILES['profile_upload']['name']!=''){
        $emp_profile=rand(111111111,999999999).'_'.$_FILES['profile_upload']['name'];
        move_uploaded_file($_FILES['profile_upload']['tmp_name'],'media/employee_profile/'.$emp_profile);
        $emp_profile_update=", emp_image='$emp_profile'";
       }
      $emp_signature_update = '';
     if($_FILES['sign_upload']['name']!=''){
        $emp_signature=rand(111111111,999999999).'_'.$_FILES['sign_upload']['name'];
        move_uploaded_file($_FILES['sign_upload']['tmp_name'],'media/employee_signature/'.$emp_signature);
        $emp_signature_update=", emp_sign_upload='$emp_signature'";
       }

       $sql="update employees set emp_name ='$emp_name', emp_dob='$date_of_birth', emp_date_of_joining='$date_of_join',emp_date_of_leaving='$date_of_leave',location_site='$location',pf_no_uan_no='$pf_no_uan_no',esic_no
       ='$esic_no',present_address='$present_address',present_pincode='$present_pincode',permanent_address='$permanent_address',permanent_pincode='$permanent_pincode',mn_no_1='$mn_no_1',mb_no_2='$mb_no_2',emp_adhar_no='$emp_adhar_no',emp_election_id_no='$emp_election_id_no',emp_passport_no='$emp_passport_no',emp_pan_no='$emp_pan_no',emp_name_of_bank_account_holder='$emp_name_of_bank_account_holder',emp_bank_account_no='$emp_bank_account_no',emp_bank_ifsc_code='$emp_bank_ifsc_code',emp_father_name='$emp_father_name',emp_father_dob='$emp_father_dob',emp_father_age='$emp_father_age',emp_mother_name='$emp_mother_name',emp_mother_dob='$emp_mother_dob',emp_mother_age='$emp_mother_age',emp_wife_name='$emp_wife_name',emp_wife_dob='$emp_wife_dob',emp_wife_age='$emp_wife_age' $emp_profile_update $emp_signature_update where id='$id'";
        mysqli_query($con,$sql);

         if (isset($_POST['emp_child_name']) && $_POST['emp_child_dob'] &&  $_POST['emp_child_age'] or $_POST['child_name_id'] ) {
          $emp_child_nameArr = $_POST['emp_child_name'];
          $emp_child_dobArr = $_POST['emp_child_dob'];
          $emp_child_ageArr = $_POST['emp_child_age'];

          foreach($emp_child_nameArr as $key=>$val){
              $emp_child_name_db = $val;
              $emp_child_dob_db = $emp_child_dobArr[$key];
              $emp_child_age_db = $emp_child_ageArr[$key];
          
          if(isset($_POST['child_name_id'][$key])){
            $child_name_id = $_POST['child_name_id'];
            $did=$child_name_id[$key];
            mysqli_query($con,"update employee_child_details set emp_child_name='$emp_child_name_db',emp_child_dob='$emp_child_dob_db',emp_child_age='$emp_child_age_db' where id='$did'");

          }else{
            mysqli_query($con,"insert into employee_child_details(employee_id,emp_child_name,emp_child_dob,emp_child_age) values('$id','$emp_child_name_db','$emp_child_dob_db','$emp_child_age_db')");
              }
          }
         }
        $_SESSION['success_data_exist'] = $emp_name." Data Updatad";
     redirect('features?action=viewall');
     }
    }
   } 
    ?>
    
      <div class="container-fluid">
       <!-- Content Header (Page header) -->
        <section class="content-header">
          <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-6">
                <h1><?= $emp_name.' '.$emp_father_name ?></h1>
              </div>
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="<?= FRONT_SITE_PATH ?>">Home</a></li>
                  <li class="breadcrumb-item ">Features</li>
                  <li class="breadcrumb-item active"><?= $page_name ?></li>
                </ol>
              </div>
            </div>
          </div><!-- /.container-fluid -->
        </section>

        <div class="row">
          <!-- left column -->
          <div class="col-sm-12 col-md-12">
            <!-- jquery validation -->
            <div class="card card-primary">
              <!-- /.card-header -->
              <!-- form start -->
              <form id="add_new_employee" method="post" action="" enctype="multipart/form-data" name="add_new_employee">
                <div class="card-body">
                  <div class="card-footer">
                        <button type="submit" name="upload_new_employee" class="btn btn-primary float-right">Upload</button>
                  </div>
                  <div class="form-group">
                    <div class="row">
                      <div class="col-sm-12 col-md-6 mt-2 form-group">
                        <label for="profile_upload">Upload Profile</label>
                        <input type="file" name="profile_upload" class="form-control" id="profile_upload" value="hello" <?php echo $image_status?>>
                        <?php
                        if (isset($_GET['id']) && $_GET['id']>0) {
                          ?>
                           <a href="<?= FRONT_SITE_PATH.'media/employee_profile/'.$emp_profile ?>" target="_blank">
                              <img src="<?= FRONT_SITE_PATH.'media/employee_profile/'.$emp_profile ?>" width="30px">
                             </a>
                          <?php
                        }
                        ?>
                      </div>
                      <div class="col-sm-12 col-md-6 mt-2 form-group">
                        <label for="sign_upload">Upload Signature</label>
                        <input type="file" name="sign_upload" class="form-control" id="sign_upload" <?php echo $image_status?>>
                         <?php
                        if (isset($_GET['id']) && $_GET['id']>0) {
                          ?>
                           <a href="<?= FRONT_SITE_PATH.'media/employee_profile/'.$emp_signature ?>" target="_blank">
                              <img src="<?= FRONT_SITE_PATH.'media/employee_signature/'.$emp_signature ?>" width="30px">
                             </a>
                          <?php
                        }
                        ?>  
                      </div>
                    </div>
                  </div>


                  <div class="row">
                      <div class="col-sm-12 col-md-6 mt-2 form-group">
                        <label for="emp_name">Employee Name</label>
                        <input type="text" name="emp_name" class="form-control" id="emp_name" placeholder="Siraj Khan" value="<?= $emp_name ?>">
                      </div>
                      <div class="col-sm-12 col-md-6 mt-2 form-group">
                        <label for="date_of_birth">Employee DOB</label>
                        <input placeholder="Ex: YYYY/MM/DD" name="date_of_birth" class="form-control left" id="date_of_birth" value="<?= $date_of_birth ?>">
                      </div>
                  </div>   

                   <div class="form-group">
                    <label for="profile_upload">Martial Status</label>
                    <div class="custom-control custom-radio">
                          <input class="custom-control-input custom-control-input-danger custom-control-input-outline" id="married" type="radio" value="married" name="martial_status" <?=$martial_status=="married" ? "checked" : ""?> >
                          <label for="married" class="custom-control-label">Married</label>
                     </div>
                     <div class="custom-control custom-radio">
                          <input class="custom-control-input custom-control-input-danger custom-control-input-outline" id="unmarried" type="radio" <?=$martial_status=="unmarried" ? "checked" : ""?> value="unmarried" name="martial_status"  >
                          <label for="unmarried" class="custom-control-label">UnMarried</label>
                     </div>
                  </div>

                  <div class="form-group">
                    <div class="row">
                      <div class="col-sm-12 col-md-6 mt-2 form-group">
                        <label for="date_of_join">Employee Date Of Joining</label>
                        <input placeholder="Ex: YYYY/MM/DD" name="date_of_join" class="form-control left" id="date_of_join" value="<?= $date_of_join ?>">
                      </div>
                      <div class="col-sm-12 col-md-6 mt-2 form-group">
                        <label for="date_of_leave">Employee Date Of Leaving</label>
                        <input placeholder="Ex: YYYY/MM/DD" name="date_of_leave" class="form-control left" id="date_of_leave" value="<?= $date_of_leave ?>">
                      </div>
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="row">
                      <div class="col-sm-12 col-md-6 mt-2 form-group">
                        <label for="location">Location/Site</label>
                        <input placeholder="Mumbai" name="location" class="form-control left" id="location" value="<?= $location ?>">
                      </div>
                      <div class="col-sm-12 col-md-6 mt-2 form-group">
                        <label for="pf_no_uan_no">PF NO/UAN NO </label>
                        <input placeholder="Ex: MHBAN00000640000000123" name="pf_no_uan_no" class="form-control left" id="pf_no_uan_no" value="<?= $pf_no_uan_no ?>">
                      </div>
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="row">
                      <div class="col-sm-12 col-md-6 mt-2 form-group">
                        <label for="esic_no">Employees' State Insurance Corporation (ESIC) Number</label>
                        <input placeholder="Ex: 31–00–123456–000–0001" name="esic_no" class="form-control left" id="esic_no" value="<?= $esic_no ?>">
                      </div>
                    </div>
                  </div>   
                  

                  <div class="form-group">
                    <div class="row">
                      <div class="col-sm-12 col-md-6 mt-2 form-group">
                        <label for="present_address">Present Address</label>
                        <textarea placeholder="Sayeed Manzil, 'A' Wing, Flat no 501, Kausa, Mumbra, Thane - 400612 " name="present_address" class="form-control left" id="present_address" cols="2" rows="2"><?= $present_address ?></textarea>
                      </div>
                      <div class="col-sm-12 col-md-6 mt-2 form-group">
                        <label for="present_pincode">Present Pincode</label>
                        <input placeholder="Ex: 400612" name="present_pincode" class="form-control left" id="present_pincode" value="<?= $present_pincode ?>">
                      </div>
                    </div>
                  </div>


                  <div class="form-group">
                    <div class="row">
                      <div class="col-sm-12 col-md-6 mt-2 form-group">
                        <label for="permanent_address">Permanent Address</label>
                        <textarea placeholder="Rose Park, 'B' Wing, Flat no 201, Bandra" name="permanent_address" class="form-control left" id="permanent_address" cols="2" rows="2"><?= $permanent_address ?></textarea>
                      </div>
                      <div class="col-sm-12 col-md-6 mt-2 form-group">
                        <label for="permanent_pincode">Permanent Pincode</label>
                        <input placeholder="Ex: 400612" name="permanent_pincode" class="form-control left" id="permanent_pincode" value="<?= $permanent_pincode ?>">
                      </div>
                    </div>
                  </div> 
                  

                  <div class="form-group">
                    <div class="row">
                      <div class="col-sm-12 col-md-6 mt-2 form-group">
                        <label for="mn_no_1">Mobile No 1</label>
                        <input placeholder="Ex: 9167548960" name="mn_no_1" class="form-control left" id="mn_no_1" value="<?= $mn_no_1 ?>">
                      </div>
                      <div class="col-sm-12 col-md-6 mt-2 form-group">
                        <label for="mb_no_2">Mobile No 2</label>
                        <input placeholder="Ex: 7485962312" name="mb_no_2" class="form-control left" id="mb_no_2" value="<?= $mb_no_2 ?>">
                      </div>
                    </div>
                  </div> 

                  <div class="form-group">
                    <div class="row">
                      <div class="col-sm-12 col-md-6 mt-2 form-group">
                        <label for="emp_adhar_no">Adhar Card Number</label>
                        <input placeholder="Ex: 6253 6452 6458 0565" name="emp_adhar_no" class="form-control left" id="emp_adhar_no" value="<?= $emp_adhar_no ?>">
                      </div>
                      <div class="col-sm-12 col-md-6 mt-2 form-group">
                        <label for="emp_election_id_no">Election ID Number</label>
                        <input placeholder="Ex: M2ZX234561" name="emp_election_id_no" class="form-control left" id="emp_election_id_no" value="<?= $emp_election_id_no ?>">
                      </div>
                    </div>
                  </div> 

                  <div class="form-group">
                    <div class="row">
                      <div class="col-sm-12 col-md-6 mt-2 form-group">
                        <label for="emp_passport_no">Passport Number</label>
                        <input placeholder="Ex: JXXXXXXX" name="emp_passport_no" class="form-control left" id="emp_passport_no" value="<?= $emp_passport_no ?>">
                      </div>
                      <div class="col-sm-12 col-md-6 mt-2 form-group">
                        <label for="emp_pan_no">Pan Card Number</label>
                        <input placeholder="Ex: HDIMK23456" name="emp_pan_no" class="form-control left" id="emp_pan_no" value="<?= $emp_pan_no ?>">
                      </div>
                    </div>
                  </div>  

                  <div class="form-group">
                    <div class="row">
                      <div class="col-sm-12 col-md-6 mt-2 form-group">
                        <label for="emp_name_of_bank_account_holder">Bank Account Holder Name</label>
                        <input placeholder="Ex: SIRAJ KHAN ABDUL HAI" name="emp_name_of_bank_account_holder" class="form-control left" id="emp_name_of_bank_account_holder" value="<?= $emp_name_of_bank_account_holder ?>">
                      </div>
                      <div class="col-sm-12 col-md-6 mt-2 form-group">
                        <label for="emp_bank_account_no">Bank Account Number</label>
                        <input placeholder="Ex: 68033422875" name="emp_bank_account_no" class="form-control left" id="emp_bank_account_no" value="<?= $emp_bank_account_no ?>">
                      </div>
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="row">
                      <div class="col-sm-12 col-md-6 mt-2 form-group">
                        <label for="emp_bank_ifsc_code">IFSC Code</label>
                        <input placeholder="Ex: MAHB00001401" name="emp_bank_ifsc_code" class="form-control left" id="emp_bank_ifsc_code" value="<?= $emp_bank_ifsc_code ?>">
                      </div>
                    </div>
                  </div> 

                  <div class="form-group">
                    <div class="row">
                      <div class="col-sm-12 col-md-6 mt-2 form-group">
                        <label for="emp_father_name">Employee Father Name</label>
                        <input placeholder="Ex: ABDUL HAI" name="emp_father_name" class="form-control left" id="emp_father_name" value="<?= $emp_father_name ?>">
                      </div>
                      <div class="col-sm-12 col-md-3 mt-2 form-group">
                        <label for="emp_father_dob">Employee Father DOB</label>
                        <input placeholder="Ex: 1975/12/25" name="emp_father_dob" class="form-control left" id="emp_father_dob" value="<?= $emp_father_dob ?>">
                      </div>
                      <div class="col-sm-12 col-md-3 mt-2 form-group">
                        <label for="emp_father_age">Employee Father Age</label>
                        <input placeholder="Ex: 56" name="emp_father_age" class="form-control left" id="emp_father_age" value="<?= $emp_father_age ?>">
                      </div>
                    </div>
                  </div> 

                  <div class="form-group">
                    <div class="row">
                      <div class="col-sm-12 col-md-6 mt-2 form-group">
                        <label for="emp_mother_name">Employee Mother Name</label>
                        <input placeholder="Ex: ABDUL HAI" name="emp_mother_name" class="form-control left" id="emp_mother_name" value="<?= $emp_mother_name ?>">
                      </div>
                      <div class="col-sm-12 col-md-3 mt-2 form-group">
                        <label for="emp_mother_dob">Employee Mother DOB</label>
                        <input placeholder="Ex: 1975/12/25" name="emp_mother_dob" class="form-control left" id="emp_mother_dob" value="<?= $emp_mother_dob ?>">
                      </div>
                      <div class="col-sm-12 col-md-3 mt-2 form-group">
                        <label for="emp_mother_age">Employee Mother Age</label>
                        <input placeholder="Ex: 56" name="emp_mother_age" class="form-control left" id="emp_mother_age" value="<?= $emp_mother_age ?>">
                      </div>
                    </div>
                  </div>

                  <div class="form-group" >
                    <div class="row">
                      <div class="col-sm-12 col-md-6 mt-2 form-group">
                        <label for="emp_wife_name">Employee Wife Name</label>
                        <input placeholder="Ex: Shaheen" name="emp_wife_name" class="form-control left" id="emp_wife_name" value="<?= $emp_wife_name ?>">
                      </div>
                      <div class="col-sm-12 col-md-3 mt-2 form-group">
                        <label for="emp_wife_dob">Employee Wife DOB</label>
                        <input placeholder="Ex: 1997/12/25" name="emp_wife_dob" class="form-control left" id="emp_wife_dob" value="<?= $emp_wife_dob ?>">
                      </div>
                      <div class="col-sm-12 col-md-3 mt-2 form-group">
                        <label for="emp_wife_age">Employee Wife Age</label>
                        <input placeholder="Ex: 25" name="emp_wife_age" class="form-control left" id="emp_wife_age" value="<?= $emp_wife_age ?>">
                      </div>
                    </div>
                  </div>

                  <?php
                    $employee_child_details=mysqli_query($con,"select * from employee_child_details where employee_id='$id'");
                    $ii=1;
                    while($employee_child_details_row=mysqli_fetch_assoc($employee_child_details)){
                    ?>
                      <div class="form-group">
                        <div class="row">
                           <input type="hidden" name="child_name_id[]" value="<?php echo $employee_child_details_row['id']?>">
                          <div class="col-sm-12 col-md-4 mt-2 form-group">
                            <label for="emp_child_name">Employee Child Name</label>
                            <input placeholder="Ex: Sohail Khan" name="emp_child_name[]" class="form-control left" id="emp_child_name" required value="<?php echo $employee_child_details_row['emp_child_name']?>">
                          </div>
                          <div class="col-sm-12 col-md-3 mt-2 form-group">
                            <label for="emp_child_dob">Employee Child DOB</label>
                            <input placeholder="Ex: 2010/12/25" name="emp_child_dob[]" class="form-control left" id="emp_child_dob" required value="<?php echo $employee_child_details_row['emp_child_dob']?>">
                          </div><div class="col-sm-12 col-md-3 mt-2 form-group">
                            <label for="emp_child_age">Employee Child Age</label>
                            <input placeholder="Ex: 15" name="emp_child_age[]" class="form-control left" id="emp_child_age" required value="<?php echo $employee_child_details_row['emp_child_age']?>">
                          </div>
                          <div class="col-sm-12 col-md-2">
                            <button type="button" class="btn badge-danger float-right" style="margin-top:34px;" onclick="remove_more_new('<?php echo $employee_child_details_row['id']?>')">Remove</button>
                          </div>
                        </div>
                      </div>
                    <?php
                      }
                    ?>
                    <div id="add_new_child_field"></div>
                  <button type="button" class="btn badge-danger mr-2" onclick="add_more()">Add Child</button>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" name="upload_new_employee" class="btn btn-primary float-right">Upload</button>
                </div>
              </form>
            </div>
            <!-- /.card -->
            </div>
          <!--/.col (left) -->
          <!-- right column -->
        </div>
        <!-- /.row -->        
      </div>
            <!-- /.card -->
      <input type="hidden" id="add_more" value="1"/>
    </div>
   <?php
      }elseif (isset($_GET['action2']) && $_GET['action2']!=''  && $_GET['action2']=='view_employee' && isset($_GET['id']) && $_GET['id']>0) {
        $id = get_safe_value($_GET['id']);
        $get_employee_detailsByid = get_employee_detailsByid($id);
        $getChildDetailsByEmpId = getChildDetailsByEmpId($id);
        $totalChildofEmpByid = totalChildofEmpByid($id);
        if ($_GET['id'] != $get_employee_detailsByid['id']) {
          redirect("index");
        }
        ?>
        <style>
          th
          {
            color: #6d706f;
          }
          .card-header h4 {font-weight: 700;color: #1b211f}

          .table-bordered > tbody > tr > td,
          .table-bordered > tbody > tr > th,
          .table-bordered > tfoot > tr > td,
          .table-bordered > tfoot > tr > th,
          .table-bordered > thead > tr > td,
          .table-bordered > thead > tr > th {
              text-transform: capitalize;
          }
        </style>
        <div class="container"  >
          <section class="content-header">
            <div class="card-header">
                            <button type="button" class="btn btn-success float-sm-right btnsk" ><i class="fa fa-print"></i>  Print</button>
            </div>
          </section>
              <div class="row">
                <!-- left column -->
                <div class="col-sm-12 col-md-12">
                  <!-- jquery validation -->
                  <div class="card card-primary" id="printarea">
                      <div class="row">
                        <div class="col-sm-12  col-lg-12" style="display: flex">
                          <div class="card-body box-profile mt-2">
                              <div class="text-center">
                                <a href="<?php echo FRONT_SITE_PATH.'media/employee_profile/'.$get_employee_detailsByid['emp_image'] ?>" target="_blank">
                                  <img class="profile-user-img"
                                     src="<?php echo FRONT_SITE_PATH.'media/employee_profile/'.$get_employee_detailsByid['emp_image'] ?>"
                                     alt="User profile picture" style="height: 180px;width: 150px">
                                   </a>
                                    <h3 class="profile-username text-center">Employee Profiile</h3>
                              </div>
                            </div>

                            <div class="card-body box-profile mt-2">
                              <div class="text-center">
                                <a href="<?php echo FRONT_SITE_PATH.'media/employee_signature/'.$get_employee_detailsByid['emp_sign_upload'] ?>" target="_blank">
                                  <img class="profile-user-img"
                                     src="<?php echo FRONT_SITE_PATH.'media/employee_signature/'.$get_employee_detailsByid['emp_sign_upload'] ?>"
                                     alt="User profile picture" style="height: 180px;width: 150px">
                                </a>
                                    <h3 class="profile-username text-center">Employee Signature</h3>
                              </div>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-12">
                          <div class="card-header bg-danger">
                            <H4 class="text-white">Personal Details</H4>
                          </div>
                          <table class="table table-bordered table-striped text-center" style="width:100%">
                          <thead>
                              <tr>
                                  <th width="50%">Employee Name/DOB</th>
                                  <td width="50%"><?= $get_employee_detailsByid['emp_name'] ?> /  <?= $get_employee_detailsByid['emp_dob'] ?></td>
                              </tr>

                              <tr>
                                  <th>MARTIAL STATUS</th>
                                  <td ><?= $get_employee_detailsByid['emp_martial_status'] ?></td>
                              </tr>
                              <tr>
                                  <th >Date of Joining</th>
                                  <td ><?= $get_employee_detailsByid['emp_date_of_joining'] ?></td>
                              </tr>
                              <tr>
                                  <th >Date of leaving</th>
                                  <td ><?= $get_employee_detailsByid['emp_date_of_leaving'] ?></td>
                              </tr>
                              <tr>
                                  <th >location/site</th>
                                  <td ><?= $get_employee_detailsByid['location_site'] ?></td>
                              </tr>
                              <tr>
                                  <th >present Address</th>
                                  <td ><?= $get_employee_detailsByid['present_address'] ?> - <?= $get_employee_detailsByid['present_pincode'] ?></td>
                              </tr>
                              <tr>
                                  <th >permament address</th>
                                  <td ><?= $get_employee_detailsByid['permanent_address'] ?> - <?= $get_employee_detailsByid['permanent_pincode'] ?></td>
                              </tr>
                              <tr>
                                  <th >Mobile NO 1/mobile no 2</th>
                                  <td ><?= $get_employee_detailsByid['mn_no_1'] ?> / <?= $get_employee_detailsByid['mb_no_2'] ?></td>
                              </tr>
                          </thead>
                           </table> 

                         <div class="card-header bg-success">
                            <H4 class="text-white">Family Details</H4>
                          </div>
                          <table class="table  table-bordered table-striped  text-center" style="width:100%">
                          <thead>
                              <tr>
                                  <th width="50%">Father Name / DOB / Age</th>
                                  <td width="50%"><?= $get_employee_detailsByid['emp_father_name'] ?> / <?= $get_employee_detailsByid['emp_father_dob'] ?> / <?= $get_employee_detailsByid['emp_father_age'].' years ' ?></td>
                              </tr>

                              <!-- Mother -->
                              <tr>
                                  <th >Mother Name / DOB / Age</th>
                                  <td ><?= $get_employee_detailsByid['emp_mother_name'] ?> / <?= $get_employee_detailsByid['emp_mother_dob'] ?> / <?= $get_employee_detailsByid['emp_mother_age'].' years ' ?></td>
                              </tr>

                              <!-- wife -->
                              <tr>
                                  <th >Wife Name / DOB / Age</th>
                                  <td ><?= $get_employee_detailsByid['emp_wife_name'] ?> / <?= $get_employee_detailsByid['emp_wife_dob'] ?> / <?= $get_employee_detailsByid['emp_wife_age'].' years ' ?></td>
                              </tr>
                          </thead>
                           </table> 


                          <div class="card-header bg-primary">
                            <H4 class="text-white"><?= $totalChildofEmpByid; ?> Children</H4>
                          </div>
                          <table class="table  table-bordered table-striped  text-center" style="width:100%">
                          <thead>
                           <?php
                              $i = 0;
                                foreach($getChildDetailsByEmpId as $list){
                                  $i++;
                                  ?>
                                <tr>
                                  <th width="50%">Child Name <?= $i ?> / DOB / Age</th>
                                  <td width="50%"><?= $list['emp_child_name'] ?> / <?= $list['emp_child_dob'] ?> / <?= $list['emp_child_age'].' years ' ?></td>
                              </tr>
                                <?php
                                }
                            ?> 
                           </thead>
                         </table> 
                            
                           <div class="card-header bg-info">
                            <H4 class="text-white">Government ID</H4>
                          </div>
                          <table class="table  table-bordered table-striped  text-center" style="width:100%">
                          <thead>
                              <tr>
                                  <th width="50%">Provident Fund/Universal Account Number</th>
                                  <td width="50%"><?= $get_employee_detailsByid['pf_no_uan_no'] ?></td>
                              </tr>

                              <tr>
                                  <th >Employee State Insurance Corporation</th>
                                  <td ><?= $get_employee_detailsByid['esic_no'] ?></td>
                              </tr>
                              <tr>
                                  <th >Aadhar Number</th>
                                  <td ><?= $get_employee_detailsByid['emp_adhar_no'] ?></td>
                              </tr>
                              <tr>
                                  <th >Election Id No</th>
                                  <td ><?= $get_employee_detailsByid['emp_election_id_no'] ?></td>
                              </tr>
                              <tr>
                                  <th >Passport No</th>
                                  <td ><?= $get_employee_detailsByid['emp_passport_no'] ?></td>
                              </tr>
                              <tr>
                                  <th >Pan Card No</th>
                                  <td ><?= $get_employee_detailsByid['emp_pan_no'] ?></td>
                              </tr>
                                </thead>
                           </table>

                          <div class="card-header bg-danger">
                            <H4 class="text-white">Bank Details</H4>
                          </div>
                          <table class="table  table-bordered table-striped  text-center" style="width:100%">
                          <thead>
                              <tr>
                                  <th width="50%">Bank Account Holder Name</th>
                                  <td width="50%"><?= $get_employee_detailsByid['emp_name_of_bank_account_holder'] ?></td>
                              </tr>
                              <tr>
                                  <th >Bank Account No</th>
                                  <td ><?= $get_employee_detailsByid['emp_bank_account_no'] ?></td>
                              </tr>
                              <tr>
                                  <th >IFSC Code</th>
                                  <td ><?= $get_employee_detailsByid['emp_bank_ifsc_code'] ?></td>
                              </tr>
                          </thead>
                           </table> 

                           <div class="card-footer">
                            <button type="button" class="btn btn-success float-sm-right btnsk" id="btnsk"><i class="fa fa-print"></i>  Print</button>
                          </div>
                        </div>
                      </div>
                  </div>
                </div>  
              </div>
         </div>    
        <?php
      }else
      { redirect(FRONT_SITE_PATH); }
    ?>


    </div>
    <!-- /.content-wrapper -->  
<?php
include 'reuse_files/footer.php';
?>

w<script>
$(document).ready(function() {
    $('#example').DataTable( {
        "fixedHeader": true,
        "responsive": true,
        "autoWidth": true,
    } );

    $(".btnsk").click(function () {
    //Hide all other elements other than printarea.
    $(this).hide();
    $("#btnsk").hide();
    $(".main-footer").hide();
    $("#printarea").show();
    window.print();
    $(this).show();
    $("#btnsk").show();
    $(".main-footer").show();
});
});

  function add_more(){
      var add_more=jQuery('#add_more').val();
      add_more++;
      jQuery('#add_more').val(add_more);
      var html='<div class="form-group" id="box'+add_more+'"><div class="row"><div class="col-sm-12 col-md-4 mt-2 form-group"><label for="emp_child_name">Employee Child Name</label><input placeholder="Ex: Sohail Khan" name="emp_child_name[]" class="form-control left" id="emp_child_name"></div><div class="col-sm-12 col-md-3 mt-2 form-group"><label for="emp_child_dob">Employee Child DOB</label><input placeholder="Ex: 2010/12/25" name="emp_child_dob[]" class="form-control left" id="emp_child_dob"></div><div class="col-sm-12 col-md-3 mt-2 form-group"><label for="emp_child_age">Employee Child Age</label><input placeholder="Ex: 15" name="emp_child_age[]" class="form-control left" id="emp_child_age"></div><div class="col-sm-12 col-md-2"><button type="button" class="btn badge-danger float-right" style="margin-top:34px;" onclick=remove_more("'+add_more+'")>Remove</button></div></div></div>';
      jQuery('#add_new_child_field').append(html);
    }

    function remove_more(id){
      jQuery('#box'+id).remove();
    }

    function remove_more_new(id){
      var result=confirm('Are you sure?');
      if(result==true){
        var cur_path=window.location.href;
        window.location.href=cur_path+"&delete_child="+id;
      }
    }

     function remove_employee(emp_name,id){
      var result=confirm('Do you want to delete '+emp_name+'?');
      if(result==true){
        var cur_path=window.location.href;
        window.location.href=cur_path+"&delete_employee="+id;
      }
    }
</script>
</script>