<?php 

   // session_start();

   // if ($_SESSION['id'] =="") {
      // header("location: signin.php");
   //} else {
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
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
            <a class="navbar-brand" href="#">
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
                    <li><a class="dropdown-item" href="#">Settings</a></li>
                    <li><a class="dropdown-item" href="#">Messages</a></li>
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
                            <a class="nav-link active" aria-current="page" href="#">
                                <i class="fa-solid fa-house-chimney"></i>
                                <span class="ml-2">Dashboard</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="users/users_pages.php">
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
                <h1 class="h2">Dashboard</h1>

                <div class="row">
                    <div class="col-sm-6">
                        <div class="card shadow p-3 mb-5 bg-success text-white rounded">
                            <div class="card-body ">
                                <h5 class="card-title">จำนวนกล้องที่ออนไลน์</h5>
                                <?php 
                            include_once('functions.php');
                            $count = new DB_con();
                            $sql = $count->count();
                            $data = mysqli_fetch_assoc($sql);
                        ?>
                                <h2 class="card-text"><img src="images/cctv_on.png" style="width:60px; height:60px">
                                    <?php echo $data['total']; ?> </h2>
                                
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="card shadow p-3 mb-5 bg-danger text-white rounded">
                            <div class="card-body">
                                <h5 class="card-title">กล้องที่ออฟไลน์</h5>
                                <?php 
                            $sql = $count->count_off();
                            $data = mysqli_fetch_assoc($sql);
                        ?>
                                <h2 class="card-text"><img src="images/camera_of.png" style="width:60px; height:60px">
                                    <?php echo $data['total']; ?></h2>
                               
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12 col-xl-15 mb-4 mb-lg-0">
                        <a href="insert.php" class="btn btn-success "><i class="fa-solid fa-square-plus "></i></a>
                        <div class="card shadow p-3 mb-5 bg-body rounded">
                            <h5 class="card-header">ข้อมูลกล้องทั้งหมด</h5>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <th>Number</th>
                                            <th>Location</th>
                                            <th>Status</th>
                                            <th>Posting Date</th>
                                            <th>Save</th>
                                            <th>Delete</th>
                                        </thead>

                                        <tbody>
                                            <?php 

                include_once('functions.php');
                $fetchdata = new DB_con();
                $sql = $fetchdata->fetchdata();
                while($row = mysqli_fetch_array($sql)) {

            ?>

                                            <tr>
                                                <td><?php echo $row['id_camera']; ?></td>
                                                <td><?php echo $row['location_cm']; ?></td>

                                                <td>
                                                    <?php 
                                                      if($row['status_cm'] =="1"){
                                                    ?>
                                                    <div class="form-check form-switch">
                                                        <input class="form-check-input"
                                                            name="icon<?php echo $row['id_camera']; ?>"
                                                            id="icon<?php echo $row['id_camera']; ?>"
                                                            rel="<?php echo $row['id_camera']; ?>" type="checkbox"
                                                            data-toggle="toggle" data-on="เปิด" data-off="ปิด"
                                                            data-onstyle="success" data-offstyle="danger" checked>
                                                    </div>
                                                    <?php      

                                                    }else if($row['status_cm'] =="0"){
                                                    ?>
                                                    <div class="form-check form-switch">
                                                        <input class="form-check-input"
                                                            name="icon<?php echo $row['id_camera']; ?>"
                                                            id="icon<?php echo $row['id_camera']; ?>"
                                                            rel="<?php echo $row['id_camera']; ?>" type="checkbox"
                                                            data-toggle="toggle" data-on="เปิด" data-off="ปิด"
                                                            data-onstyle="success" data-offstyle="danger">
                                                    </div>
                                                    <?php
                                                    }else{
                                                    ?>

                                                    <?php  
       }
       
       ?>

                                                    <script>
                                                    $(function() {
                                                        $('#icon<?php echo $row['id_camera']; ?>').change(
                                                            function() {
                                                                //alert($(this).prop('checked'));
                                                                var ch_val = $(this).prop('checked');
                                                                var rel = $(this).attr('rel');
                                                                //alert(ch_val);

                                                                if (ch_val == true) {
                                                                    var status = 1;
                                                                    //alert(status);
                                                                }
                                                                if (ch_val == false) {
                                                                    var status = 0;
                                                                    //alert(status);
                                                                }

                                                                $.ajax({
                                                                    url: 'updatecamera.php',
                                                                    type: 'POST',
                                                                    data: {
                                                                        id: rel,
                                                                        value: status,
                                                                    },
                                                                    async: false,
                                                                    success: function(data) {
                                                                        //console.log(data);
                                                                    }
                                                                });


                                                            })
                                                    })
                                                    </script>

                                                </td>


                                                <td><?php echo $row['post_date']; ?></td>
                                                <td><a href="update.php?update=<?php echo $row['id_camera']; ?>"class="btn btn-success"><i
                                                            class="fa-regular fa-floppy-disk"></i></a></td>
                                                <td><a href="delete.php?del=<?php echo $row['id_camera']; ?>"
                                                        class="btn btn-danger"><i class="fa-solid fa-trash-can"></i></a>
                                                </td>
                                            </tr>

                                            <?php 

                }
            ?>
                                        </tbody>
                                </div>
                            </div>
                        </div>

            </main>

        </div>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js"
        integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/chartist.js/latest/chartist.min.js"></script>



</body>

</html>
<?php
    //}

    ?>