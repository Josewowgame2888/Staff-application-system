<?php
require vendor().'utils/system.php';

function vendor()
{
    $dir = __DIR__;
    $dir = str_replace('apply','',$dir);
    return $dir;
}

if(System::isValid([$_POST['position'],$_POST['name'],$_POST['mail'],$_POST['age'],$_POST['discordtag'],$_POST['gametag']]))
{
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

    echo'<script type="text/javascript">
    alert("Thank you for submitting your application. If you are accepted a staff member will contact you these days.");
    window.location.href="https://mobile.twitter.com/hysteria_mcpe";
    </script>';

} else {
    echo'<script type="text/javascript">
    alert("An internal error occurred while trying to send your application, try again or give a report for our discord.");
    window.location.href="form.html";
    </script>';
}

?>