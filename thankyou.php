<?php
    session_start();
    if(!isset($_SESSION['orderid'])) {
        header("Location: order.php");
    }
    $orderid=$_SESSION['orderid'];
    unset($_SESSION['orderid']);


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
    

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@700&display=swap" rel="stylesheet">

    
    <style>
         body {
            background-image: url('thankscoffe2.jpg');
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
         }


    </style>
</head>
<body>
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
            Main pages
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
    <div class="container py-5">
        
    <h1 class="display-1 " style="color: white; text-align: center;   font-weight: 500;">THANK YOU</h1>
    <h1 class="display-3 " style="color: white; text-align: center;   font-weight: 500;">YOUR ORDER NUMBER IS <a style="color: green;"><?php echo $orderid; ?></a></h1>
    <br>
    <br>
    <br>
    <p class="display-6 py-4" style="color: gold; text-align: center; ">
        Keep your best wishes, close to your heart and watch what happens and enjoy your coffee!
    </p>
    </div>
    
</body>