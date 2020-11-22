<?php

//Base Controller
//Loaduje modele i poglede

class Controller{
    //Loadpvanje modela
    public function model($model){ //Da bismo mogli da zatrazimo model iz fodela models
       require_once '../app/models/'.$model.'.php';

       //Instanciranje modela
       
       return new $model(); //Vraca novu instancu klase koja ide u promenljivu $model
    }

    //Loadovanje pogleda(view)
    public function view($view, $data = []){
        //Provera za view fajlom
        if(file_exists('../app/views/'.$view.'.php')){
            require_once '../app/views/'. $view. '.php';
        }
        else{
            die('View does not exist.');
        }
    }
}
?>