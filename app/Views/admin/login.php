<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <!-- AdminLTE CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.1.0/dist/css/adminlte.min.css">
    <!-- Custom CSS -->
    <style>
        body {
            padding: 0;
            margin: 0;
            background: url('/img/background.png');
            background-size: cover;
        }
        .login-box {
            height: 400px;
            width: 320px;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: white;
            padding: 10px;
            position: absolute;
            text-align: center;
            border-radius: 20px;
        }
        .login-logo {
            width: 100px;
            height: 100px;
        }

        h1 {
            font-size: 2rem;
            font-weight: bold;
            margin-bottom: 20px;
        }

        .input-group {
            justify-content: center;
            align-items: center;
            background: transparent;
            border: none;
            padding: 5px;
        }
        .btn-primary {
            background-color: black;
            border: none;
            padding: 10px;
            border-radius: 10px;
        }
        .btn-primary:hover {
            background-color: gray;
        }
    </style>
</head>
<body class="hold-transition login-page">
    <div class="login-box" style="display: flex; justify-content: center; align-items: center; flex-direction: column;">
        <!-- Login Logo -->
        <img src="/img/logo.png" alt="logo" class="login-logo">
        <!-- /.login-logo -->
               <h1>LOGIN</h1>
        <form action="/auth/proses_login" method="post" style="display: flex; flex-direction: column; align-items: center;">
            <div class="input-group" style="display: flex; justify-content: center; align-items: center;">
                <input type="text" class="form-control" placeholder="Username" name="username" required>
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="input-icon"><img style="width: 20px; height: 20px;" src="/img/arrow.png"></span>
                    </div>
                </div>
            </div>
            <div class="input-group mb-3" style="display: flex; justify-content: center; align-items: center;">
                <input type="password" class="form-control" placeholder="Password" name="password" required>
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="input-icon"><img style="width: 20px; height: 20px;" src="/img/lock.png"></span>
                    </div>
                </div>
            </div>
            <!-- /.col -->
            <div class="col-12" style="align-items: center;">
                <button type="submit" class="btn btn-primary" style="width: 100%;">Login</button>
            </div>
            <!-- /.col -->
        </form>
    </div>
    <!-- /.login-box -->

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="https://cdn.jsdelivr.net/npm/admin-lte@3.1.0/dist/js/adminlte.min.js"></script>
</body>
</html>
