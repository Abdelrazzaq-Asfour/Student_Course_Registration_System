
<?php
session_start();
include('Config.php');

if (!isset($_SESSION['AdminID'])) {
    header("Location: Admin_Login.php");
  
}




$course_sql = "SELECT * FROM courses";
$course_result = mysqli_query($conn, $course_sql);

$student_sql = "SELECT * FROM students";
$student_result = mysqli_query($conn, $student_sql);

$support_sql = "SELECT * FROM support";
$support_result = mysqli_query($conn, $support_sql);

$feedback_sql = "SELECT * FROM feedback";
$feedback_result = mysqli_query($conn, $feedback_sql);



if (isset($_GET['delete_course_id'])) {
    $course_id = $_GET['delete_course_id'];

   
    $check_sql = "SELECT * FROM courses WHERE course_id = '$course_id'";
    $check_result = mysqli_query($conn, $check_sql);

    if (mysqli_num_rows($check_result) > 0) {


        $delete_course_sql = "DELETE FROM courses WHERE course_id = '$course_id'";

        if (mysqli_query($conn, $delete_course_sql)) {
            echo "<script>alert('deleted  courses successfully.');</script>";
        

       
    } else {
        echo "<script>alert(' not deleted courses successfully.');</script>";
       

    }

 
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
        <i class="fa-solid fa-book"href='index.html' > SEWA BrightStart Academy </i>  <h1 href='index.html' ></h1>   
        </section>
        <h2 class="student_name"> 
        <?php


if (isset($_SESSION['AdminID'])) { 
    echo " Welcome, " . $_SESSION['AdminID'] .  "<br>"; 
    echo "<a href='LogOut.php'>logout</a>";
  
} else {
    
}
  ?> </h2> 
        <h2 class="student_name">  <?php     echo $AdminID ;  ?> </h2> 
    <section class="Navbar">
        <ul>
            <li><a href="index.html">Home</a></li>
            <li><a href="About_us.php">About Us</a></li>
            <li><a href="Contact_us.php">Contact_us</a></li>
          
        </ul>
    </section>
</header>
<section class="boxs">
<main>
    <h2>student and course and support request management</h2>

    <section>
    <a href="add_course.php" class="primary-btn">Add Course</a>

    </section>

    <h3>Available courses</h3>
    <table>
        <tr>
            <th>Course ID</th>
            <th>Course Name</th>
            <th>Duration (days)</th>
            <th>Fee ($)</th>
            <th>Description</th>
            <th>Max Capacity</th>
            <th>Start Date</th>
            <th>End Date</th>
            <th>Credits</th>
            <th>Instructor</th>
            <th>Room</th>
            <th>Options</th>
        </tr>
        <?php
if (mysqli_num_rows($course_result) > 0) {
    while($row = mysqli_fetch_assoc($course_result)) {
        echo "<tr>";
        echo "<td>" . $row['course_id'] . "</td>";

        echo "<td>" . $row['course_name'] . "</td>";
        echo "<td>" . $row['duration'] . "</td>";
        echo "<td>" . $row['fee'] . "</td>";

           echo "<td>" . $row['description'] . "</td>";
        echo "<td>" . $row['max_capacity'] . "</td>";
        echo "<td>" . $row['start_date'] . "</td>";

        echo "<td>" . $row['end_date'] . "</td>";
        echo "<td>" . $row['credits'] . "</td>";
          echo "<td>" . $row['instructor'] . "</td>";
        echo "<td>" . $row['room_class'] . "</td>";
        echo "<td>";
        echo "<a href='edit_course.php?edit_course_id=" . $row['course_id'] . "'>Update</a> | 
              <a href='student_course_management.php?delete_course_id=" . $row['course_id'] . "'>Delete</a>";
        echo "</td>";
        echo "</tr>";
    }
} else {
    echo "No Available courses";
}
?>

    </table>
   

    <h3> Table for Students</h3>
    <table>
        <tr>
            <th>Student ID</th>
            <th>Student Name</th>
            <th>Email</th>
            <th>Phone Number</th>
            <th>Options</th>
        </tr>
    
        <?php
if (mysqli_num_rows($student_result) > 0) {
    while($row = mysqli_fetch_assoc($student_result)) {
        echo "<tr>";
        echo "<td>" . $row['student_id'] . "</td>";

        echo "<td>" . $row['student_name'] . "</td>";
             echo "<td>" . $row['email'] . "</td>";
        echo "<td>" . $row['phone_number'] . "</td>";
        echo "<td>";
        echo "<a href='edit_student.php?edit_student_id=" . $row['student_id'] . "'>Update</a> | 
              <a href='student_course_management.php?delete_student_id=" . $row['student_id'] . "'>Delete</a>";
        echo "</td>";
        echo "</tr>";
    }
} else {
    echo "No Students Available";
}


if (isset($_GET['delete_student_id'])) {
    $student_id = $_GET['delete_student_id'];
    
    $delete_student_sql = "DELETE FROM students WHERE student_id = '$student_id'";

    if (mysqli_query($conn, $delete_student_sql)) {
        echo "<script>alert('  deleted student successfully .');</script>";
       

      

    } else {
        echo "<script>alert(' not deleted student successfully.');</script>";
      

        
    }
 
}
?>

    </table>

    <h3> Table for support request</h3>
    <table>
        <tr>
            <th>Request ID</th>
            <th>Student Name</th>

            <th>Support Type</th>
            <th>Request Date</th>
            <th>Done</th>
        </tr>
        <?php
if (mysqli_num_rows($support_result) > 0) {
    while ($row = mysqli_fetch_assoc($support_result)) {
        echo "<tr>";
        echo "<td>" . $row['request_id'] . "</td>";
        echo "<td>" . $row['student_name'] . "</td>";

        echo "<td>" . $row['support_type'] . "</td>";
         echo "<td>" . $row['request_date'] . "</td>";
        echo "<td>";
               echo "<a href='student_course_management.php?delete_support_id=" . $row['request_id'] . "'>Delete</a>";
        echo "</td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='5'>No support requests</td></tr>";
}



if (isset($_GET['delete_support_id'])) {
    $support_id = $_GET['delete_support_id'];
    $delete_support_sql = "DELETE FROM support WHERE request_id = '$support_id'";
    if (mysqli_query($conn, $delete_support_sql)) {
        echo "<script>alert('  deleted support successfully.');</script>";
 
       
    } else {
        echo "<script>alert('  not deleted support successfully.');</script>";

     
    }
   
}
?>

    </table>

    <h3> Table for FeedBack </h3>
    <table>
        <tr>
            <th>feedback Id</th>

            <th>comments</th>
        
            <th>Done</th>
        </tr>

    <?php
            if (mysqli_num_rows($feedback_result) > 0) {
                while ($row = mysqli_fetch_assoc($feedback_result)) {
                    echo "<tr>";
                    echo "<td>" . $row['feedback_id'] . "</td>";
              
                    echo "<td>" . $row['comments'] . "</td>";
                  
                    echo "<td>";
                    echo "<a href='student_course_management.php?delete_feedback_id=" . $row['feedback_id'] . "'>Delete</a>";
                    echo "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='5'>No feedback available</td></tr>";
            }


            if (isset($_GET['delete_feedback_id'])) {
                $feedback_id = $_GET['delete_feedback_id'];
                
                $delete_feedback_sql = "DELETE FROM feedback WHERE feedback_id = '$feedback_id'";
            
                if (mysqli_query($conn, $delete_feedback_sql)) {
                    echo "<script>alert('deleted feedback  successfully.');</script>";
                   
                } else {
                    echo "<script>alert(' no deleted  feedback successfully.');</script>";
                 
                }
            }
            
            ?>
        </table>

</main>
</section>
<footer class="footer">
    <p href='index.html'> &copy; 2025 BrightStart Academy </p>
    <h2>Contact Us</h2>
            <p>If you have any questions or need assistance, feel free to reach out to us:</p>
           
                <p><i class="fa-solid fa-phone"></i> +962 788-334-765 || <i class="fa-solid fa-envelope"></i> brightstart@go.com </p>
                <p><i class="fa-brands fa-facebook"></i> BrightStart || <i class="fa-brands fa-square-instagram"></i> BrightStart </p>
                <p><i class="fa-solid fa-fax"></i> +962 5-390-1950 || <i class="fa-solid fa-location-crosshairs"></i> 55 tash St, Amman, Jordan</p>
</footer>