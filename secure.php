<?php
/*
 * (C) Copyright 2012 David J. W. Li
 * DLPWEBENGINE
 * Forked from Build 0.2.2.432 of Project DLPSIGAME
 *
 */

define('MODE', 'LOGGEDIN');
define('ROOT_PATH', str_replace('\\', '/', dirname(__FILE__)) . '/');

//Set Custom error handlers
require(ROOT_PATH . 'engine/ErrorHandlers.php');
set_exception_handler('base_interfaceException');
set_error_handler('base_interfaceError');

require (ROOT_PATH . 'pages/secure/SecureAbstractPage.php');
require (ROOT_PATH . 'pages/secure/SecureErrorPage.php');
require (ROOT_PATH . 'engine/common.php');

if (!SiteSession::isLoggedIn()) {
	HTTP::redirectTo('index.php?code=3');
}

//if($_SERVER['VERIFIED'] === "SUCCESS") {
	$page = HTTP::REQ('page', 'index');
	$mode = HTTP::REQ('mode', 'show');
	$mode = strictString(str_replace(array('_', '\\', '/', '.', "\0"), '', $mode));
	$pageName = strictString(str_replace(' ', '', ucwords(str_replace('-', ' ', strtolower($page)))));
	$pageClass = 'Page_' . $pageName;
	$pageSrc = ROOT_PATH . 'pages/secure/' . $pageClass . '.php';

	if (!file_exists($pageSrc)) {
		SecureErrorPage::printError("Requested Page not Found");
	} else {
		require ($pageSrc);
		$pageObj = new $pageClass;
		$pageProps = get_class_vars($pageClass);

		if (!is_callable(array($pageObj, $mode))) {
			if (!isset($pageProps['defaultController']) || !is_callable(array($pageObj, $pageProps['defaultController']))) {
				SecureErrorPage::printError("Requested Page not Found");
			}
			$mode = $pageProps['defaultController'];
		}
		$pageObj -> {$mode}();
	}
//} else {
//	SecureErrorPage::printError("Unable to verify client certificate");
//}
