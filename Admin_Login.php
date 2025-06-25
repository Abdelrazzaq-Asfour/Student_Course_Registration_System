<?php
session_start(); 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $AdminID = $_POST['AdminID'];
    $password = $_POST['password'];

    $loginAdmin = 'Admin';
    $loginpassword = '123456789';

    if ($AdminID === $loginAdmin && $password === $loginpassword) {

        $_SESSION['AdminID'] = $AdminID;

        header("Location: student_course_management.php");

    } else {
        echo "<script>alert('There is an input error.');</script>";
        
    }
}
?>

<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin_Login </title>
    <link rel="stylesheet" href="styles.css">
    <script src="https://kit.fontawesome.com/5e4bd050cc.js" crossorigin="anonymous"></script>
</head>
<body>

<header class="Header-Navbar">
<section class="logo">
<i class="fa-solid fa-book"  href='index.html' > SEWA BrightStart Academy </i>  <h1 href='index.html' ></h1>   
</section>
    <section class="Navbar">
        <ul>
        
                <li><a href="index.html ">Home</a></li>
                <li><a href="About_us.php">About Us</a></li>
                <li><a href="Courses.php">Courses</a></li>
                <li><a href="Contact_us.php">Contact_us</a></li>
                <li><a href="Registration.php">Registration</a></li>
                <li><a href="student_course_management.php">Student course management</a></li>

            
        </ul>
    </section>
</header>

<section class="boxs">  
    <h2>Admin Login</h2><br>


    <form action="Admin_Login.php" method="POST">
        <label for="">Admin ID</label><br>
        <input type="text" name="AdminID" required><br>

        <label for="">Password</label><br>
        <input type="password" name="password" required><br>
        
        <button type="submit" class="primary-btn">Enter</button>
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
