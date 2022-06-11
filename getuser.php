<?php

include 'db.php';

// Start the session
session_start();

if (isset($_SESSION['userid']))
{
    $id = $_SESSION['userid'];

    $sql = "SELECT * FROM authentication WHERE id = $id";
    $result = $conn->query($sql);



    if ($result->num_rows > 0) {

             while($row = $result->fetch_assoc()) {

                $name = $row['name'];
                $gender = $row['gender'];
                $email = $row['email'];
             }


    }
}

?>