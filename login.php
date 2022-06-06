<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/fontawesome/css/all.css">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css?v=<?php echo time(); ?>">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700&display=swap" rel="stylesheet" />
    <title>NEUB WORKSHOP - LOGIN</title>
    <link rel="shortcut icon" type="image/x-icon" href="rm.ico" />



    <style>

    </style>
</head>

<body style="background-color: white">

    <script src="assets/bootstrap/js/bootstrap.bundle.min.js"></script>

    <div class="container">
        <div class="row">
            <div class="col-sm-4">

            </div>
            <div class="col-sm-4" style="margin-top: 60px;">

                <div style="text-align:center;">
                    <a href="index.php">
                        <img src="files/icons/neub.png" height="70px" width="160px" style="margin-bottom: 20px;">
                    </a>
                    <h3>LOGIN</h3>
                </div>
                <form action="subdir/logsub.php" method="POST">
                    <!-- Email input -->
                    <div class="form-outline mb-4">
                        <input type="text" id="form2Example1" class="form-control" name="email" />
                        <label class="form-label" for="form2Example1">Email address or Username</label>
                    </div>

                    <!-- Password input -->
                    <div class="form-outline mb-4">
                        <input type="password" id="form2Example2" class="form-control" name="password" />
                        <label class="form-label" for="form2Example2">Password</label>
                    </div>

                    <!-- 2 column grid layout for inline styling -->
                    <div class="row mb-4" style="text-align:center;">
                        <div class="col">
                            <input type="submit" class="btn btn-primary btn-block mb-4 basic-btn" value="Log in" name="submit" />
                        </div>
                    </div>

                    <div style="text-align:center;">

                        <!-- Register buttons -->
                        <div class="text-center">
                            <p>Not registered? <a href="register.php">SIGN UP</a></p>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-sm-4">

            </div>
        </div>
    </div>
</body>

</html>