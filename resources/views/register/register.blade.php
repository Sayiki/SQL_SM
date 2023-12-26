<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="{{ asset('assets/css/register.css') }}">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <title>Sahabat Mahasiswa-Sign Up</title>
    <style>
        .requirement {
            color: rgb(237, 106, 106);
        }
    </style>
</head>

<body>
    <div class="navbar">
        <img src="{{url('assets/image/Logo_Panjang.png')}}" class="img-fluid mt-" width="15%">
        <ul>
            <li><a href="/sesi">Log In</a></li>
        </ul>
    </div>

    <div class="signup-container">
        <form  method="POST" action="register/register">
            @csrf
            <h3 class="text-center">Sign Up</h3>
            <div class="row">
                <div class="col-md-6">
                    <label for="fname" style="color: white;">First Name</label>
                    <input type="text" value="{{ Session::get('fname') }}" class="form-control" id="fname" name="fname"  placeholder="First Name" required>
                </div>
                <div class="col-md-6">
                    <label for="lastname" style="color: white;">Last Name</label>
                    <input type="text" value="{{ Session::get('lname') }}"class="form-control" id="lname" name="lname" placeholder="Last Name"required>
                </div>
                <div class="col-md-4">
                    <label for="username" style="color: white;">Username</label>
                    <input type="Username" value="{{ Session::get('username') }}"class="form-control" id="username" name="username" placeholder="Username"  required>
                </div>
                <div class="col-md-8">
                    <label for="email" style="color: white;">Email</label>
                    <input type="text" value="{{ Session::get('email') }}"class="form-control" id="email" name="email" 
                        placeholder="Email@student.telkomuniversity.ac.id" required>
                </div>
            </div>
            <div class="form-group">
                <label for="password" style="color: white;">Password</label>
                <input type="password" value="{{ Session::get('password') }}"class="form-control" id="password" name="password"  placeholder="Password"required>
                <div class=" mx-auto">
                    <p id="capitalLetter" class="requirement">&#9679; at least use one capital letters </p>
                    <p id="symbol" class="requirement">&#9679; Using Symbol</p>
                    <p id="number" class="requirement">&#9679; At least use one Numbers</p>
                    <p id="minLength" class="requirement">&#9679; Using Minimum 8 Character</p>
                </div>
                <div class="form-group">
                    <label for="confirmPassword" style="color: white;">Confirm Password</label>
                    <input type="password" class="form-control" id="confirmPassword" placeholder="Confirm Password"
                        onkeyup="validate()" onkeyup="checkPasswordMatch" required>
                    <span id="warn" style="color:rgb(237, 106, 106);display:none;">Password does not match</span>
                </div>
        </form>
        <button name =submit type="submit" class="btn btn-primary">registrasi</button>
    </div>
    </form>
    <br>
    <p>Already have an account? <a href="/sesi">Log In</a></p>
    </br>
    <script>
        function validate() {
            var password = document.getElementById("password").value;
            var confirmPassword = document.getElementById("confirmPassword").value;

            if (password != confirmPassword) {
                document.getElementById("confirmPassword").classList.add("redborder");
                document.getElementById("warn").style.display = "block";
                return false;
            } else {
                document.getElementById("confirmPassword").classList.remove("redborder");
                document.getElementById("warn").style.display = "none";
                return true;
            }
        }
        function validateForm() {
            var firstName = document.forms["myForm"]["firstName"].value;
            var lastName = document.forms["myForm"]["lastName"].value;
            var username = document.forms["myForm"]["username"].value;
            var email = document.forms["myForm"]["email"].value;
            var password = document.forms["myForm"]["password"].value;
            var confirmPassword = document.forms["myForm"]["confirmPassword"].value;

            if (firstName == "" || lastName == "" || username == "" || email == "" || password == "" || confirmPassword == "") {
                alert("Please fill in all required fields");
                return false;
            }

            if (password != confirmPassword) {
                alert("Passwords do not match");
                return false;
            }

            if (email !=  + "@student.telkomuniversity.ac.id") {
                alert("Email does not match with Username or invalid email address ");
                return false;
            }


            alert("Registration completed");
            return true;
        }
        $(document).ready(function () {
            var capitalLetter, symbol, number;

            $('#password').on('input', function () {
                var value = $(this).val();
                capitalLetter = /[A-Z]/.test(value);
                symbol = /[!@#$%^&*(),.?":{}|<>]/.test(value);
                number = /[0-9]/.test(value);
                minLength = /.{8,}$/.test(value);
                minLengthRegex = minLength;

                $('#capitalLetter').css('color', capitalLetter ? 'green' : 'rgb(237, 106, 106)');
                $('#symbol').css('color', symbol ? 'green' : 'rgb(237, 106, 106)');
                $('#number').css('color', number ? 'green' : 'rgb(237, 106, 106)');
                $('#minLength').css('color', minLengthRegex ? 'green' : 'rgb(237, 106, 106)');
            });
        });
    </script>
</body>
</html>