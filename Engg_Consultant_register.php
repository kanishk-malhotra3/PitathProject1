<?php

session_start();
if($_SESSION['utype']=="Engineering Consultant"){
	if(isset($_SESSION['lgd_uname'])){
		include "Db_conn.php";
		$user_id=$_SESSION["user_id"];
		$unique_id="";
		if(isset($_SESSION['utype'])){
			$utype=$_SESSION['utype'];
			if($utype=="Customer"){
				try {
					$query = $conn->prepare("SELECT * FROM customers WHERE username=:uname");
					$query->bindParam("uname", $_SESSION['lgd_uname'], PDO::PARAM_STR);
					$query->execute();
					$records = $query->fetchAll();
					foreach ($records as $record) {
						echo "hi";
						$unique_id=$record['cust_id'];
						
					}
				}
				catch (PDOException $e) {
					exit($e->getMessage());
				}
			}
			else if($utype=="Engineering Consultant"){
				$utype=$_SESSION['utype'];
				try {
					$query = $conn->prepare("SELECT * FROM engg_consultant WHERE username=:uname");
					$query->bindParam("uname", $_SESSION['lgd_uname'], PDO::PARAM_STR);
					$query->execute();
					$records = $query->fetchAll();
					foreach ($records as $record) {
						$unique_id=$record['engg_id'];
                        $mob_no=$record['mob_no'];
                        $mail_id=$record['email'];

					}
				}
				catch (PDOException $e) {
					exit($e->getMessage());
				}
			}
			else if($utype=="Vendor"){
				$utype=$_SESSION['utype'];
				$comp_name="";
				
				try {
					$query = $conn->prepare("SELECT * FROM vendor WHERE username=:uname");
					$query->bindParam("uname", $_SESSION['lgd_uname'], PDO::PARAM_STR);
					$query->execute();
					$records = $query->fetchAll();
					foreach ($records as $record) {
						$unique_id=$record['vendor_id'];
					}
				}
				catch (PDOException $e) {
					exit($e->getMessage());
				}
	
				try{
					$query1 = $conn->prepare("SELECT * FROM vendor_reg WHERE uid=:userid");
					$query1->bindParam("userid", $user_id, PDO::PARAM_STR);
					$query1->execute();
					$records1 = $query1->fetchAll();
					foreach ($records1 as $record1) {
						$comp_name=$record1['company_name'];
					}
				}catch (PDOException $e) {
					exit($e->getMessage());
				}
				if(is_null($comp_name)){
				   
					$vendor_reg_path="Vendor_reg.php";
				}else{ $vendor_reg_path="vendor_reg_view.php";}
			}
		}
	}
}
else {
    header("Location: index.php");  
    $_SESSION['not_logd_in'] = "You are not logged in!!!...Please Login First!!!";

}
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Dashboard</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
<!-- rating.js file -->
<script src="js/addons/rating.js"></script>

<style>
.upload-img{
  position: relative;
  top: 0;
  left: 0;
  transition:1s;
}
.image1 {
  position: relative;
  top: 0;
  left: 0;
 
}
.fa-camera {
  position: absolute;
  top: 10px;
  left: 140px;
}
.upload-img:hover{
  transform:scale(1.1);
}
#upload_photo_modal{
    transition:1s;

}

.emp-icon{
    transition:1s;

}

.emp-icon:hover{
    transform:scale(1.3);

}

.resume-headline-icon{
    transition:1s;

}
.resume-headline-icon:hover{
    transform:scale(1.3);

}

.edu-icon{
    transition:1s;

}
.edu-icon:hover{
    transform:scale(1.3);

}

.fa-plus{
    transition:1s;

}
.fa-plus:hover{
    transform:scale(1.3);

}
#upload_photo_modal {
	display: 'flex';
	justify-content: 'center';
	align-items: 'center';
}

.personal-details-icon{
    transition:1s;
}

.personal-details-icon:hover{
    transform:scale(1.3);
}

</style>
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

<script>
function modalCenter() {
        $('#upload_photo_modal').css({
            'display': 'flex',
            'justify-content': 'center',
            'align-items': 'center'
        })
    }

function closeModal() {
    $('.modal').modal().hide();
    $('body').removeClass('modal-open');
    $('.modal-backdrop').remove();
    };

// Data Picker Initialization

$( function() {
    $( "#datepicker" ).datepicker();
  } );


  $(document).ready(function() {
    $(".current_org_radio .radio-btn").change(function() {
        // get appropriate level parent and toggle the next one at that level
        // based on the value of the radio
        $(this).closest(".question").next().toggle(this.value === 'yes');
    });
});

function show_present(){
  document.getElementById('past-work-div-id').style.display ='none';
  document.getElementById('present-work-div-id').style.display ='block';
  document.getElementById('curr_sal_label_div_id').style.display="block";
  document.getElementById('curr_sal_lacs_div_id').style.display="block";
  document.getElementById('curr_sal_thousands_div_id').style.display="block";
  document.getElementById('top5_skills_div_id').style.display="block";
  document.getElementById('notice_period_div_id').style.display="block";
}
function show_past(){
  document.getElementById('present-work-div-id').style.display = 'none';
  document.getElementById('past-work-div-id').style.display ='block';
  document.getElementById('curr_sal_label_div_id').style.display="none";
  document.getElementById('curr_sal_lacs_div_id').style.display="none";
  document.getElementById('curr_sal_thousands_div_id').style.display="none";
  document.getElementById('top5_skills_div_id').style.display="none";
  document.getElementById('notice_period_div_id').style.display="none";
} 

</script>
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper" style="text-align: center; align-content: center;">

    <?php include("includes/dashboard_aside_ec_reg.php"); ?>
            

		<!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column" style="text-align: center;   align-content: center;">

            <!-- Main Content -->
            <div id="content" style="text-align: center;   align-content: center;">
            <?php include("includes/dashboard_navbar1.php"); ?>

                <!-- Begin Page Content -->
                <div class="container" style="text-align: center;   align-content: center;">


                    <div class="shadow-sm p-3 mb-5 rounded" style="background-color:rgb(74,144,226); height:auto; color:#ffff; ">
                    
                        <div class="row">
                            <div class="col-12">
                                <a href="#"> <img class="img-fluid" src="images/no_dp.png" alt="" height="80px" width="80px">  </a>                     
                                
                            </div> 
                        </div>

                        <div class="row">
                            <div class="col-12">
                            <center> <button type="submit" class="btn btn-primary" style="width:auto; height:40px; border-radius:25px; "data-toggle="modal" data-target="#upload_photo_modal">UPLOAD PHOTO</button> </center>
   
                            </div> 
                        </div>
                        <div class="row">
                            <div class="col-12" style="font-weight:bold; font-size:20px;">
                           
                            <center> <strong> <?php echo $_SESSION['lgd_uname']; ?> </strong> <a href="#" style="color:#ffffff;font-size:18px;"> <i class="fas fa-pencil-alt"></i> </a> </center>
                            </div> 
                        </div>

                        <div class="row">
                            <div class="col-12" style="font-weight:bold; font-size:20px;">
                            
                            <center> <a href="#" style="color:#ffffff;font-size:18px;"> <i class="fas fa-map-marker-alt"></i></a>  <strong> New Delhi, India </strong> 
                            &nbsp; <a href="#" style="color:#ffffff;font-size:18px;"><i class="fas fa-mobile-alt"></i> </a> <strong> <?php echo $mob_no; ?> </strong> 
                            </center>
                            </div> 
                        </div>
                        <div class="row">
                            <div class="col-12" style="font-weight:bold; font-size:20px;">
                            
                            <center> <a href="#" style="color:#ffffff;font-size:18px;"> <i class="fas fa-briefcase"></i></a>  <strong> Fresher</strong> 
                            &nbsp; <a href="#" style="color:#ffffff;font-size:18px;"><i class="fas fa-envelope"></i> </a> <strong> <?php echo $mail_id; ?> </strong> 
                            </center>
                            </div> 
                        </div>
                       
                        <div class="row">
                            <div class="col-12" style="font-weight:bold; font-size:18px;">
                            <strong> Profile Strength: </strong>
                                <span id="rateMe1"></span>

                            </div>
                        </div>
                    </div>

                    <div class="shadow p-3 mb-5 bg-body rounded" style="height:auto;">

                        <div class="row">
                            <div class="col-12">
                                <h2> <strong> Attach Resume </strong> </h2>
                            </div>
                        </div>

                        <div class="row" style="margin: auto;">
                            <div class="col-12">
                            <br><br>
                                <button type="button" class="btn btn-primary" style=" width:200px; height:55px; "data-toggle="modal" data-target="#upload_resume_Modal"> <strong> UPLOAD RESUME</strong> </button>
                            </div>
                        </div>

                    </div>

                    <div class="shadow p-3 mb-5 bg-body rounded" style="height:auto; ">
                    
                    <div class="row">
                        <div class="col-12">
                            <h2> <strong> Resume Headline <a href="#" style="color:#000000;" data-toggle="modal" data-target="#resume_headline_Modal"> <i class="fas fa-pencil-alt resume-headline-icon"></i> </a>  </strong> </h2>
                        </div>
                    </div>

                </div>

                <div class="shadow p-3 mb-5 bg-body rounded" style="height:auto; ">
                    <div class="row">
                        <div class="col-12">
                            <h2> <strong> Employment <a href="#"  style="color:#000000; " data-toggle="modal" data-target="#emp_modal"> <i class="fas fa-briefcase emp-icon"> </i> </a>  </strong> </h2>
                        </div>
                    </div>

                </div>

                <div class="shadow p-3 mb-5 bg-body rounded" style="height:auto; ">
                    <div class="row">
                        <div class="col-12">
                            <h2> <strong> Education <a href="#"  style="color:#000000; "> <i class="fas fa-university edu-icon" data-toggle="modal" data-target="#edu_details_Modal"></i> </a>  </strong> </h2>
                        </div>
                    </div>

                </div>


                <div class="shadow p-3 mb-5 bg-body rounded" style="height:auto; ">
                    <div class="row">
                        <div class="col-12">
                            <h2> <strong> Personal Details <a href="#" style="color:#000000;"> <i class="fas fa-pencil-alt personal-details-icon" data-toggle="modal" data-target="#personal_details_Modal"></i> </a> </strong> </h2>
                        </div>
                      
                    </div>
                </div>

               

                <!-- Upload Photo Modal -->
                <div class="modal fade" id="upload_photo_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Upload Photo</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"> &times; </button>
                    </div>
                    <div class="modal-body">
                    <button type="button" class="btn btn-primary" style=" width:200px; height:55px; "> <strong> UPLOAD PHOTO</strong> </button>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                    </div>
                </div>
                </div>


                    <!-- Functional Area Modal -->
                    <div class="modal fade" id="upload_resume_Modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Upload Resume/CV</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"> &times; </button>
                            </div>
                            <div class="modal-body">
                            <button type="button" class="btn btn-primary" style=" width:auto; height:55px; "> <strong> UPLOAD RESUME/CV</strong> </button>

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-primary">Save changes</button>
                            </div>
                            </div>
                        </div>
                        </div>


                        
                      <!-- Resume Headline Vertically centered scrollable modal -->
                        <div  id="resume_headline_Modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                            <div class="modal-header">
                                                <h3 class="text-primary" id="exampleModalLabel"> Add Resume Headline</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"> &times; </button>
                                            </div>
                                        <div class="modal-body">

                                            <div class="mb-3">
                                            <label for="exampleFormControlTextarea1" class="form-label"><strong> Resume Headline </strong> </label>
                                            <textarea class="form-control" id="exampleFormControlTextarea1" placeholder="Enter Resume headline  Here" rows="3"></textarea>
                                            </div>

                                    </div>

                                        <div class="modal-footer">
                                        <button type="button" class="btn btn-primary">Save changes</button>
                                        </div>

                                </div>
                            </div>
                        </div>



                    <!-- Resume Headline Vertically centered scrollable modal -->
                    <div  id="emp_modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                        <form action="" method="POST">
                                            <div class="modal-header">
                                                <h3 class="text-primary" id="exampleModalLabel"> Add Employment Details</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"> &times; </button>
                                            </div>
                                        <div class="modal-body">

                                            <div class="mb-3">
                                            <label for="exampleFormControlTextarea1" class="form-label"><strong> Your Designation</strong> </label>
                                            <input type="text" class="form-control" id="exampleFormControlInput1" name="desig-name" placeholder="Type Your Designation Here">
                                            </div>

                                            
                                            <div class="mb-3">
                                            <label for="exampleFormControlTextarea1" class="form-label"><strong> Your Organizationn</strong> </label>
                                            <input type="text" class="form-control" id="exampleFormControlInput1" name="org-name" placeholder="Type Your Orgnization Here">
                                            </div>

                                            <div class="mb-3">
                                            <label for="exampleFormControlTextarea1" class="form-label"><strong> Is this your current company?</strong> </label>
                                            </div>
                                            
                                            <div class="mb-3 current_org_radio">

                                                <div class="form-check form-check-inline current_org_radio">
                                                <input class="form-check-input radio-btn" type="radio" name="curr-org-affir" id="yes_radio_id" value="Yes" onclick="show_present();">
                                                <label class="form-check-label" for="inlineRadio1">Yes</label>
                                                </div>
                                                <div class="form-check form-check-inline current_org_radio">
                                                <input class="form-check-input radio-btn" type="radio" name="current-org-affir" id="No_radio_id" value="No" onclick="show_past();">
                                                <label class="form-check-label" for="inlineRadio2">No</label>
                                                </div>

                                            </div>
                                         
                                            <div class="md-form" >
                                            <label for="date-picker-example"><strong> Started Working From </strong> </label>
                                            <input placeholder="Selected date" name="working-from-date" type="date" id="date-picker" class="form-control datepicker">
                                            </div>

                                            <div class="md-form present-work-div"  id="present-work-div-id" style="display:none;">
                                            <label for="date-picker-example"><strong> Worked TIll </strong> </label>
                                            <input type="text" id="present_work" name="worked-till-date" class="form-control datepicker" value="Present" readonly>
                                            </div>

                                            <div class="md-form past-work-div" id="past-work-div-id" style="display:none;">
                                            <label for="date-picker-example"><strong> Worked TIll </strong> </label>
                                            <input placeholder="Selected date"  name="worked-till-date" type="date" id="past_work" class="form-control datepicker">
                                            </div>

                                            <div class="mb-3" style="display:none;" id="curr_sal_label_div_id">
                                            <label for="exampleFormControlTextarea1"  class="form-label"><strong> Current Salary</strong> </label>
                                            </div>

                                            <div class="row"  id="curr_sal_input_div_id">
                                                <div class="col-6" >
                                                    <div class="mb-3" style="display:none;" id="curr_sal_lacs_div_id">
                                                            <select class="form-select" aria-label="Default select example"  name="curr-sal-lacs" id="usertpe" placeholder="Lacs" >
                                                            <option value="" selected disabled hidden>Lacs</option>
                                                            <option value="0 Lac">0 Lac</option>
                                                            <option value="1 Lac">1 Lac</option>
                                                            <option value="2 Lacs">2 Lacs</option>
                                                            <option value="3 Lacs">3 Lacs</option>
                                                            <option value="4 Lacs">4 Lacs</option>
                                                            <option value="5 Lacs">5 Lacs</option>
                                                            <option value="6 Lacs">6 Lacs</option>
                                                            <option value="7 Lacs">7 Lacs</option>
                                                            <option value="8 Lacs">8 Lacs</option>
                                                            <option value="9 Lacs">9 Lacs</option>
                                                            <option value="10 Lacs">10+ Lacs</option>
                                                            <option value="10 Lacs">15+ Lacs</option>
                                                            <option value="10 Lacs">20+ Lacs</option>
                                                            <option value="10 Lacs">25+ Lacs</option>
                                                            <option value="10 Lacs">30+ Lacs</option>
                                                            </select>                                                                 
                                                     
                                                        </div>    
                                                    </div>

                                                    <div class="col-6">
                                                    <div class="mb-3" style="display:none;" id="curr_sal_thousands_div_id">
                                                            <select class="form-select" aria-label="Default select example"  name="curr-sal-thousands" id="usertpe" placeholder="Thousands" >
                                                            <option value="" selected disabled hidden>Thousands</option>
                                                            <option value="0 Thousand">0 Thousand</option>
                                                            <option value="5 Thousands">5 Thousands</option>
                                                            <option value="10 Thousands">10 Thousands</option>
                                                            <option value="15 Thousands">15 Thousands</option>
                                                            <option value="20 Thousands">20 Thousands</option>
                                                            <option value="25 Thousands">25 Thousands</option>
                                                            <option value="30 Thousands">30 Thousands</option>
                                                            </select>                                                                 
                                                        </div>
                                                    </div>    
                                            </div>

                                            <div class="md-form" style="display:none;" id="top5_skills_div_id">
                                            <label for="date-picker-example"><strong>Top 5 key skills that you think are important for current employment</strong> </label>
                                            <textarea class="form-control" name="top-5-skills" id="exampleFormControlTextarea1" placeholder="Enter your area of expertise/specialization. " rows="3"></textarea>
                                            </div>

                                            <div class="md-form">
                                            <label for="date-picker-example"><strong>Describe Your Job Profile</strong> </label>
                                            <textarea class="form-control" name="job-profile-desc" id="exampleFormControlTextarea1" placeholder="Type Here.. " rows="3"></textarea>
                                            </div>

                                            <div class="md-form" style="display:none;" id="notice_period_div_id">
                                            <label for="date-picker-example"><strong>Notice Period</strong> </label>
                                            <select class="form-select" aria-label="Default select example"  name="notice-period" id="usertpe" placeholder="Lacs" >
                                                            <option value="" selected disabled hidden>Select Notice Period</option>
                                                            <option value="15 Days or less">15 Dyas or less</option>
                                                            <option value="1 Month">1 Month</option>
                                                            <option value="2 Months">2 Months</option>
                                                            <option value="3 Months">3 Months</option>
                                                            <option value="More than 3 Months">More than 3 Months</option>
                                                            <option value="Serving Notice Period">Serving Notice Period</option>
                                                            </select>                                             
                                            </div>

                                    </div>

                                        <div class="modal-footer">
                                        <button type="submit" name="emp_details_btn" class="btn btn-primary">Save changes</button>
                                        </div>    
                                    </form>  
                                </div>
                            </div>
                        </div>



                         <!-- Education Deatils modal -->
                         <div  id="edu_details_Modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                            <div class="modal-header">
                                                <h3 class="text-primary" id="exampleModalLabel">Add Education Details</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"> &times; </button>
                                            </div>
                                        <div class="modal-body">

                                                       <!-- <div class="mb-3"  id="select_edu_div_id" name="select_edu" onchange="edu_change();">
                                                            <select class="form-select" aria-label="Default select example"  name="u_type" id="usertpe" placeholder="Thousands" > 
                                                            <option value="" selected disabled hidden> Select Education </option>-->
                                                           <!-- <option value="Doctorate/PhD">Doctorate/PhD</option> -->
                                                         <!--   <option value="Masters/Post-Graduation">Masters/Post-Graduation</option>
                                                            <option value="Graduation/Diploma">Graduation/Diploma</option>
                                                            <option value="12th" onclick="show_12th();">12th</option>
                                                            <option value="10th" onclick="show_10th();">10th</option>
                                                            </select>                                                                 
                                                        </div>-->

                                                        <div class="mb-3"  id="10th_sc_div_id" >
                                                        <label for="date-picker-example"> <h2> <strong> Xth </strong> </h1> </label>
                                                        </div>

                                                        <div class="mb-3"  id="10th_sc_div_id" >
                                                        <label for="date-picker-example"><strong> School Name </strong> </label>
                                                          <input class="form-control" type="text" name="" placeholder="Enter Your 10th School Name">                                                                
                                                        </div>

                                                        <div class="mb-3"  id="10th_board_div_id">
                                                        <label for="date-picker-example"><strong> Board </strong> </label>
                                                          <input class="form-control" type="text" name="" placeholder="Enter Your 10th Board Name">                                                                
                                                        </div>
                                                        <div class="md-form"  id="10th_passout_year_div_id">
                                                         <label for="date-picker-example"><strong>Passout Year</strong> </label>
                                                            <select class="form-select" aria-label="Default select example"  name="u_type" id="Passout_year_select_id"  >
                                                            <option value="" selected disabled hidden> Select Year </option>
                                                            <option value="1920">1920</option>
                                                            <option value="1921">1921</option>
                                                            <option value="1922">1922</option>
                                                            <option value="1923">1923</option>
                                                            <option value="1924">1924</option>
                                                            <option value="1925">1925</option>
                                                            <option value="1926">1926</option>
                                                            <option value="1927">1927</option>
                                                            <option value="1928">1928</option>
                                                            <option value="1929">1929</option>
                                                            <option value="1930">1930</option>
                                                            <option value="1931">1931</option>
                                                            <option value="1932">1932</option>
                                                            <option value="1933">1933</option>
                                                            <option value="1934">1934</option>
                                                            <option value="1935">1935</option>
                                                            <option value="1936">1936</option>
                                                            <option value="1937">1937</option>
                                                            <option value="1938">1938</option>
                                                            <option value="1939">1939</option>
                                                            <option value="1940">1940</option>
                                                            <option value="1941">1941</option>
                                                            <option value="1942">1942</option>
                                                            <option value="1943">1943</option>
                                                            <option value="1944">1944</option>
                                                            <option value="1945">1945</option>
                                                            <option value="1946">1946</option>
                                                            <option value="1947">1947</option>
                                                            <option value="1948">1948</option>
                                                            <option value="1949">1949</option>
                                                            <option value="1950">1950</option>
                                                            <option value="1951">1951</option>
                                                            <option value="1952">1952</option>
                                                            <option value="1953">1953</option>
                                                            <option value="1954">1954</option>
                                                            <option value="1955">1955</option>
                                                            <option value="1956">1956</option>
                                                            <option value="1957">1957</option>
                                                            <option value="1958">1958</option>
                                                            <option value="1959">1959</option>
                                                            <option value="1960">1960</option>
                                                            <option value="1961">1961</option>
                                                            <option value="1962">1962</option>
                                                            <option value="1963">1963</option>
                                                            <option value="1964">1964</option>
                                                            <option value="1965">1965</option>
                                                            <option value="1966">1966</option>
                                                            <option value="1967">1967</option>
                                                            <option value="1968">1968</option>
                                                            <option value="1969">1969</option>
                                                            <option value="1970">1970</option>
                                                            <option value="1971">1971</option>
                                                            <option value="1972">1972</option>
                                                            <option value="1973">1973</option>
                                                            <option value="1974">1974</option>
                                                            <option value="1975">1975</option>
                                                            <option value="1976">1976</option>
                                                            <option value="1977">1977</option>
                                                            <option value="1978">1978</option>
                                                            <option value="1979">1979</option>
                                                            <option value="1980">1980</option>
                                                            <option value="1981">1981</option>
                                                            <option value="1982">1982</option>
                                                            <option value="1983">1983</option>
                                                            <option value="1984">1984</option>
                                                            <option value="1985">1985</option>
                                                            <option value="1986">1986</option>
                                                            <option value="1987">1987</option>
                                                            <option value="1988">1988</option>
                                                            <option value="1989">1989</option>
                                                            <option value="1990">1990</option>
                                                            <option value="1991">1991</option>
                                                            <option value="1992">1992</option>
                                                            <option value="1993">1993</option>
                                                            <option value="1994">1994</option>
                                                            <option value="1995">1995</option>
                                                            <option value="1996">1996</option>
                                                            <option value="1997">1997</option>
                                                            <option value="1998">1998</option>
                                                            <option value="1999">1999</option>
                                                            <option value="2000">2000</option>
                                                            <option value="2001">2001</option>
                                                            <option value="2002">2002</option>
                                                            <option value="2003">2003</option>
                                                            <option value="2004">2004</option>
                                                            <option value="2005">2005</option>
                                                            <option value="2006">2006</option>
                                                            <option value="2007">2007</option>
                                                            <option value="2008">2008</option>
                                                            <option value="2009">2009</option>
                                                            <option value="2010">2010</option>
                                                            <option value="2011">2011</option>
                                                            <option value="2012">2012</option>
                                                            <option value="2013">2013</option>
                                                            <option value="2014">2014</option>
                                                            <option value="2015">2015</option>
                                                            <option value="2016">2016</option>
                                                            <option value="2017">2017</option>
                                                            <option value="2018">2018</option>
                                                            <option value="2019">2019</option>
                                                            <option value="2020">2020</option>
                                                            <option value="2021">2021</option>
                                                            <option value="2022">2022</option>
                                                            <option value="2023">2023</option>
                                                            <option value="2024">2024</option>
                                                            <option value="2025">2025</option>
                                                            </select>                                             
                                                        </div>

                                                        <div class="md-form"  id="10th_total_percent_div_id">
                                                         <label for="date-picker-example"><strong>Total Percentage</strong> </label>
                                                            <select class="form-select" aria-label="Default select example"  name="u_type" id="total_percent_select_id"  >
                                                            <option value="" selected disabled hidden> Select Total Percentage </option>
                                                            <option value="< 40%"> < 40%</option>
                                                            <option value="1921">40-44.9%</option>
                                                            <option value="45-49.9%">45-49.9%</option>
                                                            <option value="50-54.9%">50-54.9%</option>
                                                            <option value="55-59.9%">55-59.9%</option>
                                                            <option value="60-64.9%">60-64.9%</option>
                                                            <option value="65-69.9%">65-69.9%</option>
                                                            <option value="70-74.9%">70-74.9%</option>
                                                            <option value="75-79.9%">75-79.9%</option>
                                                            <option value="80-84.9%">80-84.9%</option>
                                                            <option value="85-89.9%">85-89.9%</option>
                                                            <option value="90-94.9%">90-94.9%</option>
                                                            <option value="95-99.9%">95-99.9%</option>
                                                            <option value="100%">100%</option>
                                                            </select>                                             
                                                        </div>
                                                        <br>


                                                        <div class="mb-3"  id="10th_sc_div_id" >
                                                        <label for="date-picker-example"> <h2> <strong> XIIth </strong> </h1> </label>
                                                        </div>
                                                        
                                                        <div class="mb-3"  id="12th_sc_div_id">
                                                        <label for="date-picker-example"><strong>School Name</strong> </label>

                                                          <input class="form-control" type="text" name="" placeholder="Enter Your 12th School Name">                                                                
                                                        </div>
                                                        <div class="mb-3"  id="12th_board_div_id">
                                                        <label for="date-picker-example"><strong> Board </strong> </label>
                                                          <input class="form-control" type="text" name="" placeholder="Enter Your 12th Board Name">                                                                
                                                        </div>

                                                        <div class="md-form"  id="12th_passout_year_div_id">
                                                         <label for="date-picker-example"><strong>Passout Year</strong> </label>
                                                            <select class="form-select" aria-label="Default select example"  name="u_type" id="Passout_year_select_id"  >
                                                            <option value="" selected disabled hidden> Select Year </option>
                                                            <option value="1920">1920</option>
                                                            <option value="1921">1921</option>
                                                            <option value="1922">1922</option>
                                                            <option value="1923">1923</option>
                                                            <option value="1924">1924</option>
                                                            <option value="1925">1925</option>
                                                            <option value="1926">1926</option>
                                                            <option value="1927">1927</option>
                                                            <option value="1928">1928</option>
                                                            <option value="1929">1929</option>
                                                            <option value="1930">1930</option>
                                                            <option value="1931">1931</option>
                                                            <option value="1932">1932</option>
                                                            <option value="1933">1933</option>
                                                            <option value="1934">1934</option>
                                                            <option value="1935">1935</option>
                                                            <option value="1936">1936</option>
                                                            <option value="1937">1937</option>
                                                            <option value="1938">1938</option>
                                                            <option value="1939">1939</option>
                                                            <option value="1940">1940</option>
                                                            <option value="1941">1941</option>
                                                            <option value="1942">1942</option>
                                                            <option value="1943">1943</option>
                                                            <option value="1944">1944</option>
                                                            <option value="1945">1945</option>
                                                            <option value="1946">1946</option>
                                                            <option value="1947">1947</option>
                                                            <option value="1948">1948</option>
                                                            <option value="1949">1949</option>
                                                            <option value="1950">1950</option>
                                                            <option value="1951">1951</option>
                                                            <option value="1952">1952</option>
                                                            <option value="1953">1953</option>
                                                            <option value="1954">1954</option>
                                                            <option value="1955">1955</option>
                                                            <option value="1956">1956</option>
                                                            <option value="1957">1957</option>
                                                            <option value="1958">1958</option>
                                                            <option value="1959">1959</option>
                                                            <option value="1960">1960</option>
                                                            <option value="1961">1961</option>
                                                            <option value="1962">1962</option>
                                                            <option value="1963">1963</option>
                                                            <option value="1964">1964</option>
                                                            <option value="1965">1965</option>
                                                            <option value="1966">1966</option>
                                                            <option value="1967">1967</option>
                                                            <option value="1968">1968</option>
                                                            <option value="1969">1969</option>
                                                            <option value="1970">1970</option>
                                                            <option value="1971">1971</option>
                                                            <option value="1972">1972</option>
                                                            <option value="1973">1973</option>
                                                            <option value="1974">1974</option>
                                                            <option value="1975">1975</option>
                                                            <option value="1976">1976</option>
                                                            <option value="1977">1977</option>
                                                            <option value="1978">1978</option>
                                                            <option value="1979">1979</option>
                                                            <option value="1980">1980</option>
                                                            <option value="1981">1981</option>
                                                            <option value="1982">1982</option>
                                                            <option value="1983">1983</option>
                                                            <option value="1984">1984</option>
                                                            <option value="1985">1985</option>
                                                            <option value="1986">1986</option>
                                                            <option value="1987">1987</option>
                                                            <option value="1988">1988</option>
                                                            <option value="1989">1989</option>
                                                            <option value="1990">1990</option>
                                                            <option value="1991">1991</option>
                                                            <option value="1992">1992</option>
                                                            <option value="1993">1993</option>
                                                            <option value="1994">1994</option>
                                                            <option value="1995">1995</option>
                                                            <option value="1996">1996</option>
                                                            <option value="1997">1997</option>
                                                            <option value="1998">1998</option>
                                                            <option value="1999">1999</option>
                                                            <option value="2000">2000</option>
                                                            <option value="2001">2001</option>
                                                            <option value="2002">2002</option>
                                                            <option value="2003">2003</option>
                                                            <option value="2004">2004</option>
                                                            <option value="2005">2005</option>
                                                            <option value="2006">2006</option>
                                                            <option value="2007">2007</option>
                                                            <option value="2008">2008</option>
                                                            <option value="2009">2009</option>
                                                            <option value="2010">2010</option>
                                                            <option value="2011">2011</option>
                                                            <option value="2012">2012</option>
                                                            <option value="2013">2013</option>
                                                            <option value="2014">2014</option>
                                                            <option value="2015">2015</option>
                                                            <option value="2016">2016</option>
                                                            <option value="2017">2017</option>
                                                            <option value="2018">2018</option>
                                                            <option value="2019">2019</option>
                                                            <option value="2020">2020</option>
                                                            <option value="2021">2021</option>
                                                            <option value="2022">2022</option>
                                                            <option value="2023">2023</option>
                                                            <option value="2024">2024</option>
                                                            <option value="2025">2025</option>
                                                            </select>                                             
                                                        </div>

                                                        <div class="md-form"  id="12th_total_percent_div_id">
                                                         <label for="date-picker-example"><strong>Total Percentage</strong> </label>
                                                            <select class="form-select" aria-label="Default select example"  name="u_type" id="total_percent_select_id"  >
                                                            <option value="" selected disabled hidden> Select Total Percentage </option>
                                                            <option value="< 40%"> < 40%</option>
                                                            <option value="1921">40-44.9%</option>
                                                            <option value="45-49.9%">45-49.9%</option>
                                                            <option value="50-54.9%">50-54.9%</option>
                                                            <option value="55-59.9%">55-59.9%</option>
                                                            <option value="60-64.9%">60-64.9%</option>
                                                            <option value="65-69.9%">65-69.9%</option>
                                                            <option value="70-74.9%">70-74.9%</option>
                                                            <option value="75-79.9%">75-79.9%</option>
                                                            <option value="80-84.9%">80-84.9%</option>
                                                            <option value="85-89.9%">85-89.9%</option>
                                                            <option value="90-94.9%">90-94.9%</option>
                                                            <option value="95-99.9%">95-99.9%</option>
                                                            <option value="100%">100%</option>
                                                            </select>                                             
                                                        </div>
                                                        <br>



                                                        <div class="mb-3"  id="10th_sc_div_id" >
                                                        <label for="date-picker-example"> <h2> <strong> Graduation/Diploma  </strong> </h1> </label>
                                                        </div>

                                                        
                                                        <div class="mb-3"  id="grad_univ_div_id" >
                                                        <label for="date-picker-example"><strong> University/College Name </strong> </label>
                                                          <input class="form-control" type="text" name="" placeholder="Enter Your University/College Name">                                                                
                                                        </div>
                                                        
                                                        <div class="md-form"  id="grad_course_div_id" >
                                                         <label for="date-picker-example"><strong>Course</strong> </label>
                                                            <select class="form-select" aria-label="Default select example"  name="u_type" id="total_percent_select_id"  >
                                                            <option value="" selected disabled hidden> Select Course </option>
                                                            <option value="B.Tech/B.E">B.Tech/B.E</option>
                                                            <option value="B.Sc">B.Sc</option>
                                                            <option value="Diploma">Diploma</option>
                                                            <option value="Others">Other</option>
                                                            </select>                                             
                                                        </div>

                                                        
                                                        <div class="mb-3" id="grad_c_type_label_div_id" >
                                                        <label for="exampleFormControlTextarea1" class="form-label"><strong> Course Type</strong> </label>
                                                        </div>

                                                        <div class="mb-3 grad_course_type_radio" id="grad_c_type_id" >
                                                            <div class="form-check form-check-inline current_org_radio">
                                                            <input class="form-check-input radio-btn" type="radio" name="inlineRadioOptions" id="Full_time_radio_id" value="Full Time" >
                                                            <label class="form-check-label" for="inlineRadio1">Full Time</label>
                                                            </div>
                                                            <div class="form-check form-check-inline current_org_radio" >
                                                            <input class="form-check-input radio-btn" type="radio" name="inlineRadioOptions" id="Part_time_radio_id" value="Part Time" >
                                                            <label class="form-check-label" for="inlineRadio2">Part Time</label>
                                                            </div>
                                                            <div class="form-check form-check-inline current_org_radio">
                                                            <input class="form-check-input radio-btn" type="radio" name="inlineRadioOptions" id="dist_learn_radio_id" value="Distance Learning" >
                                                            <label class="form-check-label" for="inlineRadio2">Distance Learning</label>
                                                            </div>

                                                        </div>

                                                        <div class="md-form"  id="grad_passout_year_div_id">
                                                         <label for="date-picker-example"><strong>Passout Year</strong> </label>
                                                            <select class="form-select" aria-label="Default select example"  name="u_type" id="Passout_year_select_id"  >
                                                                <option value="" selected disabled hidden> Select Year </option>
                                                                <option value="1920">1920</option>
                                                                <option value="1921">1921</option>
                                                                <option value="1922">1922</option>
                                                                <option value="1923">1923</option>
                                                                <option value="1924">1924</option>
                                                                <option value="1925">1925</option>
                                                                <option value="1926">1926</option>
                                                                <option value="1927">1927</option>
                                                                <option value="1928">1928</option>
                                                                <option value="1929">1929</option>
                                                                <option value="1930">1930</option>
                                                                <option value="1931">1931</option>
                                                                <option value="1932">1932</option>
                                                                <option value="1933">1933</option>
                                                                <option value="1934">1934</option>
                                                                <option value="1935">1935</option>
                                                                <option value="1936">1936</option>
                                                                <option value="1937">1937</option>
                                                                <option value="1938">1938</option>
                                                                <option value="1939">1939</option>
                                                                <option value="1940">1940</option>
                                                                <option value="1941">1941</option>
                                                                <option value="1942">1942</option>
                                                                <option value="1943">1943</option>
                                                                <option value="1944">1944</option>
                                                                <option value="1945">1945</option>
                                                                <option value="1946">1946</option>
                                                                <option value="1947">1947</option>
                                                                <option value="1948">1948</option>
                                                                <option value="1949">1949</option>
                                                                <option value="1950">1950</option>
                                                                <option value="1951">1951</option>
                                                                <option value="1952">1952</option>
                                                                <option value="1953">1953</option>
                                                                <option value="1954">1954</option>
                                                                <option value="1955">1955</option>
                                                                <option value="1956">1956</option>
                                                                <option value="1957">1957</option>
                                                                <option value="1958">1958</option>
                                                                <option value="1959">1959</option>
                                                                <option value="1960">1960</option>
                                                                <option value="1961">1961</option>
                                                                <option value="1962">1962</option>
                                                                <option value="1963">1963</option>
                                                                <option value="1964">1964</option>
                                                                <option value="1965">1965</option>
                                                                <option value="1966">1966</option>
                                                                <option value="1967">1967</option>
                                                                <option value="1968">1968</option>
                                                                <option value="1969">1969</option>
                                                                <option value="1970">1970</option>
                                                                <option value="1971">1971</option>
                                                                <option value="1972">1972</option>
                                                                <option value="1973">1973</option>
                                                                <option value="1974">1974</option>
                                                                <option value="1975">1975</option>
                                                                <option value="1976">1976</option>
                                                                <option value="1977">1977</option>
                                                                <option value="1978">1978</option>
                                                                <option value="1979">1979</option>
                                                                <option value="1980">1980</option>
                                                                <option value="1981">1981</option>
                                                                <option value="1982">1982</option>
                                                                <option value="1983">1983</option>
                                                                <option value="1984">1984</option>
                                                                <option value="1985">1985</option>
                                                                <option value="1986">1986</option>
                                                                <option value="1987">1987</option>
                                                                <option value="1988">1988</option>
                                                                <option value="1989">1989</option>
                                                                <option value="1990">1990</option>
                                                                <option value="1991">1991</option>
                                                                <option value="1992">1992</option>
                                                                <option value="1993">1993</option>
                                                                <option value="1994">1994</option>
                                                                <option value="1995">1995</option>
                                                                <option value="1996">1996</option>
                                                                <option value="1997">1997</option>
                                                                <option value="1998">1998</option>
                                                                <option value="1999">1999</option>
                                                                <option value="2000">2000</option>
                                                                <option value="2001">2001</option>
                                                                <option value="2002">2002</option>
                                                                <option value="2003">2003</option>
                                                                <option value="2004">2004</option>
                                                                <option value="2005">2005</option>
                                                                <option value="2006">2006</option>
                                                                <option value="2007">2007</option>
                                                                <option value="2008">2008</option>
                                                                <option value="2009">2009</option>
                                                                <option value="2010">2010</option>
                                                                <option value="2011">2011</option>
                                                                <option value="2012">2012</option>
                                                                <option value="2013">2013</option>
                                                                <option value="2014">2014</option>
                                                                <option value="2015">2015</option>
                                                                <option value="2016">2016</option>
                                                                <option value="2017">2017</option>
                                                                <option value="2018">2018</option>
                                                                <option value="2019">2019</option>
                                                                <option value="2020">2020</option>
                                                                <option value="2021">2021</option>
                                                                <option value="2022">2022</option>
                                                                <option value="2023">2023</option>
                                                                <option value="2024">2024</option>
                                                                <option value="2025">2025</option>
                                                            </select>                                             
                                                        </div>

                                                        <div class="md-form"  id="grad_total_percent_div_id">
                                                         <label for="date-picker-example"><strong>Total Percentage</strong> </label>
                                                            <select class="form-select" aria-label="Default select example"  name="u_type" id="total_percent_select_id"  >
                                                                <option value="" selected disabled hidden> Select Total Percentage </option>
                                                                <option value="< 40%"> < 40%</option>
                                                                <option value="1921">40-44.9%</option>
                                                                <option value="45-49.9%">45-49.9%</option>
                                                                <option value="50-54.9%">50-54.9%</option>
                                                                <option value="55-59.9%">55-59.9%</option>
                                                                <option value="60-64.9%">60-64.9%</option>
                                                                <option value="65-69.9%">65-69.9%</option>
                                                                <option value="70-74.9%">70-74.9%</option>
                                                                <option value="75-79.9%">75-79.9%</option>
                                                                <option value="80-84.9%">80-84.9%</option>
                                                                <option value="85-89.9%">85-89.9%</option>
                                                                <option value="90-94.9%">90-94.9%</option>
                                                                <option value="95-99.9%">95-99.9%</option>
                                                                <option value="100%">100%</option>
                                                            </select>                                             
                                                        </div>
                                                        <br>
                                                        
                                                        <div class="mb-3"  id="10th_sc_div_id" >
                                                        <label for="date-picker-example"> <h2> <strong> Masters/Post-Graduation  </strong> </h1> </label>
                                                        </div>


                                                        <div class="mb-3"  id="masters_univ_div_id" >
                                                        <label for="date-picker-example"><strong> University/College Name </strong> </label>
                                                          <input class="form-control" type="text" name="" placeholder="Enter Your University/College Name">                                                                
                                                        </div>
                                                       
                                                        <div class="md-form"  id="post_grad_course_div_id" >
                                                         <label for="date-picker-example"><strong>Course</strong> </label>
                                                            <select class="form-select" aria-label="Default select example"  name="u_type" id="total_percent_select_id"  >
                                                                <option value="" selected disabled hidden> Select Course </option>
                                                                <option value="MS/M.Sc(Science)">MS/M.Sc(Science)</option>
                                                                <option value="M.Tech/M.E">M.Tech/M.E</option>
                                                                <option value="Diploma">MBA/PGDM</option>
                                                                <option value="PG Diploma">PG Diploma</option>
                                                                <option value="Other">Other</option>
                                                            </select>                                             
                                                        </div>

                                                        
                                                        <div class="mb-3" id="post_grad_c_type_label_div_id" >
                                                        <label for="exampleFormControlTextarea1" class="form-label"><strong> Course Type</strong> </label>
                                                        </div>

                                                        <div class="mb-3 grad_course_type_radio" id="post_grad_c_type_id" >
                                                            <div class="form-check form-check-inline current_org_radio">
                                                            <input class="form-check-input radio-btn" type="radio" name="inlineRadioOptions" id="Full_time_radio_id" value="Full Time" >
                                                            <label class="form-check-label" for="inlineRadio1">Full Time</label>
                                                            </div>
                                                            <div class="form-check form-check-inline current_org_radio" >
                                                            <input class="form-check-input radio-btn" type="radio" name="inlineRadioOptions" id="Part_time_radio_id" value="Part Time" >
                                                            <label class="form-check-label" for="inlineRadio2">Part Time</label>
                                                            </div>
                                                            <div class="form-check form-check-inline current_org_radio">
                                                            <input class="form-check-input radio-btn" type="radio" name="inlineRadioOptions" id="dist_learn_radio_id" value="Distance Learning" >
                                                            <label class="form-check-label" for="inlineRadio2">Distance Learning</label>
                                                            </div>

                                                        </div>







                                                        <div class="md-form"  id="Post_grad_passout_year_div_id">
                                                         <label for="date-picker-example"><strong>Passout Year</strong> </label>
                                                            <select class="form-select" aria-label="Default select example"  name="u_type" id="Passout_year_select_id"  >
                                                                <option value="" selected disabled hidden> Select Year </option>
                                                                <option value="1920">1920</option>
                                                                <option value="1921">1921</option>
                                                                <option value="1922">1922</option>
                                                                <option value="1923">1923</option>
                                                                <option value="1924">1924</option>
                                                                <option value="1925">1925</option>
                                                                <option value="1926">1926</option>
                                                                <option value="1927">1927</option>
                                                                <option value="1928">1928</option>
                                                                <option value="1929">1929</option>
                                                                <option value="1930">1930</option>
                                                                <option value="1931">1931</option>
                                                                <option value="1932">1932</option>
                                                                <option value="1933">1933</option>
                                                                <option value="1934">1934</option>
                                                                <option value="1935">1935</option>
                                                                <option value="1936">1936</option>
                                                                <option value="1937">1937</option>
                                                                <option value="1938">1938</option>
                                                                <option value="1939">1939</option>
                                                                <option value="1940">1940</option>
                                                                <option value="1941">1941</option>
                                                                <option value="1942">1942</option>
                                                                <option value="1943">1943</option>
                                                                <option value="1944">1944</option>
                                                                <option value="1945">1945</option>
                                                                <option value="1946">1946</option>
                                                                <option value="1947">1947</option>
                                                                <option value="1948">1948</option>
                                                                <option value="1949">1949</option>
                                                                <option value="1950">1950</option>
                                                                <option value="1951">1951</option>
                                                                <option value="1952">1952</option>
                                                                <option value="1953">1953</option>
                                                                <option value="1954">1954</option>
                                                                <option value="1955">1955</option>
                                                                <option value="1956">1956</option>
                                                                <option value="1957">1957</option>
                                                                <option value="1958">1958</option>
                                                                <option value="1959">1959</option>
                                                                <option value="1960">1960</option>
                                                                <option value="1961">1961</option>
                                                                <option value="1962">1962</option>
                                                                <option value="1963">1963</option>
                                                                <option value="1964">1964</option>
                                                                <option value="1965">1965</option>
                                                                <option value="1966">1966</option>
                                                                <option value="1967">1967</option>
                                                                <option value="1968">1968</option>
                                                                <option value="1969">1969</option>
                                                                <option value="1970">1970</option>
                                                                <option value="1971">1971</option>
                                                                <option value="1972">1972</option>
                                                                <option value="1973">1973</option>
                                                                <option value="1974">1974</option>
                                                                <option value="1975">1975</option>
                                                                <option value="1976">1976</option>
                                                                <option value="1977">1977</option>
                                                                <option value="1978">1978</option>
                                                                <option value="1979">1979</option>
                                                                <option value="1980">1980</option>
                                                                <option value="1981">1981</option>
                                                                <option value="1982">1982</option>
                                                                <option value="1983">1983</option>
                                                                <option value="1984">1984</option>
                                                                <option value="1985">1985</option>
                                                                <option value="1986">1986</option>
                                                                <option value="1987">1987</option>
                                                                <option value="1988">1988</option>
                                                                <option value="1989">1989</option>
                                                                <option value="1990">1990</option>
                                                                <option value="1991">1991</option>
                                                                <option value="1992">1992</option>
                                                                <option value="1993">1993</option>
                                                                <option value="1994">1994</option>
                                                                <option value="1995">1995</option>
                                                                <option value="1996">1996</option>
                                                                <option value="1997">1997</option>
                                                                <option value="1998">1998</option>
                                                                <option value="1999">1999</option>
                                                                <option value="2000">2000</option>
                                                                <option value="2001">2001</option>
                                                                <option value="2002">2002</option>
                                                                <option value="2003">2003</option>
                                                                <option value="2004">2004</option>
                                                                <option value="2005">2005</option>
                                                                <option value="2006">2006</option>
                                                                <option value="2007">2007</option>
                                                                <option value="2008">2008</option>
                                                                <option value="2009">2009</option>
                                                                <option value="2010">2010</option>
                                                                <option value="2011">2011</option>
                                                                <option value="2012">2012</option>
                                                                <option value="2013">2013</option>
                                                                <option value="2014">2014</option>
                                                                <option value="2015">2015</option>
                                                                <option value="2016">2016</option>
                                                                <option value="2017">2017</option>
                                                                <option value="2018">2018</option>
                                                                <option value="2019">2019</option>
                                                                <option value="2020">2020</option>
                                                                <option value="2021">2021</option>
                                                                <option value="2022">2022</option>
                                                                <option value="2023">2023</option>
                                                                <option value="2024">2024</option>
                                                                <option value="2025">2025</option>
                                                            </select>                                             
                                                        </div>

                                                        <div class="md-form"  id="post_grad_total_percent_div_id">
                                                         <label for="date-picker-example"><strong>Total Percentage</strong> </label>
                                                            <select class="form-select" aria-label="Default select example"  name="u_type" id="total_percent_select_id"  >
                                                                <option value="" selected disabled hidden> Select Total Percentage </option>
                                                                <option value="< 40%"> < 40%</option>
                                                                <option value="1921">40-44.9%</option>
                                                                <option value="45-49.9%">45-49.9%</option>
                                                                <option value="50-54.9%">50-54.9%</option>
                                                                <option value="55-59.9%">55-59.9%</option>
                                                                <option value="60-64.9%">60-64.9%</option>
                                                                <option value="65-69.9%">65-69.9%</option>
                                                                <option value="70-74.9%">70-74.9%</option>
                                                                <option value="75-79.9%">75-79.9%</option>
                                                                <option value="80-84.9%">80-84.9%</option>
                                                                <option value="85-89.9%">85-89.9%</option>
                                                                <option value="90-94.9%">90-94.9%</option>
                                                                <option value="95-99.9%">95-99.9%</option>
                                                                <option value="100%">100%</option>
                                                            </select>                                             
                                                        </div>                        
                                        </div>

                                        <div class="modal-footer">
                                        <button type="button" class="btn btn-primary">Save changes</button>
                                        </div>

                                </div>
                            </div>
                        </div>


                        <!-- Personal Details modal -->
                        <div  id="personal_details_Modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                            <div class="modal-header">
                                                <h3 class="text-primary" id="exampleModalLabel"> Add Personal Details</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"> &times; </button>
                                            </div>
                                        <div class="modal-body">
                                            <div class="mb-3"  id="name_div_id" >
                                                    <label for="date-picker-example"><strong> Name </strong> </label>
                                                    <input class="form-control" type="text" name="" placeholder="Enter Your Name">                                                                
                                            </div>
                                            <div class="mb-3"  id="name_div_id" >
                                                    <label for="date-picker-example"><strong> Age </strong> </label>
                                                    <input class="form-control" type="number" name="" placeholder="Enter Your Age">                                                                
                                            </div>

                                            <div class="md-form past-work-div" id="dob-div-id">
                                                <label for="date-picker-example"><strong> D.O.B </strong> </label>
                                                <!--<input placeholder="Selected date" type="date" id="dob_id" class="form-control datepicker"> -->
                                                <input type="text" id="datepicker">

                                            </div>
                                             <br>   
                                            
                                            <div class="mb-3" id="gender_label_div_id" >
                                                <label for="exampleFormControlTextarea1" class="form-label"><strong>Gender</strong> </label>
                                            </div>

                                            <div class="mb-3 grad_course_type_radio" id="gender_div_id" >

                                                            <div class="form-check form-check-inline current_org_radio">
                                                            <input class="form-check-input radio-btn" type="radio" name="inlineRadioOptions" id="Full_time_radio_id" value="Full Time" >
                                                            <label class="form-check-label" for="inlineRadio1">Male</label>
                                                            </div>
                                                            <div class="form-check form-check-inline current_org_radio" >
                                                            <input class="form-check-input radio-btn" type="radio" name="inlineRadioOptions" id="Part_time_radio_id" value="Part Time" >
                                                            <label class="form-check-label" for="inlineRadio2">Female</label>
                                                            </div>
                                                            <div class="form-check form-check-inline current_org_radio">
                                                            <input class="form-check-input radio-btn" type="radio" name="inlineRadioOptions" id="dist_learn_radio_id" value="Distance Learning" >
                                                            <label class="form-check-label" for="inlineRadio2">Transgender</label>
                                                            </div>

                                            </div>

                                            <div class="mb-3"  id="permanent_addr_div_id" >
                                                    <label for="date-picker-example"><strong>Permanent Address</strong> </label>
                                                    <input class="form-control" type="text" name="" placeholder="Enter Your Permanent Address">                                                                
                                            </div>

                                            <div class="mb-3"  id="home_town_div_id" >
                                                    <label for="date-picker-example"><strong> Home Town </strong> </label>
                                                    <input class="form-control" type="text" name="" placeholder="Enter Your Home Town">                                                                
                                            </div>

                                            <div class="mb-3"  id="pin_code_div_id" >
                                                    <label for="date-picker-example"><strong> Pin Code </strong> </label>
                                                    <input class="form-control" type="number" name="" placeholder="Enter Your Pin Code">                                                                
                                            </div>

                                            <div class="md-form"  id="marital_status_div_id" >
                                                         <label for="date-picker-example"><strong>Marital Status</strong> </label>
                                                            <select class="form-select" aria-label="Default select example"  name="u_type" id="marital_status_select_id"  >
                                                                <option value="" selected disabled hidden> Select Marital Status </option>
                                                                <option value="Single/Unmarried">Single/Unmarried</option>
                                                                <option value="Divorced">Divorced</option>
                                                                <option value="Seperated">Seperated</option>
                                                                <option value="Other">Other</option>
                                                            </select>                                             
                                            </div>

                                            <div class="md-form"  id="marital_status_div_id" >
                                                         <label for="date-picker-example"><strong>Category</strong> </label>
                                                            <select class="form-select" aria-label="Default select example"  name="u_type" id="marital_status_select_id"  >
                                                                <option value="" selected disabled hidden> Select Category </option>
                                                                <option value="Single/Unmarried">General</option>
                                                                <option value="Divorced">SC</option>
                                                                <option value="Seperated">ST</option>
                                                                <option value="Other">OBC-Creamy</option>
                                                                <option value="Other">OBC-Non-Creamy</option>
                                                            </select>                                             
                                            </div>


                                    </div>

                                        <div class="modal-footer">
                                        <button type="button" class="btn btn-primary">Save changes</button>
                                        </div>

                                </div>
                            </div>
                        </div>






                    
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <?php include("includes/dashboard_footer.php"); ?>

            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->
	
   <!-- Bootstrap core JavaScript-->
   <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>  
    <script>

            $(document).ready(function () {
            $("#dob_id").datepicker({ dateFormat: "yyyy/MM/dd" });
            });

 </script>
</body>
</html>
<?php
	if(isset($_POST['submit_btn'])){
		//getting uid from session
		$user_id=$_SESSION["user_id"];

		//collecting all input values
		$comp_name=$_POST["comp_name"];
		$comp_email=$_POST["comp_email"];
		$comp_pan=$_POST["comp_pan"];
		$legal_name=$_POST["legal_name"];
		$comp_type=$_POST["comp_type"];
		$vend_const=$_POST["vend_const"];
		$comp_nature=$_POST["comp_nature"];
		$aadhar_no=$_POST["aadhar_no"];
		$affir_act_categ=$_POST["affir_act_categ"];
		$tax_id_no=$_POST["tax_id_no"];
		$ann_turnover=$_POST["ann_turnover"];
		$reg_type=$_POST["reg_type"];
		$vend_categ=$_POST["vend_categ"];
		$msmed_reg=$_POST["msmed_reg"];
		$msmed_reg_no=$_POST["msmed_reg_no"];

		$update_q_status="false";

		if(empty($legal_name)){
			$legal_name="N/A";
		}
		
		if(empty($vend_categ)){
			$vend_categ="N/A";
		}
		
		if(empty($reg_type)){
			$reg_type="N/A";
		}
        if(empty($aadhar_no)){
            $aadhar_no="N/A";
        }
        if(empty($tax_id_no)){
            $tax_id_no="N/A";
        }
        if(empty($ann_turnover)){
            $ann_turnover="N/A";
        }
        if(empty($vend_categ)){
            $vend_categ="N/A";
        }
      
	


		try{
			$update_q = $conn->prepare("UPDATE vendor_reg SET company_name=:comp_name, company_email=:comp_email, company_pan=:comp_pan, company_legal_name=:legal_name, company_type=:comp_type, vendor_constitution=:vend_const, company_nature=:comp_nature, aadhar_no=:aadhar_no, affir_act_categ=:affir_act_categ, tin=:tax_id_no, annual_turnover=:ann_turnover, reg_type=:reg_type, vendor_categ=:vend_categ, msmed_name=:msmed_reg, msmed_reg_no=:msmed_reg_no WHERE uid=:userid");
            $update_q->bindParam("comp_name", $comp_name, PDO::PARAM_STR);
			$update_q->bindParam("comp_email", $comp_email, PDO::PARAM_STR);
			$update_q->bindParam("comp_pan", $comp_pan, PDO::PARAM_STR);
			$update_q->bindParam("legal_name", $legal_name, PDO::PARAM_STR);
			$update_q->bindParam("comp_type", $comp_type, PDO::PARAM_STR);
			$update_q->bindParam("vend_const", $vend_const, PDO::PARAM_STR);
			$update_q->bindParam("comp_nature", $comp_nature, PDO::PARAM_STR);
			$update_q->bindParam("aadhar_no", $aadhar_no, PDO::PARAM_STR);
			$update_q->bindParam("affir_act_categ", $affir_act_categ, PDO::PARAM_STR);
			$update_q->bindParam("tax_id_no", $tax_id_no, PDO::PARAM_STR);
			$update_q->bindParam("ann_turnover", $ann_turnover, PDO::PARAM_STR);
			$update_q->bindParam("reg_type", $reg_type, PDO::PARAM_STR);
			$update_q->bindParam("vend_categ", $vend_categ, PDO::PARAM_STR);
			$update_q->bindParam("msmed_reg", $msmed_reg, PDO::PARAM_STR);
			$update_q->bindParam("msmed_reg_no", $msmed_reg_no, PDO::PARAM_STR);
			$update_q->bindParam("userid", $user_id, PDO::PARAM_STR);
			$update_q->execute();
			$update_q_status="true";
		}
		catch (PDOException $e) {
			exit($e->getMessage());
		}
		
		if($update_q_status=="true"){

			$_SESSION['rcd_updt_succ'] = "Record Updated Sucessfully!!!!";
			echo '<meta http-equiv="refresh" content="1; URL=vendor_reg_view.php" />';
		}else{
			
			$_SESSION['recd_update_fail']="Record not updated!!!";
            echo '<meta http-equiv="refresh" content="1; URL=vendor_reg.php" />'; 
			
		}

	}

    if(isset($_POST['emp_details_btn'])){
	//getting uid from session
    $user_id=$_SESSION["user_id"];

    //collecting all input values
    $desig_name=$_POST['desig-name'];
    $org_name=$_POST['org-name'];
    $curr_org=$_POST['curr-org-affir'];
    $working_from=date('Y-m-d',strtotime($_POST['working-from-date']));
    //$worked_till=$_POST['worked-till-date'];
    $curr_sal_lacs=$_POST['curr-sal-lacs'];
    $curr_sal_thousands=$_POST['curr-sal-thousands'];
    $top_5_skill=$_POST['top-5-skills'];
    $job_profile_desc=$_POST['job-profile-desc'];
    $notice_period=$_POST['notice-period'];
    $worked_till_present=NULL; 
    
    if($_POST['curr-org-affir']=="Yes"){
        $worked_till_present="Present"; 
        $worked_till=NULL;

    }
    else{
        $worked_till=date('Y-m-d',strtotime($_POST['working-from-date']));
    }
    
    // if($worked_till=="Present"){
    //     echo "<script> console.log(".$worked_till.")</script> ";
    //     $worked_till_present="Present";
    //     $worked_till="";
    // }
    // else{
    //     echo "<script> console.log(".$worked_till.")</script> ";
    //     $worked_till=date('Y-m-d',strtotime($worked_till));
    // }

	try{
        $update_q = $conn->prepare("UPDATE ec_emp_details SET designation=:desig_name, organization=:org_name, current_company=:curr_org, working_from=:working_from, worked_till=:worked_till, current_sal_lacs=:curr_sal_lacs, current_sal_thousands=:curr_sal_thousands, top_5_skills=:top_5_skills, job_profile=:job_profile_desc, notice_period=:notice_period, worked_till_present=:worked_till_present WHERE uid=:userid");
        $update_q->bindParam("desig_name", $desig_name, PDO::PARAM_STR);
        $update_q->bindParam("org_name", $org_name, PDO::PARAM_STR);
        $update_q->bindParam("curr_org", $curr_org, PDO::PARAM_STR);
        $update_q->bindParam("working_from", $working_from, PDO::PARAM_STR);
        $update_q->bindParam("worked_till", $worked_till, PDO::PARAM_STR);
        $update_q->bindParam("curr_sal_lacs", $curr_sal_lacs, PDO::PARAM_STR);
        $update_q->bindParam("curr_sal_thousands", $curr_sal_thousands, PDO::PARAM_STR);
        $update_q->bindParam("top_5_skills", $top_5_skills, PDO::PARAM_STR);
        $update_q->bindParam("job_profile_desc", $job_profile_desc, PDO::PARAM_STR);
        $update_q->bindParam("notice_period", $notice_period, PDO::PARAM_STR);
        $update_q->bindParam("worked_till_present", $worked_till_present, PDO::PARAM_STR);
        $update_q->bindParam("userid", $user_id, PDO::PARAM_STR);

        $update_q->execute();
        $update_q_status="true";
    }
    catch (PDOException $e) {
        exit($e->getMessage());
    }
    if($update_q_status=="true"){

        $_SESSION['rcd_updt_succ'] = "Record Updated Sucessfully!!!!";
        echo '<meta http-equiv="refresh" content="1; URL=Engg_Consultant_register.php" />';
    }else{
        
        $_SESSION['recd_update_fail']="Record not updated!!!";
        echo '<meta http-equiv="refresh" content="1; URL=Engg_Consultant_register.php" />'; 
        
    }
    

}
?>