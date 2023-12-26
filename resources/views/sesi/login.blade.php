<!DOCTYPE html>
<html>
<head>
    <title>Login Page</title>
    <link rel="stylesheet" type="text/css" href="assets/css/lstyle.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <div class="navbar">
        <img src="assets/image/Logo Panjang.png" class="img-fluid mt-" width="15%">
        <ul>
            <li><a href="/register/register">Sign Up</a></li>
        </ul>
      </div>
        
        <div class="container d-flex justify-content-center align-item-center p-3">
        <div class="row rounded-5 shadow box-area" style="background: #1C1D22; border-radius: 20px;">

        <div class="col-md-6 rounded-4 d-flex justify-content-center align-item-center flex-column left-box">
            <div class="featured-image">
                <img src="assets/image/Schedule.png" class="img-fluid" style="width: 550px;">
            </div> 
        </div>

        <div class="col-md-6">
            <div class="row d-flex justify-content-center align-item-center">
                <form class="mx-auto my-auto shadow d-flex flex-column" action="/sesi/logins" method="POST">
                    @csrf
                    <h3 class="mb-4 text-center">Welcome back </h3>
                    <h4 class="text-center">Login</h4>
                    <div class="mb-3 mt-4">
                      <label for="email" class="form-label" style="color: white;">Email</label>
                      <input type="email" class="form-control" name="email" value="{{ Session::get('email') }}" placeholder="username@student.telkomuniversity.ac.id">
                    </div>
                    <div class="mb-3">
                      <label for="password" class="form-label" style="color: white;">Password</label>
                      <input type="password" class="form-control" name="password" placeholder="Password">
                    </div>
                    <div class="mb-3">
                        <button name="submit" type="submit" class="btn btn-primary">Login</button>
                    </div>
                  </form>
            </div>
        </div>
            
    </div>
</body>
</html>
