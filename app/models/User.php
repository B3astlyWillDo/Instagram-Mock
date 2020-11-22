<?php

class User{
    private $db;

    public function __construct(){
        $this->db = new Database();
    }

    //Registracija korisnika
    public function register($data){
        $this->db->query('INSERT INTO clanovi (ime, prezime, username, password, email) VALUES(:ime, :prezime, :username, :password, :email)');
        $this->db->bind(':ime', $data['ime']);
        $this->db->bind(':prezime', $data['prezime']);
        $this->db->bind(':username', $data['username']);
        $this->db->bind(':password', $data['password']);
        $this->db->bind(':email', $data['email']);

        //Izvrsavanje
        if($this->db->execute()){
            return true;
        }
        else{
            return false;
        }
    }
    //Login korisnika
    public function login($email, $password){
        $this->db->query('SELECT * FROM clanovi WHERE email = :email');
        $this->db->bind(":email", $email);

        $row = $this->db->single();
        
        $hashed_password = $row->password;

        if(password_verify($password, $hashed_password)){
            return $row;
        }else{
            return false;
        }
    }

    //Find user by email
    public function findUserByEmail($email){
        $this->db->query("SELECT *FROM clanovi WHERE email=:email");
        $this->db->bind(":email", $email);

        $row = $this->db->single();

        //Check row
        if($this->db->rowCount() > 0){
            return true;
        }
        else{
            return false;
        }

    }
}