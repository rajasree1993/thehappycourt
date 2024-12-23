<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sports_booking"; // Replace with your actual database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Your array to compare (this array can come from POST or predefined)
$array = ["6am-7am", "7am-8am", "8am-9am", "9am-10am", "10am-11am", "3pm-11pm"]; // Example array

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the POST request contains the parameter (for example: category_id)
if (isset($_POST['date'])) {
    $date = $_POST['date'];

    // SQL query to fetch data based on category (or any other filter)
    $sql = "SELECT time_slot FROM bookings WHERE date = '$date' ";  // Replace with your query
    $result = $conn->query($sql);

// Fetch the database results into an array
$dbArray = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $dbArray[] = $row['time_slot'];  // Assuming the column name is 'time_slot'
    }
}

$notInDB = array();

foreach($array as $item){    // Loop the teacher_array
  if(!in_array($item,$dbArray)){   // If the dbArray value doesn't exist in the array, add the value
    $notInDB[] = $item;
  }
}

// If there are no unmatched elements, return an empty array
if (empty($notInDB)) {
    echo json_encode([]);  // Return an empty array if no unmatched items
} else {
    // Return the result as JSON
    echo json_encode($notInDB);
}
}
// Close the connection
$conn->close();
?>