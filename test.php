<?php
	require_once ('connection.php');
	$errors = array();
	$form_data = array();
	$test = $_POST['test'];
	if (empty($_POST['test'])) {
		$errors['test'] = 'The field must be filled';
	}
	try {
		$db = new PDO("mysql:host=$host;dbname=$database", $user, $passworddb,
		[PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
		$data = array( 'test' => $test);
		$query = $db->prepare("INSERT INTO test (test) values (:test)");
		$query->execute($data);
	} catch (PDOException $e) {
		$errors['test'] = $e->getMessage();
	}
	if (!empty($errors)) {
		$form_data['success'] = false;
		$form_data['errors']  = $errors;
	}
	else {
		$form_data['success'] = true;
		$form_data['posted'] = 'Data Was Posted Successfully';
	}
	echo json_encode($form_data);
?>