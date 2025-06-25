<?php
           if (isset($_SESSION['student_name'])) { 
         
            echo " Welcome, " . $_SESSION['student_name'] .  "<br>"; 
            echo "<a href='LogOut.php'>logout</a>";
          
        } else {
            echo "<a href='LogOut.php'>Login</a>";
        }
            ?>



