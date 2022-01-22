<?php

function check_id($con,$id) {

      $query = "SELECT Customer_ID FROM Customer where Customer_Id = $id limit 1";

      $result=mysqli_query($con,$query);
      if($result && mysqli_num_rows($result)>0) {
            return true;
      }
      return false;
}
function check_coffe_id($con,$id){
      $query = "SELECT CoffeeId FROM Coffe WHERE CoffeeId = $id limit 1";
      $result=mysqli_query($con,$query);
      if($result && mysqli_num_rows($result)>0) {
            return true;
      }
      return false;

}
function check_order_id($con,$id){
      $query = "SELECT OrderItemId FROM OrderItem WHERE OrderItemId = $id limit 1";
      $result=mysqli_query($con,$query);
      if($result && mysqli_num_rows($result)>0) {
            return true;
      }
      return false;

}
function check_customerorder_id($con,$id){
      $query = "SELECT OrderId FROM CustomerOrder WHERE OrderId= $id limit 1";
      $result=mysqli_query($con,$query);
      if($result && mysqli_num_rows($result)>0) {
            return true;
      }
      return false;

}


function random_num($length) {
      $text="";
      if($length<5) {
            $length=5;
      }
      

      $len=rand(4,$length);
      for ($i=0; $i <$len ; $i++) { 
            # code...
            $text .=rand(0,9);
      }
      return $text;
}