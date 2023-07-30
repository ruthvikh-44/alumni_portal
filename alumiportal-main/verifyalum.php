<?php 
session_start();
$host='localhost';
$username='alum';
$pass='123';
$dbname='alum';
$conn=mysqli_connect($host,$username,$pass,$dbname);
if(!$conn){
     die("Connection failed: " . mysqli_connect_error());
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="mentrr.css">
    <title>Dashboard</title>
</head>
<body>

    <div id="header">
        <div class="container">
            <nav>
                <img src="images/logo1.png" alt="Logo Image" class="Logo">
                <ul id="sidemenu">
                    <li><a href="index.html">Home</a></li>

                    <li><a href="logout_s.php">Logout</a></li>
                    <i class="fa-solid fa-x" onclick="closemenu()"></i>
                </ul>
                <i class="fa-solid fa-bars" onclick="openmenu()" ></i>
            </nav>
        </div>
    </div>
    <div class="back">
    <div id="services">
            <h1 style="font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;" class="sub-title" align="center" >MENTORS</h1>
             <div class="services-list">
             
        <?php 
        
            $sql="SELECT * from mentor";
            $resi=mysqli_query($conn,$sql);

            $i=1;
            while($rows=mysqli_fetch_assoc($resi)){
            ?>

        
                <div id="odiv">
                <section class="procon">
                    <div class="card">
                      <div class="image">
                        <img src="2.jpeg" alt="">
                      </div>
                      <h2><?php echo $rows['fname'];?></h2>
                     <p>
                        <table  cellspacing="10px" cellpadding="0px">
                           
                            <tr>
                                <th>Company: </th>
                                <td><?php echo $rows['company']; ?></td>
                            </tr>
                            <tr>
                                <th>Designation: </th>
                                <td><?php echo $rows['design'];?></td>
                            </tr>
                            <tr>
                                <th>Experience: </th>
                                <td><?php echo $rows['exp']." "; ?> Years</td>
                            </tr>
                            <tr>
                                <th>Email: </th>
                                <td><?php echo $rows['email']." "; ?> </td>
                            </tr>
                            <tr>
                                <th>Phone: </th>
                                <td><?php echo $rows['phone']." "; ?> </td>
                            </tr>
                            <tr>
                                <th>Gender: </th>
                                <td><?php echo $rows['Gender']." "; ?></td>
                            </tr>
                            <button><a href="echo $rows['linkedin']">Linkedin</a></button>
                            <button><a href="">Resume</a></button>
                        </table>
                        
                        <button type="submit" id="rebut"  name="<?php echo $i; ?>" >Verify</button>


                     </p>
                    </div>
                </div>

    <?php $i++;    }?>

                            </div>
            
                        
             </div>

    </div></form>
</body>
</html>
