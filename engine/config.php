<?php
/*
 * (C) Copyright 2012 David J. W. Li
 * DLPWEBENGINE
 * Forked from Build 0.2.2.432 of Project DLPSIGAME
 *
 */

$GLOBALS['_SITE_VERSION'] 		= "1.0";
$GLOBALS['_SITE_NAME'] 			= "DLPWEBENGINE";

$GLOBALS['_RECAPTCHA_PRIVKEY']	= "6LdYFOYSAAAAAAUhob-YXBBmS8eVDpdkZwPSqtmB";
$GLOBALS['_RECAPTCHA_PUBKEY']	= "6LdYFOYSAAAAAAoQ0sBmC2wAMOstRQEU-Ihy9kqX";


$GLOBALS['_GOOGLE_ANALYTICS_KEY'] = "UA-41226902-1";

$GLOBALS['_SERVER_TZ'] 			= "America/New_York";

$GLOBALS['_PERFORM_CRON'] 		= false;
$GLOBALS['_MAIL_SMTP_HOST'] 	= "smtp.gmail.com";
$GLOBALS['_MAIL_SMTP_PORT'] 	= "587";
$GLOBALS['_MAIL_SMTP_USER'] 	= "dlpwebmailer@gmail.com";
$GLOBALS['_MAIL_SMTP_PASS'] 	= "RDLP_OUT3";
$GLOBALS['_MAIL_SMTP_ENC'] 		= "tls";

//### MySQL access ###//
$GLOBALS['_RDBMS'] = array();
$GLOBALS['_RDBMS']['host'] = 'localhost';
$GLOBALS['_RDBMS']['port'] = '3306';
$GLOBALS['_RDBMS']['user'] = 'root';
$GLOBALS['_RDBMS']['userpw'] = 'edward';
$GLOBALS['_RDBMS']['databasename'] = 'DLPSIGAME_DEV1';

//### Mongo access ###//
$GLOBALS['_MONGO'] = array();
$GLOBALS['_MONGO']['host'] = 'localhost';
$GLOBALS['_MONGO']['port'] = '27017';
$GLOBALS['_MONGO']['databasename'] = 'DLPSIGAME_DEV1';

$GLOBALS['_SALT'] = 'JtP0xXyOi6RLTFs5fYW7v8';
