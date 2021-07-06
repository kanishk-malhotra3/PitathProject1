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
/*
*{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}
html, body {
    min-height: 100%;
    margin:0;
    padding:0;
}
footer{
  position: relative;
    bottom: 0;
    left: 0;
    right: 0;
    background: #111;
    height: auto;
    width: 100vw;
    font-family: "Open Sans";
    padding-top: 40px;
    color: #fff;
    margin-top:50px;
}
.footer-content{
    display: flex;
    align-items: center;
    justify-content: center;
    flex-direction: column;
    text-align: center;
}
.footer-content h3{
    font-size: 1.8rem;
    font-weight: 400;
    text-transform: capitalize;
    line-height: 3rem;
}
.footer-content p{
    max-width: 500px;
    margin: 10px auto;
    line-height: 28px;
    font-size: 14px;
}
.socials{
    list-style: none;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 1rem 0 3rem 0;
}
.socials li{
    margin: 0 10px;
}
.socials a{
    text-decoration: none;
    color: #fff;
}
.socials a i{
    font-size: 1.1rem;
    transition: color .4s ease;

}
.socials a:hover i{
    color: aqua;
}

.footer-bottom{
    background: #000;
    width: 100vw;
    padding: 20px 0;
    text-align: center;
}
.footer-bottom p{
    font-size: 14px;
    word-spacing: 2px;
    text-transform: capitalize;
}
.footer-bottom span{
    text-transform: uppercase;
    opacity: .4;
    font-weight: 200;
}
*/
.socials{
    list-style: none;
    display: flex;
    align-items: center;
    justify-content: center;
    
}
.socials li{
    margin: 0 10px;
}
.socials a{
    text-decoration: none;
    color: #fff;
}
.socials a i{
    font-size: 1.1rem;
    transition: color .4s ease;

}
.socials a:hover i{
    color: aqua;
}
#footer{
  position: relative;
    bottom: 0;
    left: 0;
    right: 0;
    margin-top:50px;
    background: #111;
}
    </style>
    
    <script>
         function mouseover() { 
                document.getElementById("forgot-pass-link").style.text-decoration = "underline;"; 
            } 
              
            function mouseout() { 
              document.getElementById("forgot-pass-link").style.text-decoration = "none;"; 
            } 
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
          <div class="container" style="background-color:rgb(255,255,255); margin-top:200px; height:auto; border-radius:20px; width:400px;">
              <strong>  <h1 style="color:rgb(24,119,242); margin-top:210px; margin-left:100px; font-family: 'Anton', sans-serif;;">Log In</h1> </strong>
              <div class="mb-3">
                          <?php 
                      //Flash Message Registeration Success
                      if(isset($_SESSION['reg_msg'])): ?>
                          <div class="alert alert-success">
                          <?php echo $_SESSION['reg_msg']; ?>
                          </div>
                      <?php endif; ?>
                      <?php unset($_SESSION['reg_msg']); ?> 

                      <?php 
                      //Flash Message Incorrect Username or Password
                      if(isset($_SESSION['incorrect_msg'])): ?>
                          <div class="alert alert-danger">
                          <?php echo $_SESSION['incorrect_msg']; ?>
                          </div>
                      <?php endif; ?>
                      <?php unset($_SESSION['incorrect_msg']); ?>

                      <?php 
                      //Flash Message Not Logged In
                      if(isset($_SESSION['not_logd_in'])): ?>
                          <div class="alert alert-danger">
                          <?php echo $_SESSION['not_logd_in']; ?>
                          </div>
                      <?php endif; ?>
                      <?php unset($_SESSION['not_logd_in']); ?>

                      <?php 
                      //Flash Message Not Logged In
                      if(isset($_SESSION['lgd_out_msg'])): ?>
                          <div class="alert alert-danger">
                          <?php echo $_SESSION['lgd_out_msg']; ?>
                          </div>
                      <?php endif; ?>
                      <?php unset($_SESSION['lgd_out_msg']); ?>
                      
                      <?php
                      //Flash Message Account Not Verified
                      if(isset($_SESSION['acc_not_verified'])): ?>
                          <div class="alert alert-danger">
                          <?php echo $_SESSION['acc_not_verified']; ?>
                          </div>
                      <?php endif; ?>
                      <?php unset($_SESSION['acc_not_verified']); ?>

                      <?php
                      //Flash Message Account is activated
                      if(isset($_SESSION['acc_active_msg'])): ?>
                          <div class="alert alert-success">
                          <?php echo $_SESSION['acc_active_msg']; ?>
                          </div>
                      <?php endif; ?>
                      <?php unset($_SESSION['acc_active_msg']); ?>

                      
                      <?php
                      //Flash Message Password reset success 
                      if(isset($_SESSION['pass_rst_succ_msg'])): ?>
                          <div class="alert alert-success">
                          <?php echo $_SESSION['pass_rst_succ_msg']; ?>
                          </div>
                      <?php endif; ?>
                      <?php unset($_SESSION['pass_rst_succ_msg']); ?>

                      <?php
                      //Flash Message Account is activated
                      if(isset($_SESSION['pass_rst_direct'])): ?>
                          <div class="alert alert-danger">
                          <?php echo $_SESSION['pass_rst_direct']; ?>
                          </div>
                      <?php endif; ?>
                      <?php unset($_SESSION['pass_rst_direct']); ?>


              <form action="" method="post" name="lgn_frm">
                  <input type="text" class="form-control" name="uname" id="formGroupExampleInput" placeholder="Enter your username" style="width:360px; height:56px;" required>
                </div>
                <div class="mb-3">
                  <input type="password" class="form-control" name="upass" id="formGroupExampleInput2" placeholder="Enter your password" style="width:360px; height:56px;" required>
                </div>
                <center> <button type="submit" class="btn btn-primary" name="lgn_btn" style="width:360px; height:45px; border-radius:25px; font-size:24px; font-family: 'Anton', sans-serif;;">Log In</button> </center>
              </form>
                <center> <a href="ForgotPass.php" id="forgot-pass-link" onmouseover="mouseover()" onmouseout="mouseout()" style="text-decoration: none; top:30px;">Forgot Password? </a> </center>  
                <center> <hr style="height:1px; width:280px;"> </center>
                <center> <button type="submit" onclick="location.href = 'Register.php';" class="btn btn-primary" style="width:200px; height:43px; border-radius:25px; font-size:24px;  margin-bottom:30px; font-family: 'Anton', sans-serif;;">Register</button> </center>

          </div>
        </div>
      </div> 

        
        <div class="row" id="footer" style="color:#ffffff;">
        <div class="col">
            <center> <h2>Pitath Electrics</h2> </center>
            <center> <p>All Rights Reserved.copyright &copy;2021 Patiath Electrics.</p> </center>
            <center>
            <ul class="socials">
                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                <li><a href="#"><i class="fa fa-youtube"></i></a></li>
                <li><a href="#"><i class="fa fa-linkedin-square"></i></a></li>
            </ul>
            </center>
          
        </div>
        </div>   
</div>
<script>
    setTimeout(function() {
        let alert = document.querySelector(".alert");
            alert.remove();
    }, 8000);
    
    </script>
</body>
</html>
<?php 
include "Db_conn.php";

if (isset($_POST["lgn_btn"])){
    // collect value of input field
    $uname = $_POST['uname'];
    $upass = $_POST['upass'];
    $ustatus="active";
    
      try {
          $query = $conn->prepare("SELECT * FROM customers WHERE username=:uname  AND passwd=:upass");
          $query->bindParam("uname", $uname, PDO::PARAM_STR);
          $enc_password = hash('sha256', $upass);
          $query->bindParam("upass", $enc_password, PDO::PARAM_STR);
          $query->execute();
          $records = $query->fetchAll();
          if ($query->rowCount() > 0) {
            $query1 = $conn->prepare("SELECT * FROM customers WHERE username=:uname  AND status=:ustatus");
            $query1->bindParam("uname", $uname, PDO::PARAM_STR);
            $query1->bindParam("ustatus", $ustatus, PDO::PARAM_STR);
            $query1->execute();
            $records = $query1->fetchAll();
              if ($query1->rowCount() > 0){
                foreach ($records as $record) {
                  $user_id=$record['uid'];
              }
              $usert="Customer";
              $_SESSION['lgn_succ_msg'] = "Logged In Successfully!!!";
              $_SESSION['lgd_uname'] = $uname;
              $_SESSION['utype'] = $usert;
              $_SESSION['user_id']=$user_id;

              echo '<meta http-equiv="refresh" content="1; URL=Welcome.php" />';
              } else {
                $_SESSION['acc_not_verified']="Your account is not active!!!....Please check your mail to activate your account!!!";
              } 
          } else {

              try {
                $query = $conn->prepare("SELECT * FROM engg_consultant WHERE username=:uname  AND passwd=:upass");
                $query->bindParam("uname", $uname, PDO::PARAM_STR);
                $enc_password = hash('sha256', $upass);
                $query->bindParam("upass", $enc_password, PDO::PARAM_STR);
                $query->execute();
                if ($query->rowCount() > 0) {
                  $query1 = $conn->prepare("SELECT * FROM engg_consultant WHERE username=:uname  AND status=:ustatus");
                  $query1->bindParam("uname", $uname, PDO::PARAM_STR);
                  $query1->bindParam("ustatus", $ustatus, PDO::PARAM_STR);
                  $query1->execute();
                  $records = $query1->fetchAll();
                    if ($query1->rowCount() > 0){
                          foreach ($records as $record) {
                            $user_id=$record['uid'];
                        }
                        $usert="Engineering Consultant";
                        $_SESSION['lgn_succ_msg'] = "Logged In Successfully!!!";
                        $_SESSION['lgd_uname'] = $uname;
                        $_SESSION['utype'] = $usert;
                        $_SESSION['user_id']=$user_id;
                        echo '<meta http-equiv="refresh" content="1; URL=Welcome.php" />';
                    } else {
                      $_SESSION['acc_not_verified']="Your account is not active!!!....Please check your mail to activate your account!!!";
                    } 
                } else {
                
                        try {
                          $query = $conn->prepare("SELECT * FROM vendor WHERE username=:uname  AND passwd=:upass");
                          $query->bindParam("uname", $uname, PDO::PARAM_STR);
                          $enc_password = hash('sha256', $upass);
                          $query->bindParam("upass", $enc_password, PDO::PARAM_STR);
                          $query->execute();
                          if ($query->rowCount() > 0) {
                            $query1 = $conn->prepare("SELECT * FROM vendor WHERE username=:uname  AND status=:ustatus");
                            $query1->bindParam("uname", $uname, PDO::PARAM_STR);
                            $query1->bindParam("ustatus", $ustatus, PDO::PARAM_STR);
                            $query1->execute();
                            $records = $query1->fetchAll();
                              if ($query1->rowCount() > 0){

                                    foreach ($records as $record) {
                                      $user_id=$record['uid'];
                                  }
                                  $usert="Vendor";
                                  $_SESSION['lgn_succ_msg'] = "Logged In Successfully!!!";
                                  $_SESSION['lgd_uname'] = $uname;
                                  $_SESSION['utype'] = $usert;
                                  $_SESSION['user_id']=$user_id;
                                  
                                  echo '<meta http-equiv="refresh" content="1; URL=Welcome.php" />';

                                } else {
                                  $_SESSION['acc_not_verified']="Your account is not active!!!....Please check your mail to activate your account!!!";
                                }  
                          } else {
                            $_SESSION['incorrect_msg'] = "Incorrect username or Password!!!";
                            echo '<meta http-equiv="refresh" content="1; URL=index.php" />'; 
                          }
                      } catch (PDOException $e) {
                          exit($e->getMessage());
                      }
            

                }
            } catch (PDOException $e) {
                exit($e->getMessage());
            }
        
            
            }
      } catch (PDOException $e) {
          exit($e->getMessage());
      }
    

  $conn = null;

}
?>