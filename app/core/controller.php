<?php 


class controller {
    /**
     * Summary of view
     * @param mixed $view
     * @param mixed $data
     * @return void
     */
    public function view($view, $data = [] ){
        require_once '../app/views/' . $view . '.php';
    }

    public function model($model){
        require_once '../app/models/' . $model . '.php';
        return new $model; 
    }
}

?>