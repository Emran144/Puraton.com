<!DOCTYPE html>

<html>
    <head>
        <meta charset="utf-8">
        <title>User Sign Up</title>
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
        <h1>User Registration</h1>
        <br/>
        <h3>Please fill the form: </h3>
        <br/>
        <div class="registration">
            
            <form class="Form" action="adduserindatabase.php" method="post" enctype="multipart/form-data">
                        
                First Name: <input type="text" id='userfname' name='userfname'>
                <br/><br/>
                Last Name: <input type="text" id='userlname' name='userlname'>
                <br/><br/>
                Mobile: <input type="text" id="usermobile" name="usermobile"> 
                <br/><br/>
                Email: <input type="email" id="useremail" name="useremail" placeholder="example@gmail.com">
                <br/><br/>
                Address: <input type="text" id="useraddress" name="useraddress">
                <br/><br/>
                Password: <input type="password" id="userpassword" name="userpassword">
                <br/><br/>
                Re-Type Password: <input type="password" id="retypepassword" name="retypepassword">
                <br/>

                <h5>Profile Picture: </h5>
                <input type="file" id='userpic' name='userpic'>

                <h5>Gender: </h5>
                Male: <input type="radio" name="gender" id='gender' value="Male">
                Female: <input type="radio" name="gender" id='gender' value="Female">
                
                <br/><br/>

           <input type="submit" value="OK">
                    
                <br/><br/>
                Back to LogIn Page: <a href="login.php"><input type="button" value='Back'></a>
                
        </form>
        
        </div>

    </body>

</html>

