<?php
/*
 * (C) Copyright 2012 David J. W. Li
 * DLPWEBENGINE
 * Forked from Build 0.2.2.432 of Project DLPSIGAME
 *
 */

define('MODE', 'AJAX');
define('ROOT_PATH', str_replace('\\', '/', dirname(__FILE__)) . '/');

//Set Custom error handlers
require (ROOT_PATH . 'engine/ErrorHandlers.php');

set_exception_handler('base_ajaxException');
set_error_handler('base_ajaxError');

require (ROOT_PATH . 'engine/ajax/AjaxRequest.php');
require (ROOT_PATH . 'engine/ajax/AjaxError.php');
require (ROOT_PATH . 'engine/common.php');

if (!SiteSession::isLoggedIn()) {
	HTTP::redirectTo('index.php?code=3');
}

//if($_SERVER['VERIFIED'] === "SUCCESS") {
	$what = HTTP::REQ('ajaxType', '');
	$whatName = strictString($what);

	$action = HTTP::REQ('action', '');
	$actionName = strictString($action);

	if($actionName == "" || $whatName == "") {
		AjaxError::sendError("Invalid Request");
	}

	try {
		$ajaxClass = 'AjaxRequest_' . $whatName;
		$ajaxSrc = ROOT_PATH . 'engine/ajax/' . $ajaxClass . '.php';

		if (!file_exists($ajaxSrc)) {
			AjaxError::sendError("Invalid Request");
		} else {
			require ($ajaxSrc);
			$ajaxObj = new $ajaxClass;
			$ajaxProps = get_class_vars($ajaxClass);

			if (!is_callable(array($ajaxObj, $actionName))) {
				AjaxError::sendError("Invalid Request");
			}
			$ajaxObj -> {$actionName}();
		}
	} catch (Exception $e) {
		AjaxError::sendError($e->getMessage() . "\n\n" . $e->getTraceAsString(), -1);
	}

//} else {
//	AjaxError::sendError("Unable to verify client certificate");
//}
