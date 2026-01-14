<?php
	// Cucchi Francesco 5^AI logout.php

	session_start();
	session_destroy();
	header("Location: login.php");
?>