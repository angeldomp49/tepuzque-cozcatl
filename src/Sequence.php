<?php 
namespace MakechTec\Coazcatl;

use MakechTec\Coazcatl\Step;

class Sequence{

    protected Array $steps;
    protected int $pointer;

    protected function add( Step $step, int $position ){
        $firstSlice = array_slice($this->steps, 0, $position);
        $lastSlice = array_slice($this->steps, $position);

        $this->steps = array_merge($firstSlice, [ $step ], $lastSlice);
        return $this;
    }

    protected function append( Step $step ){
        array_push($this->steps, $step);
        return $this;
    }

    protected function remove( int $position ){
        unset($this->steps[$position]);
    }

    protected function shift(){
        $this->steps = array_shift($this->steps);
    }

    public function __construct( Array $steps = [] ){
        $this->steps = $steps;
        $this->resetPointer();
    }

    public function getPointer(){
        return $this->pointer;
    }

    public function setPointer( int $pointer ){
        if( $this->isOutOfRangePointer($pointer) ){
            $this->resetPointer();
        }

        $this->pointer = $pointer;
        return $this;
    }

    public function next(){
        $tempPointer = $this->pointer;

        if( !$this->isMaxPointer(++$tempPointer) ){
            $this->pointer = count( $this->steps ) - 1;
        }
    }

    public function prev(){
        $tempPointer = $this->pointer;

        if( !$this->isMinPointer(--$tempPointer) ){
            $this->resetPointer();
        }
    }

    public function resetPointer(){
        $this->pointer = 0;
        return $this;
    }

    public function currentStep(){
        return $this->steps[$this->pointer];
    }

    private function isMaxPointer( int $pointer){
        $sizeOfSteps = count( $this->steps );
        $sizeOfSteps--;
        return ( $pointer > $sizeOfSteps );
    }

    private function isMinPointer( int $pointer){
        return ( $pointer < 0 );
    }

    private function isOutOfRangePointer( int $pointer ){
        $sizeOfSteps = count( $this->steps );
        $sizeOfSteps--;

        return ( $this->isMaxPointer($pointer) || $this->isMinPointer($pointer) );
    }

}
