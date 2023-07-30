<?php
	$flag = true;
	if(isset($_POST["submit"])) {

        $name = $_POST["name"];
        $email = $_POST["email"];
        $reg = $_POST['reg'];
        $phone = $_POST["phone"];
        $pwd = $_POST["pwd"];
        $conpwd = $_POST["conpwd"];
        $gender = $_POST["gender"];

		if (empty($_POST["name"])) {
            echo "Name is Required";
            echo "<br>";

			$flag = false;
		} 
        else {
			#$name = test_input($_POST["name"]);
            if(!preg_match("/^[a-zA-Z ]*$/",$name)) {
                echo "Only letters and white spaces are allowed";
                echo "<br>";
                $flag = false;
                #$nameErr = "Only letters and white spaces are allowed"
            }
		}


		if (empty($email)) {
			echo "Email is required";
            echo "<br>";
            $flag = false;
		} 
        else {
            if (!filter_var($email,FILTER_VALIDATE_EMAIL)) {
                echo "Invalid Email";
                echo "<br>";
                $flag = false;
            }
		}

        if (strlen($pwd)<8) {
            echo "Must contain atleast 8 characters";
            echo "<br>";
            $flag = false;
        }

        if ($conpwd != $pwd) {
            echo "Must enter the above same password";
            echo "<br>";
            $flag = false;
        }

        if (empty($phone)) {
			$phoneErr = "Phone is required";
            echo "<br>";
			$flag = false;
		} 
        else 
        {
			#$phone = test_input($_POST["phone"]);
            if(!preg_match("/^([0-9]{10})$/",$phone))
            {
			    echo "Invalid phone number";
                echo "<br>";
                $flag = false;
	    	}
		}
        if (empty($reg)) {
			$phoneErr = "Gender is required";
            echo "<br>";
			$flag = false;
		} 

		// submit form if validated successfully
		if ($flag) {
            echo "Name : ".$name;
            echo "<br>";
            echo "Email : ".$email;
            echo "<br>";
            echo "Phone : ".$phone;
            echo "<br>";
            echo "Gender : ".$gender;
            echo "<br>";
            // echo "dob : ".$dob;
            // echo "<br>";

            // $host = 'localhost';
            // $username = 'alum';
            // $password = '123';
            // $dbname = 'alum';

			// $conn = mysqli_connect($host, $username, $password, $dbname);

			// if ($conn) {
            //     echo "Connection successful.";
            // }
            // else{
            //     echo "Connection Failed.";
            //     die("Connection Failed:".mysqli_connect_error());
            // }
            include 'config.php';
			
			$sql = "INSERT INTO students ( name,email,reg,phone,gender,password) 
            VALUES('$name', '$email', '$reg', '$phone','$gender','$pwd') ";
            // $upload = mysqli_query($conn,$sql);
            $stmt=$conn->prepare($sql);
            $stmt->execute();
            if($stmt){
                echo "New details have been entered!";
                echo "<script> alert('data saved successfully');</script>";
                session_start();
                $_SESSION['name']=$name;
                $_SESSION['email']=$email;
                $_SESSION['reg']=$reg;
                $_SESSION['phone']=$phone;
                $_SESSION['gender']=$gender;
                
                header('location:dashstu.php');
            }
            // else{
            //     echo "Error:".$sql."".mysqli_error($conn);
            // }

		}
	}

	
	?>