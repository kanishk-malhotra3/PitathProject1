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
            function validateForm(){
                var password = document.forms['rst_pass_frm']['upass'].value;
                var password_confirm = document.forms['rst_pass_frm']['ucpass'].value; 

                if (password!=password_confirm) {
                        alert("Password and confirm password are not matching!!!");
                        document.reg_frm.upass.focus() ;
                        document.reg_frm.ucpass.focus() ;
                        return false;
                    }
                
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
          <div class="container" style="background-color:rgb(255,255,255); margin-top:200px; height:360px; border-radius:20px; width:400px;">
              <strong>  <h1 style="color:rgb(24,119,242); margin-top:210px; margin-left:100px; font-family: 'Anton', sans-serif;;">Reset Password</h1> </strong>
              <div class="mb-3">
\

              <form action="" method="post" onsubmit="return validateForm();" name="rst_pass_frm">
                  <input type="password" class="form-control" name="upass" id="formGroupExampleInput2" placeholder="Enter New password" style="width:360px; height:56px;" required>
                </div>
                <div class="mb-3">
                  <input type="password" class="form-control" name="ucpass" id="formGroupExampleInput2" placeholder="Confirm your password" style="width:360px; height:56px;" required>
                </div>
                <center> <button type="submit" class="btn btn-primary" name="rst_pass_btn" style="width:360px; height:45px; border-radius:25px; font-size:24px; font-family: 'Anton', sans-serif;;">Reset Password</button> </center>
              </form>

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
if(isset($_GET['token'])){

    if (isset($_POST["rst_pass_btn"])){
        // collect value of input field
        $upass = $_POST['upass'];
        $uname=$_GET['uname'];
        $utoken=$_GET['token'];
        $utype=$_GET['utype'];

        if($utype=="customer"){
            $res="false";
            try{
                $update_query=$conn->prepare("update customers set passwd=:upass where username=:uname AND token=:utoken");
                $enc_password = hash('sha256', $upass);
                $update_query->bindParam("upass", $enc_password, PDO::PARAM_STR);
                $update_query->bindParam("uname", $uname, PDO::PARAM_STR);
                $update_query->bindParam("utoken", $utoken, PDO::PARAM_STR);
                $update_query->execute();
                $res="true";
              
            } catch (PDOException $e) {
                exit($e->getMessage());
            }
            if ( $res=="true") {
                $_SESSION['pass_rst_succ_msg']="Your Password has been reset successfully!!!....Please Login now!!!";  
                echo '<meta http-equiv="refresh" content="1; URL=index.php" />';
            }
        }

        else if($utype=="engg_consultant"){
            $res="false";
            try{
                $update_query=$conn->prepare("update engg_consultant set passwd=:upass where username=:uname AND token=:utoken");
                $enc_password = hash('sha256', $upass);
                $update_query->bindParam("upass", $enc_password, PDO::PARAM_STR);
                $update_query->bindParam("uname", $uname, PDO::PARAM_STR);
                $update_query->bindParam("utoken", $utoken, PDO::PARAM_STR);
                $update_query->execute();
                $res="true";
              
            } catch (PDOException $e) {
                exit($e->getMessage());
            }
            if ( $res=="true") {
                $_SESSION['pass_rst_succ_msg']="Your Password has been reset successfully!!!....Please Login now!!!";  
                echo '<meta http-equiv="refresh" content="1; URL=index.php" />';
            }
        }

        
        else if($utype=="vendor"){
            $res="false";
            try{
                $update_query=$conn->prepare("update vendor set passwd=:upass where username=:uname AND token=:utoken");
                $enc_password = hash('sha256', $upass);
                $update_query->bindParam("upass", $enc_password, PDO::PARAM_STR);
                $update_query->bindParam("uname", $uname, PDO::PARAM_STR);
                $update_query->bindParam("utoken", $utoken, PDO::PARAM_STR);
                $update_query->execute();
                $res="true";
               
            } catch (PDOException $e) {
                exit($e->getMessage());
            }
            if ( $res=="true") {
                $_SESSION['pass_rst_succ_msg']="Your Password has been reset successfully!!!....Please Login now!!!";  
                echo '<meta http-equiv="refresh" content="1; URL=index.php" />';
            }
        }

    }
}
else{ 
    $_SESSION['pass_rst_direct']="Please click on forgot password link to reset your password!!!";  
    echo '<meta http-equiv="refresh" content="1; URL=index.php" />';
}
?>