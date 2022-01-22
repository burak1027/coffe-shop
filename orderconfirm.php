<?php
    include("connection.php");
    include("functions.php");
    session_start();

    if(!isset($_SESSION['Order'])) {
        header("Location: order.php");
    }
    $total_cost=0;
    $arr= $_SESSION['Order'];

    if($_SERVER['REQUEST_METHOD'] == "POST") {
        $customer_order_id= random_num(5);
        while(TRUE){
            if(check_customerorder_id($con,$customer_order_id)){
                $customer_order_id= random_num(7);
            }
            else{
                break;
            }
        }
        $date_val=date('Y-m-d H:i:s');
        $d_time = $_POST['entry-deliver'];
        $cus_id= $_SESSION['customer_id'];
        $query="INSERT INTO CustomerOrder(OrderId, DATE, DeliveryTime, CustomerId) values($customer_order_id,'$date_val', '$d_time', $cus_id ) ";
        if(mysqli_query($con, $query)){
            echo"success";
        }
        else{
            echo"non-success";
        }
        foreach ($arr as $value) {
            $orderid=random_num(7);
            while(TRUE){
                if(check_order_id($con,$orderid)){
                    $orderid= random_num(7);
                }
                else{
                    break;
                }
            }
            $query2="INSERT INTO OrderItem(OrderItemId, OrderId, CoffeeId, Quantity, TYPE) values ($orderid,$customer_order_id, $value[2], $value[4], '$value[3]') ";
            mysqli_query($con, $query2);

        }
        unset($_SESSION['Order']);
        $_SESSION['orderid']=$customer_order_id;
        header("Location: thankyou.php");



        
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

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@700&display=swap" rel="stylesheet">
    <style>
         body {
            background-image: url('thankscoffe.jfif');

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
    <h1 class="display-3 " style="color: white; text-align: center;   font-weight: 500;">Your Order</h1>

    <div class="col-xl-8 col-lg-6 col-md-12 col-sm-12 col-12 mx-auto">
    <form method="post">

        <div class="card ">
            <div class="card-body">
                <table id="coffe-list" class="table ">
                <thead class="thead-dark">
                    <tr>
                        <td>Coffee Name</td>
                        <td>Size</td>
                        <td>Quantity</td>
                        <td>Price</td>


                    </tr>
                </thead>

                   
                     <tbody id="coffe-list-body">
                      
                        <?php foreach($arr as $value): ?>
                            <?php $total_cost= $total_cost+$value[1]?>
                            <tr id=${coffeid}>
                                <td>
                                <?= $value[5]; ?>
                                    
                                </td>

                                <td>
                                <?= $value[3]; ?>

                                </td>
                                <td>
                                <?= $value[4]; ?>

                                </td>
                                
                                <td>
                                <?= $value[1]; ?>$
        
                                </td>
                                <td >
                               

                            </tr>
                            
                        <?php endforeach; ?>
                        

                    </tbody>
                    <tbody class="thead-dark">
                    <tr>
                        <td> </td>
                        <td></td>
                        <td></td>

                        <td>                       
                            <div id="total-cost">
                            <?= $total_cost; ?>$

            
                            </div>        
                        </td>


                    </tr>
                </tbody>

                </div>                
                </table>
                                    


                <label>Enter a delivery time</labele>
                <br>
                    <input class="mb-3 mt-1" type="text" placeholder="Enter the delivery time" id="entrydeliver" name="entry-deliver" required>


            </div>
           
             
            <span id="result"></span> 	
                
            <div class="row">
                <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3">

                </div>
                <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3">

                </div>
                <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3">

                </div>                
                <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3">
                <button  style="width: 100px;" type="submit" id="sbm-btn" class="btn col-md-3 offset-md-3btn btn-blue mb-3">Confirm</button>
                </div>
            </div>
               
        </div>
    </form>  

    </div>
</body>