<?php
$servername = "localhost";
$username = "root";
$password = "101601";
$dbname = "sakila";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT c.first_name, c.last_name, a.address, a.district, ci.city, a.postal_code, GROUP_CONCAT(f.title) AS film_titles
        FROM customer c
        LEFT JOIN address a ON c.address_id = a.address_id
        LEFT JOIN city ci ON a.city_id = ci.city_id
        LEFT JOIN rental r ON c.customer_id = r.customer_id
        LEFT JOIN inventory i ON r.inventory_id = i.inventory_id
        LEFT JOIN film f ON i.film_id = f.film_id
        GROUP BY c.customer_id
        ORDER BY c.last_name";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table border='1'>
            <tr>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Address</th>
                <th>District</th>
                <th>City</th>
                <th>Postal Code</th>
                <th>Film Titles</th>
            </tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>".$row["first_name"]."</td>
                <td>".$row["last_name"]."</td>
                <td>".$row["address"]."</td>
                <td>".$row["district"]."</td>
                <td>".$row["city"]."</td>
                <td>".$row["postal_code"]."</td>
                <td>".$row["film_titles"]."</td>
              </tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}

$conn->close();
?>
