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
            if(isset($_POST['view_this_user']))
            {
                $which_user=$_POST['view_this_user'];
                
                $mysqlcode="SELECT * FROM userreg WHERE Email='$which_user' OR Mobile='$which_user'";
                //echo $mysqlcode;
                try{
                    $ret=$conn->query($mysqlcode);
                    $table=$ret->fetchAll();
                    $row=$table[0];
                    
                }catch(PDOException $ex)
                {
                    echo "<script>location.assign('home.php?update_row_no='$which_user);</script>";
                }
                
            }
            else
            {
                echo "<script>location.assign('home.php?update_row_no='$which_user);</script>";
            }
            
        
           
            
        ?>
        <h3>This is me: </h3>    

        <br/>
            Back to User home page: <br><br/>
            <form action="home.php" method="get">
                <input type="hidden" value="<?php echo $which_user; ?>" name="update_row_no">
                <input type="submit" value="Home">
            </form>        
        <br/><br/>
        
        <form action="home.php" method="get">
            <input type="hidden" value="<?php echo $which_user; ?>" name="update_row_no">
            <input type="submit" value="Go Back">
        </form>
        
        <br/>
        <form action="myprofileupdate.php" method="post">
                        
                First Name: <input type="text" id='userfname' name='userfname' value="<?php echo $row['First_name'];?>" readonly>
                <br/><br/>
                Last Name: <input type="text" id='userlname' name='userlname' value="<?php echo $row['Last_name'];?>" readonly>
                <br/><br/>
                Mobile: <input type="text" id="usermobile" name="usermobile" value="<?php echo $row['Mobile'];?>" readonly> 
                <br/><br/>
                Email: <input type="email" id="useremail" name="useremail"  value="<?php echo $row['Email'];?>" readonly>
                <br/><br/>
                Address: <input type="text" id="useraddress" name="useraddress" value="<?php echo $row['Address'];?>" readonly>
                <br/><br/>
                Join Date: <?php echo $row['Join_Date'];?>
                <br/><br/>
                <h5>Profile Picture: </h5>
                <img src='<?php echo $row['Picture'] ?>' width='100'height='100'>
                <br/><br/>
            
<?php
                    if($row['Gender']=='Male')
                    {
 ?>
            
                      Gender: <?php echo $row['Gender'];?> 

<?php
                    }else{
?>
                      Gender: <?php echo $row['Gender'];?>

<?php
                    }
        
?>
            
                <br/><br/>
            <input type="hidden" value="<?php echo $which_user; ?>" name="update_this_user">

           <input type="submit" value="Update">
            <br/><br/>
 

                
        </form>
        <!-- For deleting my own account  -->
            Delete my account:   
            <br/><br/>               
            <form action="deleteme.php" method="post">
                    <input type="hidden" value="<?php echo $which_user; ?>" name="update_this_user">
                    <input type="submit" value='Delete Me'>
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