<?php
/*
 * (C) Copyright 2012 David J. W. Li
 * DLPWEBENGINE
 * Forked from Build 0.2.2.432 of Project DLPSIGAME
 *
 */

/**
 * Class AjaxRequest_DataLoader
 */
class AjaxRequest_DataLoader extends AjaxRequest
{
	/**
	 *
	 */
	function __construct()
	{
		parent::__construct();
	}

	function getGameData()
	{
		$this->sendJSON(array(
			"dataEXAMPLE" => SiteCache::get("EXAMPLE"),
			"cacheTime" => SiteCache::getCacheTime()
		));
	}

	function clearCache()
	{
		if ((int)$_SESSION['USER']['isAdmin']) {
			SiteCache::flush();
			$this->sendCode(0);
		} else {
			AjaxError::sendError("Access Denied");
		}
	}

}
