<?php 
session_start();
include('Config.php'); 



$student_id = $_SESSION['student_id']; 


if (isset($_GET['delete_course_id'])) {

    $delete_course_id = $_GET['delete_course_id'];


    $delete_sql = "DELETE FROM student_schedule WHERE student_id = '$student_id' 
    AND course_id = '$delete_course_id'";
   

   $delete_sql = "DELETE FROM student_schedule 

   WHERE student_id = '$student_id' AND course_id = '$delete_course_id'";
   if (mysqli_query($conn, $delete_sql)) {
    echo "<script>alert('Successfully deleted.');</script>";
    
   } else {
    echo "<script>alert('Not successfully deleted.');</script>";
      
   }
}
mysqli_query($conn, "UPDATE courses SET current_enrollment = current_enrollment  WHERE course_id = '$course_id'");

$sql = "SELECT courses.course_id, courses.course_name, courses.duration, courses.fee, courses.description, 
               courses.max_capacity, courses.current_enrollment, courses.start_date, courses.end_date, 
               courses.credits, courses.schedule, courses.instructor, courses.room_class 
        FROM student_schedule 
        JOIN courses ON student_schedule.course_id = courses.course_id
        WHERE student_schedule.student_id = '$student_id'";

$result = mysqli_query($conn, $sql);
mysqli_query($conn, "UPDATE courses SET current_enrollment = current_enrollment  WHERE course_id = '$course_id'");



?>

<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MyCourseSchedule </title>
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

        
        </ul>
    </section>
</header>



<section class="boxs">

<h2> My Course Schedule </h2>

<table>
    <tr>
        <th>Course ID</th>
        <th>Course Name</th>
        <th>Duration (days)</th>
        <th>Fee ($)</th>
        <th>Description</th>
        <th>Max Capacity</th>
        <th>Enrolled</th>
        <th>Start Date</th>
        <th>End Date</th>
        <th>Credits</th>
        <th>Schedule</th>
        <th>Instructor</th>
        <th>Room</th>
        <th>Add Courses </th>
    </tr>
   
    <?php
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . $row['course_id'] . "</td>";
        echo "<td>" . $row['course_name'] . "</td>";

        echo "<td>" . $row['duration'] . "</td>";
        echo "<td>" . $row['fee'] . "</td>";
        echo "<td>" . $row['description'] . "</td>";
            echo "<td>" . $row['max_capacity'] . "</td>";
        echo "<td>" . $row['current_enrollment'] . "</td>";
  echo "<td>" . $row['start_date'] . "</td>";
        echo "<td>" . $row['end_date'] . "</td>";
        echo "<td>" . $row['credits'] . "</td>";
          echo "<td>" . $row['schedule'] . "</td>";
        echo "<td>" . $row['instructor'] . "</td>";
        echo "<td>" . $row['room_class'] . "</td>";
        echo "<td><a href='MyCourseSchedule.php?delete_course_id=" . $row['course_id'] . "'>Delete</a></td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td>No courses in your schedule.</td></tr>";
}


mysqli_query($conn, "UPDATE courses SET current_enrollment = current_enrollment - 1 WHERE course_id = '$delete_course_id'");

?>

    </table>

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