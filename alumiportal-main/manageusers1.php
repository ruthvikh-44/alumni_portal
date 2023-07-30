<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="adminmanageusers.css">
    <title>Admin manage users</title>
</head>
<body>
    <div id="header">
        <div class="container">
            <nav>
                <img src="images/logo1.png" alt="Logo Image" class="Logo">
                <ul id="sidemenu">
                    <li><a href="index.html">Home</a></li>
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
    <br><br>
    <h1 style="color:white; font-family: 'Times New Roman', Times, serif;font-size:40px;margin-left: 730px;">REGISTERED STUDENTS</h1>
    <br><br><br><br>
    <div class="tbl-header">
    <table cellpadding="100px" cellspacing="20px" border="1" class="datatable-1 table table-bordered table-striped	 display" width="100%">
									<thead>
										<tr>
											<th>#</th>
											<th>Name</th>
											<th>email</th>
											<th>registration no.</th>
											<th>phone number</th>
											<th>gender</th>
											
										</tr>
									</thead>
									<tbody>

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
    else{
        
        $sql="select * from students";
        $res=mysqli_query($conn,$sql);
        $cnt=1;
        while($row=mysqli_fetch_array($res))
        {
        ?>									
										<tr>
											<td style="color:black"><?php echo htmlentities($cnt);?></td>
											<td><?php echo htmlentities($row['name']);?></td>
											<td><?php echo htmlentities($row['email']);?></td>
											<td><?php echo htmlentities($row['reg']);?></td>
											<td><?php echo htmlentities($row['phone']);?></td>
											<td><?php echo htmlentities($row['gender']);?></td>
											
										</tr>
										<?php $cnt=$cnt+1; } }?>
										
								</table></div>
        </body>  