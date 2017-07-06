<?php
/**
 * Created by PhpStorm.
 * User: muntashir
 * Date: 1/2/17
 * Time: 12:26 PM
 */

require_once __DIR__."/../PListEditor.php";

use PListEditor\PListEditor;
use PListEditor\PListProperty;

$plist = new PListEditor();

// Read from file
$plist->readFile(__DIR__."/Info.plist");

// Get root
$root = $plist->root();

// Add new Properties
$root->addProperty(PListProperty::PL_INTEGER, 12, "AnInteger");
$root->addProperty(PListProperty::PL_FALSE, null, "ABoolean");

// Remove a Property
$root->removeProperty("AString");

// Get inner Properties
echo "Inner Properties:\n";
if($root->hasProperties()){
    $properties = $root->innerProperties();
    echo "Key\t\tType\tValue\n";
    foreach($properties as $property){
        echo $property->key()."\t".$property->type()."\t".(gettype($property->value()) == "object" ? "(object)" : $property->value())."\n";
    }
}

// Get a single property
echo "Get single properties:\n";
print_r($root->getProperty("AnInteger")->value());
echo "\n";
print_r($root->getProperty("AnArray")->getItem(0)->value());

// JSON isn't supported
//$plist->read("{\"wtf\" : 1}");

// Preview PList
echo "Preview\n";
print_r($plist->preview());

// Override the plist with the edited one
echo "Save the changes: ";
var_dump($plist->save());
echo "\n";
