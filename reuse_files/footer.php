
  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="float-right d-none d-sm-inline">
      Anything you want
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; <?= date('Y') ?> <a href="<?= FRONT_SITE_PATH.'index' ?>"><?= FRONT_SITE_NAME ?></a>.</strong> All rights reserved.
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="<?php echo FRONT_SITE_PATH ?>plugins/jquery/jquery.min.js"></script>
<!-- date-range-picker -->
<script src="<?php echo FRONT_SITE_PATH?>plugins/daterangepicker/daterangepicker.js"></script>
<!-- Bootstrap 4 -->
<script src="<?php echo FRONT_SITE_PATH ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Selector -->
<script src="<?php echo FRONT_SITE_PATH?>plugins/select2/js/select2.full.min.js"></script>

<!-- jquery-validation -->
<script src="<?php echo FRONT_SITE_PATH?>plugins/jquery-validation/jquery.validate.min.js"></script>
<script src="<?php echo FRONT_SITE_PATH?>plugins/jquery-validation/additional-methods.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="<?php echo FRONT_SITE_PATH ?>plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo FRONT_SITE_PATH ?>plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?php echo FRONT_SITE_PATH ?>plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?php echo FRONT_SITE_PATH ?>plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>


<!-- AdminLTE App -->
<script src="<?php echo FRONT_SITE_PATH ?>dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo FRONT_SITE_PATH ?>dist/js/demo.js"></script>
<script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2();


$(function () {
  // $.validator.setDefaults({
  //   submitHandler: function (form) {
  //      $.ajax({
  //         url: "manage_employee.php",
  //          type: "POST",
  //          data: $('#add_new_employee').serialize(),
  //          success: function(data)
  //             {
  //                 console.log(data);
  //               },
                 
  //           }); 
  //         }
  // });

  $('#add_new_employee').validate({
    rules: {
      profile_upload: {
        extension: "png|jpg|jpeg",
      },
      sign_upload: {
        extension: "png|jpg|jpeg"
      },
      emp_name: {
        required: true,
        rangelength: [6, 255]
      },
      date_of_birth: {
        required: true,
        dateISO: true
      },
      martial_status: {
        required: true,
      },
      date_of_join: {
        required: true,
        dateISO: true
      },
      date_of_leave: {
        dateISO: true
      },
      location: {
        required: true,
        rangelength: [3, 50]
      },
      pf_no_uan_no: {
        required: true,
        rangelength: [22, 23]
      },
      esic_no: {
        required: true,
        rangelength: [20, 21]
      },
      present_address: {
        required: true,
        rangelength: [20, 255]
      },
      present_pincode: {
        required: true,
        rangelength: [6,6]
      },
      permanent_address: {
        required: true,
        rangelength: [20, 255]
      },
      permanent_pincode: {
        required: true,
        rangelength: [6,6]
      },
      mn_no_1: {
        required: true,
        phoneUS: true
      },
      mn_no_2: {
        required: true,
        phoneUS: true
      },
      emp_adhar_no: {
        required: true,
        rangelength: [12,12]
      },
      emp_adhar_no: {
        required: true,
        rangelength: [12,12]
      },
      emp_election_id_no:{
        required: true,
        rangelength: [10,10]
      },
      emp_passport_no:{
        required: true,
        rangelength: [7,7]
      },
      emp_pan_no:{
        required: true,
        rangelength: [10,10]
      },
      emp_name_of_bank_account_holder: {
        required: true,
        rangelength: [6,255]
      },
      emp_bank_account_no: {
        required: true,
        rangelength: [9,18]
      },
      emp_bank_ifsc_code: {
        required: true,
        rangelength: [12,12]
      },
      emp_father_name: {
        required: true,
        rangelength: [6,50]
      },
      emp_father_dob: {
        required:true,
        dateISO: true
      },
      emp_father_age: {
        required: true,
        rangelength: [2,2]
      },
      emp_mother_name: {
        required: true,
        rangelength: [6,50]
      },
      emp_mother_dob: {
        required:true,
        dateISO: true
      },
      emp_mother_age: {
        required: true,
        rangelength: [2,2]
      },
      emp_wife_name: {
        required: true,
        rangelength: [6,50]
      },
      emp_wife_dob: {
        required:true,
        dateISO: true
      },
      emp_wife_age: {
        required: true,
        rangelength: [2,2]
      },
      emp_child_name: {
        rangelength: [6,50]
      },
      emp_child_dob: {
        dateISO: true
      },
      emp_child_age: {
        rangelength: [2,2]
      },
    },
    messages: {
      profile_upload: {
        required: "Please upload image",
        extension: "Please Select .png,.jpg,.jpeg only..."
      },
      sign_upload: {
        required: "Please upload Signature Of Employee",
        extension: "Please Select .png,.jpg,.jpeg only..."
      },
      emp_name:{
        rangelength: "Enter minimum 6 letter Long Name."
      },
      location: {
        rangelength: "Enter atleast 3 letter of Your Specifc Location."
      },
      pf_no_uan_no: {
        rangelength: "Enter Correct PF NUMBER OR UAN NUMBER"
      },
      date_of_birth: {
        dateISO: "Enter Correct Date of Birth / For Eg: 1995/12/30 in ISO Format"
      },
      date_of_join: {
        dateISO: "Enter Correct Joining Date / For Eg: 1995/12/30 in ISO Format"
      },
      date_of_leave: {
        dateISO: "Enter Correct Leaving Date / For Eg: 2020/09/20 in ISO Format"
      },
      esic_no: {
        rangelength: "Enter Correct ESIC Number"
      },
      present_address: {
        rangelength: "Enter Your Complete Present Address"
      },
      present_pincode: {
        rangelength: "Enter Your Correct Present Pincode"
      },
      permanent_address: {
        rangelength: "Enter Your Complete Permanent Address"
      },
      permanent_pincode: {
        rangelength: "Enter Your Correct Permanent Pincode"
      },
      emp_adhar_no: {
        rangelength: "Enter Correct Aadhar Card Number"
      },
      emp_election_id_no:{
        rangelength: "Enter Correct Election Id number"
      },
      emp_passport_no: {
        rangelength: "Enter Correct Passport Number"
      },
      emp_pan_no: {
        rangelength: "Enter Correct Pan Card Number"
      },
      emp_name_of_bank_account_holder: {
        rangelength: "Enter Complete Name Specify On Your Passbook"
      },
      emp_bank_account_no: {
        rangelength: "Enter Correct Account Number"
      },
      emp_bank_ifsc_code: {
        rangelength: "Enter Correct IFSC Code"
      },
      emp_father_name: {
        rangelength: "Enter minimum 6 letter Long Name."
      },
      emp_father_dob: {
        dateISO: "Enter Correct Father Date Of Birth / For Eg: 2020/09/20 in ISO Format"
      },
      emp_father_age: {
        rangelength: "Age is invalid!"
      },
      emp_mother_name: {
        rangelength: "Enter minimum 6 letter Long Name."
      },
      emp_mother_dob: {
        dateISO: "Enter Correct Mother Date Of Birth / For Eg: 2020/09/20 in ISO Format"
      },
      emp_mother_age: {
        rangelength: "Age is invalid!"
      },
      emp_wife_name: {
        rangelength: "Enter minimum 6 letter Long Name."
      },
      emp_wife_dob: {
        dateISO: "Enter Correct Wife Date Of Birth / For Eg: 2020/09/20 in ISO Format"
      },
      emp_wife_age: {
        rangelength: "Age is invalid!"
      },
      emp_child_name: {
        rangelength: "Enter minimum 6 letter Long Name."
      },
      emp_child_dob: {
        dateISO: "Enter Correct Child Date Of Birth / For Eg: 2020/09/20 in ISO Format"
      },
      emp_child_age: {
        rangelength: "Age is invalid!"
      },
    },

  
    errorElement: 'span',
    errorPlacement: function (error, element) {
      error.addClass('invalid-feedback');
      element.closest('.form-group').append(error);
    },
    highlight: function (element, errorClass, validClass) {
      $(element).addClass('is-invalid');
    },
    unhighlight: function (element, errorClass, validClass) {
      $(element).removeClass('is-invalid');
    }


  });
});

});

</script>

</body>
</html>
