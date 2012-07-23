<?php
/*
 * (C) Copyright 2012 David J. W. Li
 * DLPWEBENGINE
 * Forked from Build 0.2.2.432 of Project DLPSIGAME
 *
 */


/**
 * Class Page_Logout
 */
class Page_Logout extends SecureAbstractPage {
	/**
	 *
	 */
	function __construct() {
		parent::__construct();
		$this->setPageType('full');
	}

	function show() {
		SiteSession::DestroySession();
		$this->display('page_logout.tpl');
	}
}
