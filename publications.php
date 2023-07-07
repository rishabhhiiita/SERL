<?php
require_once "db_connection.php";

// Fetch researcher details
$query = "SELECT * FROM publications ORDER BY uploaded_at DESC";
$result = mysqli_query($conn, $query);

// Close the database connection
mysqli_close($conn);
?>

<!DOCTYPE html>
<html>
<head>
<title>SERL Lab | Publications</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <link rel="icon" type="image/png" href="content/IIIT.gif">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <link rel="stylesheet" href="css/style.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
  <link href="https://fonts.googleapis.com/css?family=Comfortaa" rel="stylesheet">
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Merriweather:ital,wght@1,300&display=swap');
  @import url('https://fonts.googleapis.com/css2?family=Roboto+Slab&display=swap');
  #head_bg h1{
    font-family: 'Roboto Slab', serif;
  }
</style>
  <!-- Custom CSS -->
  <link rel="stylesheet" href="style.css">
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
        .container_2 {
            max-width: 1200px;
            margin: 50px auto;
            display: flex;
            align-items: bottom;
            flex-direction: row;
            height: 68px;            
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
            border-radius: 4px;
            padding: 5px 10px;
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

        .container_2 .actions {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
            margin-left: 20px;
        }

        .container_2 .actions button {
            padding: 12px 20px;
            background-color: #555;
            color: #fff;
            border: none;
            border-radius: 10px;
            cursor: pointer;
            flex: 1;
        }

        .container_2 .actions button:hover {
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

        .login_text {
            margin-top: 30px;
        }
    </style>
</head>
<body>

 <!-- Navbar -->
 <nav class="navbar navbar-expand-md navbar-dark bg-dark">
    <a class="navbar-brand" href="#">SERL Lab</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link" href="index.html">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="faculty.html">Faculty</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="researchers.php">Researchers</a>
        </li>
        <li class="nav-item active">
          <a class="nav-link" href="publications.php">Publications</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="projects.html">Projects</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="resources.html">Resources</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="contact.html">About Us</a>
        </li>
      </ul>
    </div>
  </nav>

  

    

   

    <div class="container">       
    
        
            
        <?php

        $num_of_publications = 0;

        if ($result->num_rows > 0) {
            // Display the papers
            while ($row = $result->fetch_assoc()) {
                echo "<div class='paper'>";
                    echo "<h4>" . $row['title'] . "</h4>";
                    echo "<p>Uploaded at : " . $row['uploaded_at'] . "</p>";                    
                    echo "<p>Authors : " . $row['authors'] . "</p>";                    
                    //echo "<p href='" . $row['file_path'] . "'> File :  <a>".$row['file_name']."</a></p>";
                    echo "<p> File :  <a href='" . "researchers/" .$row['file_path'] . "'>" . $row['file_name'] . "</a></p>";                  
                    echo "</div>";
                    echo "<br>";
                    
                    $num_of_publications = $num_of_publications + 1;                    
            }
        } 
        if($num_of_publications === 0){
            echo "<tr><td colspan='2'>No papers found.</td></tr>";
        }            
        ?> 
        
    </div>
    
    <script src="js/main.js"></script>

<!-- Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>

