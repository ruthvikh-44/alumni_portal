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
    <title>Dashboard</title>
</head>
<body>
    <div id="header">
        <div class="container">
            <nav>
                <img src="images/2.png" alt="Logo Image" class="Logo">
                <ul id="sidemenu">
                    <li><a href="dashal.php">Home</a></li>
                    <!-- <li><a href="index.html/#services">Information</a></li>
                    <li><a href="index.html/#logins">Sign up</a></li>
                    <li><a href="index.html/#contact">contact</a></li> -->
                    <li><a href="logof.php">Logout</a></li>
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
             <form action="dashal.php" method='post'>
                <div class="MS">
                    <i class="fa-solid fa-graduation-cap" style="color: #ffffff;"></i>
                    <button  type="submit" name='mentorship'><h2>Mentorship</h2></button>
                    <!-- <a href="mentor.php">Mentorship</a> -->
                    
                </div>

                <div class="Gr">
                    <i class="fa-solid fa-money-bill" style="color: #ffffff;"></i>
                    <button type='submit' name='conevent'><h2>Conduct Events</h2></button>
                    
                    
                </div>
                <div class="Po">
                    <i class="fa-solid fa-users-between-lines" style="color: #ffffff;"></i>
                    <button type='submit' name='oppur'><h2>Employment Oppurtunities</h2></button>
                    
                    
                </div>
                <div class="Don">
                    <i class="fa-solid fa-users-between-lines" style="color: #ffffff;"></i>
                    
                    <button type='submit' name='funds'><h2>Donate Funds</h2></button>
                    
                    <!-- <a href="https://rzp.io/l/jcljF6r"> -->
                </div>
                </form>
             </div> 

    </div>
</div>
</body>
</html>
<?php 
if(isset($_POST['mentorship'])){
    header('location:mentor.php');
}else if(isset($_POST['conevent'])){
    header('location:conevent.php');

}else if(isset($_POST['oppur'])){
    header('location:empop.php');
}else if(isset($_POST['funds'])){
    header('location:https://rzp.io/l/jcljF6r');
}

?>