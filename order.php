<?php
 include("connection.php");
 include("functions.php");
 session_start();

    if(!isset($_SESSION['customer_id'])) {
        header("Location: login.php");

    }
      $customerid=$_SESSION['customer_id'];
      $query="SELECT * FROM Customer where Customer_Id= '$customerid'  limit 1";
      $result=mysqli_query($con,$query);
      $row_numbers=mysqli_num_rows($result);

      if($result){
         if($row_numbers>0){
             $customer_info = mysqli_fetch_assoc($result);

            }
        }


    $counter=0;
    $element_array=array();
    $query_list=array();
    $coffe_array=array();



    $size_array=array();
    $query2="SELECT * FROM Size ";

    $result2=mysqli_query($con,$query2);
    $id=0;
    while ($row = mysqli_fetch_assoc($result2)) {
        if($id!=$row["CoffeeId"]){
            $query="SELECT * FROM Coffe WHERE CoffeeId =" .$row['CoffeeId']." limit 1";
            $result=mysqli_query($con,$query);
            $row2 = mysqli_fetch_assoc($result);
            $id=$row["CoffeeId"];
    

        }

        $arr = array("CoffeeId"=>$row["CoffeeId"],"TYPE"=> $row["TYPE"],"Cost"=>$row["Cost"],"NAME"=> $row2["NAME"],"Description"=> $row2["Description"]);
        $size_array[]=$arr;
    }
    $json_array = json_encode($size_array);
    if($_SERVER['REQUEST_METHOD'] == "POST") {
                   
        $str = json_decode($_POST['str'], true); 
        //var_dump($str); 
        if(sizeof($str)>0){
            $_SESSION['Order'] = $str;
            header("Location: orderconfirm.php");
    
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
    <!-- <script src="order.js"></script> -->

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

    <button type="button" class="btn    btn-lg col-12" type="button" data-toggle="collapse"
        style="border-radius: 0px; background-color: #6F4E37; color: white;" data-target="#collapseExample"
        aria-expanded="false" aria-controls="collapseExample">
        Click for Customer Information
    </button>

    <div class="collapse mb-4" id="collapseExample">

            <div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12 mx-auto">
                <div class="card ">
                    <div class="card-body">
                        <div class="row gutters">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <h6 class="mb-2" style="color:  #6F4E37;">Personal Details</h6>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                <div class="form-group">
                                    <label for="fullName">Full Name</label>
                                    <div class="card border border-success 2 py-1 px-1">
                                        <?php
                                            echo $customer_info['FirstName'].' '. $customer_info['LastName'];
                                        ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                <div class="form-group">
                                    <label for="eMail">Email</label>
                                    <div class="card border-success py-1 px-1">
                                        <?php
                                            echo $customer_info['EMailAddress'];
                                        ?>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="row gutters">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <h6 class="mt-3 mb-2 " style="color:  #6F4E37;">Address</h6>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                <div class="form-group">
                                    <label for="Street">Street Address</label>
                                    <div class="card border-success py-1 px-1">
                                        <?php
                                            echo $customer_info['StreetAddress'];
                                        ?>                                   
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                <div class="form-group">
                                    <label for="city">Town</label>
                                    <div class="card border-success py-1 px-1">
                                        <?php
                                            echo $customer_info['Town'];
                                        ?>                                                                           
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                <div class="form-group">
                                    <label for="state">PostCode</label>
                                    <div class="card border-success py-1 px-1">
                                       <?php
                                            echo $customer_info['PostCode'];
                                        ?>                                   
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
    </div>
    <h1 class="display-3 " style="color: white; text-align: center;   font-weight: 500;">Create Order</h1>

    <div class="col-xl-8 col-lg-6 col-md-12 col-sm-12 col-12 mx-auto">
        <div class="card ">
            <div class="card-body table-responsive">
                <table id="coffe-list" class="table ">
                <thead class="thead-dark">
                    <tr>
                        <td>Coffee Name</td>
                        <td>Size</td>
                        <td>Quantity</td>
                        <td >Description</td>
                        <td>Price</td>
                        <td>Remove</td>


                    </tr>
                </thead>

                    <tr>
                        <td>

                            <select name="coffe-names" id="coffe-id">
                                <?php
                                    $coffe_array=array();
                                    $query="SELECT * FROM Coffe ";
                                
                                    $result=mysqli_query($con,$query);
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        $val=$row['NAME'];
                                        echo "<option name=\"$val\" value=\" $val\"> $val</option> ";      
                        
                                    }
                                
                                ?>
                               >
                            </select>
                        </td>

                        <td>

                            <select method="post" methodname="sizes" id="size-id">
                                <option value="Small">Small</option>
                                <option value="Medium">Medium</option>
                                <option value="Large">Large</option>
                            </select>
                        </td>
                        <td>

                            <input type="text" placeholder="amount" id="amount-id" name="amount" required>
                        </td>
                        <td id="descr">
                         

                        </td>
                        <td id="price">
                         

                        </td>

                     </tr>
                     <tbody id="coffe-list-body">

                    </tbody>
                    <tbody class="thead-dark">
                    <tr>
                        <td> </td>
                        <td></td>
                        <td></td>
                        <td></td>

                        <td>                       
                            <div id="total-cost">
                                <p>0$   </p>
                            </div>        
                        </td>
                        <td></td>


                    </tr>
                </tbody>

                </div>                
                </table>
                                    


                  
                <button  id="add-coffe" class="btn offset-lg-6btn btn-blue mb-3">Add Coffe</button>
                <br>  
                
            </div>
           
            
            <span id="result"></span> 	
                
            <form method="post">
            <div class="row">
                <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3">

                </div>
                <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3">

                </div>
                <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3">

                </div>                
                <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3">
                <button  style="width: 100px;" type="submit" id="sbm-btn" class="btn col-md-3 offset-md-3btn btn-blue mb-3">Create</button>
                <input type="hidden" id="str" name="str" value="" /> 
                </div>
            </div>


           
                       
            </form>  
        </div>
       
    </div>



</body>
<script>
    let counter=0
    let total_cost=[]
    var arrayObjects = <?php echo $json_array; ?>

    function totalCostFunc(){
        var rtn=0
        for (var i = 0; i < total_cost.length; i++) {
            rtn+= total_cost[i][1]
        }
        console.log("Total Price is"+rtn)

        return rtn
    }
    function remove_element(id){
        var rtn=0
        for (var i = 0; i < total_cost.length; i++) {
            if(id==total_cost[i][0]){
                total_cost.splice(i, 1)
            
            }
            
        }

      
        return rtn
    }
  
    
    function doThing(currentButton) {
        console.log("ID IS"+currentButton.id)
        var rmv = document.getElementById("coffe"+(currentButton.id))
        rmv.parentNode.removeChild(rmv)
        remove_element(currentButton.id)
        printCost()
    }
    function printCost(){
        var x =  totalCostFunc()
        document.getElementById('total-cost').innerHTML = `<p>${x}$</p>`;
        

    }
    function printPrice(){
        let coffeNameVal = document.getElementById("coffe-id").value;
        let sizeVal = document.getElementById("size-id").value;
        let amountVal = document.getElementById("amount-id").value;
        let coffe_cost=0 
        for (var i = 0; i < arrayObjects.length; i++) {
            

            if((coffeNameVal.trim()==arrayObjects[i]['NAME'])&&(sizeVal.trim()==arrayObjects[i]['TYPE'])){
                var x = arrayObjects[i]['Cost']
                coffe_cost= x*amountVal
                description=arrayObjects[i]['Description']
                console.log(arrayObjects[i])
                document.getElementById('descr').innerHTML = `${description}`;
                break;

            }
        
        }

        if (isNaN(amountVal)) 
        {
            document.getElementById('price').innerHTML = `0$`;
        }
        else if(amountVal<=0){
            document.getElementById('price').innerHTML = `0$`;        }
        else{
            document.getElementById('price').innerHTML = `${coffe_cost}$`;

        }
    }
     

    document.addEventListener('DOMContentLoaded', function () {



    console.log(counter)
 
    document.getElementById('coffe-id').addEventListener('change',() => 
    {
        printPrice()
    });
    document.getElementById('coffe-id').addEventListener('change',() => 
    {
        printPrice()
    });
    document.getElementById('size-id').addEventListener('change',() => 
    {
        printPrice()
    });
    document.getElementById('amount-id').addEventListener('input',() => 
    {
        printPrice()
    });




    document.getElementById('add-coffe').addEventListener('click', () => 
    {
            
        var coffeid="coffe"+counter
        var sizeid="size"+counter
        var amount ="amount"+counter
        var cost = "cost"+counter
        let coffeNameVal = document.getElementById("coffe-id").value;
        let sizeVal = document.getElementById("size-id").value;
        let amountVal = document.getElementById("amount-id").value;
        var coffe_cost=0
        var CoffeId=0
        var description=""
        $("#sbm-btn").click( function() {
				$('#str').val(JSON.stringify(total_cost));
	    });

        if (isNaN(amountVal)) 
        {
            alert("Enter a numeric value");
            return false;
        }
        else if(amountVal<=0){
            alert("amount must be greater than zero")
        }
        else{
            
        for (var i = 0; i < arrayObjects.length; i++) {
            
            if((coffeNameVal.trim()==arrayObjects[i]['NAME'])&&(sizeVal.trim()==arrayObjects[i]['TYPE'])){
                var x = arrayObjects[i]['Cost']
                coffe_cost= x*amountVal
                CoffeId=arrayObjects[i]['CoffeeId']
                description=arrayObjects[i]['Description']
                


             
            }
          
        }
        console.log(coffe_cost)
      
        
        document.getElementById('coffe-list-body').innerHTML += `
 
                    <tr id=${coffeid}>
                        <td>
                        <p>${coffeNameVal}</p>
                            
                        </td>

                        <td>
                        <p>${sizeVal}</p>

                        </td>
                        <td>
                        <p>${amountVal}</p>

                        </td>
                        <td>
                        <p style="font-size: small;" >${description}</p>

                        </td>
                        <td>
                            <p>${coffe_cost}$</p>
 
                        </td>
                        <td id=${cost}>

                        </td>

                     </tr>`;
            document.getElementById(cost).innerHTML += "<input  class='btn btn-blue btn-sm   ' style=' width: 50px; height: 30px;'  type = 'button' value = '-'  id = '" + counter + "' onclick = doThing(this)>";
            tmparr=[counter,coffe_cost,CoffeId,sizeVal,amountVal,coffeNameVal]
            total_cost.push(tmparr)
            
            counter+=1
            printCost()
        
        }



    });
    
           
});



</script>
</html>