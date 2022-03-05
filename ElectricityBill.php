<html>
<body bgcolor="pink">

<h1>REGISTRATION FORM</h1>
<form method="post" action="#">
  Name: &nbsp&nbsp&nbsp<input type="text" name="name"><br><br>
  Consumer Number: &nbsp&nbsp&nbsp<input type="text" name="cnum"><br><br>
  Bill Number: &nbsp&nbsp&nbsp<input type="text" name="bnum"><br><br>
  Units Consumed : &nbsp&nbsp&nbsp<input type="number" name="units"><br><br>
  
  <input type="submit">
</form>

<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
extract($_POST);

function calculate_bill($units) {
    $unit_first = 4;
    $unit_sec = 5;
    $unit_third = 6;

    if($units <= 100) {
        $bill = $units * $unit_first;
    }
    else if($units > 100 && $units <= 200) {
        $temp = 100 * $unit_first;
        $rem_unit = $units - 100;
        $bill = $temp + ($rem_unit * $unit_sec);
    }
    else {
        $temp = (100 * 4) + (100 * $unit_sec) + (100 * $unit_third);
        $rem_unit = $units - 200;
        $bill = $temp + $rem_unit ;
    }
    return number_format((float)$bill, 2, '.', '');
} 


  echo "-------------------------------------------------------------------------";
  echo "<h3>KERALA STATE ELECTRICITY BOARD (KSEB)</h3>";
  echo "<br>";
  echo "Consumer name : ".$name."<br>";
  echo "Consumer number : ".$cnum."<br>";
  echo "Bill number : ".$bnum."<br>";
  echo "Units Consumed : ".$units."<br>";
  $result = calculate_bill($units);
  echo "<h4>Total : ₹ ".$result."</h4><br>";
  echo "-------------------------------------------------------------------------";


}

?>

</body>
</html>