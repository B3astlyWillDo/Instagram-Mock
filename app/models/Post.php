<?php
class Post{
    private $db;

    public function __construct(){
        $this->db = new Database();
    }

    public function getPosts(){
        $this->db->query('SELECT *, objave.objavaid as objavaid, clanovi.clanid as clanid FROM objave INNER JOIN clanovi on objave.clanid = clanovi.clanid ORDER BY objave.objavaid DESC');
        $results = $this->db->resultSet();

        return $results;
    }

    public function addPost($data, $link){
        $this->db->query('INSERT INTO objave(clanid,objavaime,objavalink) VALUES(:clanid,:naziv, :link)');
        $this->db->bind(':clanid', $data['user_id']);
        $this->db->bind(':naziv', $data['title']);
        $this->db->bind(':link', $link);

        if($this->db->execute()){
            return true;
        }
        else{
            return false;
        }
    }

    public function showGallery(){
        $this->db->query('SELECT *FROM objave WHERE clanid=:clanid ORDER BY objavaid DESC');
        $this->db->bind("clanid", $_SESSION['user_id']);
        $results = $this->db->resultSet();

        return $results;

    }
    
    public function countPosts(){
        $this->db->query('SELECT COUNT(objavaid) FROM objave WHERE clanid=:clanid');
        $this->db->bind(":clanid", $_SESSION['user_id']);
        $results = $this->db->returns();
        return $results;

    }
    public function countLikes(){
        $this->db->query('SELECT SUM(brsvidjanja) FROM objave WHERE clanid=:clanid');
        $this->db->bind(":clanid", $_SESSION['user_id']);
        $results = $this->db->returns();

        return $results;

    }

    public function userName(){
        $this->db->query("SELECT username FROM clanovi WHERE clanid=:clanid");
        $this->db->bind(":clanid", $_SESSION['user_id']);
        $results = $this->db->returns();

        return $results;
    }

    public function showUsers(){
        $this->db->query("SELECT clanid,ime,prezime,username,email FROM clanovi");
        $results = $this->db->resultSet();

        return $results;
    }

    public function showPosts(){
        $this->db->query("SELECT * FROM objave");
        $results = $this->db->resultSet();

        return $results;
    }


    public function delete($data){
        $this->db->query("DELETE FROM objave WHERE objavaid=:postid");
        $this->db->bind(':postid', $data['postid']);

        if($this->db->execute()){
            return true;
        }
        else{
            return false;
        }

    }

}