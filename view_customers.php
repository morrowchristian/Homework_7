<?php
// Database connection setup - Assuming sakila database exists
$servername = "localhost";
$username = "username"; // Replace with your username
$password = "password"; // Replace with your password
$dbname = "sakila";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Query to fetch customer data along with films rented by each customer
$sql = "SELECT c.first_name, c.last_name, a.address, a.city, a.district, a.postal_code, GROUP_CONCAT(f.title SEPARATOR ', ') AS film_titles 
        FROM customer c
        LEFT JOIN address a ON c.address_id = a.address_id
        LEFT JOIN rental r ON c.customer_id = r.customer_id
        LEFT JOIN inventory i ON r.inventory_id = i.inventory_id
        LEFT JOIN film f ON i.film_id = f.film_id
        GROUP BY c.customer_id
        ORDER BY c.last_name";

$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Customers</title>
</head>
<body>
    <table border="1">
        <tr>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Address</th>
            <th>City</th>
            <th>District</th>
            <th>Postal Code</th>
            <th>Film Titles</th>
        </tr>
        <?php
        if ($result->num_rows > 0) {
            // output data of each row
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>".$row["first_name"]."</td>
                        <td>".$row["last_name"]."</td>
                        <td>".$row["address"]."</td>
                        <td>".$row["city"]."</td>
                        <td>".$row["district"]."</td>
                        <td>".$row["postal_code"]."</td>
                        <td>".$row["film_titles"]."</td>
                    </tr>";
            }
        } else {
            echo "0 results";
        }
        ?>
    </table>
    <button onclick="window.location.href='manager.html'">Back to Manager</button>
</body>
</html>
<?php
$conn->close();
?>
