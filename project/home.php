<?php
    session_start();

    if($_SESSION['isloggedin']==true)
    {
?>   
        <!DOCTYPE html>

            <html>
                <head>
                    <meta charset="utf-8">
                    <title>Home Page</title>
                </head>
                <body>
                    <h2>Welcome to Poraton Dot Com...!</h2>
                    <h1>Home Page</h1>
                    
                    
<?php
                    
                    include 'dbconnection.php';
                    if(isset($_GET['update_row_no']))
                    {
                        try{
                            $myEmail=$_GET['update_row_no'];
                            
                            $mysqlcode="SELECT Generated_User_ID FROM userreg WHERE Email='$myEmail' OR Mobile='$myEmail'";
                            
                            $myUserName = $conn->query($mysqlcode);
                            $my_arr=$myUserName->fetchAll();
                            $row=$my_arr[0];
                            //echo 
                        
                        }catch(PDOException $ex){
        ?>
                    <script>
                            location.assign('home.php?update_row_no='+'<?php echo $myEmail;?>');
                    </script>
        <?php
                        }
                    }
                    else{
                        
        ?>
                    <script>
                            location.assign('home.php?update_row_no='+'<?php echo $myEmail;?>');
                    </script>
        <?php
                    }
                   
                     //echo $mysqlcode;
  
?>
                    I am <?php echo $row["Generated_User_ID"]; ?>

                    <br/><br/>
                    View my profile:
                    <br/><br/>
                    <form action="myprofileview.php" method="post">
                        <input type="hidden" value="<?php echo $myEmail; ?>" name="view_this_user">
                        <input type="submit" value="<?php echo $row["Generated_User_ID"]; ?>">
                    </form>

                     <br/><br/>
                    <a href="logout.php"><input type="button" value='Log Out'></a>
                </body>
            </html>
<?php
    }
    else
    {
        echo "<script>location.assign('login.php');</script>";
    }
?>