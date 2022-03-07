<?php
    if(isset($_POST['uemail']) && isset($_POST['upass']) && isset($_POST['logInType'])){
        $loginType=$_POST['logInType'];
                ///processing
        $i=$_POST['uemail'];
        $j=crypt($_POST['upass'],'al181144emran');
        include 'dbconnection.php';
        
        if($loginType=='User')
        {
                 ////log in as User
            
            $mysqlcode="SELECT * FROM userreg WHERE (Email='$i' OR Mobile='$i') AND Password='$j'";
            //echo $mysqlcode;

            $ret=$conn->query($mysqlcode);

            if($ret->rowCount()==1){
                ///valid user found
                session_start();

                $_SESSION["isloggedin"]=true;

?>
                <script>
                        location.assign('home.php?update_row_no='+'<?php echo $i; ?>');

                </script>  
<?php

                }else{
                echo "<script>alert('Invalid User Email and Password!!');</script>";

                ///invalid user email and comment
                echo "<script>location.assign('login.php');</script>";
                }
            
            
        }else{
                ////log in as Admin

                $mysqlcode="SELECT * FROM adminreg WHERE (Email='$i' OR Mobile='$i') AND Password='$j'";
                //echo $mysqlcode;

                $ret=$conn->query($mysqlcode);

                if($ret->rowCount()==1){
                    ///valid user found
                    session_start();

                    $_SESSION["isloggedin"]=true;

?>
                    <script>
                            location.assign('adminhome.php?update_row_no='+'<?php echo $i; ?>');
                    </script>  
<?php

                    }else{
                    echo "<script>alert('Invalid Admin Email and Password!!');</script>";

                    ///invalid user email and comment
                    echo "<script>location.assign('login.php');</script>";
                    }
        }

    }
    else{
        ?>
        <script>alert('Please Fill up your Log In Type/Email/Number/Password!!!')</script>
<?php
        echo "<script>location.assign('login.php');</script>";
    }
?>