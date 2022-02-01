<?php
$servername = "";
$username = "";
$password = "";

$connection = new mysqli($servername, $username, $password);

if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}
echo "Connected successfully";

if(isset($_POST["action"]))
{
	if($_POST["action"] == 'insert')
	{
		$data = array(
		);

		$query = "
		";

		$statement = $connection->prepare($query);

		$statement->execute($data);

		echo 'done';
	}

	if($_POST["action"] == 'fetch')
	{
		$query = "
		";

		$result = $connection->query($query);

		$data = array();

		foreach($result as $row)
		{
			$data[] = array(
			);
		}

		echo json_encode($data);
	}
}

?>
