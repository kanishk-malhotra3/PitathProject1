<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page </title>

    <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Anton&display=swap" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- CSS only -->
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
<style>
#footer{
  position: relative;
    bottom: 0;
    left: 0;
    right: 0;
    margin-top:50px;
    background: #111;
}
    </style>
    
    <script type="text/javascript">

      function validateForm() {
      // SELECTING ALL TEXT ELEMENTS
      var username = document.forms['reg_frm']['uname'].value;
      var email = document.forms['reg_frm']['uemail'].value;
      var password = document.forms['reg_frm']['upass'].value;
      var password_confirm = document.forms['reg_frm']['ucpass'].value;
      var user_type = document.forms['reg_frm']['u_type'].value;
      var mob_no = document.forms['reg_frm']['umobno'].value;
      
      if (password!=password_confirm) 
        {
            alert("Password and confirm password are not matching!!!");
            document.reg_frm.upass.focus() ;
            document.reg_frm.ucpass.focus() ;
            return false;
        }
        if ( mob_no.length!=10) {
            alert("Please enter a valid mobile number!!!");
            document.reg_frm.umobno.focus() ;
            return false;
        }
    
   /*   if( username== "" ) {
            alert( "Username Required!" );
            document.reg_frm.uname.focus() ;
            var unameid = document.getElementById('username');
            var unamemsg = document.getElementById('username_err');
            var goodColor = "#0C6";
            var borderColor = "3px solid red";
            var badColor="red";
            unameid.style.border = borderColor;
            unamemsg.style.color = badColor;
            unamemsg.innerHTML = "Please enter username!";
            
            return false;
          }
      if (email=="") {
            alert("Email Required!");
            document.reg_frm.uemail.focus() ;
            var uemailid = document.getElementById('email');
            var uemailmsg = document.getElementById('email_err');
            var goodColor = "#0C6";
            var borderColor = "3px solid red";
            var badColor="red";
            uemailid.style.border = borderColor;
            uemailmsg.style.color = badColor;
            uemailmsg.innerHTML = "Please enter email!";
            return false;
        }
      if (password=="") {
            alert("Password Required!");
            document.reg_frm.upass.focus() ;
            var upassid = document.getElementById('passwd');
            var upassmsg = document.getElementById('passwd_err');
            var goodColor = "#0C6";
            var borderColor = "3px solid red";
            var badColor="red";
            upassid.style.border = borderColor;
            upassmsg.style.color = badColor;
            upassmsg.innerHTML = "Please enter password!"
            return false;
        }
      if (password_confirm=="") {
            alert("Confirm Password Required!");
            document.reg_frm.ucpass.focus() ;
            var ucpassid = document.getElementById('cnfpasswd');
            var ucpassmsg = document.getElementById('cnfpasswd_err');
            var goodColor = "#0C6";
            var borderColor = "3px solid red";
            var badColor="red";
            ucpassid.style.border = borderColor;
            ucpassmsg.style.color = badColor;
            ucpassmsg.innerHTML = "Please enter confirm password!"
            return false;
        }
      if (user_type=="choose_one") {
            alert("User Type Required!");
            document.reg_frm.u_type.focus() ;
            var utypeid = document.getElementById('usertype');
            var utypemsg = document.getElementById('usertype_err');
            var goodColor = "#0C6";
            var borderColor = "3px solid red";
            var badColor="red";
            utypeid.style.border = borderColor;
            utypemsg.style.color = badColor;
            utypemsg.innerHTML = "Please select a user type!"
            return false;
        }
      if (mob_no==""|| mob_no.length!=10) {
            alert("Please enter a valid mobile number!!!");
            document.reg_frm.umobno.focus() ;
            var umobid = document.getElementById('mobile');
            var umobmsg = document.getElementById('mobile_err');
            var goodColor = "#0C6";
            var borderColor = "3px solid red";
            var badColor="red";
            umobid.style.border = borderColor;
            umobmsg.style.color = badColor;
            umobmsg.innerHTML = "Please enter mobile number!";
            return false;
        }
      if (password!=password_confirm) 
        {
            alert("Password are not matching!");
            document.reg_frm.upass.focus() ;
            document.reg_frm.ucpass.focus() ;
            var upassid = document.getElementById('passwd');
            var upassmsg = document.getElementById('passwd_err');
            var ucpassid = document.getElementById('cnfpasswd');
            var ucpassmsg = document.getElementById('cnfpasswd_err');
            var goodColor = "#0C6";
            var borderColor = "3px solid red";
            var badColor="red";
            unameid.style.border = borderColor;
            unamemsg.style.color = badColor;
            unamemsg.innerHTML = "Password and confirm password not matching!";
            return false;
        }
      validateEmail(email);
      validateMobile(mob_no);


  }

  function ValidateEmail(mail) 
  {
    if (/^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/.test(email))
    {
        return (true);
    }
    else{
      alert("You have entered an invalid email address!");
      document.reg_frm.uemail.focus() ;
      return (false);
    }
  }

  function validateMobile(mob_no)
  {
      alert("Inside validateMobile function");
      var mobile = document.getElementById('mobile');
      var message = document.getElementById('mobile_err');
      var goodColor = "#0C6";
      var borderColor = "3px solid red";
      var badColor="red";
    
      if(mob_no.toString().length!=10){
          alert("required 10 digits, match requested format!");
          document.reg_frm.uemail.focus() ;     
          mobile.style.border = borderColor;
          message.style.color = badColor;
          message.innerHTML = "required 10 digits, match requested format!"
      }*/
    }
    $(function(){
    $("input[name=umobno]")[0].oninvalid = function () {
        this.setCustomValidity("Enter a valid mobile number!!!");
    };
});
  </script>
</head>
<body style="background-color:rgb(240,242,245);">
<div class="container-fluid" id='mainBody'>
     <div class="row">
        <div class="col"> <strong> <h1  style="color:rgb(24,119,242); margin-top:150px; margin-left:100px; font-family: 'Anton', sans-serif; font-size:5em;">Pitath Electrics</h1> </strong> 
        
                <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
          <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
          </div>
          <div class="carousel-inner">
            <div class="carousel-item active">
              <img src="images/img1.jpg" class="d-block w-100" alt="Image 1" width="640px" height="360px">
              <div class="carousel-caption d-none d-md-block">
                <h5>First slide label</h5>
                <p>Some representative placeholder content for the first slide.</p>
              </div>
            </div>
            <div class="carousel-item">
              <img src="images/img2.jpg" class="d-block w-100" alt="Image 2" width="640px" height="360px">
              <div class="carousel-caption d-none d-md-block">
                <h5>Second slide label</h5>
                <p>Some representative placeholder content for the second slide.</p>
              </div>
            </div>
            <div class="carousel-item">
              <img src="images/img3.jpg" class="d-block w-100" alt="Image 3" width="640px" height="360px">
              <div class="carousel-caption d-none d-md-block">
                <h5>Third slide label</h5>
                <p>Some representative placeholder content for the third slide.</p>
              </div>
            </div>
          </div>
          <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"  data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
          </button>
          <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"  data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
          </button>
        </div>
          <h2>Welcome to Pithath Electrics</h2>
          <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eveniet et consectetur sed ex saepe? Dolorum similique molestiae consequatur eius aut 
          perferendis aperiam! Assumenda obcaecati quos atque explicabo neque cumque, nemo sequi quasi 
          totam eveniet magni aliquid recusandae id soluta facere, necessitatibus iure in, voluptas exercitationem. 
          Suscipit voluptatibus officiis placeat quam.</p>
          <h2>Welcome to Pithath Electrics</h2>
          <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eveniet et consectetur sed ex saepe? Dolorum similique molestiae consequatur eius aut 
          perferendis aperiam! Assumenda obcaecati quos atque explicabo neque cumque, nemo sequi quasi 
          totam eveniet magni aliquid recusandae id soluta facere, necessitatibus iure in, voluptas exercitationem. 
          Suscipit voluptatibus officiis placeat quam.</p>
        </div>
        <div class="col"> 

          <div class="container" style="background-color:rgb(255,255,255); margin-top:200px; height:640px; border-radius:20px; width:400px;">
              <strong>  <h1 style="color:rgb(24,119,242); margin-top:210px; margin-left:100px; font-family: 'Anton', sans-serif;;">Register</h1> </strong>
              <form action="" onsubmit="return validateForm();" name="reg_frm" method="POST">
                  <div class="mb-3">
                      <input type="text" class="form-control" id="formGroupExampleInput" name="uname" id="username" placeholder="Enter your username" style="width:360px; height:56px;" required>
                      <div id="username_err"></div>
                    </div>
                    <div class="mb-3">
                      <input type="email" class="form-control" id="formGroupExampleInput" name="uemail" id="email" placeholder="Enter your Email Id" style="width:360px; height:56px;" required >
                      <div id="email_err"></div>
                    </div>
                    <div class="mb-3">
                      <input type="password" class="form-control" id="formGroupExampleInput2" name="upass" id="passwd" placeholder="Enter your password" style="width:360px; height:56px;" required>
                      <div id="passwd_err"></div>
                    </div>
                    <div class="mb-3">
                      <input type="password" class="form-control" id="formGroupExampleInput2" name="ucpass" id="cnfpasswd" placeholder="Confirm your password" style="width:360px; height:56px;" required>
                      <div id="cnfpasswd_err"></div>
                    </div>
                    <div class="mb-3">
                          <select class="form-select" aria-label="Default select example" style="width:360px; height:56px;" name="u_type" id="usertpe" required>
                          <option value="">Select User Type</option>
                          <option value="customer">Customer</option>
                          <option value="engg_consultant">Engineering Consultant</option>
                          <option value="vendor">Vendor</option>
                        </select>         
                        <div id="usertype_err"></div>
                    </div>
                    <div class="mb-3">
                      <input type="number" class="form-control" id="formGroupExampleInput" id="mobile" pattern="[0-9]{10}" oninvalid="setCustomValidity('Please enter a valid mobile number!!! ')"
                      onchange="try{setCustomValidity('')}catch(e){}" name="umobno" placeholder="Enter your mobile number" style="width:360px; height:56px;" required>
                      <div id="mobile_err"> </div>
                    </div>
                    <center> <button type="submit" class="btn btn-primary" name="reg_btn" style="width:360px; height:45px; border-radius:25px; font-size:24px; font-family: 'Anton', sans-serif;;">Register</button> </center> 
                </form>
                <center> <hr style="height:1px; width:280px;"> </center>
                <center> <button type="submit" onclick="location.href = 'index.php';" class="btn btn-primary" style="width:200px; height:43px; border-radius:25px; font-size:24px;  font-family: 'Anton', sans-serif;;">Log In</button> </center>

          </div>
        </div>
      </div> 

      <!--Footer-->
        <div class="row" id="footer" style="color:#ffffff;">
        <div class="col">
            <center> <h2>Pitath Electrics</h2> </center>
          <center> <p>All Rights Reserved.copyright &copy;2021 Patiath Electrics.</p> </center>
        </div>
        </div>   
</div>

</body>
</html>

<?php
include "Db_conn.php";
include "mail_function.php";
if (isset($_POST["reg_btn"]))
{
  //Collecting all the values
    $data=$_POST;
    $uname=$data['uname'];
    $uemail=$data['uemail'];
    $upass=$data['upass'];
    $utype=$data['u_type'];
    $umobno=$data['umobno'];
    $token=bin2hex(random_bytes(15));
    $status='inactive';

    try {
      $sql = $conn->prepare("SELECT uid from customers where username=:uname OR email=:uemail");
      $sql->bindParam("uname", $uname, PDO::PARAM_STR);
      $sql->bindParam("uemail", $uemail, PDO::PARAM_STR);
      $sql->execute();
        if ($sql->rowCount() > 0){  ?>
                <script>
                  alert("User already exists!!!");
                  document.reg_frm.uname.focus() ;
                </script>
        <?php }
        else{
                try{
                  $sql = $conn->prepare("SELECT uid from engg_consultant where username=:uname OR email=:uemail");
                  $sql->bindParam("uname", $uname, PDO::PARAM_STR);
                  $sql->bindParam("uemail", $uemail, PDO::PARAM_STR);
                  $sql->execute();
                    if ($sql->rowCount() > 0){  ?>
                            <script>
                              alert("User already exists!!!");
                              document.reg_frm.uname.focus() ;
                            </script>
                    <?php }
                    else{
                      try{
                        $sql = $conn->prepare("SELECT uid from vendor where username=:uname OR email=:uemail");
                        $sql->bindParam("uname", $uname, PDO::PARAM_STR);
                        $sql->bindParam("uemail", $uemail, PDO::PARAM_STR);
                        $sql->execute();
                          if ($sql->rowCount() > 0){  ?>
                                  <script>
                                    alert("User already exists!!!");
                                    document.reg_frm.uname.focus() ;
                                  </script>
                          <?php }

                          else{
                                //User Type Checking Codes

                                    if($utype=="customer"){

                                          //$unique_id="C".date("Ymd").(int)microtime(true);
                                          //Initialize counter 

                                          /*$i=0;
                                          try {
                                            $query = $conn->prepare("SELECT * from customers");
                                            $query->execute();
                                            $records = $query->fetchAll();
                                            foreach ($records as $record) {
                                                $i+=1;
                                            }
                                            $unique_id="C".date("Y").$i;
                                          }
                                          catch (PDOException $e) {
                                            exit($e->getMessage());
                                        }*/
                                          $i=0;
                                          try {
                                            $query = $conn->prepare("SELECT * from customers");
                                            $query->execute();
                                            $records = $query->fetchAll();
                                            foreach ($records as $record) {
                                                $i+=1;
                                            }
                                                if($i==0){
                                                $unique_id="C".date("Y").$i;
                                                }
                                                else{
                                                  $last_unique_id="";
                                                  try{
                                                    $query1= $conn->prepare("SELECT * FROM customers ORDER BY uid DESC LIMIT 1");
                                                    $query1->execute();
                                                    $records = $query1->fetchAll();
                                                            foreach ($records as $record) {
                                                              $last_unique_id=$record['cust_id'];
                                                          }

                                                      }catch (PDOException $e) {
                                                      exit($e->getMessage());
                                                      }
                                                      $last_int=(int)substr($last_unique_id, -1);
                                                      $new_last_int=$last_int+1;
                                                      $unique_id="C".date("Y").$new_last_int;
                                                }
                                          }
                                          catch (PDOException $e) {
                                            exit($e->getMessage());
                                        }

                                          $res='false';
                                          try {
                                              $query = $conn->prepare("INSERT INTO customers(username, passwd,email,mob_no,cust_id,token,status) VALUES (:uname,:upass,:uemail,:umobno,:unique_id,:token,:status)");
                                              $query->bindParam("uname", $uname, PDO::PARAM_STR);
                                              $query->bindParam("uemail", $uemail, PDO::PARAM_STR);
                                              $enc_password = hash('sha256', $upass);
                                              $query->bindParam("upass", $enc_password, PDO::PARAM_STR);
                                              $query->bindParam("umobno", $umobno, PDO::PARAM_STR);
                                              $query->bindParam("unique_id", $unique_id, PDO::PARAM_STR);
                                              $query->bindParam("token", $token, PDO::PARAM_STR);
                                              $query->bindParam("status", $status, PDO::PARAM_STR);
                                              $query->execute();
                                              $last_id = $conn->lastInsertId();
                                              $res='true';
                                          } catch (PDOException $e) {
                                              exit($e->getMessage());
                                              }
                                          if($res=='true'){
                                            $sub="Email Account Activation";
                                            $msg="Hi, $uname. Click here to activate your account http://localhost:8080/PitathProject1/email_activation.php?token=$token ";
                                            $mail_status=send_activation($uemail,$token,$uname,$msg,$sub);
                                            if($mail_status==1){
                                              $_SESSION['reg_msg'] = "You have been registered successfully!!!....Please check your mail now to activate your account $uemail";
                                              $_SESSION['reg_msg1'] = "For activation";
                                              echo '<meta http-equiv="refresh" content="1; URL=index.php" />';
                                            }
                                            else{
                                              echo"Email not Exists!!!";
                                            }
                                        }

                                  }//eof if customer

  
                                    else if($utype=="engg_consultant"){
                                            /*$i=0;
                                            try {
                                              $query = $conn->prepare("SELECT * from engg_consultant");
                                              $query->execute();
                                              $records = $query->fetchAll();
                                              foreach ($records as $record) {
                                                  $i+=1;
                                              }
                                              $unique_id="EC".date("Y").$i;
                                            }
                                            catch (PDOException $e) {
                                              exit($e->getMessage());
                                          }*/
                                          $i=0;
                                          try {
                                            $query = $conn->prepare("SELECT * from engg_consultant");
                                            $query->execute();
                                            $records = $query->fetchAll();
                                            foreach ($records as $record) {
                                                $i+=1;
                                            }
                                                if($i==0){
                                                $unique_id="EC".date("Y").$i;
                                                }
                                                else{
                                                  $last_unique_id="";
                                                  try{
                                                    $query1= $conn->prepare("SELECT * FROM engg_consultant ORDER BY uid DESC LIMIT 1");
                                                    $query1->execute();
                                                    $records = $query1->fetchAll();
                                                            foreach ($records as $record) {
                                                              $last_unique_id=$record['engg_id'];
                                                          }

                                                      }catch (PDOException $e) {
                                                      exit($e->getMessage());
                                                      }
                                                      $last_int=(int)substr($last_unique_id, -1);
                                                      $new_last_int=$last_int+1;
                                                      $unique_id="EC".date("Y").$new_last_int;
                                                }
                                          }
                                          catch (PDOException $e) {
                                            exit($e->getMessage());
                                        }
                                        
                                          $res='false';
                                          try {
                                            $query = $conn->prepare("INSERT INTO engg_consultant(username, passwd,email,mob_no,engg_id,token,status) VALUES (:uname,:upass,:uemail,:umobno,:unique_id,:token,:status)");
                                            $query->bindParam("uname", $uname, PDO::PARAM_STR);
                                              $query->bindParam("uemail", $uemail, PDO::PARAM_STR);
                                              $enc_password = hash('sha256', $upass);
                                              $query->bindParam("upass", $enc_password, PDO::PARAM_STR);
                                              $query->bindParam("umobno", $umobno, PDO::PARAM_STR);
                                              $query->bindParam("unique_id", $unique_id, PDO::PARAM_STR);
                                              $query->bindParam("token", $token, PDO::PARAM_STR);
                                              $query->bindParam("status", $status, PDO::PARAM_STR);
                                              $query->execute();
                                              $last_id = $conn->lastInsertId();
                                              $res='true';
                                          } catch (PDOException $e) {
                                              exit($e->getMessage());
                                          }
                              
                                          if($res=='true'){

                                            try{
                                              $query3 = $conn->prepare("INSERT INTO ec_edu_details(uid) Values(:userid)");
                                              $query3->bindParam("userid", $last_id, PDO::PARAM_STR);
                                              $query3->execute();
                                              
                                            }catch (PDOException $e) {
                                              exit($e->getMessage());
                                            } 

                                            try{
                                              $query4 = $conn->prepare("INSERT INTO ec_emp_details(uid) Values(:userid)");
                                              $query4->bindParam("userid", $last_id, PDO::PARAM_STR);
                                              $query4->execute();
                                              
                                            }catch (PDOException $e) {
                                              exit($e->getMessage());
                                            } 

                                            try{
                                              $query5 = $conn->prepare("INSERT INTO ec_personal_details(uid) Values(:userid)");
                                              $query5->bindParam("userid", $last_id, PDO::PARAM_STR);
                                              $query5->execute();
                                              
                                            }catch (PDOException $e) {
                                              exit($e->getMessage());
                                            } 
                                            $sub="Email Account Activation";
                                            $msg="Hi, $uname. Click here to activate your account http://localhost:8080/PitathProject1/email_activation.php?token=$token ";
                                            $mail_status=send_activation($uemail,$token,$uname,$msg,$sub);
                                            if($mail_status==1){
                                              $_SESSION['reg_msg'] = "You have been registered successfully!!!....Please check your mail now to activate your account $uemail";
                                              $_SESSION['reg_msg1'] = "For activation";
                                              echo '<meta http-equiv="refresh" content="1; URL=index.php" />';
                                            }
                                            else{
                                              echo"Email not Exists!!!";
                                            }
                                          }
                                            
                                  }//eof if engg_consultant


                                  else if($utype=="vendor"){

                                           /* $i=0;
                                            try {
                                              $query = $conn->prepare("SELECT * from vendor");
                                              $query->execute();
                                              $records = $query->fetchAll();
                                              foreach ($records as $record) {
                                                  $i+=1;
                                              }
                                              $unique_id="V".date("Y").$i;
                                            }
                                            catch (PDOException $e) {
                                              exit($e->getMessage());
                                          }*/

                                          $i=0;
                                          try {
                                            $query = $conn->prepare("SELECT * from vendor");
                                            $query->execute();
                                            $records = $query->fetchAll();
                                            foreach ($records as $record) {
                                                $i+=1;
                                            }
                                                if($i==0){
                                                $unique_id="V".date("Y").$i;
                                                }
                                                else{
                                                  $last_unique_id="";
                                                  try{
                                                    $query1= $conn->prepare("SELECT * FROM vendor ORDER BY uid DESC LIMIT 1");
                                                    $query1->execute();
                                                    $records = $query1->fetchAll();
                                                            foreach ($records as $record) {
                                                              $last_unique_id=$record['vendor_id'];
                                                          }

                                                      }catch (PDOException $e) {
                                                      exit($e->getMessage());
                                                      }
                                                      $last_int=(int)substr($last_unique_id, -1);
                                                      $new_last_int=$last_int+1;
                                                      $unique_id="V".date("Y").$new_last_int;
                                                }
                                          }
                                          catch (PDOException $e) {
                                            exit($e->getMessage());
                                        }

                                          $res='false';
                                          try {
                                              $query = $conn->prepare("INSERT INTO vendor(username, passwd,email,mob_no,vendor_id,token,status) VALUES (:uname,:upass,:uemail,:umobno,:unique_id,:token,:status)");
                                              $query->bindParam("uname", $uname, PDO::PARAM_STR);
                                              $query->bindParam("uemail", $uemail, PDO::PARAM_STR);
                                              $enc_password = hash('sha256', $upass);
                                              $query->bindParam("upass", $enc_password, PDO::PARAM_STR);
                                              $query->bindParam("umobno", $umobno, PDO::PARAM_STR);
                                              $query->bindParam("unique_id", $unique_id, PDO::PARAM_STR);
                                              $query->bindParam("token", $token, PDO::PARAM_STR);
                                              $query->bindParam("status", $status, PDO::PARAM_STR);
                                              $query->execute();
                                              $last_id = $conn->lastInsertId();
                                              $res='true';
                                          } catch (PDOException $e) {
                                              exit($e->getMessage());
                                          }

                                          if($res=='true'){
                                              
                                                    try{
                                                      $query3 = $conn->prepare("INSERT INTO vendor_reg(uid) Values(:userid)");
                                                      $query3->bindParam("userid", $last_id, PDO::PARAM_STR);
                                                      $query3->execute();
                                                      
                                                    }catch (PDOException $e) {
                                                      exit($e->getMessage());
                                                    } 
                                                
                                            $sub="Email Account Activation";
                                            $msg="Hi, $uname. Click here to activate your account http://localhost:8080/PitathProject1/email_activation.php?token=$token ";
                                            $mail_status=send_activation($uemail,$token,$uname,$msg,$sub);
                                            if($mail_status==1){
                                              $_SESSION['reg_msg'] = "You have been registered successfully!!!....Please check your mail now to activate your account $uemail";
                                              $_SESSION['reg_msg1'] = "For activation";
                                              echo '<meta http-equiv="refresh" content="1; URL=index.php" />';
                                            }
                                            else{
                                              echo"Email not Exists!!!";
                                            }
                                          }

                                  }//eof if vendor

                          }//eof last else block


                      }catch (PDOException $e) {
                            exit($e->getMessage());
                        }

                    }
                }catch (PDOException $e) {
                  exit($e->getMessage());
              }
            
          }
      
    }catch (PDOException $e) {
        exit($e->getMessage());
    }
}?>