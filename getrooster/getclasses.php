<?php
/**
 * Created by PhpStorm.
 * User: Daen
 * Date: 6/10/2016
 * Time: 1:37 PM
 */

require_once ('class/connect.php');

$conn = new connect;

$query = "SELECT DISTINCT `class` FROM `import` ORDER BY `import`.`class`  DESC";

$res = $conn->makeconn($query);

$structure = "";

foreach($res as $row){
    $structure = $structure."<class>".$row['class'];
    $structure = $structure."</class>";
}

//print_r($res);
//echo $structure;

$dom = new DOMDocument;
$dom->preserveWhiteSpace = FALSE;
$dom->loadXML('<root>'.$structure.'</root>');
$dom->formatOutput = TRUE;
echo $dom->saveXml();

?>