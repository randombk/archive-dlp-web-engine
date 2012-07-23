<?php
/*
 * (C) Copyright 2012 David J. W. Li
 * DLPWEBENGINE
 * Forked from Build 0.2.2.432 of Project DLPSIGAME
 *
 */

//Cache class for Building Data
/**
 * Class CachedResource_EXAMPLE
 */
class CachedResource_EXAMPLE
{
	/**
	 * @return array
	 */
	public static function loadSiteResource()
	{
		$string = file_get_contents(ROOT_PATH . 'engine/data/example.json');
		$BUILDINGS = json_decode($string, TRUE);

		apc_store('CachedResource/EXAMPLE', $BUILDINGS);
		return $BUILDINGS;
	}
}
