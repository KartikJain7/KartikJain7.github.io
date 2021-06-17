<?php
$host = "localhost";
$user = "postgres";
$pass = "kartik2548";
$db = "banking";
$con = pg_connect("host=$host dbname=$db user=$user password=$pass");
// $sn1 = $_GET['sn'];
$rn1 = $_GET['rn'];
// echo $rn1;

if(isset($_POST['Send'])){
    $sender = $_POST['Sender'];
    $receiver = $_POST['Receiver'];
    $amount = $_POST['Amount'];

    $query = "INSERT INTO history (sender,receiver,amount) VALUES('$sender','$receiver','$amount')";
    $q = " SELECT balance FROM customer WHERE cust_name = '$sender'";
    $q1 = " SELECT balance FROM customer WHERE cust_name = '$receiver'";
    $r = pg_query($con,$q);
    $r12 = pg_query($con,$q1);
    $val = pg_fetch_result($r,0,0);
    $val1 = pg_fetch_result($r12,0,0);
    $er=$val-$amount;
    $er1=$val1+$amount;
    $query1 = "UPDATE customer Set balance=$er where cust_name='$sender'";
    $query2 = "UPDATE customer Set balance=$er1 where cust_name='$receiver'";
    $r1 = pg_query($con,$query1);
    $r2 = pg_query($con,$query2);
    $result = pg_query($con,$query);
    // if($result){
    //     echo "Successful";
    //     echo "<BR>";
    //     echo "<a href='trans.html'>Back to main page</a>";
    //  }else {
    //    echo "ERROR";
    //  }
    header("location: trans.html?status=success");
}
pg_close($con);


?>









<!DOCTYPE html>
<!-- Created By CodingLab - www.codinglabweb.com -->
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title> Transaction Panel</title>
    <link rel="stylesheet" href="transf.css">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
<body>
  <div class="logo">
    <a href="ui.html"><img src="bank.png"></a>
</div>
  <div class="container">
    <div class="title">Transaction Menu</div>
    <div class="content">
      <form method="post" action="#">
        <div class="user-details">
          <div class="input-box">
            <span class="details">Sender Name</span>
            <input type="text" name="Sender"  placeholder="Enter sender name" required>
          </div>
          <div class="input-box">
            <span class="details">Receiver Name</span>
            <input type="text" name="Receiver" value='<?php echo "$rn1"?>' placeholder="Enter receiver name" required>
          </div>
          <div class="input-box">
            <span class="details">Amount</span>
            <input type="text" name="Amount" placeholder="Enter amount" required>
          </div>
        <div class="button">
          <input type="submit" name="Send" value="Send Money">
        </div>
        <div class="histbutton">
          <input type="history" onclick= "location.href='ttable.php'" name="Trans" value="Transaction History">
        </div>
      </form>
    </div>
  </div>

</body>
</html>
