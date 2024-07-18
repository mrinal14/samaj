<?php
// Database configuration
$dbHost = 'localhost';
$dbUsername = 'root';
$dbPassword = '';
$dbName = 'chetna_samaj';

// Connect to MySQL database
$conn = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Prepare SQL statement to insert data into database
$sql = "INSERT INTO registration_details (full_name, birthday, email_id, mobile_number, birth_place, height, weight, education, occupation, income, father_name, father_occupation, father_income, photo)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

// Prepare and bind parameters
$stmt = $conn->prepare($sql);
$stmt->bind_param("ssssssssssssss", $full_name, $birthday, $email_id, $mobile_number, $birth_place, $height, $weight, $education, $occupation, $income, $father_name, $father_occupation, $father_income, $photo);

// Set parameters from POST data
$full_name = $_POST['full_name'];
$birthday = $_POST['birthday'];
$email_id = $_POST['email_id'];
$mobile_number = $_POST['mobile_number'];
$birth_place = $_POST['birth_place'];
$height = $_POST['height'];
$weight = $_POST['weight'];
$education = $_POST['education'];
$occupation = $_POST['occupation'];
$income = $_POST['income'];
$father_name = $_POST['father_name'];
$father_occupation = $_POST['father_occupation'];
$father_income = $_POST['father_income'];

// Handle file upload for photo
$photo = $_FILES['photo']['name']; // Get the name of the file
$target_dir = "uploads/"; // Directory where the file will be stored
$target_file = $target_dir . basename($_FILES['photo']['name']); // Path of the uploaded file

// Move uploaded file to specified directory
if (move_uploaded_file($_FILES['photo']['tmp_name'], $target_file)) {
    // File uploaded successfully, proceed with database insertion
    echo "The file ". htmlspecialchars(basename($_FILES["photo"]["name"])). " has been uploaded.";
} else {
    // Error in file upload
    echo "Sorry, there was an error uploading your file.";
}

// Execute prepared statement
if ($stmt->execute()) {
    echo "Records inserted successfully.";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close statement and connection
$stmt->close();
$conn->close();
?>
