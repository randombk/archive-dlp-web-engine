<?php
/*
 * (C) Copyright 2012 David J. W. Li
 * DLPWEBENGINE
 * Forked from Build 0.2.2.432 of Project DLPSIGAME
 *
 */


/**
 * Class SecureAbstractPage
 */
abstract class SecureAbstractPage {
	/* @var $templateObj SmartyWrapper */
	protected $templateObj;
	protected $window;
	protected $notifications = array();
	protected $curHighlight = "";

	/**
	 *
	 */
	protected function __construct() {
		$this->setPageType('full');
		$this->initTemplate();
	}

	/**
	 * @return bool
	 */
	protected function initTemplate() {
		if (isset($this->templateObj))
			return true;

		$this->templateObj = new SmartyWrapper;
		list($tplDir) = $this->templateObj->getTemplateDir();
		$this->templateObj->setTemplateDir($tplDir . 'secure/html/');
		return true;
	}

	/**
	 * @param string $window
	 */
	protected function setPageType($window) {
		$this->window = $window;
	}

	protected function getPageVars() {
		$this->templateObj->assign_vars(array(
			'userName'	=> $_SESSION['userName'],
			'userID'	=> $_SESSION['userID'],
			'timestamp'	=> TIMESTAMP,
			'page'		=> HTTP::REQ('page', ''),
			'alerts'	=> $this->notifications,
			'curHighlight' => $this->curHighlight
		));
	}

	/**
	 * @param string $Message
	 */
	protected function showMessage($Message) {
		$this->templateObj->assign_vars(array(
			 'mes' => $Message,
		));

		$this->display('error.tpl');
	}

	/**
	 * @param string $file
	 */
	protected function display($file) {
		$this->getPageVars();

		$this->templateObj->display('extends:layout_' . $this->window . '.tpl|' . $file);
		exit;
	}
}
