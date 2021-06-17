
<!DOCTYPE html>
<html>

<head>

	<title>Transaction History</title>

	<link rel="stylesheet" type="text/css" href="ttable.css">

</head>

<body>
<div class="logo">
    <a href="index.html"><img src="bank.png"></a>
</div>
<div class="title">
                <h1>Transaction History</h1>
            </div>
<div style="overflow-y:auto;">
<div style="overflow-x:auto;">
<table>
    <thead>

	<tr>

		<th>Sender</th>
		<th>Receiver</th>
		<th>Amount</th>

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

$query = "select * from history";

$result = pg_query($con,$query);


while($res = pg_fetch_array($result)){

    ?>

    <tr>
    <td><?php echo $res['sender']; ?></td>
    <td><?php echo $res['receiver']; ?></td>
    <td><?php echo $res['amount']; ?></td>
</tr>

<?php
}

?>
</tbody>

</table>
</div>
</div>

</body>


</html>
