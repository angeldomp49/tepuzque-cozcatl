<?php
require_once(__DIR__.'/../vendor/autoload.php');
use MakechTec\Coazcatl\Tests\Child\Child1;

$seq1 = new Child1();
$result = $seq1->currentStep()
                ->add(['name' => 'angel'])
                ->do();
print_r($result);

$seq1->next();

echo('<br/>');

echo($seq1->getPointer());

$result2 = $seq1->currentStep()
                ->add(['age' => '21'])
                ->do();
print_r($result2);

$seq1->prev();

echo('<br/>');

echo($seq1->getPointer());

$result2 = $seq1->currentStep()
                ->add(['name' => 'jhon'])
                ->do();
print_r($result2);