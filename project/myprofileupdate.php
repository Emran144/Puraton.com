<?php
    session_start();

    if($_SESSION['isloggedin']==true)
    {
?> 

<!DOCTYPE html>

<html>
    <head>
        <meta charset="utf-8">
        <title>My Profile</title>
    </head>
    <body>

        
<?php
            include 'dbconnection.php';
            if(isset($_POST['update_this_user']))
            {
                $update_me=$_POST['update_this_user'];
                $mysqlcode="SELECT * FROM userreg WHERE Email='$update_me' OR Mobile='$update_me'";
                //echo $mysqlcode;
                try{
                    $ret=$conn->query($mysqlcode);
                    $table=$ret->fetchAll();
                    $row=$table[0];
                    
                }catch(PDOException $ex)
                {
                ?>
                    <script>
                            location.assign('home.php?view_this_user='+'<?php echo $update_me;?>');
                    </script>
                <?php
                }
                 
            }else{
                 ?>
                    <script>
                            location.assign('home.php?update_row_no='+'<?php echo $update_me;?>');
                    </script>
                <?php
            }

?>
        Back to Home:<br/><br/>
        <form action="home.php" method="get">
            <input type="hidden" value="<?php echo $update_me; ?>" name="update_row_no">
            <input type="submit" value="Home">
        </form>
        <br/>
        <form action="myprofileview.php" method="post">
            <input type="hidden" value="<?php echo $update_me; ?>" name="view_this_user">
            <input type="submit" value="Go Back">
        </form>
        
        <h3>This is me: </h3>
        <br/>
        <form action="renewprofile.php" method="post" enctype="multipart/form-data">
                        
                First Name: <input type="text" id='userfname' name='userfname' value="<?php echo $row['First_name'];?>" >
                <br/><br/>
                Last Name: <input type="text" id='userlname' name='userlname' value="<?php echo $row['Last_name'];?>" >
                <br/><br/>
                Mobile: <input type="text" id="usermobile" name="usermobile" value="<?php echo $row['Mobile'];?>" > 
                <br/><br/>
                Email: <input type="email" id="useremail" name="useremail"  value="<?php echo $row['Email'];?>" >
                <br/><br/>
                Address: <input type="text" id="useraddress" name="useraddress" value="<?php echo $row['Address'];?>" >
                <br/><br/>
            
                If you wants to update your profile you have to type your current password here:
                <input type="password" id='curr_pass' name='curr_pass' placeholder="Type your current password here">
                <br/><br/>
                Change Password:
                <br/><br/>
                New Password : <input type="password" id='new_pass' name='new_pass' placeholder="Type new password here">
                <br/><br/>
                Re-Type New Password : <input type="password" id='re_new_pass' name='re_new_pass' placeholder="Re-type new password here">
                <br/><br/>
            
                Change Profile Picture: <input type="file" id='updatepic' name='updatepic' value="<?php echo $row['Picture'];?>">
                
                <br/><br/>
            
            <?php
                if($row['Gender']=='Male')
                {
            ?>
                Gender: <select id='gender-m' name='usergender'>
                            <option value="Male" selected>Male</option>
                            <option value="Female">Female</option>
                        </select>
            <?php
                }
                else{
            ?>
               Gender:  <select id='gender-m' name='usergender'>
                            <option value="Male" >Male</option>
                            <option value="Female" selected>Female</option>
                        </select>

            <?php
                }
            
            
            ?>
            
            <br/><br/>
            <input type="hidden" value="<?php echo $update_me; ?>" name="update_this_user">

           <input type="submit" value="Update">
                
        </form>
    </body>

</html>



<?php
        
    }
    else
    {
        echo "<script>location.assign('login.php');</script>";
    }
?>