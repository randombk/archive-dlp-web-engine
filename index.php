<?php
/*
 * (C) Copyright 2012 David J. W. Li
 * DLPWEBENGINE
 * Forked from Build 0.2.2.432 of Project DLPSIGAME
 *
 */

define('MODE', 'LOGIN');
define('ROOT_PATH', str_replace('\\', '/', dirname(__FILE__)) . '/');

//Set Custom error handlers
require (ROOT_PATH . 'engine/ErrorHandlers.php');
set_exception_handler('base_interfaceException');
set_error_handler('base_interfaceError');

require (ROOT_PATH . 'pages/login/LoginAbstractPage.php');
require (ROOT_PATH . 'pages/login/LoginErrorPage.php');
require (ROOT_PATH . 'pages/login/LoginStaticPage.php');

if (!isset($GLOBALS['INIT'])) {
	require (ROOT_PATH . 'engine/common.php');
}

//if($_SERVER['VERIFIED'] === "SUCCESS") {
	$page = HTTP::REQ('page', 'index');
	$mode = HTTP::REQ('mode', 'show');
	$mode = str_replace(array('_', '\\', '/', '.', "\0"), '', $mode);
	$pageName = strictString(str_replace(' ','',ucwords(str_replace('-',' ',strtolower($page)))));
	$pageClass = 'Page_' . $pageName;
	$pageSrc = ROOT_PATH . 'pages/login/' . $pageClass . '.php';

	if (!file_exists($pageSrc)) {
		if (!file_exists(ROOT_PATH . 'pages/login/html/static_' . $pageName . '.tpl')) {
			LoginErrorPage::printError("Requested Page not Found");
		} else {
			LoginStaticPage::showStatic($pageName);
		}
	} else {
		require ($pageSrc);
		$pageObj = new $pageClass;
		$pageProps = get_class_vars($pageClass);

		if (!is_callable(array($pageObj, $mode))) {
			if (!isset($pageProps['defaultController']) || !is_callable(array($pageObj, $pageProps['defaultController']))) {
				LoginErrorPage::printError("Requested Page not Found");
			}
			$mode = $pageProps['defaultController'];
		}
		$pageObj -> {$mode}();
	}
//} else {
//	LoginErrorPage::printError("Unable to verify client certificate");
//}
