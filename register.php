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
    // Sanitize and validate first name
    $firstName = !empty(trim($_POST['firstName'])) ? htmlspecialchars(trim($_POST['firstName'])) : '';
    if (empty($firstName)) {
        $errors[] = "First name is required.";
    }

    // Sanitize and validate last name
    $lastName = !empty(trim($_POST['lastName'])) ? htmlspecialchars(trim($_POST['lastName'])) : '';
    if (empty($lastName)) {
        $errors[] = "Last name is required.";
    }

    // Sanitize and validate email
    $email = !empty(trim($_POST['email'])) ? htmlspecialchars(trim($_POST['email'])) : '';
    if (empty($email)) {
        $errors[] = "Email is required.";
    } else {
        // Check if email already exists
        $emailCheckQuery = "SELECT * FROM students WHERE email = ?";
        $stmt = $conn->prepare($emailCheckQuery);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();
        
        if ($result->num_rows > 0) {
            $errors[] = "The email address is already registered.";
        }

        $stmt->close();
    }

    // Sanitize and validate mobile
    $mobile = !empty(trim($_POST['mobile'])) ? htmlspecialchars(trim($_POST['mobile'])) : '';
    if (empty($mobile)) {
        $errors[] = "Mobile number is required.";
    }

    // Validate DOB (Ensure it's in the correct format)
    if (empty(trim($_POST['year'])) || empty(trim($_POST['month'])) || empty(trim($_POST['day']))) {
        $errors[] = "Valid date of birth is required.";
    } else {
        $dob = trim($_POST['year'] . '-' . $_POST['month'] . '-' . $_POST['day']);
        if (!strtotime($dob)) {
            $errors[] = "Invalid date of birth.";
        }
    }

    // Initialize remaining fields (sanitize where applicable)
    $gender = isset($_POST['gender']) ? htmlspecialchars(trim($_POST['gender'])) : '';
    $address = isset($_POST['address']) ? htmlspecialchars(trim($_POST['address'])) : '';
    $city = isset($_POST['city']) ? htmlspecialchars(trim($_POST['city'])) : '';
    $pin = isset($_POST['pin']) ? htmlspecialchars(trim($_POST['pin'])) : '';
    $state = isset($_POST['state']) ? htmlspecialchars(trim($_POST['state'])) : '';
    $country = isset($_POST['country']) ? htmlspecialchars(trim($_POST['country'])) : '';

    // Handle hobbies, qualification, and courses (optional)
    $hobbies = isset($_POST['hobbies']) ? json_encode($_POST['hobbies']) : json_encode([]);
    $qualification = isset($_POST['qualification']) ? json_encode($_POST['qualification']) : json_encode([]);
    $courses = isset($_POST['course']) ? json_encode($_POST['course']) : json_encode([]);

    // Handle errors and show alert in JavaScript
    if (!empty($errors)) {
        $errorMessages = implode("\\n", $errors); // Corrected from `$error` to `$errors`
        echo "<script>alert('Errors: \\n" . $errorMessages . "'); window.location.href='index.php';</script>";
        exit; // Stop further execution after showing error and redirecting
    } else {
        // Prepare and bind only if there are no errors
        $stmt = $conn->prepare("INSERT INTO students (first_name, last_name, dob, email, mobile, gender, address, city, pin, state, country, hobbies, qualification, courses) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

        // Adjust bind_param to match the correct number of variables
        $stmt->bind_param("ssssssssssssss", $firstName, $lastName, $dob, $email, $mobile, $gender, $address, $city, $pin, $state, $country, $hobbies, $qualification, $courses);

        // Execute the statement
        if ($stmt->execute()) {
            echo "<script>alert('Registration successful!'); window.location.href='index.php';</script>";
            exit;
        } else {
            echo "Error: " . $stmt->error;
        }

        // Close the statement
        $stmt->close();
    }
}

// Close connection
$conn->close();
?>
