<?php
  include 'reuse_files/header.php';
  $get_employee_details = get_employee_details();
?>
<!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
 <?php
  if (isset($_GET['action']) && $_GET['action']!=''  && $_GET['action']=='viewall') {
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
               <table id="example" class=" display text-center table table-striped projects" style="width:100%">
              <thead>
                  <tr>
                      <th style="width: 1%" >Employee ID</th>
                      <th style="width: 9%">Profile</th>
                      <th style="width: 10%">Employee Name</th>
                      <th style="width: 15%">Adhar No.</th>
                      <th style="width: 15%">Pan No.</th>
                      <th style="width: 15%">A/c No.</th>
                      <th style="width: 30%"></th>
                  </tr>
              </thead>
              <tbody>
           
           <?php
            foreach ($get_employee_details as $key => $value) {
              ?>
                <tr>
                  <td><?= $value['id'] ?></td>
                  <td>
                    <img src="<?php echo FRONT_SITE_PATH.$admin['picture_link'] ?>"  class="brand-image img-circle elevation-3" style="width:4rem;height:4rem;opacity: .8">
                  </td>
                  <td><?= $value['emp_name'] ?></td>
                  <td><?= $value['emp_adhar_no'] ?></td>
                  <td><?= $value['emp_pan_no'] ?></td>
                  <td><?= $value['emp_bank_account_no'] ?></td>
                   <td class="project-actions">
                          <a class="btn btn-primary btn-sm" href="#">
                              <i class="fas fa-folder">
                              </i>
                              View
                          </a>
                          <a class="btn btn-info btn-sm" href="#">
                              <i class="fas fa-pencil-alt">
                              </i>
                              Edit
                          </a>
                          <a class="btn btn-danger btn-sm" href="#">
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
                <th>Pan No.</th>
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
    ?>

      <div class="container-fluid">
              <!-- form start -->
                <div class="card-body">
                  <div class="form-group row">
                    <label for="Site Title" class="col-sm-2 col-form-label">Site Title</label>
                    <div class="col-5 col-sm-9 col-md-5">
                      <input type="text" class="form-control" id="site_title" placeholder="Site Title" value="<?= $fetch_sitedetails['2']['option_value'] ?>">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-2 col-form-label">Tagline</label>
                    <div class="col-5 col-sm-9 col-md-5">
                      <input type="text" class="form-control" id="tagline" placeholder="Tagline" value="<?= $fetch_sitedetails['7']['option_value'] ?>">
                      <h5 style="font-style: italic;padding: 2px;color: #313131;opacity: .5">In a few words, explain what this site is about. </h5>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="Site Title" class="col-sm-2 col-form-label">Site URL</label>
                    <div class="col-5 col-sm-9 col-md-5">
                      <input type="text" class="form-control" id="site_url" placeholder="https://i2.wp.com/" value="<?= $fetch_sitedetails['0']['option_value'] ?>">
                    </div>
                  </div>
                 
                  <div class="form-group row">
                    <label for="Home Page Url" class="col-sm-2 col-form-label">Home Page Url</label>
                    <div class="col-5 col-sm-9 col-md-5">
                      <input type="text" class="form-control" id="homepage_url" placeholder="https://i2.wp.com/home" value="<?= $fetch_sitedetails['1']['option_value'] ?>">
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="Emailid" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-5 col-sm-9 col-md-5">
                      <input type="email" class="form-control" id="email" placeholder="Email" value="<?= $fetch_sitedetails['5']['option_value'] ?>">
                      <h5 style="font-style: italic;padding: 2px;color: #313131;opacity: .5">This address is used for admin purposes, like new user notifications. </h5>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="customSwitch1" class="col-sm-2 col-form-label">Membership</label>
                    <div class="custom-control custom-switch">
                      <?php
                      if ($fetch_sitedetails['4']['option_value'] == '1') {
                        ?>
                          <input type="checkbox" class="custom-control-input" name='user_can_register' checked >
                        <?php
                      }else ?> <input type="checkbox" class="custom-control-input" id="customSwitch1"> <?php
                      ?>
                      <input type="checkbox" class="custom-control-input" id="customSwitch1">
                      <label class="custom-control-label" for="customSwitch1">Anyone can register</label>
                    </div>
                  </div> 

                 <div class="form-group row">
                     <label for="" class="col-sm-2 col-form-label">Timezone</label>
                    <div class="col-10 col-lg-5">    
                        <select class="form-control select2">
                               <option value="Etc/GMT+12">(GMT-12:00) International Date Line West</option>
                 <option value="Pacific/Midway">(GMT-11:00) Midway Island, Samoa</option>
                 <option value="Pacific/Honolulu">(GMT-10:00) Hawaii</option>
                 <option value="US/Alaska">(GMT-09:00) Alaska</option>
                 <option value="America/Los_Angeles">(GMT-08:00) Pacific Time (US & Canada)</option>
                 <option value="America/Tijuana">(GMT-08:00) Tijuana, Baja California</option>
                 <option value="US/Arizona">(GMT-07:00) Arizona</option>
                 <option value="America/Chihuahua">(GMT-07:00) Chihuahua, La Paz, Mazatlan</option>
                 <option value="US/Mountain">(GMT-07:00) Mountain Time (US & Canada)</option>
                 <option value="America/Managua">(GMT-06:00) Central America</option>
                 <option value="US/Central">(GMT-06:00) Central Time (US & Canada)</option>
                 <option value="America/Mexico_City">(GMT-06:00) Guadalajara, Mexico City, Monterrey</option>
                 <option value="Canada/Saskatchewan">(GMT-06:00) Saskatchewan</option>
                 <option value="America/Bogota">(GMT-05:00) Bogota, Lima, Quito, Rio Branco</option>
                 <option value="US/Eastern">(GMT-05:00) Eastern Time (US & Canada)</option>
                 <option value="US/East-Indiana">(GMT-05:00) Indiana (East)</option>
                 <option value="Canada/Atlantic">(GMT-04:00) Atlantic Time (Canada)</option>
                 <option value="America/Caracas">(GMT-04:00) Caracas, La Paz</option>
                 <option value="America/Manaus">(GMT-04:00) Manaus</option>
                 <option value="America/Santiago">(GMT-04:00) Santiago</option>
                 <option value="Canada/Newfoundland">(GMT-03:30) Newfoundland</option>
                 <option value="America/Sao_Paulo">(GMT-03:00) Brasilia</option>
                 <option value="America/Argentina/Buenos_Aires">(GMT-03:00) Buenos Aires, Georgetown</option>
                 <option value="America/Godthab">(GMT-03:00) Greenland</option>
                 <option value="America/Montevideo">(GMT-03:00) Montevideo</option>
                 <option value="America/Noronha">(GMT-02:00) Mid-Atlantic</option>
                 <option value="Atlantic/Cape_Verde">(GMT-01:00) Cape Verde Is.</option>
                 <option value="Atlantic/Azores">(GMT-01:00) Azores</option>
                 <option value="Africa/Casablanca">(GMT+00:00) Casablanca, Monrovia, Reykjavik</option>
                 <option value="Etc/Greenwich">(GMT+00:00) Greenwich Mean Time : Dublin, Edinburgh, Lisbon, London</option>
                 <option value="Europe/Amsterdam">(GMT+01:00) Amsterdam, Berlin, Bern, Rome, Stockholm, Vienna</option>
                 <option value="Europe/Belgrade">(GMT+01:00) Belgrade, Bratislava, Budapest, Ljubljana, Prague</option>
                 <option value="Europe/Brussels">(GMT+01:00) Brussels, Copenhagen, Madrid, Paris</option>
                 <option value="Europe/Sarajevo">(GMT+01:00) Sarajevo, Skopje, Warsaw, Zagreb</option>
                 <option value="Africa/Lagos">(GMT+01:00) West Central Africa</option>
                 <option value="Asia/Amman">(GMT+02:00) Amman</option>
                 <option value="Europe/Athens">(GMT+02:00) Athens, Bucharest, Istanbul</option>
                 <option value="Asia/Beirut">(GMT+02:00) Beirut</option>
                 <option value="Africa/Cairo">(GMT+02:00) Cairo</option>
                 <option value="Africa/Harare">(GMT+02:00) Harare, Pretoria</option>
                 <option value="Europe/Helsinki">(GMT+02:00) Helsinki, Kyiv, Riga, Sofia, Tallinn, Vilnius</option>
                 <option value="Asia/Jerusalem">(GMT+02:00) Jerusalem</option>
                 <option value="Europe/Minsk">(GMT+02:00) Minsk</option>
                 <option value="Africa/Windhoek">(GMT+02:00) Windhoek</option>
                 <option value="Asia/Kuwait">(GMT+03:00) Kuwait, Riyadh, Baghdad</option>
                 <option value="Europe/Moscow">(GMT+03:00) Moscow, St. Petersburg, Volgograd</option>
                 <option value="Africa/Nairobi">(GMT+03:00) Nairobi</option>
                 <option value="Asia/Tbilisi">(GMT+03:00) Tbilisi</option>
                 <option value="Asia/Tehran">(GMT+03:30) Tehran</option>
                 <option value="Asia/Muscat">(GMT+04:00) Abu Dhabi, Muscat</option>
                 <option value="Asia/Baku">(GMT+04:00) Baku</option>
                 <option value="Asia/Yerevan">(GMT+04:00) Yerevan</option>
                 <option value="Asia/Kabul">(GMT+04:30) Kabul</option>
                 <option value="Asia/Yekaterinburg">(GMT+05:00) Yekaterinburg</option>
                 <option value="Asia/Karachi">(GMT+05:00) Islamabad, Karachi, Tashkent</option>
                 <option value="Asia/Calcutta">(GMT+05:30) Chennai, Kolkata, Mumbai, New Delhi</option>
                 <option value="Asia/Katmandu">(GMT+05:45) Kathmandu</option>
                 <option value="Asia/Almaty">(GMT+06:00) Almaty, Novosibirsk</option>
                 <option value="Asia/Dhaka">(GMT+06:00) Astana, Dhaka</option>
                 <option value="Asia/Rangoon">(GMT+06:30) Yangon (Rangoon)</option>
                 <option value="Asia/Bangkok">(GMT+07:00) Bangkok, Hanoi, Jakarta</option>
                 <option value="Asia/Krasnoyarsk">(GMT+07:00) Krasnoyarsk</option>
                 <option value="Asia/Hong_Kong">(GMT+08:00) Beijing, Chongqing, Hong Kong, Urumqi</option>
                 <option value="Asia/Kuala_Lumpur">(GMT+08:00) Kuala Lumpur, Singapore</option>
                 <option value="Asia/Irkutsk">(GMT+08:00) Irkutsk, Ulaan Bataar</option>
                 <option value="Australia/Perth">(GMT+08:00) Perth</option>
                 <option value="Asia/Taipei">(GMT+08:00) Taipei</option>
                 <option value="Asia/Tokyo">(GMT+09:00) Osaka, Sapporo, Tokyo</option>
                 <option value="Asia/Seoul">(GMT+09:00) Seoul</option>
                 <option value="Asia/Yakutsk">(GMT+09:00) Yakutsk</option>
                 <option value="Australia/Adelaide">(GMT+09:30) Adelaide</option>
                 <option value="Australia/Darwin">(GMT+09:30) Darwin</option>
                 <option value="Australia/Brisbane">(GMT+10:00) Brisbane</option>
                 <option value="Australia/Canberra">(GMT+10:00) Canberra, Melbourne, Sydney</option>
                 <option value="Australia/Hobart">(GMT+10:00) Hobart</option>
                 <option value="Pacific/Guam">(GMT+10:00) Guam, Port Moresby</option>
                 <option value="Asia/Vladivostok">(GMT+10:00) Vladivostok</option>
                 <option value="Asia/Magadan">(GMT+11:00) Magadan, Solomon Is., New Caledonia</option>
                 <option value="Pacific/Auckland">(GMT+12:00) Auckland, Wellington</option>
                 <option value="Pacific/Fiji">(GMT+12:00) Fiji, Kamchatka, Marshall Is.</option>
                 <option value="Pacific/Tongatapu">(GMT+13:00) Nuku'alofa</option>
                        </select>
            <h5 style="font-style: italic;padding: 2px;color: #313131;opacity: .5">Choose a city in the same timezone as you.</h5>                     
                    </div>  

                    <div class="col-sm-12 col-lg-4 pt-2">
                      <span><i>UTC time is   <span class="pt-2" style="background: #e1e1e1;padding: 10px;letter-spacing: 1px"><?= date($fetch_sitedetails['8']['option_value'].' '.$fetch_sitedetails['9']['option_value']); ?></span></i></span>
                    </div>
                  </div> 

                  <div class="form-group row">
                    <label for="radioSuccess1" class="col-sm-2 col-form-label">Date Format</label>
                    <div class="custom-control">
                          <input type="radio" name="r1"  id="radioSuccess1"> <label> &nbsp;&nbsp;<?= date('F d, Y') ?></label> <br>
                          <input type="radio" name="r1"  id="radioSuccess1"> <label> &nbsp;&nbsp;<?= date('Y/m/d')?></label> <br>
                          <input type="radio" name="r1"  id="radioSuccess1"> <label> &nbsp;&nbsp;<?= date('d/m/Y')?></label><br>
                          <input type="radio" name="r1"  id="radioSuccess1"> <label> &nbsp;&nbsp;<?= date('m/d/Y')?></label>
                    </div>
                  </div> 

                 <div class="form-group row">
                    <label for="radioSuccess2" class="col-sm-2 col-form-label">Time Format</label>
                    <div class="custom-control">
                          <input type="radio" name="r1"  id="radioSuccess2"> <label> &nbsp;&nbsp;<?= date('h: i a') ?></label> <br>
                          <input type="radio" name="r1"  id="radioSuccess2"> <label> &nbsp;&nbsp;<?= date('h: i A') ?></label> <br>
                          <input type="radio" name="r1"  id="radioSuccess2"> <label> &nbsp;&nbsp;<?= date('H: i') ?></label><br>
                    </div>
                 </div>  
                 

                  <div class="form-group row">
                     <label for="" class="col-sm-2 col-form-label">Week Starts at</label>
                    <div class="col-12 col-sm-9 col-md-5">    
                        <select class="form-control select2">
                               <option value="Monday">Monday</option>  
                               <option value="Tuesday">Tuesday</option>  
                               <option value="Wednesday">Wednesday</option>  
                               <option value="Thursday">Thursday</option>  
                               <option value="Friday">Friday</option>  
                               <option value="Saturday">Saturday</option>  
                               <option value="Sunday">Sunday</option>  
                        </select>
                    </div>    
                   <div class="col-sm-12 col-lg-4 pt-2">
                      <span><i>Week Start on  <span class="pt-2" style="background: #e1e1e1;padding: 10px;letter-spacing: 1px"><?= $fetch_sitedetails['6']['option_value']; ?></span></i></span>
                    </div> 
                  </div> 
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-info save_edited_setting">Save</button>
                </div>
                <!-- /.card-footer -->
            </div>
            <!-- /.card -->
    <?php
      }else
      { redirect("index"); }
    ?>


    </div>
    <!-- /.content-wrapper -->  
<?php
include 'reuse_files/footer.php';
?>
  <script>
  $(document).ready(function() {
    $('#example').DataTable( {
        fixedHeader: true
    } );
} );
</script>
</script>