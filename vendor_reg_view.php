<?php
        session_start();
        if(isset($_SESSION['lgd_uname'])){
            $lgd_uname=$_SESSION['lgd_uname'];
            $lgd_utype=$_SESSION['utype'];
            $user_id=$_SESSION["user_id"];
            include "Db_conn.php";
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
                                $comp_email=$record1['company_email'];
                                $comp_pan=$record1['company_pan'];
                                $legal_name=$record1['company_legal_name'];
                                $comp_type=$record1['company_type'];
                                $vend_const=$record1['vendor_constitution'];
                                $comp_nature=$record1['company_nature'];
                                $aadhar_no=$record1['aadhar_no'];
                                $affir_act_categ=$record1['affir_act_categ'];
                                $tax_id_no=$record1['tin'];
                                $ann_turnover=$record1['annual_turnover'];
                                $reg_type=$record1['reg_type'];
                                $vend_categ=$record1['vendor_categ'];
                                $msmed_reg=$record1['msmed_name'];
                                $msmed_reg_no=$record1['msmed_reg_no'];
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


<script>

setTimeout(function() {
    let alert = document.querySelector(".alert");
        alert.remove();
}, 8000);

edit_frm1();
function edit_frm() {
document.getElementById("updt_btn_id").removeAttribute('disabled');
document.getElementById("edit_btn_id").disabled = true;
document.getElementById("comp_name_id").removeAttribute('disabled');
document.getElementById("comp_email_id").removeAttribute('disabled');
document.getElementById("comp_pan_id").removeAttribute('disabled');
document.getElementById("legal_name_id").removeAttribute('disabled');
document.getElementById("comp_type_id").removeAttribute('disabled');
document.getElementById("vend_const_id").removeAttribute('disabled');
document.getElementById("comp_nature_id").removeAttribute('disabled');
document.getElementById("aadhar_no_id").removeAttribute('disabled');
document.getElementById('aadhar_no_id').type = 'number';
document.getElementById("affir_act_categ_id").removeAttribute('disabled');
document.getElementById("tin_id").removeAttribute('disabled');
document.getElementById("tin_id").type = 'number';
document.getElementById("ann_turnover_id").removeAttribute('disabled');
document.getElementById("ann_turnover_id").type = 'number';
document.getElementById("reg_type_id").removeAttribute('disabled');
document.getElementById("vend_categ_id").removeAttribute('disabled');
document.getElementById("msmed_reg_id").removeAttribute('disabled');
document.getElementById("msmed_reg_no_id").removeAttribute('disabled');
}
function edit_frm1() {
        var lrgal_name=document.getElementById('legal_name_id').value;
        var aadhar_no=document.getElementById('aadhar_no_id').value;
        var tin=document.getElementById("tin_id").value;
        var ann_turnover=document.getElementById("ann_turnover_id").value;
        var reg_type=document.getElementById("reg_type_id").value;
        var vend_categ=document.getElementById("vend_categ_id").value;

        if(legal_name==""){
            document.getElementById('legal_name_id').value="N/A";
        }
        if(aadhar_no==""){
            document.getElementById('aadhar_no_id').value="N/A";
        }
        if(tin===""){
            document.getElementById("tin_id").value="N/A";
        }
        if(ann_turnover){
            document.getElementById("ann_turnover_id").value="N/A";
        }
        if(reg_type){
            document.getElementById("reg_type_id").value="N/A";
        }
        if(vend_categ==""){
            document.getElementById("vend_categ_id").value="N/A";
        }

}

setTimeout(function() {
    let alert = document.querySelector(".alert");
        alert.remove();
}, 8000);

</script>
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper" >

    <?php include("includes/dashboard_aside_vendor_reg.php"); ?>
            

		<!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column" >

            <!-- Main Content -->
            <div id="content" >
            <?php include("includes/dashboard_navbar1.php"); ?>

                <!-- Begin Page Content -->
                <div class="container" >
                <div class="row">
                        
                    
                        <div class="col">
                            <div class="mb-3">
                            <center>  <button type="submit" class="btn btn-primary" name="submit_btn" id="edit_btn_id" onclick="edit_frm();">Edit Details</button> </center>
                        </div>
                                
                                <form name="vendor_reg_frm" method="POst" action="" onsubmit="return validateForm();" >
                                        <div class="mb-3">
                                            <label for="exampleInputEmail1" class="form-label">Company Name</label>
                                            <input type="text" class="form-control" name="comp_name" id="comp_name_id" value="<?php echo $comp_name; ?>"aria-describedby="emailHelp" disabled required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="exampleInputEmail1" class="form-label">Company contact email</label>
                                            <input type="email" class="form-control" name="comp_email" id="comp_email_id" value="<?php echo $comp_email; ?>" aria-describedby="emailHelp"disabled  required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="exampleInputPassword1" class="form-label">Company PAN</label>
                                            <input type="text" class="form-control" name="comp_pan" id="comp_pan_id" value="<?php echo $comp_pan; ?>" disabled required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="exampleInputPassword1" class="form-label">Legal Name</label>
                                            <input type="text" class="form-control" name="legal_name"  id="legal_name_id"value="<?php echo $legal_name; ?>" disabled>
                                        </div>
                                        <div class="mb-3">
                                            <label for="exampleInputPassword1" class="form-label">Company Type</label>
                                            <input type="text" class="form-control" name="comp_type" id="comp_type_id" value="<?php echo $comp_type; ?>" disabled required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="exampleInputPassword1" class="form-label">Vendor Constitution</label>
                                            <input type="text" class="form-control" name="vend_const" id="vend_const_id" value="<?php echo $vend_const; ?>" disabled required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="exampleInputPassword1" class="form-label">Company Nature</label>
                                            <input type="text" class="form-control" name="comp_nature" id="comp_nature_id" value="<?php echo $comp_nature; ?>" disabled required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="exampleInputPassword1" class="form-label">Aadhar Number</label>
                                            <input type="text" class="form-control" name="aadhar_no" id="aadhar_no_id"value="<?php echo $aadhar_no; ?>" disabled>
                                        </div>
                                        <div class="mb-3">
                                            <label for="exampleInputPassword1" class="form-label">Affirmative Action Category</label>
                                            <input type="text" class="form-control" name="affir_act_categ" id="affir_act_categ_id" value="<?php echo $affir_act_categ; ?>"disabled required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="exampleInputPassword1" class="form-label">Tax Identification Number (TIN) </label>
                                            <input type="text" class="form-control"  name="tax_id_no" id="tin_id" value="<?php echo $tax_id_no; ?>" disabled>
                                        </div>
                                        <div class="mb-3">
                                            <label for="exampleInputPassword1" class="form-label">Annual Turnover (in crores) </label>
                                            <input type="text" class="form-control"  name="ann_turnover" id="ann_turnover_id" value="<?php echo $ann_turnover; ?>" disabled>
                                        </div>
                                        <div class="mb-3">
                                            <label for="exampleInputPassword1" class="form-label">Registration Type (GST) </label>
                                            <input type="text" class="form-control"  name="reg_type" id="reg_type_id" value="<?php echo $reg_type; ?>" disabled>
                                        </div>
                                        <div class="mb-3">
                                            <label for="exampleInputPassword1" class="form-label">Vendor Category</label>
                                            <input type="text" class="form-control"  name="vend_categ" id="vend_categ_id" value="<?php echo $vend_categ; ?>" disabled>
                                        </div>
                                        <div class="mb-3">
                                            <label for="exampleInputPassword1" class="form-label">Are you MSMED registered?</label>
                                            <input type="text" class="form-control" name="msmed_reg" id="msmed_reg_id" value="<?php echo $msmed_reg; ?>" disabled required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="exampleInputPassword1" class="form-label">MSMED registration number</label>
                                            <input type="text" class="form-control" name="msmed_reg_no" id="msmed_reg_no_id" value="<?php echo $msmed_reg_no; ?>" disabled required>
                                        </div>
                                        <br>
                                        <center>  <button type="submit" class="btn btn-primary" name="update_btn" id="updt_btn_id" disabled>Update</button> </center>
                                </form>
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
</body>
</html>

<?php
	if(isset($_POST["update_btn"])){
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
			echo"There is some problem!!!";
			
		}

	}
?>