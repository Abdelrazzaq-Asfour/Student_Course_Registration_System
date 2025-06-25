<?php 
// session_start();
// include('Config.php'); 

?>

<?php
session_start();
include('Config.php');

if (!isset($_SESSION['student_id'])) {
    header("Location: Student_Login.php");
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $student_id = $_SESSION['student_id']; 
    $comments =  $_POST['comments']; 

        $sql = "INSERT INTO feedback (student_id, comments) 

    VALUES ('$student_id', '$comments')";
    $result =mysqli_query($conn, $sql);

    if ($result) {
        
        echo "<script>alert('Done Sent feedback.');</script>";
       
    }else {
        echo "<script>alert('Not Done Sent feedback.');</script>";

    }

    
   
    
}
    

?>




<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feedback</title>
    <link rel="icon" href="images/Screenshot 2025-01-03 170532.png" type="image/x-icon">
    <link rel="stylesheet" href="styles.css">
    <script src="https://kit.fontawesome.com/5e4bd050cc.js" crossorigin="anonymous"></script>
</head>
<body>

<header class="Header-Navbar">
<section class="logo">
<i class="fa-solid fa-book"  href='index.html' > SEWA BrightStart Academy </i>  <h1 href='index.html' ></h1>   
</section>
    <h2 class="student_name">  <?php     echo $student_name ; include('Login.php');  ?> </h2> 


    <section class="Navbar">
        <ul>
        <li><a href="index.html ">Home</a></li>
                <li><a href="About_us.php">About Us</a></li>
                <li><a href="Courses.php">Courses</a></li>
                <li><a href="Contact_us.php">Contact_us</a></li>
                <li><a href="Registration.php">Registration</a></li>
                <li><a href="Profile.php">Profile</a></li>
        </ul>
    </section>
</header>

<section class="boxs">

    <h2>Add feedback </h2>
    <form action="feedback.php" method="POST">
        <label for=""></label><br>
        <textarea name="comments" required></textarea><br>
        <br>
        <button type="submit" class="primary-btn">Sent feedback  </button> <br>
    </form>
    </section>
    <footer class="footer">
    <p href='index.html'> &copy; 2025 BrightStart Academy </p>
    <h2>Contact Us</h2>
            <p>If you have any questions or need assistance, feel free to reach out to us:</p>
           
                <p><i class="fa-solid fa-phone"></i> +962 788-334-765 || <i class="fa-solid fa-envelope"></i> brightstart@go.com </p>
                <p><i class="fa-brands fa-facebook"></i> BrightStart || <i class="fa-brands fa-square-instagram"></i> BrightStart </p>
                <p><i class="fa-solid fa-fax"></i> +962 5-390-1950 || <i class="fa-solid fa-location-crosshairs"></i> 55 tash St, Amman, Jordan</p>
</footer>
</body>
</html>
