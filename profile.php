<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
    <head>
    </head>
    <?php include 'header.php'; ?>
    <body>
        <?php
            if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']) {
                $username = $_SESSION['username'];
                $first = $_SESSION['firstName'];
                $last = $_SESSION['lastName'];
                $email = $_SESSION['email'];
                // $address = $_SESSION['address'];
                $session_id = $username;
                echo "<h2> &#160;&#160;&#160; $first $last's Profile Information</h2><br/>";
                echo "<p>Username: $username<br/>";
                echo "First: $first<br/>";
                echo "Last: $last<br/>";
                echo "Email: $email</br>";
                // echo "Address: $address</p>";
            }
            else {
                header("Location: signIn.php");
                exit();
            }
        ?>
    </body>

</html>
