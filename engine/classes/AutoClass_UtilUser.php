<?php
/*
 * (C) Copyright 2012 David J. W. Li
 * DLPWEBENGINE
 * Forked from Build 0.2.2.432 of Project DLPSIGAME
 *
 */

/**
 * Class UtilUser
 */
class UtilUser
{
	/**
	 * @param string $password
	 * @return string
	 */
	static function cryptPassword($password)
	{
		require_once(ROOT_PATH . 'engine/config.php');
		return crypt($password, '$2a$09$' . $GLOBALS['_SALT'] . '$');
	}
}
