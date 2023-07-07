<?php
session_start();

// Check if the user is not logged in
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    // Redirect the user to the login page
    header("Location: login.php");
    exit;
}

// Include the database connection file
require_once "db_connection.php";

// Handle file upload
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["file"])) {
    $publicationTitle = $_POST['title'];
    $publicationAuthors = $_POST['authors'];
    $publicationFileName = $_FILES["file"]["name"];
    $publicationFileTmpName = $_FILES["file"]["tmp_name"];
    $publicationFileError = $_FILES["file"]["error"];
    $publicationTimestamp = date('Y_m_d_H_i_s');

    // Check if a file was selected
    if ($publicationFileError === UPLOAD_ERR_OK) {
        $targetDir = "publications/";
        $researcherId = $_SESSION['id'];
        $targetFilePath = $targetDir . $researcherId . "_" . $publicationTimestamp . "_" . basename($publicationFileName);
        
        // Move the uploaded file to the target directory
        if (move_uploaded_file($publicationFileTmpName, $targetFilePath)) {
            // File upload successful
            // Save the file information to the database            
            $query = "INSERT INTO publications (researcher_id, title, authors, file_name, file_path) VALUES ('$researcherId', '$publicationTitle' , '$publicationAuthors' , '$publicationFileName', '$targetFilePath')";
            mysqli_query($conn, $query);
            
            // Redirect the user to the dashboard or another page
            header("Location: dashboard.php");
            exit;
        } else {
            // File upload failed
            echo "Sorry, there was an error uploading your file.";
        }
    } else {
        // File upload error
        echo "Error: " . $publicationFileError;
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Upload</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 800px;
            margin: 50px auto;
            padding: 40px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 20px;
        }

        .container h2 {
            margin-top: 0;
        }

        .container form {
            margin-bottom: 20px;
        }

        .container form label {
            display: block;
            margin-bottom: 10px;
        }

        .container form textarea,
        .container form input[type="file"] {
            padding: 10px;
            width: 90%;
        }
        
        .container form button {
            padding: 10px 20px;
            background-color: #555;
            color: #fff;
            border: none;
            border-radius: 10px;
            cursor: pointer;
        }

        .container form button:hover {
            background-color: #333;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Upload</h2>
        <br><br>
        <form method="POST" action="" enctype="multipart/form-data">
            <div>
                <label for="title">Title:</label>
                <textarea name="title" id="title" rows="4" required></textarea>
            </div>
            <br><br>
            <div>
                <label for="authors">Authors:</label>
                <textarea name="authors" id="autors" rows="2" required></textarea>
            </div>
            <br><br>
            <div>
                <label for="file">File:</label>         
                <input type="file" name="file" id="file" required>
            </div>
            <br><br>
            <button type="submit" value="Upload" name="submit">Upload</button>            
        </form>
        <a href="dashboard.php">Back to Dashboard</a>
    </div>
</body>
</html>
