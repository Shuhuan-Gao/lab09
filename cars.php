<?php
require_once "setting.php";
$dbconn = @mysqli_connect($host, $user, $pwd, $sql_db);

if ($dbconn) {
    $query = "SELECT * FROM cars";
    $result = mysqli_query($dbconn, $query);

    echo "<!DOCTYPE html>";
    echo "<html lang='en'><head><meta charset='UTF-8'><title>Car List</title></head><body>";
    echo "<h1>Used Cars</h1>";

    if (mysqli_num_rows($result) > 0) {
        echo "<table border='1'>";
        echo "<tr><th>Car ID</th><th>Make</th><th>Model</th><th>Price</th><th>Year</th></tr>";

        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $row['car_id'] . "</td>";
            echo "<td>" . $row['make'] . "</td>";
            echo "<td>" . $row['model'] . "</td>";
            echo "<td>" . $row['price'] . "</td>";
            echo "<td>" . $row['yom'] . "</td>";
            echo "</tr>";
        }

        echo "</table>";
    } else {
        echo "<p>There are no cars to display.</p>";
    }

    echo "</body></html>";
    mysqli_close($dbconn);
} else {
    echo "<p>Unable to connect to the database.</p>";
}
?>
