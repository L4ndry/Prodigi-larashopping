<?php 
    $total=0;
?>
@foreach($carts as $cart)
  <?php
    $total += ($cart->product->price*$cart->quantity);
  ?>
@endforeach
{{$total}}