<?php
session_start();
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="availop.css">
    <title>Avail Oppurtunities</title>
</head>
<body>
    <div id="header">
        <div class="container1">
            <nav>
                <img src="Images/logo1.png" alt="Logo Image" class="Logo">
                <ul id="sidemenu">
                    <li><a href="studir.php">Home</a></li>
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
    <div id="services">
        
            
        </div>
        <div class="container">
            <br>
            <h1 style="color: black; font-family: 'Times New Roman', Times, serifS;" class="sub-title">OPPORTUNITIES BY YOUR ALUMNI    🡳</h1>
             <div class="services-list">
              
               
                <?php
               //  $host='localhost';
               //  $username='alum';
               //  $pass='123';
               //  $dbname='alum';
               //  $conn=mysqli_connect($host,$username,$pass,$dbname);
               include 'config.php';
                $sql = "SELECT * from oppurtunities";
               //  $res = mysqli_query($conn,$sql);
               $res=$conn->prepare($sql);
               $res->execute();
                while($comr = $res->fetch()){                    
                    ?>
                    <div>
                    <p style="color: azure;">
                        <p>Company: <?php echo $comr['company'];?> <p>
                        <p> Role: <?php echo $comr['role'];?></p>
                        <p> Batch: <?php echo $comr['batch'];?></p>
                        <p> Salary: <?php echo $comr['salary'];?></p>
                        <p> Experience: <?php echo $comr['exp'];?></p>
                        <p> Lastdate: <?php echo $comr['lastdate'];?></p>
                        <button><a href="<?php echo $comr['link']; ?>">Apply</a></button>

            
                </p>

                </div>
                    <?php }?> 
                    
             </div>
        </div>

    </div>
    <div id="portals">
        <div class="container">
            <h1 style="color: black; font-family: 'Times New Roman', Times, serifS;" class="sub-title">JOB PORTALS    🡳</h1>
             <div class="portals-list">
                <div>
                   <a href="https://lnkd.in/d9P-awyk"> <h2>Google</h2></a>
                </div>
                <div>
                    <a href="https://lnkd.in/dZUCXNtY"> <h2>Microsoft</h2></a>
                 </div>
                 <div>
                    <a href="https://lnkd.in/dsAh4_aK"> <h2>Amazon</h2></a>
                 </div>
                 <div>
                    <a href="https://lnkd.in/dJH9EgA7"> <h2>Facebook</h2></a>
                 </div>
                 <div>
                    <a href="https://lnkd.in/d799Uk7k"> <h2>Apple</h2></a>
                 </div>
                 <div>
                    <a href="https://lnkd.in/da_jBtND"> <h2>IBM</h2></a>
                 </div>
                 <div>
                    <a href="https://lnkd.in/dYFwcvxv"> <h2>Intel</h2></a>
                 </div>
                 <div>
                    <a href="https://lnkd.in/dmbuGRDx"> <h2>Cisco</h2></a>
                 </div>
                 <div>
                    <a href="https://lnkd.in/dNeeNcFr"> <h2>Qualcomm</h2></a>
                 </div>
                 <div>
                    <a href="https://lnkd.in/d-Yrij36"><h2>Deloitte</h2></a>
                 </div>
                 <div>
                    <a href="https://lnkd.in/d2PDuJ5r"><h2>Uber</h2></a>
                 </div>

                 <div>
                    <a href="https://lnkd.in/dFH4VAbU"><h2>Adobe</h2></a>
                 </div>
                 <div>
                    <a href="https://lnkd.in/dgxPJrJp"><h2>Tesla</h2></a>
                 </div>
                 <div>
                    <a href="https://lnkd.in/dh3Y3aJr"><h2>Twitter</h2></a>
                 </div>
                 <div><a href="https://lnkd.in/d_tgkrTq"><h2>Visa</h2></a></div>
                 <div><a href="https://lnkd.in/dDrpSuXR"><h2>Walmart</h2></a></div>
                 <div><a href="https://lnkd.in/dgJi4Trj"><h2>Ford</h2></a></div>
                 <div><a href="https://lnkd.in/dGnuQKbZ"><h2>HP</h2></a></div>
                 <div><a href="https://lnkd.in/dMM_sQ2p"><h2>Netflix</h2></a></div>
                 <div>
                    <a href="https://lnkd.in/dDKrWFyb"><h2>Siemens</h2></a>
                 </div>
                
             </div>
        </div>

    </div>
</body>
</html>

<?php


?>