<?php
session_start();

require_once('classes/database.php');
$con = new database();

$sweetAlertConfig = ""; //Initialize SweetAlert script variable

if (!isset($_SESSION['user_id'])) {

  header('Location: index.php ');
 exit();
  }
  

?>



<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="./bootstrap-5.3.3-dist/css/bootstrap.css">
  <link rel="stylesheet" href="./package/dist/sweetalert2.css"> <!-- Correct Bootstrap Icons CSS -->
  <title>Borrowers</title>
</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
  <div class="container-fluid">
    <div class="d-flex ms-auto">
      <a href="logout.php" class="btn btn-outline-light">Logout</a>
    </div>
  </div>
</nav>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">Library Management System (Admin)</a>
          <a class="btn btn-outline-light ms-auto" href="add_authors.php">Add Authors</a>
          <a class="btn btn-outline-light ms-2" href="add_genres.php">Add Genres</a>
          <a class="btn btn-outline-light ms-2" href="add_books.html">Add Books</a>
          <div class="dropdown ms-2">
            <button class="btn btn-outline-light dropdown-toggle" type="button" id="profileDropdown" data-bs-toggle="dropdown" aria-expanded="false">
              <i class="bi bi-person-circle"></i> <!-- Bootstrap icon -->
            </button>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="profileDropdown">
              <li>
                  <a class="dropdown-item" href="profile.html">
                      <i class="bi bi-person-circle me-2"></i> See Profile Information
                  </a>
                </li>
              <li>
                <button class="dropdown-item" onclick="updatePersonalInfo()">
                  <i class="bi bi-pencil-square me-2"></i> Update Personal Information
                </button>
              </li>
              <li>
                <button class="dropdown-item" onclick="updatePassword()">
                  <i class="bi bi-key me-2"></i> Update Password
                </button>
              </li>
              <li>
                <button class="dropdown-item text-danger" onclick="logout()">
                  <i class="bi bi-box-arrow-right me-2"></i> Logout
                </button>
              </li>
            </ul>
          </div>
        </div>
      </nav>
<div class="container my-5">
  <!-- Borrowers Section -->
  <div class="row mb-4">
    <div class="col-12">
      <div class="card">
        <div class="card-header bg-primary text-white">
          <h5 class="card-title mb-0">Borrowers</h5>
        </div>
        <div class="card-body">
          <table class="table table-bordered">
            <thead>
              <tr class="text-center">
                <th>Borrower ID</th>
                <th>Full Name</th>
                <th>Email</th>
                <th>Username</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
              <tr class="text-center">
                <td>1</td>
                <td>John Doe</td>
                <td>johndoe@example.com</td>
                <td>johndoe</td>
                <td>
                  <button type="submit" class="btn btn-warning btn-sm">
                    <i class="bi bi-pencil-square"></i>
                  </button>
                  <button type="submit" name="delete" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this user?')">
                    <i class="bi bi-x-square"></i>
                  </button>
                </td>
              </tr>
              <tr class="text-center">
                <td>2</td>
                <td>Jane Smith</td>
                <td>janesmith@example.com</td>
                <td>janesmith</td>
                <td>
                  <button type="submit" class="btn btn-warning btn-sm">
                    <i class="bi bi-pencil-square"></i>
                  </button>
                  <button type="submit" name="delete" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this user?')">
                    <i class="bi bi-x-square"></i>
                  </button>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

  <!-- Authors Section -->
  <div class="row mb-4">
    <div class="col-12">
      <div class="card">
        <div class="card-header bg-success text-white">
          <h5 class="card-title mb-0">Authors</h5>
        </div>
        <div class="card-body">
          <table class="table table-bordered text-center">
            <thead >
              <tr>
                <th>Author ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Birth Year</th>
                <th>Nationality</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>1</td>
                <td>Mark</td>
                <td>Twain</td>
                <td>1835</td>
                <td>American</td>
                <td>
                  <button type="submit" class="btn btn-warning btn-sm">
                    <i class="bi bi-pencil-square"></i>
                  </button>
                  <button type="submit" name="delete" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this author?')">
                    <i class="bi bi-x-square"></i>
                  </button>
                </td>
              </tr>
              <tr>
                <td>2</td>
                <td>Jane</td>
                <td>Austen</td>
                <td>1775</td>
                <td>British</td>
                <td>
                  <button type="submit" class="btn btn-warning btn-sm">
                    <i class="bi bi-pencil-square"></i>
                  </button>
                  <button type="submit" name="delete" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this author?')">
                    <i class="bi bi-x-square"></i>
                  </button>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

  <!-- Genres Section -->
  <div class="row mb-4">
    <div class="col-12">
      <div class="card">
        <div class="card-header bg-warning text-dark">
          <h5 class="card-title mb-0">Genres</h5>
        </div>
        <div class="card-body">
          <table class="table table-bordered text-center">
            <thead>
              <tr>
                <th>Genre ID</th>
                <th>Genre Name</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>1</td>
                <td>Fiction</td>
                <td>
                  <button type="submit" class="btn btn-warning btn-sm">
                    <i class="bi bi-pencil-square"></i>
                  </button>
                  <button type="submit" name="delete" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this genre?')">
                    <i class="bi bi-x-square"></i>
                  </button>
                </td>
              </tr>
              <tr>
                <td>2</td>
                <td>Non-Fiction</td>
                <td>
                  <button type="submit" class="btn btn-warning btn-sm">
                    <i class="bi bi-pencil-square"></i>
                  </button>
                  <button type="submit" name="delete" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this genre?')">
                    <i class="bi bi-x-square"></i>
                  </button>
                </td>
              </tr>
              <tr>
                <td>3</td>
                <td>Science Fiction</td>
                <td>
                  <button type="submit" class="btn btn-warning btn-sm">
                    <i class="bi bi-pencil-square"></i>
                  </button>
                  <button type="submit" name="delete" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this genre?')">
                    <i class="bi bi-x-square"></i>
                  </button>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

  <!-- Books Section -->
  <div class="row mb-4">
    <div class="col-12">
      <div class="card">
        <div class="card-header bg-danger text-white">
          <h5 class="card-title mb-0">Books</h5>
        </div>
        <div class="card-body">
          <table class="table table-bordered text-center">
            <thead>
              <tr>
                <th>Book ID</th>
                <th>Title</th>
                <th>ISBN</th>
                <th>Publication Year</th>
                <th>Quantity Available</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>1</td>
                <td>The Adventures of Tom Sawyer</td>
                <td>978-0-123456-47-2</td>
                <td>1876</td>
                <td>5</td>
                <td>
                  <button type="submit" class="btn btn-warning btn-sm">
                    <i class="bi bi-pencil-square"></i>
                  </button>
                  <button type="submit" name="delete" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this book?')">
                    <i class="bi bi-x-square"></i>
                  </button>
                </td>
              </tr>
              <tr>
                <td>2</td>
                <td>Pride and Prejudice</td>
                <td>978-0-123456-48-9</td>
                <td>1813</td>
                <td>3</td>
                <td>
                  <button type="submit" class="btn btn-warning btn-sm">
                    <i class="bi bi-pencil-square"></i>
                  </button>
                  <button type="submit" name="delete" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this book?')">
                    <i class="bi bi-x-square"></i>
                  </button>
                </td>
              </tr>
              <tr>
                <td>3</td>
                <td>Dune</td>
                <td>978-0-123456-49-6</td>
                <td>1965</td>
                <td>7</td>
                <td>
                  <button type="submit" class="btn btn-warning btn-sm">
                    <i class="bi bi-pencil-square"></i>
                  </button>
                  <button type="submit" name="delete" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this book?')">
                    <i class="bi bi-x-square"></i>
                  </button>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
   <script src="./bootstrap-5.3.3-dist/js/bootstrap.js"></script>
  <script src="./package/dist/sweetalert2.js"></script>
  <?php echo $sweetAlertConfig; ?>
</body>
</html>
