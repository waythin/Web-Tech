<?php include('Control/db.php');?>
<?php

    $validatename="";
    $validateemail="";
    $validateusername="";
    $validatepassword="";
    $validateconfirmpassword="";
    $validatedob="";
    $validategender="";
    if($_SERVER["REQUEST_METHOD"]=="POST")
    {
        $name=$_REQUEST["name"];
        $email=$_REQUEST["email"];
        $username=$_REQUEST["username"];
        $password=$_REQUEST["password"];
        $cpassword=$_REQUEST["cpassword"];
        $date=$_REQUEST["date"];
        $gender=$_REQUEST["gender"];
        
        if(empty($name)||strlen($name)<3)
        {
            $validatename="you must enter your name";
        }
        else 
        {
            $validatename="your name is:".$name;
        }
        if(empty($username) || !preg_match("/^[a-zA-Z\+_\- ]+\.*$/",$username))
        {
            $validatename="you must enter your name";
        }
        else 
        {
            $validatename="your name is:".$username;
        }

        // if((empty($password) || strlen($password)<5) !preg_match("/^[a-zA-Z\+_\- ]+\.*$/",$username))
        // {
        //     $validatename="you must enter your name";
        // }
        // else 
        // {
        //     $validatename="your name is:".$username;
        // }

        


        if(empty($email) || !preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix",$email))
        {
            $validateemail="you must enter your email";
        }
        else 
        {
            $validateemail="your name is:".$email;
        }

       
        
        if(isset($_REQUEST["gender"]))
        {
            $validategender="Please select your gender";
        }

        {
            $Connection = new database();
            $conobj=$Connection->OpenCon();
            // $userQuery=$connection->CheckUser($conobj,"Information",$username,$password);
            $userQuery=$Connection->DB($conobj,$name,$email,$username,$password,$gender,$date);
 // $connection->DB($connection,$name,$email,$username,$password,$gender,$date);
            $Connection->CloseCon($conobj);
            //$database=new database();
            //$database->DB('$name','$email','$username','$password','$gender','$date');

        }
       // if(empty($name)||empty($email)||empty($username)||empty($passoword)||empty($cpassword)||empty($gender)||)
       // {
         //   All Fields are required
       // }


    }


?>


<!DOCTYPE HTML>
<html>
<head>

<title>LabTask2</title>
</head>


<body>
<h1>REGISTRATION</h1>

<form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">

<table>
<tr>
<td>Name:</td><td><input type="text" id="name" name="name"><?php echo $validatename;?></td>
</tr>
<tr>
<td>Email:</td><td><input type="text" id="email" name="email"><?php echo $validateemail;?></td>

</tr>
<tr>
<td>User Name:</td><td><input type="text" id="username" name="username"><?php echo $validateusername;?></td></td>
</tr>
<tr>
<td>Password:</td><td><input type="password" id="password" name="password"></td>
</tr>
<td>Confirm Password:</td><td><input type="cpassword" id="cpassword" name="cpassword"></td>
</tr>
</table>
Gender<br>
<input type="radio"id="male" name="gender" value="male">Male
<input type="radio"id="female" name="gender" value="female">Female
<input type="radio"id="other" name="gender" value="other">Other
<?php echo $validategender?>
<br>
Date Of Birth
<input type="date"id="date" name="date"><br>
<input type="submit"value="Submit">
<input type="reset"value="Reset">



</form>

</body>
</html>