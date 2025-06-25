<?php 
session_start();

include('Config.php'); 

if (!isset($_SESSION['AdminID'])) {
    header("Location: Admin_Login.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {


$course_name = $_POST['course_name'];
$duration = $_POST['duration'];
$fee = $_POST['fee'];

$description = $_POST['description'];

$max_capacity = $_POST['max_capacity'];
   $credits = $_POST['credits'];
$start_date = $_POST['start_date'];

$end_date = $_POST['end_date'];
$schedule = $_POST['schedule'];

$instructor = $_POST['instructor'];
$room_class = $_POST['room_class'];


$sql = "INSERT INTO courses (course_name, duration, fee, 
description, max_capacity, current_enrollment, 
start_date, end_date, credits, 
schedule, instructor, room_class)

VALUES ( '$course_name', '$duration', '$fee', '$description', '$max_capacity', 0, '$start_date', 
        '$end_date', '$credits', '$schedule', '$instructor', '$room_class')";

if    (mysqli_query($conn, $sql)) {

    echo "<script>alert('  add  Courses successfully.');</script>";

    


} else   {

    echo "<script>alert(' not add  Courses successfully.');</script>";

    
}
}

?>

<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add new course</title>
    <link rel="icon" href="images/Screenshot 2025-01-03 170532.png" type="image/x-icon">
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
        <li>   
                <li><a href="index.html ">Home</a></li>
                <li><a href="About_us.php">About Us</a></li>
                <li><a href="Courses.php">Courses</a></li>
                <li><a href="Contact_us.php">Contact_us</a></li>
                <li><a href="Registration.php">Registration</a></li>
                <li><a href="student_course_management.php">student course management</a></li>

            
        </ul>
    </section>
</header>
<section class="boxs">  
<h2>Add new course</h2>

<form action = "add_course.php" method ="post" > <br>
<label>Course Name: </label><br>
    <input type="text" name="course_name"  required><br>
    <label>time </label><br>

    <input type="text" name="duration" required><br>
    <label>Fee  ($):</label><br>
    <input type="number" name="fee"  required><br>
    <label>Description:</label><br>
    <textarea name="description"required></textarea><br>
    <label>Maximum Capacity:</label><br>
    <input type="number" name="max_capacity"  required><br>
    <label>Credits:</label><br>

    <input type="number" name="credits"  required><br>
    <label>Start Date:</label><br>
    <input type="date" name="start_date" required><br>
    <label>End Date:</label><br>
    <input type="date" name="end_date" required><br>

    <label>days </label><br>
    <input type="text" name="schedule"  required><br>
    <label>Instructor:</label><br>
  <input type="text" name="instructor" required><br>
    <label>Classroom :</label><br>
    <input type="text" name="room_class" required><br>
    <button type="submit">add </button><br>

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



