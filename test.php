<?php
include __DIR__.'/utils/System.php';

$system = new System();
$system->position = 'Trainee';
$system->name = 'Juan fake character';
$system->email = 'fakemail@gmail.com';
$system->age = '23';

$system->setExperience('his is a fake 500 word simulation application to check the operation of boolean code detection in system.php');
$system->setComparison('Because I am the best moderating servers .... (Apply false)');
$system->setProblemSolution('BLABLABLABLABLABLABLABLA');
$system->setExtras('I dont have extra links');
$system->send();