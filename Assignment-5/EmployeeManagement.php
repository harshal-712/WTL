<!DOCTYPE html>
<html lang="en">
<head>
</head>
<body>
    <form action="" method="post">
    <link rel="stylesheet" href="styles.css">
        <table>
            <tr>
                <td>Employee ID:<input type="text" name="ID" required></td>
            </tr>
            <tr>
                <td>Name:<input type="text" name="name" required></td>
            </tr>
            <tr>
                <td>Email:<input type="email"  name="email" required></td>
            </tr>
            <tr>
                <td>Mobile No:<input type="number"  name="phone" required></td>
            </tr>
            <tr>
                <td>Department:<input type="text" name="Department" required></td>
            </tr>
            <tr>
                <td>Salary:
                    <input type="number" id="salary" name="salary" required></td>
            </tr>
        </table>
                    <input type="submit" name="b1" value="Add"/>
                    <input type="submit" name="b2" value="Update"/>
                    <input type="submit" name="b3" value="Delete"/>
                    <input type="submit" name="b4" value="Display"/>

    </form>

<?php
$servername = "localhost";
$username = "root";
$password = "Harshal@712";
$dbname = "WTL";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $ID = $_POST['ID'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $department = $_POST['Department'];
    $salary = $_POST['salary'];

    if (isset($_POST['b1'])) { 
        $sql = "INSERT INTO employees (ID, name, email, phone, department, salary) 
                VALUES ('$ID', '$name', '$email', '$phone', '$department', '$salary')";
        if ($conn->query($sql) === TRUE) {
            echo "<p>Employee Added Successfully!</p>";
        } else {
            echo "<p>Error: " . $conn->error . "</p>";
        }
    } 
    
    elseif (isset($_POST['b2'])) { 
        $sql = "UPDATE employees SET name='$name', email='$email', phone='$phone', department='$department', salary='$salary' WHERE ID='$ID'";
        if ($conn->query($sql) === TRUE) {
            echo "<p>Employee Updated Successfully!</p>";
        } else {
            echo "<p>Error: " . $conn->error . "</p>";
        }
    } 
    
    elseif (isset($_POST['b3'])) { 
        $sql = "DELETE FROM employees WHERE ID='$ID'";
        if ($conn->query($sql) === TRUE) {
            echo "<p>Employee Deleted Successfully!</p>";
        } else {
            echo "<p>Error: " . $conn->error . "</p>";
        }
    } 
    
    elseif (isset($_POST['b4'])) {
        $sql = "SELECT * FROM employees";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            echo "<table border='1'><tr><th>ID</th><th>Name</th><th>Email</th><th>Phone</th><th>Department</th><th>Salary</th></tr>";
            while($row = $result->fetch_assoc()) {
                echo "<tr><td>".$row["ID"]."</td><td>".$row["name"]."</td><td>".$row["email"]."</td><td>".$row["phone"]."</td><td>".$row["department"]."</td><td>".$row["salary"]."</td></tr>";
            }
            echo "</table>";
        } else {
            echo "<p>No Employees Found!</p>";
        }
    }
}

$conn->close();
?>
</body>
</html>
