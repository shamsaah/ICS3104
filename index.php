<?php

include_once 'db.php';
include_once 'user.php';
$con = new DBConnector();    
$pdo = $con->connectToDB();  

$email = $_GET['email']; 
$password = $_GET['password']; 
$user = new USER($email,$password);

$stmt = $pdo->prepare("SELECT * FROM users WHERE email=?");



?>
<!DOCTYPE html>
<html>
    <head>
      <link rel="stylesheet" href="assets/css/style.css">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300&display=swap" rel="stylesheet">
    </head>
    <body id="index">
         <div class="profile-card">
        <div class="profile-pic-div">
            <img src="assets/images/teal.jpg" id="prof-img">
            <input type="file" id="file">
            <label for="file" id="uploadbtn">Choose Photo</label>
        </div>

        <div class="tittle">
        <h2>Welcome </h2>
        </div>
        <div class="box">
            <p><i class="bx bx-user login_icon"></i></p>

       </div>
       <div class="box">
        <p><i class="bx bxs-city login_icon" ></i></p>
        
      </div>

        <div class="box">
            <i class="bx bx-lock login_icon"></i>
           <input type="password" name="password" placeholder="Current Password" class="input">
        </div>
        <div class="box">
            <i class="bx bx-lock login_icon"></i>
           <input type="password" name="password" placeholder="New Password" class="input">
        </div>
        <input type="submit" class="login_button" name="update" value="update" >

        <!-- <a href="#" class="login_button">Update</a> -->

        <a href="#" class="logout"><i class='bx bx-log-out login_icon'></i>Logout</a>



    </div>





 <script>
    
    const imageDiv= document.querySelector('.profile-pic-div'),
           img= document.querySelector('#prof-img'),
           file= document.querySelector('#file'),
           uploadbtn= document.querySelector('#uploadbtn')

//hover 
imageDiv.addEventListener('mouseenter',function()
{
    uploadbtn.style.display = "block";

});

imageDiv.addEventListener('mouseleave',function()
{
     uploadbtn.style.display= "none";
});

//show image
file.addEventListener('change', function(){
     const choosedFile = this.files[0];

     if (choosedFile) {
         const reader = new FileReader();

         reader.addEventListener('load', function(){
             img.setAttribute('src',reader.result);

         });

         reader.readAsDataURL(choosedFile);
     }
      
});
    </script>
    </body>
</html>