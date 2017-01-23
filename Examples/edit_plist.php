<?php
/**
 * Created by PhpStorm.
 * User: muntashir
 * Date: 1/2/17
 * Time: 12:26 PM
 */

require_once __DIR__."/../PListEditor/PListEditor.php";

use PListEditor\PListEditor;

$plist = new PListEditor();

// Read from file
$plist->readFile(__DIR__."/Info.plist");

// Get root
$root = $plist->root();

// Add new Properties
$root->addProperty(\PListEditor\PListProperty::PL_INTEGER, 12, "An Integer");
$root->addProperty(\PListEditor\PListProperty::PL_FALSE, null, "A boolean");

// Remove a Property
$root->removeProperty("A string");

// Get inner Properties
var_dump($root->hasProperties());
$properties = $root->innerProperties();
echo "Key\t\tType\tValue\n";
foreach($properties as $property){
    echo $property->key()."\t".$property->type()."\t".(gettype($property->value()) == "object" ? "(object)" : $property->value())."\n";
}

// JSON isn't supported
//$plist->read("{\"wtf\" : 1}");

// Preview PList
print_r($plist->preview());

// Override the plist with the edited one
var_dump($plist->save());
