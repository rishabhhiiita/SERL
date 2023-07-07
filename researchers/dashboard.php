<?php
session_start();

// Check if the user is not logged in
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    // Redirect the user to the login page
    header("Location: login.php");
    exit;
}

require_once "db_connection.php";

// Retrieve researcher details from the session or database
$id = $_SESSION['id']; // Assuming you have stored the researcher's ID in the session during login

// Fetch researcher details from the database based on the ID
$query_1 = "SELECT * FROM researchers WHERE id = '$id'";
$result_1 = mysqli_query($conn, $query_1);
$row_1 = mysqli_fetch_assoc($result_1);

if (isset($_POST['delete'])) {
    $publicationId = $_POST['delete_paper_id'];

    // Fetch the file name associated with the research paper
    $filePathQuery = "SELECT file_path FROM publications WHERE id = $publicationId";
    $filePathResult = $conn->query($filePathQuery);

    if ($filePathResult->num_rows > 0) {
        $filePathRow = $filePathResult->fetch_assoc();
        $filePath = $filePathRow['file_path'];

        // Delete the file from the server        
        if (unlink($filePath)) {
            // Delete the paper from the database            
            $deleteQuery = "DELETE FROM publications WHERE id = $publicationId";
            if ($conn->query($deleteQuery) === TRUE) {
                //echo "<p class='message'>Research paper deleted successfully.</p>";
                header("Location: dashboard.php");
                exit();
            } else {
                echo "<p class='message'>Error occurred while deleting the research paper.</p>";
            }
        } else {
            echo "<p class='message'>Error occurred while deleting the research paper file.</p>";
        }
    } else {
        echo "<p class='message'>Research paper not found.</p>";
    }    
}

// Fetch the papers from the database
$query_2 = "SELECT * FROM publications";
$result_2 = mysqli_query($conn, $query_2);

// Process logout request
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['logout'])) {
    // Clear session data
    session_unset();
    // Destroy the session
    session_destroy();
    // Redirect the user to the login page
    header("Location: login.php");
    exit;
}

// Close the database connection
mysqli_close($conn);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 1200px;
            margin: 50px auto;
            padding: 50px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 20px;
        }

        .container h2 {
            margin-top: 0;
        }

        .container p {
            margin-bottom: 20px;
        }

        .container table {
            width: 100%;
            border-collapse: collapse;
        }

        .container table th,
        .container table td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        .container table th {
            background-color: #f5f5f5;
        }

        .container a {
            color: #555;
            text-decoration: none;
        }

        .container a:hover {
            text-decoration: underline;
        }

        .container .researcher-details {
            display: flex;            
            margin-bottom: 20px;
        }

        .container .researcher-details img {
            height: 220px;
            border-radius: 10%;
            margin-right: 20px;
        }

        .container .researcher-details .about {
            flex: 1;
        }

        .container .researcher-details h3 {
            margin: 0;
        }

        .container .research-paper {
            margin-bottom: 20px;
            padding: 20px;
            background-color: #f9f9f9;
            border-radius: 8px;
        }

        .container .research-paper h4 {
            margin-top: 0;
            margin-bottom: 10px;
        }

        .container .research-paper p {
            margin: 0;
        }

        .container .actions {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
        }

        .container .actions button {
            padding: 12px 20px;
            background-color: #555;
            color: #fff;
            border: none;
            border-radius: 10px;
            cursor: pointer;
        }

        .container .actions button:hover {
            background-color: #333;
        }

        .delete {
            padding: 12px 20px;
            background-color: #555;
            color: #fff;
            border: none;
            border-radius: 10px;
            cursor: pointer;
        }

        .delete:hover {
            background-color: #333;
        }

        .container .logout {
            text-align: right;
        }

        .container .paper {
            margin-bottom: 20px;
            padding: 30px;
            background-color: #f2f2f2;
            border-radius: 20px;
        }

        .container .paper h3 {
            margin-top: 0;
            margin-bottom: 10px;
        }

        .container .paper p {
            margin: 0;
        }
    </style>
</head>
<body>
    <div class="container">       
        <?php
            // Replace this with the code to fetch and display the researcher details from the database
            $researcherName = $row_1['name'];
            $researcherCode = $row_1['code'];
            $researcherMentor = $row_1['mentor'];
            $researcherPhotoPath = $row_1['photo_path'];
            $researcherAbout = $row_1['about'];
            $researcherMobile = $row_1['mobile_number'];
            $researcherEmail = $row_1['email']; 

            echo "<h2>$researcherName</h2>";
            echo "<p>$researcherCode</p>";
            echo "<p><strong>Mentor:</strong> $researcherMentor</p>";
        ?>

        <div class="researcher-details">

            <?php

            echo "<img src=$researcherPhotoPath alt='Researcher Photo'>";
            echo "<div class='about'>                
                    <p>$researcherAbout</p>
                </div>";                 
            ?>
        </div>

        <?php
            echo "<p><strong>Mobile:</strong> $researcherMobile</p>";
            echo "<p><strong>Email:</strong> $researcherEmail</p>"; 
        ?>

        <br>

        <h3>Publications</h3>
        
            
            <?php

            $num_of_publications = 0;

            if ($result_2->num_rows > 0) {
                // Display the papers
                while ($row_2 = $result_2->fetch_assoc()) {
                    if($row_2['researcher_id'] === $_SESSION['id']) {

                        echo "<div class='paper'>";
                        echo "<h4>" . $row_2['title'] . "</h4>";
                        echo "<p>Uploaded at : " . $row_2['uploaded_at'] . "</p>";
                        echo "<br>";
                        echo "<p>Authors : " . $row_2['authors'] . "</p>";
                        echo "<br>";
                        $filePath = $row_2['file_path'];
                        $fileName = $row_2['file_name'];
                        echo "<p> File :  <a href='" . $filePath . "'>" . $fileName . "</a></p>";
                        echo "<form class='actions' method='POST' action='" . $_SERVER['PHP_SELF'] . "'>";
                        echo "<input type='hidden' name='delete_paper_id' value='" . $row_2['id'] . "'>";
                        echo "<button class='delete' type='submit' name='delete'>Delete</button>";
                        echo "</form>";
                        echo "</div>";
                        
                        $num_of_publications = $num_of_publications + 1;
                    }                    
                }
            } 
            if($num_of_publications === 0){
                echo "<tr><td colspan='2'>No papers found.</td></tr>";
            }            
            ?>            
        

        <br><br>

        <div class="actions">
            <button onclick="location.href='upload.php'">Upload</button>
            <button onclick="location.href='logout.php'">Logout</button>
        </div>
        
    </div>
</body>
</html>

