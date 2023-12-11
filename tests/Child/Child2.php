<?php
namespace MakechTec\Coazcatl\Tests\Child;

use MakechTec\Coazcatl\Sequence;
use MakechTec\Coazcatl\Step;

class Child2 extends Sequence{
    public function __construct(){
        parent::__construct($this->steps());
    }

    public function steps(){
        return [
            new Step(function($name){
                return 'hello from child 2 '. $name;
            }),
            new Step(function($age){
                return 'bye from child 2 '. $age;
            })
        ];
    }
}