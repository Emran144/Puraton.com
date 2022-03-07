///are you sure for delete: Y/N button diya check korbo time paile


<?php
    session_start();
    if(isset($_SESSION['isloggedin']) && $_SESSION['isloggedin']==true)
    {
        
?>
            <script>alert('Are you sure you want to delete your account...?');</script>

<?php
        //echo 'This is for User delete...!';
        if(isset($_POST['update_this_user'])){
            
            $del_row=$_POST['update_this_user'];
            
            include 'dbconnection.php';
            $mysqlcode="DELETE FROM userreg WHERE Email='$del_row' OR Mobile='$del_row'";
            //echo $mysqlcode;
            
            try{
                $conn->exec($mysqlcode);
                
?>
                <!--///after deletion successfully it will go to again user home-->
                <script>alert('Deletion Successful!!!')</script> 
<?php
                echo "<script>location.assign('login.php');</script>";

            }catch(PDOException $ex){
            ///<!--Jodi delete korte kono problem hoy taile alert show kore abr admin home e chole jabe-->
            
                echo "<script>location.assign('myprofileview.php?view_this_user='$del_row);</script>";
?>
                    <script>alert('Deletion Unsuccessful!!!')</script> 
<?php
            }
        }
        else
        {
?>
        <!--jodi row na paoa jay taile alert show kore abr admin home e chole jabe-->
            <script>alert('User not found for delete!!!')</script> 
<?php
            echo "<script>location.assign('myprofileview.php?view_this_user='$del_row);</script>";
        }
    }
else
{
    echo "<script>location.assign('login.php');</script>";
}

?>