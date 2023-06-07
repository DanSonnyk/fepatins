<?php
# Session Logout after in activity 
function sessionX(){ 
    $logLength = 3; # time in seconds :: 1800 = 30 minutes 
    $ctime = strtotime("now"); # Create a time from a string 
    # If no session time is created, create one 
    if(!isset($_SESSION['sessionX'])){  
        # create session time 
        $_SESSION['sessionX'] = $ctime;  
    }else{ 
        # Check if they have exceded the time limit of inactivity 
        if(((strtotime("now") - $_SESSION['sessionX']) > $logLength) && isLogged()){ 
            # If exceded the time, log the user out 
            logOut(); 
            # Redirect to login page to log back in 
            header("Location: /login.php"); 
            exit; 
        }else{ 
            # If they have not exceded the time limit of inactivity, keep them logged in 
            $_SESSION['sessionX'] = $ctime; 
        } 
    } 
} 
# Run Session logout check 
sessionX(); 
?>