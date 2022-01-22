

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
                    session_start();
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
        <?php
            include("connection.php");
            $query="SELECT * FROM customerorder ORDER BY DATE DESC LIMIT 10";
            $result=mysqli_query($con,$query);
            //while ($row = mysqli_fetch_assoc($result)) {
            //    $query2="SELECT * FROM orderitem WHERE OrderId= ".$row["OrderId"];
           //    $result=mysqli_query($con,$query);

           // }

        ?>
        <?php while ($row = mysqli_fetch_assoc($result)) :?>

        <button type="button" class="btn    btn-lg col-12" type="button" data-toggle="collapse"
            style="border-radius: 0px; background-color: #6F4E37; color: white;" data-target="#collapseExample<?= $row["OrderId"]; ?>"
            aria-expanded="false" aria-controls="collapseExample<?= $row["OrderId"]; ?>">
            Order ID = <?= $row["OrderId"]; ?>
        </button>
        <div class="collapse show" id="collapseExample<?= $row["OrderId"]; ?>">
            <div class="card card-body">
            <table id="coffe-list" class="table ">
                <thead class="thead-dark">
                    <tr>
                        <td>Order Item Id</td>
                        <td>Coffe Name</td>
                        <td>Quantity</td>
                        <td>Type</td>

                    </tr>
                </thead>
                    <tbody id="coffe-list-body">
                        <?php
                         $query2="SELECT * FROM (orderitem JOIN coffe ON orderitem.CoffeeId=coffe.CoffeeId) WHERE OrderId=".$row["OrderId"];
                         $result2=mysqli_query($con,$query2);
                        ?>
                        <?php while ($row2 = mysqli_fetch_assoc($result2)): ?>
                            <tr id=${coffeid}>
                                <td>
                                <?= $row2["OrderItemId"]; ?>
                                    
                                </td>

                                <td>
                                <?= $row2["NAME"]; ?>

                                </td>
                                <td>
                                <?= $row2["Quantity"]; ?>

                                </td>
                                
                                <td>
                                <?= $row2["TYPE"]; ?>
        
                                </td>
                                <td >
                               

                            </tr>
                            
                        <?php endwhile;?>
                        

                    </tbody>

                 
                </tbody>

                </div>                
                </table>
            </div>
        </div>
        <?php endwhile;?>

        

    </body>