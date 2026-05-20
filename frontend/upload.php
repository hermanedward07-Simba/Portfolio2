<?php
// Handle file upload
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    if (isset($_FILES['website_project'])) {
        $file = $_FILES['website_project'];
        $category = 'website';
    } elseif (isset($_FILES['graphic_design'])) {
        $file = $_FILES['graphic_design'];
        $category = 'graphics';
    } elseif (isset($_FILES['data_analysis'])) {
        $file = $_FILES['data_analysis'];
        $category = 'data';
    }

    if (isset($category)) {
        $uploadDir = "uploads/$category/";

        if (!is_dir($uploadDir)) mkdir($uploadDir, 0777, true);

        $filePath = $uploadDir . basename($file['name']);

        if (move_uploaded_file($file['tmp_name'], $filePath)) {
            $message = "File uploaded successfully!";
        } else {
            $message = "Failed to upload file!";
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Upload Page</title>
    <style>
        .category-box { float:left; width:30%; margin-right:2%; background:#f0f0f0; padding:10px; }
        .file-list { margin-top:10px; font-size:0.9em; }
        .clear { clear:both; }
    </style>
</head>
<body>
    <h2>Upload Your Files</h2>
    <?php if(isset($message)) echo "<p>$message</p>"; ?>

    <div class="upload-form">
        <!-- Website & System Project -->
        <div class="category-box">
            <form action="upload.php" method="post" enctype="multipart/form-data">
                <label>Website & System Project</label>
                <input type="file" name="website_project" required>
                <button type="submit">Upload</button>
            </form>
            <div class="file-list">
                <h4>Uploaded Files:</h4>
                <ul>
                    <?php
                    $files = glob("uploads/website/*");
                    foreach($files as $f){
                        echo "<li><a href='$f' target='_blank'>" . basename($f) . "</a></li>";
                    }
                    ?>
                </ul>
            </div>
        </div>

        <!-- Graphic Design -->
        <div class="category-box">
            <form action="upload.php" method="post" enctype="multipart/form-data">
                <label>Graphic Design</label>
                <input type="file" name="graphic_design" required>
                <button type="submit">Upload</button>
            </form>
            <div class="file-list">
                <h4>Uploaded Files:</h4>
                <ul>
                    <?php
                    $files = glob("uploads/graphics/*");
                    foreach($files as $f){
                        echo "<li><a href='$f' target='_blank'>" . basename($f) . "</a></li>";
                    }
                    ?>
                </ul>
            </div>
        </div>

        <!-- Data Analysis -->
        <div class="category-box">
            <form action="upload.php" method="post" enctype="multipart/form-data">
                <label>Data Analysis</label>
                <input type="file" name="data_analysis" required>
                <button type="submit">Upload</button>
            </form>
            <div class="file-list">
                <h4>Uploaded Files:</h4>
                <ul>
                    <?php
                    $files = glob("uploads/data/*");
                    foreach($files as $f){
                        echo "<li><a href='$f' target='_blank'>" . basename($f) . "</a></li>";
                    }
                    ?>
                </ul>
            </div>
        </div>
        <div class="clear"></div>
    </div>
</body>
</html>
