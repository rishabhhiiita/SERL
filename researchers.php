<?php
require_once "db_connection.php";

// Fetch researcher details
$query_1 = "SELECT * FROM researchers";
$result_1 = mysqli_query($conn, $query_1);

?>

<!DOCTYPE html>
<html>
<head>
<title>SERL Lab | Researchers</title>
<meta charset="UTF-8">  
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <!-- Custom CSS -->
  <link rel="stylesheet" href="style.css">
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

        

        .container .logout {
            text-align: right;
        }

        .login_text {
            margin-top: 30px;
        }
    </style>
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

<style>
.publications {
  background-color: #777;
  color: white;
  cursor: pointer;
  padding: 18px;
  width: 100%;
  border: none;
  text-align: left;
  outline: none;
  font-size: 15px;
  border-radius: 15px;
}

.active, .publications:hover {
  background-color: #555;
}

.collapsible {
  padding: 0 18px;
  display: none;
  overflow: hidden;
  
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
        <li class="nav-item active">
          <a class="nav-link" href="researchers.php">Researchers</a>
        </li>
        <li class="nav-item">
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

  <div class="container_2"> 

  <p class='login_text'>If you are a researcher Login</p> 

  
  <div class="actions">
            
            <button onclick="location.href='researchers/login.php'">Login</button>
        </div>
    </div>

    <?php
    while ($row_1 = $result_1->fetch_assoc()):

        // Fetch the papers from the database
$query_2 = "SELECT * FROM publications";
$result_2 = mysqli_query($conn, $query_2);
    ?>

   

    <div class="container">       
        <?php
            // Replace this with the code to fetch and display the researcher details from the database
            $researcherID = $row_1['id'];
            $researcherName = $row_1['name'];
            $researcherCode = $row_1['code'];
            $researcherMentor = $row_1['mentor'];
            $researcherPhotoPath = "researchers/" . $row_1['photo_path'];
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
        
        <h2 class= 'publications'>Publications</h2>

        

        <div class='collapsible'>
        
            
            <?php

            $num_of_publications = 0;

            if ($result_2->num_rows > 0) {
                // Display the papers
                while ($row_2 = $result_2->fetch_assoc()) {
                    if($row_2['researcher_id'] === $researcherID) {

                        echo "<div class='paper'>";
                        echo "<h3>" . $row_2['title'] . "</h3>";
                        echo "<p>Uploaded at : " . $row_2['uploaded_at'] . "</p>";                        
                        echo "<p>Authors : " . $row_2['authors'] . "</p>";                        
                        echo "<p> File :  <a href='" . "researchers/" .$row_2['file_path'] . "'>" . $row_2['file_name'] . "</a></p>";                      
                        echo "</div>";                        
                        $num_of_publications = $num_of_publications + 1;

                    }
                                       
                }
            } 
            if($num_of_publications === 0){
                echo "<tr><td colspan='2'>No papers found.</td></tr>";
            }            
            ?>  
            
        </div>
        

        <br><br>
        
    </div>

    <?php endwhile; ?>

    <script>
var coll = document.getElementsByClassName("publications");
var i;

for (i = 0; i < coll.length; i++) {
  coll[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var content = this.nextElementSibling;
    if (content.style.display === "block") {
      content.style.display = "none";
    } else {
      content.style.display = "block";
    }
  });
}
</script>
<!-- Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>

