<?php 
session_start();
include('Config.php'); 
?>




<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Academic Guidance </title>
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
    

       
    
        <strong> <h2>Time Management:</h2></strong>
    
        <h2>
            Organize your time between studying and university activities. Use a calendar or apps to keep track of exams and assignment deadlines.
            Make sure to schedule breaks to stay refreshed and focused
        </h2>
    
             <h2><strong>Focus on Important Courses:</strong></h2>
        <h2>
            Pay more attention to courses that you find challenging. Review them early to avoid cramming at the last minute.
            <h2>
    
     

            <button type="button"onclick="document.getElementById('demo').innerHTML = Date()"> Click me to display Date and Time.</button>
            <p id="demo"></p>
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