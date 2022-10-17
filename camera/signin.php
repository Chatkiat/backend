<?php 
    session_start();
    include_once('functions.php'); 
    
    $userdata = new DB_con();

    if (isset($_POST['login'])) {
        $uname = $_POST['username'];
        $password = md5($_POST['password']);
        $result = $userdata->signin($uname, $password);
        $num = mysqli_fetch_array($result);

        if ($num > 0) {
            $_SESSION['id'] = $num['id'];
            $_SESSION['fname'] = $num['fullname'];
            echo "<script>alert('Login Successful!');</script>";
            echo "<script>window.location.href='welcome.php'</script>";
        } else {
            echo "<script>alert('Something went wrong! Please try again.');</script>";
            echo "<script>window.location.href='signin.php'</script>";
        }
    }

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">

    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/sign-in/">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Mitr">
    <!-- Bootstrap core CSS -->
    <link href="/docs/5.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous">
    </script>
    <meta name="theme-color" content="#7952b3">
    <style>
    html,
    body {
        height: 100%;
        font-family: 'Mitr', sans-serif;
    }

    body {
        display: flex;
        align-items: center;
        padding-top: 40px;
        padding-bottom: 40px;
        background-color: #f5f5f5;
    }

    .form-signin {
        width: 100%;
        max-width: 330px;
        padding: 15px;
        margin: auto;
    }

    .form-signin .checkbox {
        font-weight: 400;
    }

    .form-signin .form-floating:focus-within {
        z-index: 2;
    }

    .form-signin input[type="email"] {
        margin-bottom: -1px;
        border-bottom-right-radius: 0;
        border-bottom-left-radius: 0;
    }

    .form-signin input[type="password"] {
        margin-bottom: 10px;
        border-top-left-radius: 0;
        border-top-right-radius: 0;
    }

    .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
    }

    @media (min-width: 768px) {
        .bd-placeholder-img-lg {
            font-size: 3.5rem;
        }
    }
    </style>

</head>

<body class="text-center">

    <main class="form-signin">
        <form medthod ="post">
            <img class="mb-4" src="images/cctv_online.png" alt="" width="80" height="80">
            <h1 class="h3 mb-3 fw-normal">Please sign in</h1>

            <div class="form-floating">
                <input class="form-control" id="username" name="username" placeholder="Username">
                <label for="username">Username</label>
            </div><br>
            <div class="form-floating ">
                <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                <label for="password">Password</label>
            </div>
            <button class="w-100 btn btn-lg btn-primary shadow p-3 mb-5" type="submit" name='login'>Sign in</button>
            <p class="mt-5 mb-3 text-muted"> SMOKE DETECTION</p>
        </form>
    </main>



</body>

</html>