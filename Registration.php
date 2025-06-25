

    <?php

include('Config.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $student_name =  $_POST['student_name'];
    $email = $_POST['email'];
    $phone_number =  $_POST['phone_number'];
    $password =  $_POST['password'];


    $sql = "INSERT INTO students (student_name, email, phone_number, password) 

            VALUES ('$student_name', '$email', '$phone_number', '$password')";

    $result = mysqli_query($conn, $sql);

    if ($result) {
        
        $student_id = mysqli_insert_id($conn);

        echo "<script>alert('successfully Registration ID Student is :  $student_id ');</script>";

        
     
    } else {
        echo "<script>alert('NOT successfully Registration.');</script>";

     
    }
}




?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
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
    <h2>New Student Registration</h2>
    <form action="Registration.php" method="post"><br>
    <label for="">Full name </label><br>
        <input type="text" name="student_name"  required><br>
        <label for="">Email </label><br>

        <input type="email" name="email"  required><br>
        <label for="">Phone Number</label><br>
        <input type="text" name="phone_number"  required><br>
        <label for="">password</label><br>
        <input type="password" name="password" required><br>
        <button type="submit">Register</button><br>
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




