<?php

$servername = "localhost"; 
$username = "root"; 
$password = ""; 
$dbname = "srf"; 
















// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$errors = []; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    var_dump($_POST); 

    // Validate first name
    if (empty(trim($_POST['firstName']))) {
        $errors[] = "First name is required.";
    } else {
        $firstName = trim($_POST['firstName']);
    }

    // Validate last name
    if (empty(trim($_POST['lastName']))) {
        $errors[] = "Last name is required.";
    } else {
        $lastName = trim($_POST['lastName']);
    }

    // Validate email
    if (empty(trim($_POST['email']))) {
        $errors[] = "Email is required.";
    } else {
        $email = trim($_POST['email']);
    }

    // Validate mobile
    if (empty(trim($_POST['mobile']))) {
        $errors[] = "Mobile number is required.";
    } else {
        $mobile = trim($_POST['mobile']);
    }

    // Format DOB (YYYY-MM-DD)
    $dob = trim($_POST['year'] . '-' . $_POST['month'] . '-' . $_POST['day']);

    // Initialize remaining fields
    $gender = isset($_POST['gender']) ? trim($_POST['gender']) : '';
    $address = isset($_POST['address']) ? trim($_POST['address']) : '';
    $city = isset($_POST['city']) ? trim($_POST['city']) : '';
    $pin = isset($_POST['pin']) ? trim($_POST['pin']) : '';
    $state = isset($_POST['state']) ? trim($_POST['state']) : '';
    $country = isset($_POST['country']) ? trim($_POST['country']) : '';

    // Handle hobbies, qualification, and courses (optional)
    $hobbies = isset($_POST['hobbies']) ? json_encode($_POST['hobbies']) : json_encode([]);
    $qualification = isset($_POST['qualification']) ? json_encode($_POST['qualification']) : json_encode([]);
    $courses = isset($_POST['course']) ? json_encode($_POST['course']) : json_encode([]);

    // Prepare and bind only if there are no errors
    if (empty($errors)) {
        // Prepare and bind
        $stmt = $conn->prepare("INSERT INTO students (first_name, last_name, dob, email, mobile, gender, address, city, pin, state, country, hobbies, qualification, courses) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        
        // Adjust bind_param to match the correct number of variables
        $stmt->bind_param("ssssssssssssss", $firstName, $lastName, $dob, $email, $mobile, $gender, $address, $city, $pin, $state, $country, $hobbies, $qualification, $courses);

        // Execute the statement
        if ($stmt->execute()) {
            echo "Registration successful!";
        } else {
            echo "Error: " . $stmt->error;
        }

        // Close the statement
        $stmt->close();
    } else {
        // Output errors
        foreach ($errors as $error) {
            echo "<p style='color:red;'>$error</p>";
        }
    }
}

// Close connection
$conn->close();
?>
