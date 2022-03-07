<?php

       if(isset($_POST['userfname']) && isset($_POST['userlname']) && isset($_POST['usermobile']) && isset($_POST['useremail']) && isset($_POST['useraddress']) && isset($_POST['userpassword']) && isset($_POST['retypepassword'])){      
           

           $fname     =$_POST['userfname'];
           $lname     =$_POST['userlname'];
           $number    =$_POST['usermobile'];
           $email     =$_POST['useremail']; 
           $gender    =$_POST['gender'];
           $address   =$_POST['useraddress'];
           //$pic       =$_POST['userpic'];
           $password  =crypt($_POST['userpassword'],'al181144emran');
           $repassword=crypt($_POST['retypepassword'],'al181144emran');

           
           if($password != $repassword)
           {
?>
                <script>alert('Password does not match!!!')</script>
<?php

               echo "<script>location.assign('usersignup.php');</script>";
           }
           ////random image prpcessing---start
            $file_name = $_FILES['userpic']['name'];
            //$file_type = $_FILES['userpic']['type'];
            //$file_size = $_FILES['userpic']['size'];
            $file_tem_loc = $_FILES['userpic']['tmp_name'];
            $file_store = "images/".$file_name;
            
            //move_uploaded_file($file_tem_loc,$file_store);
           
             ////random image prpcessing---end

           include "dbconnection.php";
           
           $sqlForImage="SELECT * FROM userreg WHERE Picture='$file_store'";
           echo $sqlForImage;
           
           $ret=$conn->query($sqlForImage);
           
           if($ret->rowCount()==1){
               $file_store = "images/".$number.$file_name;  
           }
           
           move_uploaded_file($file_tem_loc,$file_store);
           
           $mysqlcode="INSERT INTO userreg VALUES(null, '$fname', '$lname', '$number', '$email', '$gender', '$address','$file_store', '$password', CONCAT('$fname','_','$lname'),CURDATE())";

           //echo $mysqlcode;
           
           try{
               $conn->exec($mysqlcode);
               ?>
                <script>alert('Registration Successfull!!!')</script>
<?php
               echo "<script>location.assign('login.php');</script>";

           }catch(PDOException $ex){

?>
              <script>alert('User already exists. Use different email or phone!!!')</script>
<?php
               echo "<script>location.assign('usersignup.php');</script>";
           }

       }
       else{
           ?>
            <script>alert('Please fill all information!!!')</script>
<?php
           echo "<script>location.assign('usersignup.php');</script>";
       }

?>