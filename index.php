<?php 
session_start();
require_once 'db-connect.php';
if(empty($_SESSION['logged_in'])){
    header('location: login.php');
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
    <title>index</title>
</head>
<body>
    <h1 class="text-center" >
        Hello <?=$_SESSION['user']['first_name']?> <?php echo $_SESSION['user']['last_name']?>
    </h1>
    <table class="table table-striped">
            <tr>
                <th>First name</th><th>Last name</th><th>Registered date</th>
            </tr>
            <?php
                $query2 = mysqli_query($con, "SELECT * FROM users"); 
                $x = 0;
                while ($row = mysqli_fetch_array($query2)) {
            ?>
                    <tr>
                        <td> <?php echo $row['first_name']; ?></td>
                        <td> <?php echo $row['last_name']; ?></td>
                        <td> <?php echo date('d/m/Y',$row['registered_date']); ?></td>
                    </tr>
                
             <?php $x += 1;} ?>

        </table>
        <a href="logout.php" class="">Logout</a>
</body>
</html>