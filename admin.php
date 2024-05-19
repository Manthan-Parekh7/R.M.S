<?php
// Include config file
include('config.php');

if (!$link) {
    die("Database connection failed.");
}
$encodedEmail = $_GET['eid'];
$email = base64_decode(urldecode($encodedEmail));

if($email == "r1@gmail.com"){
    echo "owner1";
    $sql = "SELECT * FROM r1";
}
else if($email == "r2@gmail.com"){
    echo "owner2";
    $sql = "SELECT * FROM r2";
}
else if($email == "r3@gmail.com"){
    echo "owner3";
    $sql = "SELECT * FROM r3";
}
else if($email == "r4@gmail.com"){
    echo "owner4";
    $sql = "SELECT * FROM r4";
}
else if($email == "r5@gmail.com"){
    echo "owner5";
    $sql = "SELECT * FROM r5";
}
else if($email == "r6@gmail.com"){
    echo "owner6";
    $sql = "SELECT * FROM r6";
}


// Attempt select query execution
if ($result = mysqli_query($link, $sql)) {
    if (mysqli_num_rows($result) > 0) {
        echo '<table>';
        echo "<thead>";
        echo "<tr>";
        echo "<th>Table</th>";
        echo "<th>Value</th>";
        echo "<th>Email Id</th>";
        echo "<th>Action</th>";
        echo "</tr>";
        echo "</thead>";
        echo "<tbody>";
        while ($row = mysqli_fetch_array($result)) {
            $id = $row['id'];
            echo "<tr>";
            echo "<td>" . $row['id'] . "</td>";
            echo "<td>" . $row['value'] . "</td>";
            echo "<td>" . $row['email'] . "</td>";
            echo "<td>";
            echo "<a href='update.php?eid=$email&id=$id'>Update Record</a>";
            echo "&nbsp;";
            echo "</td>";
            echo "</tr>";
        }
        echo "<tr>";
        echo "</tr>";
        echo "</tbody>";
        echo "</table>";
        // Free result set
        mysqli_free_result($result);
    } else {
        echo '<em>No records were found.</em>';
    }
} else {
    echo "Oops! Something went wrong. Please try again later.";
}

// Close connection
mysqli_close($link);