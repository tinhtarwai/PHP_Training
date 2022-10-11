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
    
        $target_dir = "$folder/";
        $target_file = $target_dir . basename($_FILES["photo"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

        if(isset($_POST["upload"])) { 
            if(empty($folder)){
                echo "<p class = fail>Warning! You have to fill a folder name.</p>";
                header('Refresh: 3; URL = index.php');
            } else {
            // Check if folder is already exit
                if (!file_exists($folder)) {
                    mkdir($folder, 0777, true);
                } 
                // Check if file is selected
                if (empty($_FILES['photo']['name'])) {
                    echo "<p class = fail>Warning! You have to choose an image</p>";
                } else {
                    // Check if file already exists
                    if (file_exists($target_file)) {
                        echo "<p class = fail>File already exists.</p>";
                        $uploadOk = 0;
                    } else {
                        // check file formats
                        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
                        && $imageFileType != "gif" ) {
                            echo "<p class = fail>Only JPG, JPEG, PNG & GIF files are allowed.</p>";
                            $uploadOk = 0;
                        }
                    }
                }
            // Check if $uploadOk is 0 or 1
                if ($uploadOk == 0) {
                    echo "<p class = fail>Sorry, your file was not uploaded.</p>";
                } else {
                    if (move_uploaded_file($_FILES["photo"]["tmp_name"], $target_file)) {
                        echo "<p class = success>Congratulations! The file  \"". htmlspecialchars( basename( $_FILES["photo"]["name"])). "\"  has been uploaded to \"$folder\" folder.</p>";
                    } 
                }
            }
        //header('Refresh: 4; URL = index.php');
        }
    ?>
    <form action= "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method= "post" enctype="multipart/form-data">
        <label>Create a folder: </label>
        <input type = "text" name = "folder" placeholder = "enter a name" value = "<?php echo $folder ?>" autofocus><br>
        <label>Choose an image: </label>
        <input type = "file" name = "photo"><span>*</span><br>
        <input type="submit" value = "Upload" name = "upload" class ="upload">
    </form>
</body>
</html>