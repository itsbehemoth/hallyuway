<?php

// ====================================
// Copyright (c) 2016 Hallyu Publishing
// ====================================

	error_reporting(-1);
	date_default_timezone_set('GMT');
	
// ====================
// Constants definition
// ====================
    
    define('DOMAIN', 'http://hallyuway.com/');
    define('LIBRARIES', $_SERVER["DOCUMENT_ROOT"] . '/libraries/');
    define('IMAGES', $_SERVER["DOCUMENT_ROOT"] . '/images/');
    define('CONTENT', $_SERVER["DOCUMENT_ROOT"] . '/content/');
    define('PROCESSORS', $_SERVER["DOCUMENT_ROOT"] . '/processors/');

// =======================
// Database initialisation
// =======================

    define("DB_USER", "hway");
    define("DB_PASSWORD", "We<3Kpop!");
    define("DB_NAME", "hway");
    define("DB_HOST", "localhost");
    
    require_once(LIBRARIES . 'core.php');
    require_once(LIBRARIES . 'database.php');
    $db = new ezSQL_mysqli(DB_USER, DB_PASSWORD, DB_NAME, DB_HOST);
    mb_internal_encoding('UTF-8');

// =====================
// Member identification
// =====================

    require_once(LIBRARIES . 'members.php');

    $member = member_fetch(0);
    
    if (isset($_COOKIE['id'])):
    
        $member = member_fetch($_COOKIE['id']);
        member_online($_COOKIE['id']);
    
    endif;
	
// ======================
// Libraries requirements
// ======================

    require_once(LIBRARIES . 'utilities.php');
    
    session_start();
