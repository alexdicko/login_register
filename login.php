<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Untitled</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="assets/css/Login-Form-Basic-icons.css">
</head>

<body>
    <section class="py-4 py-xl-5">
        <div class="container">
            <div class="row mb-5">
                <div class="col-md-8 col-xl-6 text-center mx-auto">
                    <h2>Log in</h2>
                    <p>Curae hendrerit donec commodo hendrerit egestas tempus, turpis facilisis nostra nunc. Vestibulum dui eget ultrices.</p>
                </div>
            </div>
            <div class="row d-flex justify-content-center">
                <div class="col-md-6 col-xl-4">
                    <div class="card mb-5">
                        <div class="card-body d-flex flex-column align-items-center">
                            <div class="bs-icon-xl bs-icon-circle bs-icon-primary bs-icon my-4"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-person">
                                    <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z"></path>
                                </svg></div>
                            <form class="text-center" method="post">
                                <div class="mb-3"><input class="form-control" type="text" name="user" placeholder="username"></div>
                                <div class="mb-3"><input class="form-control" type="password" name="pass" placeholder="Password"></div>
                                <div class="mb-3"><button class="btn btn-primary d-block w-100" type="submit" name="login">Login</button></div>
                                <p class="text-muted">Forgot your password?</p>
                                <p class="text-muted">No Account? Register here&nbsp;<i class="far fa-arrow-alt-circle-right"></i></p>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.js"></script>
</body>

</html>



<?php




$servername = "localhost";
$username = "root";
$password = "";
$dbname = "test";
$userInput = $_POST["user"];
$passInput = $_POST["pass"];


$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}



// $sql = "INSERT INTO users (username, password, email)
// VALUES ('John', 'Doe', 'john@example.com')";

// if ($conn->query($sql) === TRUE) {
//   echo "New record created successfully";
// } else {
//   echo "Error: " . $sql . "<br>" . $conn->error;
// }

$query = "SELECT * FROM users WHERE username = '$userInput' AND password = '$passInput'";

$result = $conn->query($query);

if ($result) {
  if (mysqli_num_rows($result) > 0) {
      echo 'found!';
      echo '
                            <script type=\'text/javascript\'>
                            
                            const notyf = new Notyf();
                            notyf
                              .success({
                                message: \'You have successfully logged in!\',
                                duration: 3500,
                                dismissible: true
                              });                
                            
                            </script>
                            ';
  } else {
      echo 'not found';
      
  }
} else {
  echo 'Error: ' . mysqli_error();
}


$conn->close();




?>