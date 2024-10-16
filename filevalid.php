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
        <p><?php echo $upload; ?></p>
        <label for="file">Choose a file:</label><br>
        <input type="file" name="doc" multiple><br><br>

        <input type="submit" name="submit">
    </form>

    <?php
    // Check if the form has been submitted
    $upload = " ";
    if (isset($_POST['submit'])) {
        $filename = $_FILES['doc']['name'];
        $tempname = $_FILES['doc']['tmp_name'];
        $filesize = $_FILES['doc']['size'];
        $fileext - end(explode('.', $_FILES['doc']['name']));
        $extensions = array("jpeg", "jpg", "png");

        if (in_array($fileext, $extensions) === true && $filesize < 2097152) {
            move_uploaded_file($tempname, 'uploads/' . $filename);
            $upload = "file upload successfully";
        } else {
            $upload = "File extension should be .jpg, .jpeg, .png or File size less than 2MB";
        }
    }
    ?>
</body>

</html>