<?php


include('../../db_connection.php');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}else {
    echo "<script>console.log('connected' );</script>";
}

// Retrieve data from the form
$name = $_POST['name'];
$user_type = $_POST['user_type'];
$faculty = $_POST['faculty'];
$department = $_POST['department'];
$email = $_POST['email'];
$password = $_POST['password'];
$confirmPassword = $_POST ['confirmPassword'];


// SQL query to insert data into survey_form_data table
$sql = "INSERT INTO users (name,password,faculty,department,user_type,email)
        VALUES ('$name','$password','$faculty','$department','$user_type','$email')";
       
    
         if ($conn->query($sql) === TRUE ) {
                // Get the last inserted form_id
                $user_id = $conn->insert_id;


                
            echo "<script>alert('Form data saved successfully!')</script>";
                 // Redirect to another HTML page
                 header("Location: ../adduser.html");
                         exit;

        

// Close the database connection
$conn->close();

?>