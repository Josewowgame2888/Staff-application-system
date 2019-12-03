<?php
require vendor().'utils/system.php';

function vendor()
{
    $dir = __DIR__;
    $dir = str_replace('apply','',$dir);
    return $dir;
}

$system = new System();
$system->position = $_POST['position'];
$system->name = $_POST['name'];
$system->email = $_POST['mail'];
$system->age = $_POST['age'];
$system->discordTag = $_POST['discordtag'];
$system->gameTag = $_POST['gametag'];

$system->setExperience($_POST['question1']);
$system->setComparison($_POST['question2']);
$system->setProblemSolution($_POST['question3']);
$system->setExtras($_POST['question4']);
$system->send();
?>