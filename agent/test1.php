<?php

include "../libs/load.php";

$data = getGroupOfAgent(2);

echo "<table border=1 >";
echo "<tr><th>ID</th><th>Admin ID</th><th>Username</th><th>Password</th></tr>";

foreach ($data as $row) {
    echo "<tr>";
    echo "<td>" . $row['id'] . "</td>";
    echo "<td>" . $row['admin_id'] . "</td>";
    echo "<td>" . $row['username'] . "</td>";
    echo "<td>" . $row['password'] . "</td>";
    echo "</tr>";
}

echo "</table>";
?>