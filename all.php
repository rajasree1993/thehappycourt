<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sports_booking";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Set up default filter and sort values
$filterDate = isset($_GET['date']) ? $_GET['date'] : '';
$sortBy = isset($_GET['sort_by']) ? $_GET['sort_by'] : 'time_slot';
$sortOrder = isset($_GET['sort_order']) ? $_GET['sort_order'] : 'ASC';

// Create SQL query with filters and sorting
$sql = "SELECT * FROM bookings WHERE date LIKE ? ORDER BY $sortBy $sortOrder";
$stmt = $conn->prepare($sql);
$filterDate = "%$filterDate%";
$stmt->bind_param('s', $filterDate);

// Execute query
$stmt->execute();
$result = $stmt->get_result();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Table</title>
    <style>
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { padding: 8px 12px; border: 1px solid #ddd; text-align: left; }
        th a { color: #000; text-decoration: none; }
        .form-container { margin-bottom: 20px; }
    </style>
</head>
<body>
    <h1>Booking Table</h1>

    <!-- Filter Form -->
    <div class="form-container">
        <form method="GET" action="all.php">
            <label for="date">Date: </label>
            <input type="text" id="date" name="date" value="<?= htmlspecialchars($filterDate) ?>" placeholder="Search by date">
            
            <button type="submit">Filter</button>
        </form>
    </div>

    <!-- Employee Table -->
    <table>
        <thead>
            <tr>
                <th><a href="?sort_by=id&sort_order=<?= $sortOrder === 'ASC' ? 'DESC' : 'ASC' ?>">ID</a></th>
                <th><a href="?sort_by=username&sort_order=<?= $sortOrder === 'ASC' ? 'DESC' : 'ASC' ?>">Name</a></th>
                <th><a href="?sort_by=members&sort_order=<?= $sortOrder === 'ASC' ? 'DESC' : 'ASC' ?>">Members</a></th>
                <th><a href="?sort_by=date&sort_order=<?= $sortOrder === 'ASC' ? 'DESC' : 'ASC' ?>">date</a></th>
                <th><a href="?sort_by=time_slot&sort_order=<?= $sortOrder === 'ASC' ? 'DESC' : 'ASC' ?>">Phone number</a></th>
                <th><a href="?sort_by=time_slot&sort_order=<?= $sortOrder === 'ASC' ? 'DESC' : 'ASC' ?>">Time slot</a></th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?= $row['id'] ?></td>
                <td><?= $row['username'] ?></td>
                <td><?= $row['members'] ?></td>
                <td><?= $row['date'] ?></td>
                <td><?= $row['phone'] ?></td>
                <td><?= $row['time_slot'] ?></td>
            </tr>
            <?php endwhile; ?>
        </tbody>
    </table>

    <?php
    // Close connection
    $stmt->close();
    $conn->close();
    ?>
</body>
</html>
