<?php
session_start();

require_once 'functions.php';
require_once 'pages.php';

if(!auth_is_logged_in()){
    $_SESSION['origin'] = 'index.php';
    redirect('auth_page.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Awesome cinema page</title>
</head>
<body>
    <form action="query_logout.php">
        <input type="hidden" name="origin" value="index.php">
        <input type="submit" value="Logout">
    </form>
    <?php page_movielist('Movies', $_SESSION['user']) ?>
    <?php if(is_admin($_SESSION['user'])) page_add_movie() ?>
</body>
</html>