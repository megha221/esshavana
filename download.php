<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form inputs
    $name  = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $phone = htmlspecialchars($_POST['phone']);

    // Email settings
    $to = "meghanagb5@gmail.com ";
    $subject = "New Brochure Download Request - Fortune Essha Vana";
    $message = "
        <html>
        <head>
            <title>Brochure Download Request</title>
        </head>
        <body>
            <h2>User Details</h2>
            <p><strong>Name:</strong> {$name}</p>
            <p><strong>Email:</strong> {$email}</p>
            <p><strong>Phone:</strong> {$phone}</p>
        </body>
        </html>
    ";

    // Headers for HTML email
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    $headers .= "From: Fortune Essha Vana <no-reply@yourdomain.com>" . "\r\n"; // Optional reply-to
    $headers .= "Reply-To: {$email}" . "\r\n";

    // Send email
    mail($to, $subject, $message, $headers);

    // Serve the PDF download
    $file = 'Bro.pdf'; // path to your file
    if (file_exists($file)) {
        header('Content-Description: File Transfer');
        header('Content-Type: application/pdf');
        header('Content-Disposition: attachment; filename="' . basename($file) . '"');
        header('Content-Length: ' . filesize($file));
        flush(); // Clean output buffer
        readfile($file);
        exit;
    } else {
        echo "Error: Brochure file not found.";
    }
} else {
    echo "Invalid request.";
}
?>
