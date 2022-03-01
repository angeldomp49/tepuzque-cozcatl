<?php 
namespace MakechTec\Coazcatl;

class Step{

    private $action;
    private Array $params;

    public function __construct( $action, Array $params = [] ){
        $this->action = $action;
        $this->params = $params;
    }

    public function getAction(){
        return $this->action;
    }

    public function getParams(){
        return $this->params;
    }

    public function setParams( Array $params ){
        $this->params = $params;
        return $this;
    }

    public function add( Array $param ){
        $this->params = array_merge($this->params, $param);
        return $this;
    }

    public function do(){
        return call_user_func_array($this->action, $this->params );
    }
}