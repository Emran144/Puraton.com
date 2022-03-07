<?php        
        try{
            ///try to connect with database
            $conn=new PDO("mysql:host=127.0.0.1:3306;dbname=project", "root", "");
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
        }
        catch(PDOException $ex)
        {
            ///back to log in page
            echo "<script>location.assign('login.php');</script>";
        }
?>