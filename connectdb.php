<html>
<body>
<p> You have summitted the following to the server: </p>
Your name: <?php echo $_POST["name"]; ?><br>
Your email: <?php echo $_POST["email"]; ?><br>

<?php
$host = "ec2-34-201-248-246.compute-1.amazonaws.com";
$dbname = "da79i3d6vat4tl";
$port = "5432";
$user = "tapdzjqevixblx";
$pass = "adbd7cd24cae262eaf82c03725969b97984d969afbd7cac9637f9008bcc4f8ec";
$ssl = "require";

$link = pg_connect("host=".$host." dbname=".$dbname." port=".$port." user=".$user." password=".$pass." sslmode".ssl);

	if($link === false){
		die("ERROR: Could not connect.");
	} else {
		echo "Connection to Heroku Postgres has been established";
	}
$id = mysql_real_escape_string($link, $_REQUEST['id']);

	$id= $_REQUEST["id"];
	$name = $_REQUEST['productname'];
	$cat = $_REQUEST['category'];
	$price = $_REQUEST['price'];
	$desc = $_REQUEST['description'];
	
	//$pid = mysqli_real_escape_string($link, $_REQUEST['id']);
	//$pname = mysqli_real_escape_string($link, $_REQUEST['name']);
	//$pcat = mysqli_real_escape_string($link, $_REQUEST['cat']);
	//$pdate = mysqli_real_escape_string($link, $_REQUEST['date']);
	//$pprice = mysqli_real_escape_string($link, $_REQUEST['price']);
	//$pdescription = mysqli_real_escape_string($link, $_REQUEST['description']);
	
	echo $id;
	echo $name;
	echo $cat;
	echo $price;
	echo $desc;
	
	//$mysqlquery = "INSERT INTO Product (id, product_name, category, price, description) VALUES ('$id', '$name', '$cat', '$price', '$desc')";

	$sql = 'INSERT INTO public."Product" ("id", "product_name", "category", "price", "description") VALUES ('."'$id': :character varying,
	'$name': :character varying, '$cat': :character varying, '$price': :integer, '$desc': :character varying)".
	' returning "id"';
	
	echo $qsl;
	
	if(pg_query($link, $sql)){
		echo "Records added successfully.";
	} else {
		echo "ERROR: Could not able to execute $sql. " . pg_error($link);
	pg_close($link);
?>
</body>
</html>