<?php
    session_start();

    if($_SESSION['isloggedin']==true)
    {
           if(isset($_POST['userfname']) && isset($_POST['userlname']) && isset($_POST['usermobile']) && isset($_POST['useremail']) && isset($_POST['usergender']) && isset($_POST['useraddress']) && isset($_POST['curr_pass'])){

                   $fname     =$_POST['userfname'];
                   $lname     =$_POST['userlname'];
                   $number    =$_POST['usermobile'];
                   $email     =$_POST['useremail']; 
                   $gender    =$_POST['usergender'];
                   $address   =$_POST['useraddress'];
                   $password  =crypt($_POST['curr_pass'],'al181144emran');
                   $newPassword  =crypt($_POST['new_pass'],'al181144emran');
                   $reTypeNewPassword  =crypt($_POST['re_new_pass'],'al181144emran');
               
                    $nullPassword=crypt("",'al181144emran');        ///jodi new password null rakhe seta check korar jnno
               
                    $file_name = $_FILES['updatepic']['name'];
                    $file_tem_loc = $_FILES['updatepic']['tmp_name'];
                    $file_store = "images/".$file_name;
                    move_uploaded_file($file_tem_loc,$file_store);
                    
                    $nullImage= "images/"."";                       ///jodi image null thake seta check
               
               include 'dbconnection.php';
                
               if(isset($_POST['update_this_user']))
                {
                    
                    $update_me=$_POST['update_this_user'];
                   
                    $mysqlcode="SELECT * FROM userreg WHERE Email='$update_me' OR Mobile='$update_me'";
                    
                    try{
                        $ret   =$conn->query($mysqlcode);
                        $table =$ret->fetchAll();
                        $row   =$table[0];
                        
                        //echo $row['Password'];
                        
                    if($password == $row['Password']){
                        ////current pass jodi match kore
                        
                        if($newPassword == $reTypeNewPassword && $newPassword!=$nullPassword && $file_store!=$nullImage){
                            ///new pass duita jodi mile       && jodi password change kore && jodi image change kore 
                            
                            
                            $mysqlupdatecode="UPDATE userreg SET First_name='$fname', Last_name='$lname', Mobile='$number',Email='$email', Address='$address', Picture='$file_store', Password='$newPassword',Generated_User_ID = CONCAT('$fname','_','$lname') WHERE Email='$update_me' OR Mobile='$update_me'";
                            
                            //echo $mysqlupdatecode;
                            try{
                                $conn->exec($mysqlupdatecode);
                            ?>
                                    <script>
                                        alert('Update Successfull!!!');

                                        location.assign('home.php?update_row_no='+'<?php echo $email;?>');
                                    </script>

                            <?php
                                
                            }catch(PDOException $ex){
                                ?>
                                    <script>
                                        alert('Update Failed!!!');

                                        location.assign('home.php?update_row_no='+'<?php echo $row['Email'];?>');
                                    </script>

                            <?php

                            }
                            
                        }else if($newPassword == $reTypeNewPassword && $newPassword==$nullPassword && $file_store!=$nullImage){
                            ///new pass duita jodi mile       && jodi password change na kore && jodi image change kore
                            
                            $mysqlupdatecode="UPDATE userreg SET First_name='$fname', Last_name='$lname', Mobile='$number',Email='$email', Address='$address', Picture='$file_store', Generated_User_ID = CONCAT('$fname','_','$lname') WHERE Email='$update_me' OR Mobile='$update_me'";
                            
                            //echo $mysqlupdatecode;
                            try{
                                $conn->exec($mysqlupdatecode);
                            ?>
                                    <script>
                                        alert('Update Successfull!!!');

                                        location.assign('home.php?update_row_no='+'<?php echo $email;?>');
                                    </script>

                            <?php
                                
                            }catch(PDOException $ex){
                                ?>
                                    <script>
                                        alert('Update Failed!!!');

                                        location.assign('home.php?update_row_no='+'<?php echo $row['Email'];?>');
                                    </script>

                            <?php

                            }
                            
                            
                        }else if($newPassword == $reTypeNewPassword && $newPassword!=$nullPassword && $file_store==$nullImage){
                            ///new pass duita jodi mile       && jodi password change kore && jodi image change na kore
                            
                            $mysqlupdatecode="UPDATE userreg SET First_name='$fname', Last_name='$lname', Mobile='$number',Email='$email', Address='$address', Password='$newPassword', Generated_User_ID = CONCAT('$fname','_','$lname') WHERE Email='$update_me' OR Mobile='$update_me'";
                            
                            //echo $mysqlupdatecode;
                            try{
                                $conn->exec($mysqlupdatecode);
                            ?>
                                    <script>
                                        alert('Update Successfull!!!');

                                        location.assign('home.php?update_row_no='+'<?php echo $email;?>');
                                    </script>

                            <?php
                                
                            }catch(PDOException $ex){
                                ?>
                                    <script>
                                        alert('Update Failed!!!');

                                        location.assign('home.php?update_row_no='+'<?php echo $row['Email'];?>');
                                    </script>

                            <?php

                            }
                            
                        }
                        
                        else{
                            ///new pass duita jodi na mile
                             ///****Ekhane home e jabe na...jabe 'myprofileupdate.php'...but tokhn kon user update korbo oi value ta pabo na r
                             ?>
                                    <script>
                                        alert('New re-typed Password does not match!!!');

                                        location.assign('home.php?update_row_no='+'<?php echo $row['Email'];?>');
                                    </script>

                            <?php
                            
                        }
                            
                        
                    }else{
                        ////current pass jodi match na kore
                        ///****Ekhane home e jabe na...jabe 'myprofileupdate.php'...but tokhn kon user update korbo oi value ta pabo na r
                        ?>

                        <script>
                            alert('Password does not match!!!');

                            location.assign('home.php?update_row_no='+'<?php echo $row['Email'];?>');
                        </script>

                        <?php
                    }

                    }catch(PDOException $ex){
                        ?>
                                <script>
                                    alert('User Not found!!!');

                                    location.assign('home.php?update_row_no='+'<?php echo $row['Email'];?>');
                                </script>";
                        <?php
                    }
                   
                }
               else
               {
                   ?>
                    <script>
                            location.assign('home.php?update_row_no='+'<?php echo $row['Email'];?>');
                    </script>
                <?php
               }
        
        
           }else{

                 ?>
                    <script>
                            location.assign('home.php?update_row_no='+'<?php echo $row['Email'];?>');
                    </script>
                <?php
           }
?> 

<?php
        
    }
    else
    {
        echo "<script>location.assign('login.php');</script>";
    }
?>