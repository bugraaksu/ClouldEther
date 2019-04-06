<?php
	require_once('../resources/core/init.php');

	if (isset($_POST['login']) || isset($_GET['logout'])) {
		$login = new Login();
	}
	
	if (LoginCheck::isLoggedInAsAdmin()) {
		header ('location: /admin.php');
	}
	elseif (LoginCheck::isLoggedIn()) {
		header ('location: /client/manage.php');
	}
	else {
		require_once(RESOURCE_DIR . '/views/not_logged_in.php');
	}
