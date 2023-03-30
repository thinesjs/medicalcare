<?php
    // make sure if the user wasn't logged in yet. 
    // If the user already logged in, we'll redirect to dashboard page
    if ( Authentication::isLoggedIn() )
    {
      header('Location: /profile');
      exit;
    }

    // login
    if ( $_SERVER["REQUEST_METHOD"] === 'POST' ) {

      $email = $_POST['email'];
      $password = $_POST['password'];

      // make sure there is no error
      if ( !$error ) {

        // Step 2: login the user
        $user_id = Authentication::login( $email, $password );
              
        // if $user_id is false, 
        // meaning either email or password is incorrect
        if ( !$user_id ) {
          // trigger error message
          $error = "Email or Password is incorrect";
        } else {
          // if $user_id is valid,
          // $user_id is a number

          // step 3: assign the user to $_SESSION['user']
          Authentication::setSession( $user_id );

          // Step 4: remove csrf token & redirect the user to dashboard
            // 4.2: redirect to dashboard
            header('Location: /profile');
            exit;

        } // end - !$user_id

      } // end - !$error

    }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>MedicalCare - Login</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Bootstrap icons-->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css" integrity="sha384-b6lVK+yci+bfDmaY1u0zE8YYJt0TZxLEAFyYSLHId4xoVvsrQu3INevFKo+Xir8e" crossorigin="anonymous">
        <!-- Core theme CSS (includes Bootstrap)-->
        <!-- <link href="../assets/css/styles.css" rel="stylesheet" /> -->
        <!-- Font Awesome -->
        <link
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
        rel="stylesheet"
        />
        <!-- Google Fonts -->
        <link
        href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap"
        rel="stylesheet"
        />
        <!-- MDB -->
        <link
        href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.1.0/mdb.min.css"
        rel="stylesheet"
        />
    </head>
    <body class="d-flex flex-column min-vh-100">
        <!-- navbar -->
        <?php // require dirname(__DIR__) . '/models/header.php';?>
    
        <!-- login section-->
        <section class="py-5">
            <div class="container mt-5 pt-5" style="max-width: 500px;">
            <div class="row justify-content-center mb-4">
                    <img src="assets/logo.png" class="w-25">
            </div>
            <!-- Pills navs -->
            <ul class="nav nav-pills nav-justified mb-3" id="ex1" role="tablist">
            <li class="nav-item" role="presentation">
                <a class="nav-link active" id="tab-login" href="#" role="tab"
                aria-controls="pills-login" aria-selected="true">Login</a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link" id="tab-register" href="signup" role="tab"
                aria-controls="pills-register" aria-selected="false">Sign Up</a>
            </li>
            </ul>
            <!-- Pills navs -->

            <!-- Pills content -->
            <div class="tab-content">
                <div class="tab-pane fade show active" id="pills-login" role="tabpanel" aria-labelledby="tab-login">
                <?php require dirname( __DIR__ ) . '/models/error_box.php'; ?>
                    <form method="post" action="<?php echo $_SERVER["REQUEST_URI"]; ?>">

                    <!-- Email input -->
                    <div class="form-outline mb-4">
                        <input type="email" name="email" class="form-control" />
                        <label class="form-label" for="email">Email</label>
                    </div>

                    <!-- Password input -->
                    <div class="form-outline mb-4">
                        <input type="password" name="password" class="form-control" />
                        <label class="form-label" for="password">Password</label>
                    </div>

                    <!-- Submit button -->
                    <button type="submit" class="btn btn-primary btn-block mb-4">Sign in</button>

                    <!-- Register buttons -->
                    <div class="text-center">
                        <p>Not a member? <a href="signup">Register</a></p>
                    </div>
                    </form>
                </div>
            </div>
            <!-- Pills content -->

            </div>
            
        </section>
        
        <!-- Footer-->
        <?php // require dirname(__DIR__) . '/models/footer.php';?>
        <!-- MDB -->
        <script
        type="text/javascript"
        src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.1.0/mdb.min.js"
        ></script>
    </body>
</html>
