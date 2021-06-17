<!DOCTYPE html>
<html>

<head>

	<title>Customer List</title>

	<link rel="stylesheet" type="text/css" href="ttable.css">

</head>

<body>
<div class="logo">
    <a href="index.html"><img src="bank.png"></a>
</div>
<div class="title">
                <h1>Customer List</h1>
            </div>

<table class="content-table">
  <thead>
    <tr>
      <th>ID</th>
      <th>Name</th>
      <th>E-Mail</th>
      <th>Balance</th>
      <th>Send Funds</th>
      <!-- <th>Receiver</th> -->
    </tr>
  </thead>
  <tbody>
  <?php
$host = "localhost";
$user = "postgres";
$pass = "kartik2548";
$db = "banking";
$con = pg_connect("host=$host dbname=$db user=$user password=$pass");
// $con->exec('SET search_path TO public');

$query = "select * from customer";

$result = pg_query($con,$query);


while($res = pg_fetch_array($result)){

    echo "
    <tr>
    <td> ".$res['cust_id']."</td>
    <td>".$res['cust_name']."</td>
    <td>".$res['email']."</td>
    <td>".$res['balance']."</td>
    <td><a href = 'money.php?rn=$res[cust_name]'>Select</td>
</tr>
";

// <?php
}

?>
</tbody>


</table>

</body>


</html>

<!-- <td><a href = '#?sn2=$res[cust_name]'>Select</td> -->
