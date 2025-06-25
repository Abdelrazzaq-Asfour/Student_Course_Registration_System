<?php
session_start();
include('Config.php');


    
if (!isset($_SESSION['student_id'])) {
    header("Location: Student_Login.php");
    exit();
}

$student_id = $_SESSION['student_id']; 

// $student_name = $_SESSION['student_name']; 

$sql = "SELECT * FROM students WHERE student_id = '$student_id'";
$result = mysqli_query($conn, $sql);
if ($result && mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
   
} else {
    echo "Error in  Profile  ";
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $new_name =  $_POST['student_name'];

    $new_email =  $_POST['email'];
    $new_phone =  $_POST['phone_number'];
    
    $update_sql = "UPDATE students SET student_name = '$new_name', email = '$new_email', 
    phone_number = '$new_phone'  WHERE student_id = '$student_id'";
    
    if (mysqli_query($conn, $update_sql)) {
     
        echo "<script>alert('successfully UPDATE students.');</script>";

        
    } else {
        echo "<script>alert('Error UPDATE students.');</script>";

    }
}
?>

<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile </title>
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
        <li><a href="Profile.php">Profile</a></li>
        <li><a href="Academic_Guidance.php">Academic_Guidance</a></li>

        
        </ul>
    </section>
</header>

<main>









<section class="boxs"> 
        <form action="Profile.php" method="POST">
            <label for="">Full Name :</label>
            <input type="text" name="student_name" value="<?php echo isset($row['student_name']) ? $row['student_name'] : ''; ?>" ><br>

            <label for=""> Email:</label>
            <input type="email" name="email" value="<?php echo isset($row['email']) ? $row['email'] : ''; ?>" ><br>

            <label for="">Phone Number:</label>
            <input type="text" name="phone_number" value="<?php echo isset($row['phone_number']) ? $row['phone_number'] : ''; ?>" ><br>



            <button type="submit" class="primary-btn">Updated Data student</button>
        </form>


        <a href="MyCourseSchedule.php" class="primary-btn">My Course Schedule</a>
        <a href="feedback.php" class="primary-btn">Sent feedback</a>
        <a href="support_request.php" class="primary-btn">Support Request</a>





    </section>
    <footer class="footer">
    <p href='index.html'> &copy; 2025 BrightStart Academy </p>
    <h2>Contact Us</h2>
            <p>If you have any questions or need assistance, feel free to reach out to us:</p>
           
                <p><i class="fa-solid fa-phone"></i> +962 788-334-765 || <i class="fa-solid fa-envelope"></i> brightstart@go.com </p>
                <p><i class="fa-brands fa-facebook"></i> BrightStart || <i class="fa-brands fa-square-instagram"></i> BrightStart </p>
                <p><i class="fa-solid fa-fax"></i> +962 5-390-1950 || <i class="fa-solid fa-location-crosshairs"></i> 55 tash St, Amman, Jordan</p>
</footer>
</main>

</body>
</html>
