<?php
$insert = false;

if(isset($_POST['name'])){

$server = "localhost";
$username = "root";
$password = "";

$con= mysqli_connect($server,$username,$password);

if(!$con){
    die("connection to this database failed due to" . mysqli_connect_error());
}
$name = $_POST['name'];
$gender = $_POST['gender'];
$age = $_POST['age'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$desc = $_POST['desc'];

$sql = "INSERT INTO `admission`.`table` ( `Name`, `Age`, `Gender`, `Email`, `Phone`, `Other`, `dd`) VALUES ('$name', '$age', '$gender', '$email', '$phone', '$desc', current_timestamp());";

if($con->query($sql) == true){
//   echo "successfully inserted";
$insert = true;
}
else{
    echo "error $sql <br> $con->error";
}

$con->close();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admission Form </title>
</head>
<link href="https://fonts.googleapis.com/css?family=Roboto|Sriracha&display=swap" rel="stylesheet">
<link rel="stylesheet" href="style.css">

<body>
    <img class="bg" src="bg.jpg" alt="MITS">
    <div class="container">
        <h1>Welcome to MITS Gwalior</h1>
        <p>Enter your details and submit this form for Admission purpose</p>

        <?php 
        if($insert == true){
          echo "<p class='submitmsg'>Thanks for submitting this form we will contact you soon</p>";
        }
        ?>


        <form action="index.php" method="post">

            <input type="text" name="name" id="name" placeholder="Enter your name">
            <input type="text" name="age" id="age" placeholder="Enter your age">
            <input type="text" name="gender" id="gender" placeholder="Enter your gender">
            <input type="text" name="email" id="email" placeholder="Enter your email">
            <input type="text" name="phone" id="phone" placeholder="Enter your phone">
            <textarea name="desc" id="desc" cols="30" rows="10"
                placeholder="Enter any other information here"></textarea>
            <button class="btn">Submit</button>


        </form>

    </div>
    <script src="script.js"></script>
    <!-- INSERT INTO `table` (`S.no`, `Name`, `Age`, `Gender`, `Email`, `Phone`, `Other`, `dd`) VALUES ('1', 'Test', '23', 'male', 'this@this.com', '1234567898', 'dfasdfasdfasfdasdfasdf', current_timestamp()); -->

</body>

</html>