<?php
/*
 * (C) Copyright 2012 David J. W. Li
 * DLPWEBENGINE
 * Forked from Build 0.2.2.432 of Project DLPSIGAME
 *
 */

/**
 * Class LoginStaticPage
 */
 class LoginStaticPage extends LoginAbstractPage {
	/**
	 *
	 */
	function __construct() {
		parent::__construct();
		$this->initTemplate();
	}

	 /**
	  * @param string $page
	  */
	 static function showStatic($page) {
		$pageObj = new self;
		$pageObj->render('static_'.$page.'.tpl');
	}
}
