<?php
	$db = mysqli_connect(
		$config['db']['host'],
		$config['db']['user'],
		$config['db']['password'],
		$config['db']['database']
	);
	if (mysqli_connect_errno()) {
		printf("DB connect error %s\n",mysqli_connect_error());
		exit();
	}

	mysqli_query($db, 'SET NAMES UTF8');
?>
