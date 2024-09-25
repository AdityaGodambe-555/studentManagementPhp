<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Management</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="h-screen flex flex-col bg-green-50">
<div class="nav flex justify-around items-center p-4 bg-yellow-100 shadow-md">
    <a href="index.php" class="text-gray-800 font-semibold hover:text-gray-600">Teacher Dashboard</a>
    <?php 
        if(isset($_SESSION['uid'])){
    ?>
    <strong class="text-gray-800">Welcome, <?php echo $_SESSION['uname'] ?></strong>
    <a href='logout.php' class="text-gray-800 hover:text-gray-600 ml-4">Logout</a>
    <?php
        }
        else{
    ?>
    <div class="flex gap-6">
        <a href="login.php" class="text-gray-800 hover:text-gray-600">Login</a>
        <a href="register.php" class="text-gray-800 hover:text-gray-600">Register</a>
    </div>
    <?php
        }
    ?>
</div>

