<?php

include './db.php';

if ($_SERVER["REQUEST_METHOD"] === "POST"){
    $title = $_POST['title'];
    $image = $_FILES['image'];

//Check if the image uploaded
    if(isset($image) && $image['tmp_name']!== ""){
       $uploadDir = 'uploads/';
       $filePath = $uploadDir . basename($image['name']);
       
       //upload file
         if(move_uploaded_file($image['tmp_name'], $filePath)){
            $conn->query("INSERT INTO photos(title, image_path) VALUES ('$title', '$filePath')");
              header('Location: index.php');
              exit;

         }else{
              echo "Failed to upload file.";      
         }

        }else{
            echo "Please select a file to upload.";
 }
}