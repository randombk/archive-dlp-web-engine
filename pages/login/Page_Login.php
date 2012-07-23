<?php
/*
 * (C) Copyright 2012 David J. W. Li
 * DLPWEBENGINE
 * Forked from Build 0.2.2.432 of Project DLPSIGAME
 *
 */

/**
 * Class Page_Login
 */
class Page_Login extends LoginAbstractPage {
	/**
	 *
	 */
	function __construct() {
		parent::__construct();
	}

	function show() {
		if (empty($_POST)) {
			HTTP::redirectTo('index.php');
		}

		$username = HTTP::REQ('username', '', true);
		$password = HTTP::REQ('password', '', true);

		$loginData = DBMySQL::selectTop(tblUSERS, "userName = :userName", array(":userName" => $username), "userID, userPass, validationKey");

		if (isset($loginData)) {
			$hashedPassword = UtilUser::cryptPassword($password);
			if ($loginData['userPass'] != $hashedPassword) {
				HTTP::redirectTo('index.php?code=1');
			}

			if(strlen($loginData['validationKey'])) {
				HTTP::redirectTo('index.php?code=2');
			}

			SiteSession::loginUser($loginData['userID'], $username);
			HTTP::redirectTo('secure.php?page=overview');
		} else {
			HTTP::redirectTo('index.php?code=1');
		}
	}
}
