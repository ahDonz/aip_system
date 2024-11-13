
<?php
session_start();  // Start the session

// Redirect to login page if the user is not logged in or the status is not 'department'
if (!isset($_SESSION['department_email']) || $_SESSION['status'] !== 'department') {
    header("Location: router.php?page=login");  // Redirect to login page if the user is not logged in or does not have 'department' status
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="public/css/style.css">
</head>
<body>
    <div class="container">
        <?php include 'public/components/side-bar.php' ?>
        <div class="main">
            <div class="header">
                <div class="header-left-side">
                 <h1><?php echo isset($title) ? $title : 'Default Title'; ?></h1>
                </div>
                <div class="header-right-side">
                    <div class="bell">
                    <i class="fa-solid fa-bell"></i>
                    </div>
                    <div class="user"> 
                    <li class="nav-link has-dropdown">
                            <a href="#" class="has-dropdown logged">
                                <!-- Display the department email from session -->
                                <?php 
                                    echo $_SESSION['department_email'];  // Display the email stored in session
                                ?>
                            </a>
                        </li>
                    </div>
                </div>
            </div>