<?php
$host = "localhost";
$user = "postgres";
$pass = "kartik2548";
$db = "banking";
$con = pg_connect("host=$host dbname=$db user=$user password=$pass");
// $con->exec('SET search_path TO public');
if(!$con){
    echo "Error : Unable to open database\n";
} 
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