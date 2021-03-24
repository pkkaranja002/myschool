<?php
$servername = "Localhost";
$username = "root";
$password = "";
$dbname = "myschool";
 

 //create conection
$conn = new mysqli("$servername","$username","$password","$dbname");

//we check connection
if($conn->connect_error) {
	die("connection failed" . $conn->connect_error);
}
echo "connected successfully!";

//creation of database School

// $sql= " CREATE DATABASE myschool";

// //verifying connection

// if($conn->query($sql) === TRUE){
// 	echo"database created successfully!<br>";
// }else{
// 	echo"database not created!:<br>" . $conn->error;
// }

// creating table students
// $sql=" CREATE TABLE Students(
// id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
// studentname VARCHAR(30) NOT NULL,
// email VARCHAR(50),
// phonenumber VARCHAR (15) NOT NULL,
// gender VARCHAR(250) NOT NULL,
// age VARCHAR (250) NOT NULL,
// studentimage VARCHAR(250) NOT NULL,
// reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
// )";
// //verifying connection

// if($conn->query($sql) === TRUE){
// 	echo"table created successfully!<br>";
// }else{
// 	echo"table not created!:<br>" . $conn->error;
// }
$name = $age = $email = $phone = $gender =  '';
$studentimage = '';

//update variables
$id = 0;
$update = false;
$newTarget = '';

//variables for errors
$nameErr = $ageErr = $emailErr = $phoneErr = $genderErr = '';

//check if submit is clicked 
if (isset($_POST['save'])) {
	

    //this is the path that will store the images 
    $target = "studentImages/" .basename($_FILES['studentimage']['name']);


  if (empty($_POST['studentname'])) {
      # code..
      $nameErr = "Student cannot be empty";  
  } else {
    $name = $_POST['studentname'];
   // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
      $nameErr = "Only letters and white space allowed";
    }
  }


  if (empty($_POST['email'])) {
      # code..
      $emailErr = "Email cannot be empty";  
  } else {
    $email = $_POST['email'];
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format";
    }
  }


  if (empty($_POST['phonenumber'])) {
      # code..
      $phoneErr = "Phone Input cannot be empty";  
  } else {
    $phone = $_POST['phonenumber'];

  }




  if (empty($_POST['gender'])) {
      # code..
      $genderErr = "Gender cannot be empty";  
  } else {
    $gender = $_POST['gender'];

  }





  if (empty($_POST['age'])) {
      # code..
      $ageErr = "Age cannot be empty";  
  } else {
    $age = $_POST['age'];

  }


  $studentimage = $_FILES['studentimage']['name'];



if (empty($nameErr)) {
    # code...
    $stmt = $conn->prepare("INSERT INTO students (studentname,email,phoneNumber,gender,age,studentimage) VALUES (?,?,?,?,?,?)");
    $stmt->bind_param("ssssis",$name,$email,$phone,$gender,$age,$studentimage);


    if ($stmt->execute() === TRUE) {
    //get last inserted id
    // $last_id = $conn->insert_id;
    # code...
    //here moving uploaded file to the folder
    move_uploaded_file($_FILES['studentimage']['tmp_name'], $target);
    echo "record created <br>  " ;
    echo "<script>
         alert('image moved');

    </script>";
    // header('location: index.php');
    // header('location: connection.php'); //redirec$conn->close();
        } else {
            echo "record not created <br>" . $conn->error;
        }  //execution of the query  
        } //check error variables if empty
        else {
            echo "invalid details";
        }
}
// close
$conn->close();



?>