<?php
session_start();

if (!isset($_SESSION['login_Un51k4'])) {

    header("Location: login.php?message=" . urlencode("Mengakses fitur harus login dulu bro."));
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ratu Bilqis</title>
</head>
<body>
    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Cupiditate voluptates deserunt sapiente asperiores quos voluptate nesciunt unde, sint quaerat explicabo perspiciatis beatae fugiat. Officiis saepe ut et rerum at tempora!</p>
</body>
</html>