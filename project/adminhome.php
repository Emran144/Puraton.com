<?php
    session_start();
    if($_SESSION['isloggedin']==true)
    {
        echo 'Welcome to Admin Panel...!';
        ///Here you can see all user
        ///You can delete User
        
        if(isset($_GET['update_row_no']))
        {
            $myEmail=$_GET['update_row_no'];
        }

?>
        <!DOCTYPE html>
        <html>
            <head>
                <meta charset="utf-8">
                <title>Showing All User</title>
                
                <style>
                    table{
                        width:100%;
                        background-color: D7E7CC;
                    }
                    h1{
                        text-align: center;
                    }

                    
                    table,th,td{
                        border:1px solid red;
                        border-collapse: collapse;
                        text-align: center;
                    }
                    th:hover{
                        background-color: 221FEF;
                    }
                    tr:hover{
                        background-color: B1E58F;
                    }
                </style>
                
            </head>
            <body>
<!--             <br><br/>   
            Back to User home page: <br><br/>
            <form action="home.php" method="get">
                <input type="hidden" value="<?php echo $myEmail; ?>" name="update_row_no">
                <input type="submit" value="Home">
            </form>
-->
                <table>

                    <thead>
                        <h1>User List</h1>
                        <tr>
                            <th>SL</th>
                            <th>First_name</th>
                            <th>Last_name</th>
                            <th>Mobile</th>
                            <th>Email</th>
                            <th>Gender</th>
                            <th>Address</th>
                            <th>Picture</th>
                            <th>Join Date</th>
                            <th>Generated_user_ID</th>
                            <th>Delete User</th>
                        </tr>

                    </thead>
                    <tbody>
                <!--    <script>alert('Database Connection Error!!!')</script>   -->
         
<?php
     
        try{
            ///try to connect with database
            $conn=new PDO("mysql:host=127.0.0.1:3306;dbname=project", "root", "");
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
                    $mysqlcode='SELECT * FROM userreg ORDER BY SL';
                    $ret=$conn->query($mysqlcode);
                    $table=$ret->fetchAll();
                    
                    for($i=0; $i<count($table); $i++)
                    {
                        $row=$table[$i];
                        ?>
                        
                        <tr>
                            <td><?php echo $row['SL'] ?></td>
                            <td><?php echo $row['First_name'] ?></td>
                            <td><?php echo $row['Last_name'] ?></td>
                            <td><?php echo $row['Mobile'] ?></td>
                            <td><?php echo $row['Email'] ?></td>
                            <td><?php echo $row['Gender'] ?></td>
                            <td><?php echo $row['Address'] ?></td>
                            <td><img src='<?php echo $row['Picture'] ?>' width='50'height='50'></td>
                            <td><?php echo $row['Join_Date'] ?></td>     
                            <td><?php echo $row['Generated_User_ID'] ?></td>
                            <td><input type='button' value='Delete' onclick="deluser(<?php echo $row['SL'] ?>)"></td>
                        
                        </tr>

                        <?php
                    }

        }
        catch(PDOException $ex)
        {
            ///back to log in page
            echo "<script>location.assign('login.php');</script>";
        }

?>
                    
                    </tbody>
                
                </table>
            <br><br/>

                <br><br/>
                Log Out from Admin Panel: <a href="logout.php"><input type='button' value='Log Out'></a>
                
                
                <script>
                    function deluser(row_num){
                        location.assign('deleteuser.php?del_row_no='+row_num);
                    }
                
                </script>
                
            </body>


        </html>
<?php
    }
    else
    {
        echo "<script>location.assign('login.php');</script>";
    }
?>