<?php
session_start();
include('Config.php'); 
include('Login.php'); 

if (isset($_GET['edit_course_id'])) {
    $course_id = $_GET['edit_course_id'];

    $course_sql = "SELECT * FROM courses WHERE course_id = '$course_id'";
    $course_result = mysqli_query($conn, $course_sql);

    if (mysqli_num_rows($course_result) > 0) {
        $row = mysqli_fetch_assoc($course_result); 
        
    } else {
        echo "<script>alert('Invalid course ID.');</script>";

    }
}


if (isset($_POST['update_course'])) {
    $course_name = $_POST['course_name'];
    $duration = $_POST['duration'];
    $fee = $_POST['fee'];
    $description = $_POST['description'];
    $max_capacity = $_POST['max_capacity'];
    $start_date = $_POST['start_date'];
    $end_date = $_POST['end_date'];
    $credits = $_POST['credits'];
    $instructor = $_POST['instructor'];
    $room_class = $_POST['room_class'];

    $update_sql = "UPDATE courses SET course_name='$course_name',   duration='$duration',  fee='$fee',  description='$description',
       max_capacity='$max_capacity',   start_date='$start_date',   end_date='$end_date',   credits='$credits',   instructor='$instructor',   room_class='$room_class'    WHERE course_id='$course_id'";
    
    if (mysqli_query($conn, $update_sql)) {
        echo "<script>alert('The course updated successfully.');</script>";

    } else {
        echo "<script>alert('NOT  successfully updated.');</script>";
       
    }
}
?>

<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit course</title>
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
                <li><a href="index.html ">home</a></li>
                <li><a href="About_us.php">About Us</a></li>
                <li><a href="Courses.php">Courses</a></li>
                <li><a href="Contact_us.php">Contact_us</a></li>
                <li><a href="Registration.php">Registration</a></li>
                <li><a href="student_course_management.php">student course management</a></li>

            
        </ul>
    </section>
</header>
<section class="boxs">

<h2>Edit course</h2>

<form action="edit_course.php?edit_course_id=<?php echo $course_id; ?>" method="POST">
    <label>Course Name :</label><br>
    
    <input type="text" name="course_name" value="<?php echo isset($row['course_name']) ? $row['course_name'] : ''; ?>"><br>

    <label>Time (duration):</label><br>
    <input type="text" name="duration" value="<?php echo isset($row['duration']) ? $row['duration'] : ''; ?>"><br>

    <label>Fee ($):</label><br>
    <input type="number" name="fee" value="<?php echo isset($row['fee']) ? $row['fee'] : ''; ?>"><br>

    <label>Description:</label><br>

    <textarea name="description"><?php echo isset($row['description']) ? $row['description'] : ''; ?></textarea><br>

    <label>Maximum Capacity:</label><br>

    <input type="number" name="max_capacity" value="<?php echo isset($row['max_capacity']) ? $row['max_capacity'] : ''; ?>"><br>

    <label>Start Date:</label><br>
    <input type="date" name="start_date" value="<?php echo isset($row['start_date']) ? $row['start_date'] : ''; ?>"><br>

    <label>End Date:</label><br>
    <input type="date" name="end_date" value="<?php echo isset($row['end_date']) ? $row['end_date'] : ''; ?>"><br>

    <label>Days:</label><br>
    <input type="text" name="schedule" value="<?php echo isset($row['schedule']) ? $row['schedule'] : ''; ?>"><br>

    <label>Credits:</label><br>
    <input type="number" name="credits" value="<?php echo isset($row['credits']) ? $row['credits'] : ''; ?>"><br>

    <label>Instructor:</label><br>
    <input type="text" name="instructor" value="<?php echo isset($row['instructor']) ? $row['instructor'] : ''; ?>"><br>

    <label>Class Room:</label><br>
    <input type="text" name="room_class" value="<?php echo isset($row['room_class']) ? $row['room_class'] : ''; ?>"><br>

    <button type="submit" name="update_course">Update Course</button>

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


