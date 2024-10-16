<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Single File Upload</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>

    <h2>Multi File Upload Form</h2>

    <form method="POST" enctype="multipart/form-data">
        <label for="file">Choose a file:</label><br>
        <input type="file" name="doc[]" multiple><br><br>

        <input type="submit" name="submit">
    </form>

    <?php
    // Check if the form has been submitted
    if (isset($_POST['submit'])) {
        // Get the number of files uploaded
        $length = count($_FILES['doc']['name']);

        // Loop through each uploaded file
        for ($i = 0; $i < $length; $i++) {
            $filename = $_FILES['doc']['name'][$i]; // Get the name of the uploaded file
            $tempname = $_FILES['doc']['tmp_name'][$i]; // Get the temporary file name on the server
    
            // Move the uploaded file to the 'assets' directory
            move_uploaded_file($tempname, 'assets/' . $filename);
        }
    }
    ?>
</body>

</html>