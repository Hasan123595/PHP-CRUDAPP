<?php

include "connection.php"




?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>All Users</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap 5 CDN -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom Styles -->
  <style>
    body {
      background-color: #f8f9fa;
    }
    .card {
      border: none;
    }
    .table th {
      background-color: #6610f2;
      color: white;
    }
    .btn-view {
      background-color: #0d6efd;
      color: white;
    }
    .btn-update {
      background-color: #198754;
      color: white;
    }
    .table td, .table th {
      vertical-align: middle;
    }
  </style>
</head>
<body>

<div class="container mt-5">
  <div class="card shadow">
    <div class="card-header bg-primary text-white">
      <h4 class="mb-0">User Management</h4>
    </div>
    <div class="card-body">
      <table class="table table-bordered table-hover align-middle text-center">
        <thead>
          <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Password</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
                 
                 
         <?php
        
        $sql = "select * from `useradata`.`users`";
        $result =  mysqli_query($connect, $sql);


        if($result){

          while($row = mysqli_fetch_assoc($result)){

            $id = $row['id'];
            $username = $row['username'];
            $email = $row['email'];
            $password = $row['password'];

            echo ' 

           <tr>
            <td>'.$id.'</td>
            <td>'.$username.'</td>
            <td>'.$email.'</td>
            <td>'.$password.'</td>
            <td>
            <a href="profileupdate.php?updateid='.$id.'" class="btn btn-sm btn-update">Update</a>
              <a href="./delete.php?deleteid='.$id.'"> <button class="btn btn-sm btn-danger">delete</a>
            </td>
          </tr>

          ';
          
          };
        
        
        }

        ?>
        </tbody>
      </table>
    
    </div>
  </div>
  <div class="btn">
    <a href="./index.php">
    <button class="btn btn-warning m-3">Add Users</button>
  </a>
  </div>
</div>
    

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<!-- JS: Simulate Modal Open -->
<script>
  const viewButtons = document.querySelectorAll('.btn-view');
  viewButtons.forEach(btn => {
    btn.addEventListener('click', () => {
      const modal = new bootstrap.Modal(document.getElementById('viewModal'));
      modal.show();
    });
  });
</script>

</body>
</html>