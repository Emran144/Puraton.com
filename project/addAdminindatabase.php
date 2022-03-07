<?php

       if(isset($_POST['adminname']) && isset($_POST['adminmobile']) && isset($_POST['adminemail']) && isset($_POST['adminnid']) && isset($_POST['adminaddress']) && isset($_POST['adminpassword']) && isset($_POST['retypeadminpassword'])){      
           

           $adname     =$_POST['adminname'];
           $adnumber    =$_POST['adminmobile'];
           $ademail     =$_POST['adminemail'];
           $adnid     =$_POST['adminnid'];
           $adaddress   =$_POST['adminaddress'];
           $adpassword  =crypt($_POST['adminpassword'],'al181144emran');
           $adrepassword=crypt($_POST['retypeadminpassword'],'al181144emran');

           
           if($adpassword != $adrepassword)
           {
?>
                <script>alert('Password does not match!!!')</script>
<?php

               echo "<script>location.assign('adminsignup.php');</script>";
           }

           include "dbconnection.php";
           
           
           $mysqlcode="INSERT INTO adminreg VALUES(null, '$adname', '$adnumber', '$ademail', '$adnid', '$adaddress', '$adpassword')";

           //echo $mysqlcode;
           
           try{
               $conn->exec($mysqlcode);
               ?>
                <script>alert('Admin Registration Successfull!!!')</script>
<?php
               echo "<script>location.assign('login.php');</script>";

           }catch(PDOException $ex){

?>
              <script>alert('User already exists. Use different email or phone!!!')</script>
<?php
               echo "<script>location.assign('adminsignup.php');</script>";
           }

       }
       else{
           ?>
            <script>alert('Please fill all information!!!')</script>
<?php
           echo "<script>location.assign('adminsignup.php');</script>";
       }

?>