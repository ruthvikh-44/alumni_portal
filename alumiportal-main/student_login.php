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
        <form action="student_login.php" method="post">
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
            <input type="submit" value="Login" name="stulogin">
            <div class="card-signup-link">
                Not a member? <a href="registration.html">sign up</a>
            </div>

        </form>
    </div>
</body>
</html>
<?php 
$host='localhost';
$username='alum';
$pass='123';
$dbname='alum';
// $conn=mysqli_connect($host,$username,$pass,$dbname);
// if(!$conn){
//      die("Connection failed: " . mysqli_connect_error());
// }


// try{
//     $conn= new PDO("mysql:host=localhost;dbname=alum",$username,$pass);
// }
// catch(PDOException $e) {
//     echo "Connection failed: " . $e->getMessage();
//   }
include 'config.php';

if(isset($_POST['stulogin'])){
    $email=$_POST['email'];
    $pass=$_POST['pass'];
    
    $sql="SELECT * from students where  email='$email' and password='$pass'";
    $res=$conn->prepare($sql);
    $res->execute();

    if($res->rowCount()>0){
        $row=$res->fetch();
        session_start();
        $_SESSION['reg']=$row['reg'];
        $_SESSION['name']=$row['name'];
        $_SESSION['email']=$row['email'];
        $_SESSION['phone']=$row['phone'];
        $_SESSION['gender']=$row['gender'];
        header('location:dashstu.php');
    }else{
        header('location:student_login.php');
    }
}

?>