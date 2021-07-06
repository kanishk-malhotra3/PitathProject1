<?php
session_start();
include "Db_conn.php";
if(isset($_GET['token'])){
    $token=$_GET['token'];
    $active_status="active";
    try{
        $update_query=$conn->prepare("update customers set status=:active_status  where token=:utoken");
        $update_query->bindParam("active_status", $active_status, PDO::PARAM_STR);
        $update_query->bindParam("utoken", $token, PDO::PARAM_STR);
        $update_query->execute();
       // $records = $update_query->fetchAll();
            if ($update_query->rowCount() > 0){
                if(isset($_SESSION['reg_msg1'])){
                    
                    header("Location: index.php");  
                    $_SESSION['acc_active_msg']="Account activated successfully!!!";
                   
               }
               else{
                   header("Location: index.php");  
                   $_SESSION['acc_active_msg']="You are logged out!!!";
                   
               }
            }

            else{
                try{
                    

                    $update_query=$conn->prepare("update engg_consultant set status=:active_status  where token=:utoken");
                    $update_query->bindParam("active_status", $active_status, PDO::PARAM_STR);
                    $update_query->bindParam("utoken", $token, PDO::PARAM_STR);
                

                    $update_query->execute();
                  
                    if ($update_query->rowCount() > 0){
                    
                        if(isset($_SESSION['reg_msg1'])){
                            header("Location: index.php");  
                            $_SESSION['acc_active_msg']="Account activated successfully!!!";
                                           
                       }
                        else{
                            header("Location: index.php");  
                            $_SESSION['acc_active_msg']="You are logged out!!!";
                        }
                    }
                    else{
                        try{
                           
                        $update_query=$conn->prepare("update vendor set status=:active_status  where token=:utoken");
                        $update_query->bindParam("active_status", $active_status, PDO::PARAM_STR);
                        $update_query->bindParam("utoken", $token, PDO::PARAM_STR);
                        $update_query->execute();
                            //$records = $update_query->fetchAll();
                            if ($update_query->rowCount() > 0){
                                if(isset($_SESSION['reg_msg1'])){
                                    header("Location: index.php");  
                                    $_SESSION['acc_active_msg']="Account activated successfully!!!";
                                    
                              }
                               else{
                                   header("Location: index.php");  
                                   $_SESSION['acc_active_msg']="You are logged out!!!";
                              }
                            }
                        }


                        catch (PDOException $e) {
                            exit($e->getMessage());
                        }
                    }
                }
                catch (PDOException $e) {
                    exit($e->getMessage());
                }
            }
    }
    catch (PDOException $e) {
        exit($e->getMessage());
    }
}
?>