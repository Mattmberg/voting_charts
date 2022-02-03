<?php
$servername = "";
$username = "";
$password = "";
$dbname = "";

$connection = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

if(isset($_POST["action"]))
{
	if($_POST["action"] == 'insert')
	{
		$data = array(
			':COLOR_COLUMN'		=>	$_POST["COLOR_COLUMN"]
		);

		$query = "
		INSERT INTO VOTING_DB
		(COLOR_COLUMN) VALUES (:COLOR_COLUMN)
		";

		$statement = $connection->prepare($query);

		$statement->execute($data);

		echo 'done';
	}

	if($_POST["action"] == 'fetch')
	{
		$query = "
		SELECT COLOR_COLUMN, COUNT(ID_COLUMN) AS Total 
		FROM VOTING_DB
		GROUP BY COLOR_COLUMN
		";

		$result = $connection->query($query);

		$data = array();

		foreach($result as $row)
		{
			$data[] = array(
				'COLOR_COLUMN'		=>	$row["COLOR_COLUMN"],
				'total'			=>	$row["Total"],
			);
		}

		echo json_encode($data);
	}
}

?>
