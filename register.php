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
    <title>NEUB WORKSHOP - SIGN UP</title>
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
            <div class="col-sm-4" style="margin-top: 10px;">

                <div style="text-align:center;">
                    <a href="index.php">
                        <img src="files/icons/neub.png" height="70px" width="160px" style="margin-bottom: 10px;">
                    </a>
                    <h3>SIGN UP</h3>
                </div>
                <form action="subdir/regsub.php" method="POST">
                    <!-- Name input -->
                    <div class="form-outline mb-4">
                        <input type="text" id="form2Example1" class="form-control" name="name" />
                        <label class="form-label" for="form2Example1">Name</label>
                    </div>

                    <!-- Username input -->
                    <div class="form-outline mb-4">
                        <input type="text" id="form2Example1" class="form-control" name="username" />
                        <label class="form-label" for="form2Example1">Username</label>
                    </div>

                    <!-- University input -->
                    <div class="form-outline mb-4">
                        <input type="text" id="form2Example1" class="form-control" name="university_id" />
                        <label class="form-label" for="form2Example1">Uiversity ID</label>
                    </div>

                    <!-- Semester input -->
                    <div class="form-outline mb-4">
                        <input type="text" id="form2Example1" class="form-control" name="semester" />
                        <label class="form-label" for="form2Example1">Semester</label>
                    </div>

                    <!-- Email input -->
                    <div class="form-outline mb-4">
                        <input type="email" id="form2Example1" class="form-control" name="email" />
                        <label class="form-label" for="form2Example1">Email address</label>
                    </div>

                    <!-- Password input -->
                    <div class="form-outline mb-4">
                        <input type="password" id="form2Example2" class="form-control" name="password" />
                        <label class="form-label" for="form2Example2">Password</label>
                    </div>

                    <!-- 2 column grid layout for inline styling -->
                    <div class="row mb-4" style="text-align:center;">
                        <div class="col">
                            <input type="submit" name="submit" class="btn btn-primary btn-block mb-4 basic-btn" value="SIGN UP">
                        </div>
                    </div>

                    <div style="text-align:center;">

                        <!-- Register buttons -->
                        <div class="text-center">
                            <p>Already registered? <a href="login.php">Login</a></p>
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