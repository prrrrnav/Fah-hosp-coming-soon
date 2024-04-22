<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve email from the form
    $email = $_POST["email"];
    
    // Save email to a file
    $file = 'emails.txt';
    file_put_contents($file, $email . PHP_EOL, FILE_APPEND | LOCK_EX);

    // Optionally, you can also save the email to a database
    // Example:
    // $pdo = new PDO('mysql:host=localhost;dbname=my_database', 'username', 'password');
    // $stmt = $pdo->prepare('INSERT INTO emails (email) VALUES (:email)');
    // $stmt->bindParam(':email', $email);
    // $stmt->execute();

    // Send a response back to the client
    echo "Email saved successfully!";
} else {
    // Handle invalid requests
    http_response_code(405);
    echo "Method Not Allowed";
}
?>