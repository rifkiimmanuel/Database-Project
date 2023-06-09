<?php
include_once("config.php");
session_start();

// set variables
$err = "";
$username = "";
$rememberme = ""; 

// check if form submitted
if(isset($_POST['login'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    $rememberme = isset($_POST['rememberme']);

    if($username == '' or $password == ''){
        $err .= "<li>Silakan masukkan username dan juga password.</li>";
    } else {
        $sql1 = "SELECT * FROM login WHERE username = '$username'";
        $q1 = mysqli_query($conn, $sql1);
        if (mysqli_num_rows($q1) == 0) {
            $err .= "<li>Username <b>$username</b> tidak tersedia.</li>";
        } else {
            $r1 = mysqli_fetch_array($q1);
            if($r1['password'] != md5($password)){
                $err .= "<li>Password yang dimasukkan tidak sesuai.</li>";
            } else {
                $role = $r1['role'];
            }
        }

        if(empty($err)){
            $_SESSION['session_username'] = $username;
            $_SESSION['session_password'] = md5($password);
            $_SESSION['session_role'] = $role;

            if($rememberme == 1){
                $cookie_name = "cookie_username";
                $cookie_value = $username;
                $cookie_time = time() + (60 * 60 * 24 * 30);
                setcookie($cookie_name, $cookie_value, $cookie_time, "/");

                $cookie_name = "cookie_password";
                $cookie_value = md5($password);
                $cookie_time = time() + (60 * 60 * 24 * 30);
                setcookie($cookie_name, $cookie_value, $cookie_time, "/");
            }
            
            if($role == 'admin'){
                header("location:indexowner.php");
            } else {
                header("location:index.php");
            }
        }
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="UTF-8">
 <meta http-equiv="X-UA-Compatible" content="IE=edge">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <title>Login</title>
<link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
</head>
<body>
<div class="container my-4">    
 <div id="loginbox" style="margin-top:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">                    
     <div class="panel panel-info" >
         <div class="panel-heading">
             <div class="panel-title">Login</div>
         </div>      
         <div style="padding-top:30px" class="panel-body" >
             <?php if($err){ ?>
                 <div id="login-alert" class="alert alert-danger col-sm-12">
                     <ul><?php echo $err ?></ul>
                 </div>
             <?php } ?>                
             <form id="loginform" class="form-horizontal" action="" method="post" role="form">       
                 <div style="margin-bottom: 25px" class="input-group">
                     <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                     <input id="login-username" type="text" class="form-control" name="username" value="<?php echo $username ?>" placeholder="username">                                        
                 </div>
                 <div style="margin-bottom: 25px" class="input-group">
                     <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                     <input id="login-password" type="password" class="form-control" name="password" placeholder="password">
                 </div>
                 <div class="input-group">
                     <div class="checkbox">
                     <label>
                         <input id="login-remember" type="checkbox" name="rememberme" value="1" <?php if($rememberme == '1') echo "checked"?>> Remember username
                     </label>
                     </div>
                 </div>
                 <div style="margin-top:10px" class="form-group">
                     <div class="col-sm-12 controls">
                         <input type="submit" name="login" class="btn btn-success" value="Login"/>
                     </div>
                 </div>
             </form>    
         </div>                     
     </div>  
     <a href="loginowner.php"> log in as restaurant</a>
     <br></br>
 <a href ="login.php"> log in as customer</a>
 <br></br>
 <a href ="register.php"> Don't have account? register now </a>
 </div>

</div>
</body>
</html>