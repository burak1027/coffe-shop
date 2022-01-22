<?php

    include("connection.php");
    include("functions.php");
    session_start();


    if($_SERVER["REQUEST_METHOD"] == "POST") {

        $coffename = $_POST['coffe-name'];
        $coffedesc = $_POST['coffe-description'];
        $small=$_POST['small'];
        $medium=$_POST['medium'];
        $large=$_POST['large'];
        $coffeid= random_num(7);
        while(TRUE){
            if(check_coffe_id($con,$coffeid)){
                $coffeid= random_num(7);
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
            background-image: url('coffeimg.jfif');
            /* Full height */
            height: 100%;

            /* Center and scale the image nicely */
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
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
                    <a class="nav-link" href="signup.php">
                        Signup
                    </a>


                </li>



            </ul>
        </div>

    </nav>
<h1 class="mb-2" style="color:  #6F4E37; text-align: center;">Administration Form</h1>

<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 mx-auto py-5">
<div class="card ">
    <div class="card-body">
        <form method="post" enctype="multipart/form-data" >
            <div class="row gutters">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <h6 class="mb-2" style="color:  #6F4E37;">Coffee Details</h6>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                    <div class="form-group">
                        <label for="fullName">Coffee Name</label>
                        <input type="text" class="form-control " placeholder="Enter Coffe Name" name="coffe-name" required>

                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                    <div class="form-group">
                        <label for="eMail">Coffee Description</label>
                            <input type="text" class="form-control " placeholder="Enter Description" name="coffe-description" required>
                    </div>
                </div>

            </div>
            <div class="row gutters">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <h6 class="mt-3 mb-2 " style="color:  #6F4E37;">Prices For Sizes</h6>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                    <div class="form-group">
                        <label for="Street">Small</label>
                        <input type="text" class="form-control " placeholder="Enter Price" name="small" required>

                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                    <div class="form-group">
                        <label for="city">Medium</label>
                        <input type="text" class="form-control " placeholder="Enter Price" name="medium" required>

                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                    <div class="form-group">
                        <label for="state">Large</label>
                            <input type="text" class="form-control " placeholder="Enter Price" name="large" required>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                    <div class="form-group">
                        <label for="state"> Select image to upload:</label>
                        <input  type="file" name="file" id="file">
                    </div>
                </div>
               

            </div>
            <?php
                if($_SERVER["REQUEST_METHOD"] == "POST") {
                    $query = "SELECT * FROM Coffe WHERE NAME= '$coffename' limit 1";
                    $result=mysqli_query($con,$query);
                    if(mysqli_num_rows($result)>0) {
                        echo "<p class=\"text-danger\">Coffe with $coffename exists </p>";
                    }          
                    else {
                        
                        $query2="INSERT INTO Coffe(CoffeeId, NAME, Description)  values($coffeid,'$coffename', '$coffedesc')";
                        $query3="INSERT INTO Size(CoffeeId, TYPE, Cost) values ($coffeid,'Small',$small)";
                        $query4="INSERT INTO Size(CoffeeId, TYPE, Cost) values ($coffeid,'Medium',$medium)";
                        $query5="INSERT INTO Size(CoffeeId, TYPE, Cost) values ($coffeid,'Large',$large)";

                        
                        if (mysqli_query($con, $query2) === FALSE) {
                            echo "New record created unsuccessfully";
                        }
                        if(mysqli_query($con, $query3)&&mysqli_query($con, $query4)&&mysqli_query($con, $query5)){
                            echo "<p class=\"text-success\">New Coffe Added Successfully </p>";
                            $extension = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
                            $newfilename =  $coffeid;
                            move_uploaded_file($_FILES["file"]["tmp_name"], "img/" .$newfilename.".".$extension);

                        }

                        
                        
                    }
                }
                
            ?>
            <button type="submit" class="btn btn-blue mt-3">Add Coffe!</button>

        </form>
       
    </div>
</div>
</div>

</body>
</html>







