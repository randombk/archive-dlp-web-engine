<?php
/*
 * (C) Copyright 2012 David J. W. Li
 * DLPWEBENGINE
 * Forked from Build 0.2.2.432 of Project DLPSIGAME
 *
 */


/**
 * Class SecureErrorPage
 */
class SecureErrorPage extends SecureAbstractPage {
	/**
	 *
	 */
	function __construct() {
		parent::__construct();
		$this->initTemplate();
	}

	/**
	 * @param string $Message
	 */
	static function printError($Message) {
		$pageObj = new self;
		$pageObj->showMessage($Message);
	}
}
