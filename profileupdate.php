<?php

include "connection.php";
$id = $_GET['updateid'];
// echo $id;

$sql = "select * from `useradata`.`users` where id=$id";
$result = mysqli_query($connect, $sql);
$row = mysqli_fetch_assoc($result);

$id = $row['id'];
$username = $row['username'];
$email = $row['email'];
$password = $row['password'];

if(isset($_POST['submit'])){

    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
   
    
     $sql = "update `useradata`.`users` set 
    `username` = '$username',
    `email` = '$email',
    `password` = '$password'
    where `users`.`id` = '$id'";
  $result =  mysqli_query($connect, $sql);

  if($result){
      echo "
        <script>
            alert('form has been submitted');
            window.location.href = 'display.php';
        </script>

      ";
    //   header('location: display.php');
  }else{
    die(mysqli_connect_error());
  }

  mysqli_close($connect);

}





?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>User Dashboard</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap 5 CDN -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom Styles -->
  <style>
    body {
      background-color: #f8f9fa;
    }
    .profile-header {
      background: linear-gradient(to right, #0d6efd, #6610f2);
      color: white;
      border-radius: .5rem .5rem 0 0;
      padding: 2rem;
    }
    .form-control:focus {
      border-color: #0099ffff;
      box-shadow: 0 0 0 .25rem rgba(56, 78, 97, 0.25);
    }
    .success-message {
      display: none;
    }
  </style>
</head>
<body>

<div class="container mt-5">
  <div class="card shadow">
    <div class="profile-header d-flex justify-content-between align-items-center">
      <h3 class="mb-0">Welcome, <span id="profileName">hasan</span></h3>
      <button class="btn btn-outline-light">Logout</button>
    </div>

    <div class="card-body">
      <div class="alert alert-success success-message" id="successMsg">
        ✅ Your profile was updated successfully!
      </div>

      <form id="profileForm" method="post">
        <div class="mb-3">
          <label for="username" class="form-label">Full Name</label>
          <input type="text" class="form-control" name="username" id="username" value=<?php echo $username?> >
          <div class="invalid-feedback">Please enter your name.</div>
        </div>
        

        <div class="mb-3">
          <label for="email" class="form-label">Email Address</label>
          <input type="email" class="form-control" name="email" id="email" value=<?php echo $email?> >
          <div class="invalid-feedback">Please enter a valid email.</div>
        </div>

        <div class="mb-3">
          <label for="password" class="form-label">Password</label>
          <input type="password" class="form-control" name="password" id="password" value=<?php echo $password?> >
          <div class="invalid-feedback">Password must be at least 6 characters.</div>
        </div>

        <button type="submit" name="submit" class="btn btn-primary w-100">💾 Save Changes</button>
      </form>
    </div>
  </div>
</div>

<!-- Bootstrap JS (optional for UI interactivity) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<!-- Custom JS -->
<script>
  document.getElementById('profileForm').addEventListener('submit', function (e) {
    // e.preventDefault();
     let isValid = true;

    const username = document.getElementById('username');
    const email = document.getElementById('email');
    const password = document.getElementById('password');

    // Reset previous states
    [username, email, password].forEach(field => {
      field.classList.remove('is-invalid');
    });

    // Validate Username
    if (username.value.trim() === '') {
      username.classList.add('is-invalid');
      isValid = false;
    }

    // Validate Email
    const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!emailPattern.test(email.value.trim())) {
      email.classList.add('is-invalid');
      isValid = false;
    }

    // Validate Password
    if (password.value.trim().length < 6) {
      password.classList.add('is-invalid');
      isValid = false;
    }


    if (!isValid) {
      e.preventDefault(); // prevent form from submitting
    }


  });
</script>


</body>
</html>