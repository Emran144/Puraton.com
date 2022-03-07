<!DOCTYPE html>

<html>
    <head>
        <meta charset="utf-8">
        <title>Admin Sign Up</title>
        <style>
            .registration{
                text-align: center;
            }
            .Form{
                border: 2px solid red;
                padding-left: 20px;
                margin-left: 500px;
                margin-right: 500px;
            }
        </style>
    </head>
    <body>
        <h1>Admin Registration Form</h1>
        <br/>
        <h3>Please fill the form: </h3>
        <br/>
        <div class="registration">
            
            <form class="Form" action="addAdminindatabase.php" method="post">
                        
                Name: <input type="text" id='adminname' name='adminname'>
                <br/><br/>

                Mobile: <input type="text" id="adminmobile" name="adminmobile"> 
                <br/><br/>
                Email: <input type="email" id="adminemail" name="adminemail" placeholder="example@gmail.com">
                <br/><br/>
                NID: <input type="text" id='adminnid' name='adminnid'>
                <br/><br/>
                Address: <input type="text" id="adminaddress" name="adminaddress">
                <br/><br/>
                Password: <input type="password" id="adminpassword" name="adminpassword">
                <br/><br/>
                Re-Type Password: <input type="password" id="retypeadminpassword" name="retypeadminpassword">
                <br/><br/>

                <input type="submit" value="OK">
                    
                <br/><br/>
                Back to LogIn Page: <a href="login.php"><input type="button" value='Back'></a>
                
        </form>
        
        </div>

    </body>

</html>

