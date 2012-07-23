<?php
/*
 * (C) Copyright 2012 David J. W. Li
 * DLPWEBENGINE
 * Forked from Build 0.2.2.432 of Project DLPSIGAME
 *
 */

/**
 * Class SiteCache
 */
class SiteCache
{
	/**
	 * @param string $varName
	 * @return mixed
	 */
	public static function get($varName)
	{
		if (isset($GLOBALS["SiteCache"][$varName])) {
			return $GLOBALS["SiteCache"][$varName];
		} else {
			if (apc_exists('CachedResource/' . $varName)) {
				$GLOBALS["SiteCache"][$varName] = apc_fetch('CachedResource/' . $varName);
				return $GLOBALS["SiteCache"][$varName];
			} else {
				return self::load($varName);
			}
		}
	}

	/**
	 * @param string $varName
	 * @param string $loader
	 * @return mixed
	 * @throws Exception
	 */
	private static function load($varName, $loader = "loadSiteResource")
	{
		try {
			$varClass = 'CachedResource_' . ucwords($varName);
			$classSrc = ROOT_PATH . 'engine/classes/SiteCache/' . $varClass . '.php';
			require_once($classSrc);

			$GLOBALS["SiteCache"][$varName] = $varClass::$loader();
			apc_store('CachedResource', TIMESTAMP);
			return $GLOBALS["SiteCache"][$varName];
		} catch (Exception $e) {
			throw new Exception("Invalid Resource Name: " . $varName);
		}
	}

	/**
	 * @param string $varName
	 * @return mixed
	 */
	public static function reload($varName)
	{
		return self::load($varName);
	}

	/**
	 * @return mixed
	 */
	public static function getCacheTime()
	{
		return apc_fetch('CachedResource');
	}

	//If null, delete all
	/**
	 * @param null|mixed $toDelete
	 * @return bool|string[]
	 */
	public static function flush($toDelete = null)
	{
		if (is_null($toDelete)) {
			$toDelete = new APCIterator('user', '/^CachedResource/', APC_ITER_VALUE);
		}
		return apc_delete($toDelete);
	}
}
