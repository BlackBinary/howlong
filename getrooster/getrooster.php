<?php
/**
 * Created by PhpStorm.
 * User: Daen
 * Date: 6/8/2016
 * Time: 11:04 AM
 */

$getclass = $_GET['class'];
$getday = $_GET['day'];

require_once ('class/connect.php');

$conn = new connect;

$query = "SELECT * FROM `import` WHERE `class` = '".$getclass."' AND `weekday` = '".$getday."' ORDER BY  `import`.`hour` ASC";

$res = $conn->makeconn($query);

$structure = "";
$structure = $structure."<weekday>".$getday;

foreach($res as $row){
    $structure = $structure."<hour>".$row['hour'];
    // $structure = $structure."<class>".$row['class'];
    // $structure = $structure."</class>";
    $structure = $structure."</hour>";
}

$structure = $structure."</weekday>";

// print_r($res);
// echo $structure;

$dom = new DOMDocument;
$dom->preserveWhiteSpace = FALSE;
$dom->loadXML('<root>'.$structure.'</root>');
$dom->formatOutput = TRUE;
echo $dom->saveXml();

?>