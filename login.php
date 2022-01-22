
<?php
    session_start();
    include("connection.php");
    ob_start();

    if($_SERVER['REQUEST_METHOD'] == "POST") {
        $email = $_POST['email-input'];
        $password = $_POST['password'];

        $query="SELECT * FROM Customer where EMailAddress= '$email'  limit 1";

        $result=mysqli_query($con,$query);
        $row_numbers=mysqli_num_rows($result);
        if($result){
              if($row_numbers>0){
                    $customer_data=mysqli_fetch_assoc($result);


              }
              else{
                  echo "WRONGGG";
              }
      }
      else{
          echo "WRONGGG1";
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
            background-color: beige;
        }

        .btn-blue {
            background-color: #1A237E;
            width: 150px;
            color: #fff;
            border-radius: 2px
        }

        .btn-blue:hover {
            background-color: #1A23DE;
            color: #fff;

            cursor: pointer
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
                    <a class="nav-link" href="currentorders.php">
                        Current Orders
                    </a>


                </li>
                <li class="nav-item">
                    <a class="nav-link" href="adminform.php">
                        Admin form
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
                    <?php

                       // if(!isset($_SESSION['customer_id'])) {
                            echo"<a class=\"nav-link\" href=\"signup.php\">
                                Signup
                            </a>";
                        //}

                    ?>                    
                  
                </li>



            </ul>
        </div>

    </nav>
    <div class="container-fluid px-1 px-md-5 px-lg-1 px-xl-5 py-5 mx-auto">
        <div class="card card0 border-0" style="background-color: beige;">
            <div class="row d-flex">
                <div class="col-lg-6">
                    <div class="card1 pb-5">
                        <div class="row"> <img src="coffe2.jpg" class=" offset-md-1 d-none d-sm-inline-block img-fluid "
                                style="width: 612px; height: 418px;"> </div>
                        <!-- <div class="row px-3 justify-content-center mt-4 mb-5 border-line"> <img
                                src="https://i.imgur.com/uNGdWHi.png" class="image"> </div> -->
                    </div>
                </div>
                <div class="col-lg-6" style="width: 600px;">
                    <form id="submission-form" method="post" >
                        <div class="container px-5">
                            <div class="main-body">
                                <div class="col-md">
                                    <div class="card card border-3 px-4 py-5 ">
                                        <div class="card-body">
                                            <h3 style="text-align: center;">Login</h3>
                                            <div class="row">

                                                <div class="row mt-4">
                                                    <div class="col-sm-3">
                                                        <h6 class="mb-0">E-mail</h6>
                                                    </div>
                                                    <div class="col-sm-9 text-secondary">
                                                        <input type="email" class="form-control" 
                                                            aria-describedby="emailHelp"
                                                            name="email-input"
                                                            placeholder="example@provider.com" required>
                                                    <?php
                                                        if($_SERVER['REQUEST_METHOD'] == "POST") {
                                                            if($row_numbers==0){
                                                                echo "<small class=\"text-danger\">Wrong Email</small>";
                                                
                                                            }
                                                            else{
                                                                echo"";
                                                            }
                                                        }
                                                      
                                                    ?>
                                                    </div>
                                                </div>
                                                <!-- <hr> -->
                                                <div class="row mt-4">
                                                    <div class="col-sm-3">
                                                        <h6 class="mb-0">Password</h6>
                                                    </div>
                                                    <div class="col-sm-9 text-secondary">
                                                        <input type="password" class="form-control" name="password"
                                                            placeholder="Enter password" required>
                                                    <?php
                                                        if($_SERVER['REQUEST_METHOD'] == "POST") {
                                                            if($row_numbers>0){
                                                                if($password!=$customer_data["password"]  ){
                                                                    echo "<small class=\"text-danger\">Wrong password</small>";
                                                                }
                                                                else{
                                                                    $_SESSION["customer_id"]=$customer_data["Customer_Id"];
                                                                    //echo "<small class=\"text-success\">Welcome</small>";
                                                                    header("Location: order.php");

                                                                }
                                                                mysqli_free_result($result);

                                                            }
                                                            
                                                        }

                                                      
                                                    ?>
                                                    </div>
                                                </div>
                                                <div class="row">

                                                    <div class="col-sm mt-4 mb-3 " style="text-align: right;">
                                                     <button
                                                            type="submit"
                                                            class="btn btn-blue text-center">Login
                                                        </button>
                                                    </div>
                                                    <div class="col-sm">
                                                    </div>
                                                    <div class="col-sm">
                                                    </div>


                                                </div>

                                                <div class="row mb-4 px-3"> <small class="font-weight-bold">Don't have
                                                        an account? <a href="signup.php"
                                                            class="text-danger ">Register</a></small>
                                                </div>


                                            </div>



                                        </div>
                                    </div>


                                </div>
                            </div>


                    </form>
                </div>
             
            </div>
            <footer><small>Copyright &copy; 2021. All rights reserved.</small></footer>
          
            </div> 
        </div>
    </div>
</body>

</html>