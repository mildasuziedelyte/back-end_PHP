<?php

// if (isset($_GET['need_redirect']) && 'true' == $_GET['need_redirect']) {
//     header('Location: http://localhost/paskaitos/1221nd/5dest-blue.php');
//     die;
// }
if (isset($_GET['need_redirect'])) {
    header('Location: http://localhost/paskaitos/1221nd/5dest-blue.php');
    die;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    body{
        background-color:red;
    }
    body a{
        color: white;
    }
</style>
<body>
    <!-- <a href="?need_redirect=true">Linkas</a> -->
    <a href="?need_redirect">Linkas</a>
</body>
</html>