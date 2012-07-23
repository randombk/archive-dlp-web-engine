<?php
/*
 * (C) Copyright 2012 David J. W. Li
 * DLPWEBENGINE
 * Forked from Build 0.2.2.432 of Project DLPSIGAME
 *
 */


/**
 * Class Page_Buildings
 */
class Page_Overview extends SecureAbstractPage {
	/**
	 *
	 */
	function __construct() {
		parent::__construct();
	}

	function show() {
		$this->curHighlight = "overview";
		$this->display('page_overview.tpl');
	}
}
