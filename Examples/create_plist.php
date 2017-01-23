<?php
/**
 * Created by PhpStorm.
 * User: muntashir
 * Date: 1/2/17
 * Time: 9:27 AM
 */

require_once __DIR__."/../PListEditor/PListEditor.php";
/**
 * create_plist
 *
 * Creates a new plist in the current folder
 * Also added some properties
 */

use \PListEditor\PListEditor;
use \PListEditor\PListProperty;

$plist = new PListEditor();

// Create a new Plist
$plist->create();

// Create root
$root = $plist->root(PListProperty::PL_DICT);

// Add Properties
$root->addProperty(PListProperty::PL_STRING, "Hello World", "A string");
$root->addProperty(PListProperty::PL_INTEGER, 12, "An integer");

// Preview PList
print_r($plist->preview());

// Save
var_dump($plist->save(__DIR__."/New.plist"));