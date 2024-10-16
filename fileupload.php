<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Single File Upload</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>

    <h2>Single File Upload Form</h2>

    <form method="POST" enctype="multipart/form-data">
        <label for="file">Choose a file:</label><br>
        <input type="file" name="docs" required><br><br>

        <input type="submit" name="submit">
    </form>

    <?php
    if (isset($_POST['submit'])) {
        $filename = $_FILES['docs']['name'];
        $tempname = $_FILES['docs']['tmp_name'];
        move_uploaded_file($tempname, 'assets/' . $filename);
    }
    ?>

</body>

</html>