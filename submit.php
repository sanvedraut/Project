<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Database configuration
    $db_host = "localhost"; // Change to your database host if needed
    $db_user = "root"; // Change to your database username
    $db_pass = ""; // Change to your database password
    $db_name = "admission_form"; // Change to your database name

    // Create a database connection
    $conn = new mysqli($db_host, $db_user, $db_pass, $db_name);

    // Check the connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Process the form data
    $name = $_POST["name"];
    $email = $_POST["email"];
    $dob = $_POST["dob"];
    $gender = $_POST["gender"];
    $phone = $_POST["phone"];
    $aadhar = $_POST["aadhar"];
    $entranceMarks = $_POST["entranceMarks"];
    $degree = $_POST["degree"];
    $course = $_POST["course"];
    $address = $_POST["address"];

    // Insert the data into the database
    $sql = "INSERT INTO applicants (name, email, dob, gender, phone, aadhar, entranceMarks, degree, course, address)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssssdsss", $name, $email, $dob, $gender, $phone, $aadhar, $entranceMarks, $degree, $course, $address);

    if ($stmt->execute()) {
        echo "Data inserted successfully!";
    } else {
        echo "Error: " . $conn->error;
    }

    // Close the database connection
    $stmt->close();
    $conn->close();
}
?>
