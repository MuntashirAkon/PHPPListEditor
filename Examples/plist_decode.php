<?php
/**
 * Created by PhpStorm.
 * User: muntashir
 * Date: 6/22/17
 * Time: 2:13 PM
 */

require_once __DIR__."/../PListEditor.php";

/**
 * An associative array containing plist info
 */
$assoc_plist = \PListEditor\plist_decode(file_get_contents(__DIR__ . '/Info.plist'));
/**
 * An JSON string containing plist info
 */
$json_plist  = \PListEditor\plist_decode(file_get_contents(__DIR__ . '/Info.plist'), true);

var_dump(\PListEditor\plist_decode(file_get_contents(__DIR__ . '/Disks.plist')));