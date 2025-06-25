<?php
session_start();
include('Config.php'); 
include('Login.php'); 

if (isset($_GET['edit_student_id'])) {
    $student_id = $_GET['edit_student_id'];

    $student_sql = "SELECT * FROM students WHERE student_id = '$student_id'";
    $student_result = mysqli_query($conn, $student_sql);

    if (mysqli_num_rows($student_result) > 0) {

        $row = mysqli_fetch_assoc($student_result); 
    } else {
        echo "Invalid student name.";
    }
}

if (isset($_POST['update_student'])) {
    $student_name = $_POST['student_name'];

    $email = $_POST['email'];
    $phone_number = $_POST['phone_number'];

    $update_sql = "UPDATE students SET student_name='$student_name', email='$email', phone_number='$phone_number'
     WHERE student_id='$student_id'";
    if (mysqli_query($conn, $update_sql)) {
        echo "<script>alert('Student data updated successfully.');</script>";
        
    } else {
        echo "<script>alert('Error updating student data.');</script>";

    }
}
?>

<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data student</title>
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
<h2>Edit Data student</h2>

<form action="edit_student.php?edit_student_id=<?php echo $student_id; ?>" method="POST">
    <label> Full name :</label><br>
    <input type="text" name="student_name" value="<?php echo isset($row['student_name']) ? $row['student_name'] : ''; ?>" ><br>

    <label> Email:</label><br>
    <input type="email" name="email" value="<?php echo isset($row['email']) ? $row['email'] : ''; ?>" ><br>

    <label> Phone Number:</label><br>
    <input type="text" name="phone_number" value="<?php echo isset($row['phone_number']) ? $row['phone_number'] : ''; ?>" ><br>

    <button type="submit" name="update_student">Update Data student</button>
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
