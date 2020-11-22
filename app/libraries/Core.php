<?php 

//App Core class
// Creates ULR & loads core controller
//URL FORMAT - /controller/method/params

class Core{
    protected $currentController = 'Pages';
    protected $currentMethod = 'index';
    protected $params = [];

    public function __construct(){

        $url = $this->getUrl();
         
        //proverava da li postoji fajl u folderu controllers pod ovim imenom
        if(file_exists('../app/controllers/'. ucwords($url[0]).'.php')){
          //Ako postoji taj fajl postaje kontroler
          $this ->currentController = ucwords($url[0]);
          //Unsset 0 Index
          unset($url[0]);
        }

        //Zahtevaj controller
        require_once '../app/controllers/'. $this->currentController. '.php';

        //Instanciranje controller-a
        $this->currentController = new $this->currentController;

        //Provera za drugim delom url-a
        if(isset($url[1])){
            //Provera da li metod postoji u ccontroller-u
            if(method_exists($this->currentController, $url[1])){
                $this->currentMethod = $url[1];
                unset($url[1]);
            }
        }

        //Preuzimanje parametara
        $this->params = $url ? array_values($url) : [];

        //Call a callback with array of params
        call_user_func_array([$this->currentController, $this->currentMethod], $this->params);

    }

    public function getUrl(){
        if(isset($_GET['url'])){
           $url = rtrim($_GET['url'], '/'); //brisanje kose crte na kraju ukoliko je ima
           $url = filter_var($url, FILTER_SANITIZE_URL); //ciscenje linka od nezeljenih znakova
           $url = explode('/', $url); //odvajanje linka na segmente, odvajanje se vrsi kod kose crte
           return $url;
        }
    }
}