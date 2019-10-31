
<?php

$dsn = "mysql:dbname=alumni;host=localhost";
$dbuser = "root";
$dbpass="";




try {
	$pdo = new PDO($dsn , $dbuser, $dbpass);
	echo "deu bom";
} catch (PDOException $e) {
	echo "deu ruim: ".$e->getMessage();
}
?>