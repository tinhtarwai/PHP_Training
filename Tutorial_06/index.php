<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/style.css">
  <title>Image Upload</title>
</head>
<body>
  <?php 
    $folder = $_POST['folder'];
  ?>
  <form action= "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method= "post" enctype="multipart/form-data">
    <label>Create a folder: </label>
    <input type = "text" name = "folder" placeholder = "enter a name"><br>
    <label>Choose an image: </label>
    <input type = "file" name = "photo">
    <input type="submit" value = "Upload" name = "upload" class ="upload">
  </form>
</body>
</html>