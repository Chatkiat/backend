<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Users Page</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css"
        integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/chartist.js/latest/chartist.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Mitr&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <style>
    body {
        font-family: 'Mitr', sans-serif;
    }

    .sidebar {
        position: fixed;
        top: 0;
        bottom: 0;
        left: 0;
        z-index: 100;
        padding: 90px 0 0;
        box-shadow: inset -1px 0 0 rgba(0, 0, 0, .1);
        z-index: 99;
    }

    @media (max-width: 767.98px) {
        .sidebar {
            top: 11.5rem;
            padding: 0;
        }
    }

    .navbar {
        box-shadow: inset 0 -1px 0 rgba(0, 0, 0, .1);
    }

    @media (min-width: 767.98px) {
        .navbar {
            top: 0;
            position: sticky;
            z-index: 999;
        }
    }

    .sidebar .nav-link {
        color: #333;
    }

    .sidebar .nav-link.active {
        color: #0d6efd;
    }
    </style>

</head>

<body>
    <nav class="navbar navbar-light bg-light p-3">
        <div class="d-flex col-12 col-md-3 col-lg-2 mb-2 mb-lg-0 flex-wrap flex-md-nowrap justify-content-between">
            <a class="navbar-brand" href="">
                <img src="images/cctv_online.png" style="height:40px;weigh:40px;">SMOKE DETECTION
            </a>
            <button class="navbar-toggler d-md-none collapsed mb-3" type="button" data-toggle="collapse"
                data-target="#sidebar" aria-controls="sidebar" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
        <div class="col-12 col-md-5 col-lg-8 d-flex align-items-center justify-content-md-end mt-3 mt-md-0">
            <div class="dropdown">
                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton"
                    data-toggle="dropdown" aria-expanded="false">
                    Hello, Chatkiat<?php //echo $_SESSION['fullname']; ?>
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    
                    <li><a class="dropdown-item" href="logout.php">Sign out</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container-fluid">
        <div class="row">
            <nav id="sidebar" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
                <div class="position-sticky">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link " aria-current="page" href="#">
                                <i class="fa-solid fa-house-chimney"></i>
                                <span class="ml-2">Dashboard</span>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link active" href="">
                                <i class="fa-solid fa-user"></i>
                                <span class="ml-2">Officer</span>
                            </a>
                        </li>

                    </ul>
                </div>
            </nav>
            <main class="col-md-9 ml-sm-auto col-lg-10 px-md-4 py-4">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Overview</li>
                    </ol>
                </nav>
                <h1 class="h2">Officer</h1>

                <div class="container">
        <div class="row mt-4">
            <div class="col-lg-12 d-flex justify-content-between align-items-center">
              
                <div>
                    <button class="btn btn-primary" type="button" data-bs-toggle="modal"
                        data-bs-target="#addNewUserModal">Add New User</button>
                </div>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-lg-12">
                <div id="showAlert"></div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-xl-15 mb-4 mb-lg-0">
                <div class="card shadow p-3 mb-5 bg-body rounded">
                    <h5 class="card-header">ข้อมูลพนักงานทั้งหมด</h5>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-boredered text-center">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>First Name</th>
                                        <th>Last Name</th>
                                        <th>E-mail</th>
                                        <th>Phone</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            </main>

        </div>

    </div>

    <!-- Add New User Modal Start -->
    <div class="modal fade" tabindex="-1" id="addNewUserModal">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-header">Add New User</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="add-user-form" class="p-2" novalidate>
                        <div class="row mb-3 gx-3">
                            <div class="col">
                                <input type="text" name="fname" class="form-control form-control-lg"
                                    placeholder="Enter First Name" required>
                                <div class="invalid-feedback">First name is required!</div>
                            </div>
                            <div class="col">
                                <input type="text" name="lname" class="form-control form-control-lg"
                                    placeholder="Enter Last Name" required>
                                <div class="invalid-feedback">Last name is required!</div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <input type="text" name="email" class="form-control form-control-lg"
                                placeholder="Enter E-mail" required>
                            <div class="invalid-feedback">E-mail is required!</div>
                        </div>
                        <div class="mb-3">
                            <input type="text" name="phone" class="form-control form-control-lg"
                                placeholder="Enter Phone" required>
                            <div class="invalid-feedback">Phone is required!</div>
                        </div>
                        <div class="mb-3">
                            <input type="submit" value="Add User" class="btn btn-primary btn-block btn-lg"
                                id="add-user-btn">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Add New User Modal End -->
    <!-- Edit User Modal Start -->
    <div class="modal fade" tabindex="-1" id="editUserModal">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-header">Edit This User</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="edit-user-form" class="p-2" novalidate>
                        <input type="hidden" name="id" id="id">
                        <div class="row mb-3 gx-3">
                            <div class="col">
                                <input type="text" id="fname" name="fname" class="form-control form-control-lg"
                                    placeholder="Enter First Name" required>
                                <div class="invalid-feedback">First name is required!</div>
                            </div>
                            <div class="col">
                                <input type="text" id="lname" name="lname" class="form-control form-control-lg"
                                    placeholder="Enter Last Name" required>
                                <div class="invalid-feedback">Last name is required!</div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <input type="text" id="email" name="email" class="form-control form-control-lg"
                                placeholder="Enter E-mail" required>
                            <div class="invalid-feedback">E-mail is required!</div>
                        </div>
                        <div class="mb-3">
                            <input type="text" id="phone" name="phone" class="form-control form-control-lg"
                                placeholder="Enter Phone" required>
                            <div class="invalid-feedback">Phone is required!</div>
                        </div>
                        <div class="mb-3">
                            <input type="submit" value="Edit User" class="btn btn-primary btn-block btn-lg"
                                id="edit-user-btn">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Edit User Modal End -->
    
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
                integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
                crossorigin="anonymous"></script>
            <script src="main.js"></script>
</body>

</html>