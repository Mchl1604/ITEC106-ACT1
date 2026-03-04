<?php 
session_start();
if(!isset($_SESSION['user'])){
  header("Location: login.php");
}
if($_SERVER["REQUEST_METHOD"] == "POST"){
  include("../backend/logout.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
  <script src="https://kit.fontawesome.com/3ee2c2cc76.js" crossorigin="anonymous"></script>
</head>

<body>
  <!-- Header navigation -->
  <nav class="navbar navbar-expand-md bg-dark" data-bs-theme="dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">Dashboard</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <!-- User dropdown menu -->
        <div class="d-flex ms-auto">
          <div class="dropdown">
            <button class="btn dropdown-toggle d-flex align-items-center gap-3 text-white border"
              type="button"
              data-bs-toggle="dropdown"
              aria-expanded="false">
              <img src="../img/default_profile.png"
                alt="Default Profile"
                class="img-fluid rounded-circle"
                style="width: 45px; height: 45px; object-fit: cover;">

              <div class="text-start">
                <div class="fw-semibold mb-0"><?php echo $_SESSION['user'];?></div>
                <small class="mb-0">Role</small>
              </div>

            </button>

            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="profile.php"> <i class="fa-solid fa-user"></i> Profile</a></li>
              <li>
                <form method="POST">
                  <button class="dropdown-item btn" type="submit" name="logout"> <i class="fa-solid fa-arrow-right-from-bracket"></i> Log out</button></li>

                </form>
          </div>
        </div>
      </div>
    </div>
  </nav>

    <div class="container mt-2">
      <h1><?php
    if(isset($_SESSION['user'])){
      echo "Welcome " . $_SESSION['user'];
    }
    else{
      header("Location: login.php");
    }
    ?></h1>
    </div>
      
  <!-- Main content area -->
  <div class="container mt-3 d-flex justify-content-between">

    <h3>Manage Users</h3>
    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#newUserModal"> <i class="fa-solid fa-plus"></i> Add User</button>
  </div>
  <!-- User table -->
  <div class="table-responsive-lg container mt-3">
    <table class="table table-light table-striped table-hover table-bordered">
      <thead class="table-dark">
        <tr>
          <th scope="col">ID</th>
          <th scope="col">Full Name</th>
          <th scope="col">Email</th>
          <th scope="col">Role</th>
          <th scope="col">Status</th>
          <th scope="col">Actions</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <th scope="row">1</th>
          <td>Michael A. Capanayan</td>
          <td>michaelcapanayan@gmail.com</td>
          <td>Admin</td>
          <td>Active</td>
          <td>
            <button class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#editModal">Edit</button>
            <button class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal">Delete</button>
          </td>
        </tr>
        <tr>
          <th scope="row">2</th>
          <td>Gerald Apuntar</td>
          <td>example1@gmail.com</td>
          <td>Manager</td>
          <td>Active</td>
          <td>
            <button class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#editModal">Edit</button>
            <button class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal">Delete</button>
          </td>
        </tr>
        <tr>
          <th scope="row">3</th>
          <td>Mara Laurito</td>
          <td>example2@gmail.com</td>
          <td>Manager</td>
          <td>Active</td>
          <td>
            <button class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#editModal">Edit</button>
            <button class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal">Delete</button>
          </td>
        </tr>
        <tr>
          <th scope="row">4</th>
          <td>Roberto Blanco</td>
          <td>example3@gmail.com</td>
          <td>Employee</td>
          <td>Active</td>
          <td>
            <button class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#editModal">Edit</button>
            <button class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal">Delete</button>
          </td>
        </tr>
        <tr>
          <th scope="row">5</th>
          <td>Chloe Guevarra</td>
          <td>example4@gmail.com</td>
          <td>Employee</td>
          <td>Active</td>
          <td>
            <button class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#editModal">Edit</button>
            <button class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal">Delete</button>
          </td>
        </tr>
      </tbody>
    </table>
  </div>

  <!-- Modals for add, edit, and delete -->
  <!-- Add New User Modal -->
  <div class="modal fade" id="newUserModal" tabindex="-1" aria-labelledby="newUserModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="newUserModalLabel">Add new user</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="">
            <input class="form-control mb-3" type="text" placeholder="Full Name" required>
            <input class="form-control mb-3" type="email" placeholder="Email" required>
            <div class="dropdown">
              <button class="btn dropdown-toggle w-100 d-flex align-items-center justify-content-between border mb-3" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                Admin
              </button>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="#">Admin</a></li>
                <li><a class="dropdown-item" href="#">Manager</a></li>
                <li><a class="dropdown-item" href="#">Employee</a></li>
              </ul>
            </div>
            <button type="submit" class="btn btn-primary text-white w-100">Save</button>
        </div>
          </form>
        </div>
    </div>
  </div>

  <!-- Edit Modal -->
  <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="editModalLabel">Edit User</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="">
            <input class="form-control mb-3" type="text" value="Michael A. Capanayan" required>
            <input class="form-control mb-3" type="email" value="michaelcapanayan@gmail.com">
            <div class="dropdown">
              <button class="btn dropdown-toggle w-100 d-flex align-items-center justify-content-between border mb-3" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                Admin
              </button>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="#">Admin</a></li>
                <li><a class="dropdown-item" href="#">Manager</a></li>
                <li><a class="dropdown-item" href="#">Employee</a></li>
              </ul>
            </div>
            <button type="submit" class="btn btn-warning text-black w-100">Update</button>
        </div>
          </form>
        </div>
    </div>
  </div>

  <!-- Delete Modal -->
  <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="deleteModalLabel">Delete User</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          Are you sure you want to delete this user
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
          <button type="button" class="btn btn-danger">Confirm Delete</button>
        </div>
      </div>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>

</html>