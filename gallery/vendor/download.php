<?php
require 'config.php'; // Ensure this file contains your database connection details

// Fetch data from the database
$query = "SELECT full_name, birthday, email_id, mobile_number, birth_place, height, weight, education, occupation, income, father_name, father_occupation, father_income, photo FROM registration_details";
$result = mysqli_query($conn, $query);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Registration Details</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Registration Details</h1>
    <table border="1" cellpadding="4" cellspacing="0">
        <thead>
            <tr>
                <th>Full Name</th>
                <th>Birthday</th>
                <th>Email ID</th>
                <th>Mobile Number</th>
                <th>Birth Place</th>
                <th>Height</th>
                <th>Weight</th>
                <th>Education</th>
                <th>Occupation</th>
                <th>Income</th>
                <th>Father's Name</th>
                <th>Father's Occupation</th>
                <th>Father's Income</th>
                <th>Photo</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                <tr>
                    <td><?php echo htmlspecialchars($row['full_name']); ?></td>
                    <td><?php echo htmlspecialchars($row['birthday']); ?></td>
                    <td><?php echo htmlspecialchars($row['email_id']); ?></td>
                    <td><?php echo htmlspecialchars($row['mobile_number']); ?></td>
                    <td><?php echo htmlspecialchars($row['birth_place']); ?></td>
                    <td><?php echo htmlspecialchars($row['height']); ?></td>
                    <td><?php echo htmlspecialchars($row['weight']); ?></td>
                    <td><?php echo htmlspecialchars($row['education']); ?></td>
                    <td><?php echo htmlspecialchars($row['occupation']); ?></td>
                    <td><?php echo htmlspecialchars($row['income']); ?></td>
                    <td><?php echo htmlspecialchars($row['father_name']); ?></td>
                    <td><?php echo htmlspecialchars($row['father_occupation']); ?></td>
                    <td><?php echo htmlspecialchars($row['father_income']); ?></td>
                    <td><img src="uploads/<?php echo htmlspecialchars($row['photo']); ?>" width="50" alt="Photo"></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</body>
</html>
