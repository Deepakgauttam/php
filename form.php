<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simple Form</title>
    <link rel="stylesheet" href="styles.css"> <!-- Link to external CSS -->
</head>
<body>

<h2>User Information Form</h2>

<form action="form.php" method="POST">
    <label for="name">Name:</label>
    <input type="text" id="name" name="name" required>
    
    <label for="email">Email:</label>
    <input type="email" id="email" name="email" required>
    
    <input type="submit" value="Submit">
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect and sanitize input data
    $name = htmlspecialchars(trim($_POST['name']));
    $email = htmlspecialchars(trim($_POST['email']));
    $message="Test";
    
    // Display the submitted data
    echo "<h3>Submitted Information:</h3>";
    echo "Name: " . $name . "<br>";
    echo "Email: " . $email . "<br>";
    $to = "edueeraj@gmail.com";
$subject = "Email Test";

$message = "
<html>
<head>
<title>HTML email</title>
</head>
<body>
<p>This email contains HTML Tags!</p>
<table>
<tr>
<th>Firstname</th>
<th>Lastname</th>
</tr>
<tr>
<td>'".$name."'</td>
<td>'".$email."'</td>
</tr>
</table>
</body>
</html>
";

// Always set content-type when sending HTML email
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// More headers
$headers .= 'From: deepakgauttam88@gmail.com' . "\r\n";
$headers .= 'Cc: myboss@example.com' . "\r\n";

if(mail($to,$subject,$message,$headers)){
 echo '
 <script>
 alert("Thanks for your enquire with us, we will contact you shortly");
 
 </script>';
}
else{
    echo '
 <script>
 alert("error in sending mail");
 
 </script>';
}
}
?>

</body>
</html>
