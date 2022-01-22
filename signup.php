<?php
    session_start();

    include("connection.php");
    include("functions.php");
 
 
    if($_SERVER["REQUEST_METHOD"] == "POST") {

        $email = $_POST['email'];
        $password = $_POST['psw'];
        $firstName=$_POST['first-name'];
        $lastName=$_POST['last-name'];
        $town=$_POST['town'];
        $streetAddress=$_POST['street-address'];
        $postcode=$_POST['post-code'];
        $customerid= random_num(7);
        while(TRUE){
            if(check_id($con,$customerid)){
                $customerid= random_num(7);
            }
            else{
                break;
            }
        }
    }

?>
<html>



<head>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
    integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
    crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
    integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
    crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
    integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
    crossorigin="anonymous"></script>

  <style>
    body {
      background-image: url('moritz-knoringer-5QR63diGK5o-unsplash.jpg');

      background-position: center;
      background-repeat: no-repeat;
      background-size: cover;
    }

    .btn-blue {
      background-color: #1A237E;
      width: 150px;
      color: #fff;
    }

    .btn-blue:hover {
      background-color: #1A23DE;
      color: #fff;

      cursor: pointer
    }

    .form-element {
      padding-left: 12px;
      padding-right: 12px;
      margin-top: 5px;
    }

    label {
      margin-top: 10px;
    }
  </style>
</head>

<body>
  <nav class="navbar navbar-expand-lg bg-dark navbar-dark sticky-top div1">
    <a class="navbar-brand" href="index.php">
      <img src="apollo2.png" height="30" alt="">
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
      aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ms-auto  mt-2 mt-lg-0">
        <li class="nav-item">
        <a class="nav-link" href="index.php">
            Main page
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="adminform.php">
            Admin form
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="currentorders.php">
            Current Orders
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="order.php">
            Order
          </a>
        </li>
        <li class="nav-item">
        <?php
          if(isset($_SESSION['customer_id'])) {
            echo"<a class=\"nav-link\" href=\"logout.php\">
              Logout
            </a>";
          }
          else{
            echo"<a class=\"nav-link\" href=\"login.php\">
              Login
            </a>";
          }
        ?>

        </li>
        <li class="nav-item">
          <a class="nav-link" href="signup.php">
            Signup
          </a>
        </li>




      </ul>
    </div>
  </nav>

  <div class="col-lg-6 mx-auto py-5">
    <div class="card card border-3 px-4 py-5 ">
      <div class="card-body">
        <form method="post" style="border:1px solid #ccc">
          <div class="container">
            <div class="row">
              <h1 class="mt-2">Sign Up</h1>
              <p>Please fill in this form to create an account.</p>
              <hr class="">
              <div class="col-lg">

                <label for="email"><b>Email</b></label>
                <div class="row form-element">
                  <input type="text" class="form-control " placeholder="Enter Email" id ="email" name="email" required>
                </div>
                <label for="psw"><b>Password</b></label>
                <div class="row form-element">
                  <input type="password" class="form-control " placeholder="Enter Password" id ="psw" name="psw" required>
                  <div id="psw-same">

                  </div>
                </div>
                <label for="psw-repeat"><b>Repeat Password</b></label>

                <div class="row form-element">
                  <input type="password" class="form-control " placeholder="Repeat Password" id="psw-repeat" name="psw-repeat" required>
                  <div id="psw-same1">

                  </div>
                </div>
                <label for="psw-repeat"><b>Town</b></label>

                <div class="row form-element">
                  <input type="text" class="form-control " placeholder="Enter your Town" name="town" required>

                </div>



              </div>
              <div class="col-lg">

              <div class="col-lg">

                <label for="firs-name"><b>First Name</b></label>
                <div class="row form-element">
                  <input type="text" class="form-control " placeholder="Enter your name" id="first-name" name="first-name" required>
                  <div id="name-numeric">

                  </div>
                </div>
                <label for="psw"><b>Last Name</b></label>
                <div class="row form-element">
                  <input type="text" class="form-control " placeholder="Enter your last name" id="last-name" name="last-name" required>
                  <div id="lastname-numeric">

                  </div>
                </div>
                <label for="psw-repeat"><b>Street Address</b></label>

                <div class="row form-element">
                  <input type="text" class="form-control " placeholder="StreetAddress" name="street-address" required>
                </div>
                <label for="psw-repeat"><b>Post code</b></label>

                <div class="row form-element">
                  <input type="text" class="form-control " placeholder="Enter post code" id="post-code" name="post-code" required>
                  <div id="postcodediv">

                  </div>
                </div>

              </div>
            </div>
            <?php
                if($_SERVER["REQUEST_METHOD"] == "POST") {
              
                    $query = "SELECT EMailAddress FROM Customer where EMailAddress = '$email' limit 1";
                    $result=mysqli_query($con,$query);
                    if(mysqli_num_rows($result)>0) {
                        echo "<p class=\"text-danger\">Email is already used </p>";
                    }          
                    else if(!empty($email) && ($password!=0)) {
                        $query2="INSERT INTO Customer (Customer_Id, FirstName, LastName, StreetAddress, Town, PostCode, EMailAddress, password) values($customerid,'$firstName', '$lastName', '$streetAddress', '$town', $postcode,'$email','$password') ";
                        if ($con->query($query2) === FALSE) {
                            echo "New record created unsuccessfully";
                        }
                        else{
                          echo "<p class=\"text-success\">Account is created!</p>";
                          echo"<script>alert('Account Created'); </script>";

                        } 
                    }
                }
                
            ?>
            <p>By creating an account you agree to our <a href="#" style="color:dodgerblue">Terms & Privacy</a>.</p>

            <button type="submit" id="hidden-submit" class="btn btn-blue mb-3" hidden>Sign Up Hidden</button>

          </div>
        </form>
        <input type = "button" class="btn btn-blue mb-3" id="signup" value="Sign Up" />

      </div>
    </div>
  </div>




</body>

</html>
<script>
  document.addEventListener('DOMContentLoaded', function () {
    document.getElementById('signup').addEventListener('click', () => {
      let checkval=false

      let password = document.getElementById("psw").value;
      let repeat = document.getElementById("psw-repeat").value;
      let firstname = document.getElementById("first-name").value;
      let lastname = document.getElementById("last-name").value;
      let postcode = document.getElementById("post-code").value;


      if(password!=repeat){
        checkval=true

        document.getElementById('psw-same').innerHTML = `<p class="text-danger">passwords must be the same</p>`;
        document.getElementById('psw-same1').innerHTML = `<p class="text-danger">passwords must be the same</p>`;

      }
      else{
        document.getElementById('psw-same').innerHTML = ``;
        document.getElementById('psw-same1').innerHTML = ``;

      }
      if( /\d/.test(firstname)){
        checkval=true
        document.getElementById('name-numeric').innerHTML = `<p class="text-danger">name can't contain number</p>`;

      }
      else{
        document.getElementById('name-numeric').innerHTML = ``;

      }
      if( /\d/.test(lastname)){
        checkval=true
        document.getElementById('lastname-numeric').innerHTML = `<p class="text-danger">last name can't contain number</p>`;

      }
      else{
        
        document.getElementById('lastname-numeric').innerHTML = ``;
      }
      if(isNaN(postcode)){
        checkval=true
        document.getElementById('postcodediv').innerHTML = `<p class="text-danger">post code must be a number</p>`;

      }
      else{
        document.getElementById('postcodediv').innerHTML = ``;

      }

      if(!checkval){
        let postcode = document.getElementById("email").value;

        if (!(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(postcode))){
          alert("You have entered an invalid email address!")
        }
        else{
          document.getElementById("hidden-submit").click();
        }



      }

    
    
    });
    
    

  
  });

</script>