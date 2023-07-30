<?php 
session_start();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="dashal.css">
    <title>Admin Dashboard</title>
</head>
<body>
    <div id="header">
        <div class="container">
            <nav>
                <img src="images/logo1.png" alt="Logo Image" class="Logo">
                <ul id="sidemenu">
                    <li><a href="dashal.php">Home</a></li>
                    <!-- <li><a href="index.html/#services">Information</a></li>
                    <li><a href="index.html/#logins">Sign up</a></li>
                    <li><a href="index.html/#contact">contact</a></li> -->
                    <li><a href="#">Logout</a></li>
                    <i class="fa-solid fa-x" onclick="closemenu()"></i>
                </ul>
                <i class="fa-solid fa-bars" onclick="openmenu()" ></i>
            </nav>
        </div>
    </div>

    <div class="back">
    <div id="services">
            <h1 class="sub-title">Features</h1>
             <div class="services-list">
             <form action="dashdmin.php" method='post'>
                <div class="MS">
                    <i class="fa-solid fa-graduation-cap" style="color: #ffffff;"></i>
                    <button  type="submit" name='viewfunds'><h2>View Funds</h2></button>
                    
                    
                </div>

                <div class="Gr">
                    <i class="fa-solid fa-money-bill" style="color: #ffffff;"></i>
                    <button type='submit' name='allotscholar'><h2>Allot Scholarships</h2></button>
                    
                    
                </div>
                <div class="Po">
                    <i class="fa-solid fa-users-between-lines" style="color: #ffffff;"></i>
                    <button type='submit' name='verifyalum'><h2>Verify Alumni</h2></button>
                    
                    
                </div>
                <div class="Don">
                    <i class="fa-solid fa-users-between-lines" style="color: #ffffff;"></i>
                    
                    <button type='submit' name='manageusers'><h2>Manage Users</h2></button>
                    
                    <!-- <a href="https://rzp.io/l/jcljF6r"> -->
                </div>
                <div class="Co">
                <i class="fa-solid fa-users-between-lines" style="color: #ffffff;"></i>
                <button type='submit' name='news'><h2>Post News</h2></button>
                </div>
                </form>
             </div> 

    </div>
</div>
</body>
</html>
<?php 
if(isset($_POST['viewfunds'])){
    header('location:https://dashboard.razorpay.com/?next=app/dashboard&');
}else if(isset($_POST['allotscholar'])){
    header('location:allotscholar.php');

}else if(isset($_POST['verifyalum'])){
    header('location:verifyalum.php');
}else if(isset($_POST['manageusers'])){
    header('location:manageusers1.php');
}else if(isset($_POST['news'])){
    header('location:news.php');
}

?>


