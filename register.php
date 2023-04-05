<?php
// check if form submitted
if (isset($_POST['Submit'])) {
    $user = $_POST['username'];
    $pass = md5($_POST['password']);
    $email = $_POST['email'];
    $fullname =$_POST['fullname'];


    // include database connection file
    include_once("config.php");

    // insert customer data into table
    $result = mysqli_query($conn, "INSERT INTO login (username, password, email, fullname, role)
    VALUES('$user','$pass', '$email', '$fullname', 'user')");

    // Show message when customer added
    echo "Customer added successfully. <a href='login.php'>View Customers</a><br><br>";
}
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Register </title>
</head>


<body>
    <a href="login.php">Go To Home</a>

    <br><br>


    <form action="register.php" method="post" name="form1">

        <table width="25%" border="0">

         <tr>
            <td>Full Name</td>
            <td><input type="text" placeholder="input your name" name="fullname"></td>
         </tr>

         <tr>
            <td>Usename</td>
            <td><input type="text" placeholder="input your username" name="username"></td>
         </tr>

         <tr>
             <td>Password</td>
            <td><input type="password" placeholder="input your password" name="password"></td>
         </tr>

         <tr>
            <td>Email</td>
            <td><input type="text" placeholder="input your email" name="email"></td>
         </tr>

         <tr>
            <td></td>
            <td><input type="submit" name="Submit" value="Register"  href="login.php"></></td>
         </tr>
        </table>
    </form>
</body>
</html>
