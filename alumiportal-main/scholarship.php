<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="scholarship.css">

    <title>Scholarship</title>
</head>
<body>
    <div id="header">
        <div class="container">
            <nav>
                <img src="images/2.png" alt="Logo Image" class="Logo">
                <ul id="sidemenu">
                    <li><a href="studir.php">Home</a></li>
                    <li><a href="logof.php">Logout</a></li>
                    <i class="fa-solid fa-x" onclick="closemenu()"></i>
                </ul>
                <i class="fa-solid fa-bars" onclick="openmenu()" ></i>
            </nav>
        </div>
    </div>
    
        <h1 style="color:black; margin-top: -10px;" align="center">SCHOLARSHIPS FOR SUCCESS</h1>
        <div class="instr">
        <br>
        <h2 style="color:black; margin-left: 50px;">Instructions and Eligibility Criteria</h2>
        <br>
        <ol>
            <li>The annual income of your parents should be less than Rs. 4,00,000. As a proof of this, you must have to submit the income certificate.</li>
            <br>
            <li>You must have CGPA of 8.5 or above to get a chance to avail a scholarship.</li>
            <br>
            <li>Gather all necessary application materials, which may include transcripts, essays, recommendation letters, and resumes.</li>
            <br>
            <li>Typos and spelling mistakes in the cover letters or LORs should be avoided for better consideration.</li>
            <br>
            <li>Don't exaggerate your grades, memberships, skills, or qualifications on scholarship applications. If found guilty your application will not be considered and you will be blocked from applying any further.</li>
            <br>
            <li>If you are selected for a scholarship, you will typically receive an acceptance letter or email. Follow the instructions provided to accept the scholarship and associated terms and conditions.</li>
            <br>
            <li>Once you receive a scholarship, be sure to maintain your eligibility by meeting any requirements, such as maintaining a certain GPA and enrolling in a certain number of credit hours.</li>
        </ol>
    </div>
    <div class="apply">
        <br>
        <h2 style="color:black; margin-left: 50px;">Application form</h2>
        <br>
        <form action="scholarship.php" method="post" class="input-group" enctype="multipart/form-data">
                    <input type="text" class="input-field" name="name" placeholder="Name" required>
                    <input type="text" class="input-field" name="dept" placeholder="Department" required>
                    <input type="email" class="input-field" name="email" placeholder="Email" required>
                    <input type="number" class="input-field" name="reg" placeholder="Registered Number" required>
                    <input type="number" class="input-field" name="year" placeholder="Year Of Study" required>
                    <br><br>
                    <p style="color: black; display: inline;">Resume:</p>
                   
                    <input type="file" id="file1" name="files1[]" multiple="multiple">
                    <br><br>
                    <p style="color: black; display: inline;">Income Certificate:</p>
                    <input type="file" id="file2" name="files2[]" multiple="multiple">
                    <br><br>
                    <p style="color: black; display: inline;">Letter Of Recommendation:</p>
                    <input type="file" id="file3" name="files3[]" multiple="multiple">
                    <br><br>
                    <input type="submit" name="scholarsub"  class="submit-btn"  value="Apply">
        </input>
        </form>

    </div>

    </body>
    </html>
    <?php 
    $host='localhost';
    $username='alum';
    $pass='123';
    $dbname='alum';
    $conn=mysqli_connect($host,$username,$pass,$dbname);
    if(!$conn){
         die("Connection failed: " . mysqli_connect_error());
    }
    session_start();
  
    // $name=$_SESSION['name'];
    // $depart=$_SESSION['depart'];
    // $email=$_SESSION['email'];
    // $roll=$_SESSION['sroll'];
    // $year=$_SESSION['syear'];
 


    if(isset($_POST['scholarsub'])){
        $name=$_POST['name'];
        $depart=$_POST['dept'];
        $email=$_POST['email'];
        $roll=$_POST['reg'];
        $year=$_POST['year'];
        $resume="";
        $income="";
        $lor="";

        $res=array();
       
$upload_dir1 = "sresume/"; // folder to upload files for input field with name "files1[]"
$upload_dir2 = "sincome/"; // folder to upload files for input field with name "files2[]"
$upload_dir3="slor/";


	// loop through each uploaded file for input field with name "files1[]"
	foreach($_FILES['files1']['tmp_name'] as $key => $tmp_name ){
	    $file_name1 = $_FILES['files1']['name'][$key];
	    $file_size1 = $_FILES['files1']['size'][$key];
	    $file_tmp1 = $_FILES['files1']['tmp_name'][$key];
	    $file_type1 = $_FILES['files1']['type'][$key];

	    $file_path1 = $upload_dir1 . $file_name1;
	    move_uploaded_file($file_tmp1, $file_path1);
	}

	// loop through each uploaded file for input field with name "files2[]"
	foreach($_FILES['files2']['tmp_name'] as $key => $tmp_name ){
	    $file_name2 = $_FILES['files2']['name'][$key];
	    $file_size2 = $_FILES['files2']['size'][$key];
	    $file_tmp2 = $_FILES['files2']['tmp_name'][$key];
	    $file_type2 = $_FILES['files2']['type'][$key];

	    $file_path2 = $upload_dir2 . $file_name2;
	    move_uploaded_file($file_tmp2, $file_path2);
	}
    foreach($_FILES['files3']['tmp_name'] as $key => $tmp_name ){
	    $file_name3 = $_FILES['files3']['name'][$key];
	    $file_size3 = $_FILES['files3']['size'][$key];
	    $file_tmp3 = $_FILES['files3']['tmp_name'][$key];
	    $file_type3 = $_FILES['files3']['type'][$key];

	    $file_path3 = $upload_dir3 . $file_name3;
	    move_uploaded_file($file_tmp3, $file_path3);
	}






        
    $sql="INSERT INTO scholar(name, department, email, roll, year, resume, income, lor) VALUES ('$name','$depart','$email','$roll','$year','$file_path1','$file_path2','$file_path3')";
    $res=mysqli_query($conn,$sql);
    echo "<script>alert('Scholarship result posted');</script>";
    header('location:dashstu.php');
    }
   


    
    ?>