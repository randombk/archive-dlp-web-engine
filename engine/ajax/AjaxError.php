<?php
/*
 * (C) Copyright 2012 David J. W. Li
 * DLPWEBENGINE
 * Forked from Build 0.2.2.432 of Project DLPSIGAME
 *
 */

/**
 * Class AjaxError
 */
class AjaxError extends AjaxRequest
{
	/**
	 *
	 */
	function __construct()
	{
		parent::__construct();
	}

	/**
	 * @param string $Message
	 * @param $code
	 */
	static function sendError($Message, $code = -1)
	{
		parent::sendJSON(array("message" => $Message), $code);
	}
}
