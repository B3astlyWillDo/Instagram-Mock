<?php
class Users extends Controller{
    public function __construct(){
        $this->userModel  = $this->model('User');

    }

    public function register(){
        if($_SERVER['REQUEST_METHOD']=='POST'){
            //process form

            //Saniranje inputa
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $data = [
                'ime' => trim($_POST['ime']),
                'prezime' => trim($_POST['prezime']),
                'username' => trim($_POST['username']),
                'password' => trim($_POST['password']),
                'email' => trim($_POST['email']),
                'ime_err' => '',
                'prezime_err' => '',
                'username_err' => '',
                'password_err' => '',
                'email_err' => ''
            ];
            //Validacija email-a
            if(empty($data['email'])){
                $data['email_err'] = 'Unesite ispravan email';
            }
            else{
                //Provera emaila
                if($this->userModel->findUserByEmail($data['email'])){
                    $data['email_err'] = 'Email vec postoji';
                }
            }

            if(empty($data['ime'])){
                $data['ime_err'] = 'Unesite ime';
            }
            if(empty($data['prezime'])){
                $data['prezime_err'] = 'Unesite prezime';
            }
            if(empty($data['username'])){
                $data['username_err'] = 'Unesite username';
            }

            if(empty($data['password'])){
                $data['password_err'] = 'Unesite password';
            }elseif(strlen($data['password'])<6){
                $data['password_err']  = 'Password mora sadržati najmanje 6 karaktera';
            }

            if(empty($data['email_err']) && empty($data['ime_err']) && empty($data['prezime_err']) && empty($data['pass_err']) && empty($data['username_err'])){
                
                $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

                if($this->userModel->register($data)){
                    flash('register_success', 'Uspešno ste registrovani!');
                    redirect('users/login');
                }
                else{
                    die('Došlo je do greške.');
                }
            }else{
                $this->view("users/register", $data);
            }
        }
        else{
            //Init data
            $data = [
                'ime' => '',
                'prezime' => '',
                'username' => '',
                'password' => '',
                'email' => '',
                'ime_err' => '',
                'prezime_err' => '',
                'username_err' => '',
                'password_err' => '',
                'email_err' => ''
            ];
           
            $this->view('users/register', $data);

        }
    }
    public function login(){
        if($_SERVER['REQUEST_METHOD']=='POST'){
            //process form

        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $data = [
                'password' => trim($_POST['password']),
                'email' => trim($_POST['email']),
                'password_err' => '',
                'email_err' => ''
            ];
        //Greske unosa
        if(empty($data['email'])){
            $data['email_err'] = 'Unesite ispravan email';
        }
        if(empty($data['password'])){
            $data['password_err'] = 'Unesite password';
        }elseif(strlen($data['password'])<8){
            $data['password_err']  = 'Password mora sadržati najmanje 6 karaktera';
        }

        //Provera da li vec postoji email
        if($this->userModel->findUserByEmail($data['email'])){
            //Pronadjen
            //Proveriti korisnika i postaviti ga
            $loggedInUser = $this->userModel->login($data['email'], $data['password']);
            if($loggedInUser){
                $this->createUserSession($loggedInUser);
            }else{
                $data['password_err'] = 'Password netačan.';
                $this->view('users/login', $data);
            }
        }else{
            $data['email_err'] = 'Nepostojeci email';
        }
        if(empty($data['email_err']) && empty($data['password_err'])){
            
            die("Success!");
        }else{
            $this->view("users/login", $data);
        }
    
      }
        else{
            //Inicijalizacija pocetnih vrednosti ili vracanje na pocetne vrednosti
            $data = [
                'password' => '',
                'email' => '',
                'password_err' => '',
                'email_err' => ''
            ];
           
            $this->view('users/login', $data);

        }
    }
  //Kreiranje sesije ukoliko se korisnik ulogovao uspesno
    public function createUserSession($user){
        $_SESSION['user_id'] = $user->clanid;
        $_SESSION['user_email'] = $user->email;
        $_SESSION['user_name'] = $user->username;
        redirect('posts/index');
    }
 //Odjavljivanje korisnika
    public function logout(){
        unset($_SESSION['user_id']);
        unset($_SESSION['user_email']);
        unset($_SESSION['user_name']);
        session_destroy();
        redirect('users/login');
    }
//Provera da li je korisnik ulogovan
    public function isLoggedIn(){
        if(isset($_SESSION['user_id'])){
            return true;
        }else{
            return false;
        }
    }
}