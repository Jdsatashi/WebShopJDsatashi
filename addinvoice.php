<html>
<head>
<style>
table, th, td {
    border: 2px solid black;
    border-collapse: collapse;
}
th, td {
    padding: 30px;
}
</style>
</head>
<body>
<p><a href="Web.php">Back home page</a></p>
<h2>You have summitted the following to the server: </h2>
    <?php
    $host = "ec2-34-201-248-246.compute-1.amazonaws.com";
    $dbname = "da79i3d6vat4tl";
    $port = "5432";
    $user = "tapdzjqevixblx";
    $pass = "adbd7cd24cae262eaf82c03725969b97984d969afbd7cac9637f9008bcc4f8ec";
    $ssl = "require";

    $link = pg_connect("host=".$host." dbname=".$dbname." port=".$port." user=".$user." password=".$pass." sslmode=".$ssl);
    
    if($link === false){
		die("ERROR: Could not connect.");
	} else {
		echo "Connection to Heroku Postgres has been established";
	}

    $cid = $_REQUEST["cid"];
    $pid = $_REQUEST["pid"];
	$price = $_REQUEST["price"];
    $date = $_REQUEST["datebuy"];

$sql = 'INSERT INTO "invoice"("pid","cid","price","datebuy") VALUES ('."
			'$pid'::integer,'$cid'::integer, '$price'::integer,'$date'::date)".
			 'returning *';

    
	echo $sql;
	
    if(pg_query($link, $sql)){
		echo "Records added successfully.";
	} 
  
	$query = 'SELECT MAX(invid) from "invoice"';
	
    $prod = pg_query($link, $query);

	?>
<table style=“width:100%”>
<tr>
<th>Invoice ID</th>
<th>Product ID</th>
<th>Customer ID</th>
<th>Total Cost</th>
<th>Date buy</th>
</tr>
<tr>
<td><?php while ($row = pg_fetch_row($prod)) echo $row[0];?></td>
<td><?php echo $pid ?></td>
<td><?php echo $cid ?></td>
<td><?php echo $price ?></td>
<td><?php echo $date ?></td>
</tr>
</table>


</body>
</html>