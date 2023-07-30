<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="login.css">
    <title>Login</title>
</head>
<body>
    <div class="form-card">
        <h1>Login</h1>
        <form action="mentor_login.php" method="post">
            <div class="card-text">
                <input type="email" name='email' required>
                <label for="">Email</label>
                <span></span>
            </div>
            <div class="card-text">
                <input type="password" name='pass' required>
                <label for="">Password</label>
                <span></span>
            </div>
            <div class="card-pass">Forgot Password?</div>
            <input type="submit" value="Login" name="menlogin">
            <div class="card-signup-link">
                Not a member? <a href="mentor_reg.html">sign up</a>
            </div>

        </form>
    </div>
</body>
</html>
<?php 
include 'config.php';
if(isset($_POST['menlogin'])){
    $email=$_POST['email'];
    $pass=$_POST['pass'];
    $sql="SELECT * from mentor where email='$email' and pass='$pass'";
    $res=$conn->prepare($sql);
    $res->execute();
    if($res->rowCount()>0){
        $row=$res->fetch();
        session_start();
        $_SESSION['mid']=$row['mid'];
        $_SESSION['fname']=$row['fname'];
        $ems=$row['email'];
        $_SESSION['email']=$ems;            
        $_SESSION['phone']=$row['phone'];
        $_SESSION['company']=$row['company'];
        $_SESSION['design']=$row['design'];
        $_SESSION['exp']=$row['exp'];
        $_SESSION['linkedin']=$row['linkedin'];
        // $_SESSION['gender']=$row['Gender'];
        $_SESSION['emailuuuu']=$ems;
        $_SESSION['passworduuuu']=$pass;
        header('location:dashal.php');
    }else{
        header('location:mentor_login.php');
    }
}

?>