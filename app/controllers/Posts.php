<?php
class Posts extends Controller{
    public function __construct(){
        if(!isLoggedIn()){
          redirect('users/login');
        }

        $this->postModel = $this->model('Post');
    }
    public function index(){
        //Preuzimanje objava
        $posts =$this->postModel->getPosts();

        $data = ['posts' => $posts];
        $this ->view('posts/index', $data);
    }

    public function add(){
        if($_SERVER['REQUEST_METHOD']=='POST'){
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = ['title'=>trim($_POST['title']),
                     'user_id' => $_SESSION['user_id'],
                     'title_err'=>'',
                     'file_err' => ''
                    ];

            $file = $_FILES['file'];
            $fileName = $file['name'];
            $fileTmpName = $file['tmp_name'];
            $fileSize = $file['size'];
            $fileError = $file['error'];
            $fileType = $file['type'];

            $fileExt = explode('.', $fileName);
            //Preuzima zadnji element iz niza odnosno ekstenziju slike
            $fileActualExt = strtolower(end($fileExt));
            
            //Dozvoljenje ekstenzije
            $allowed = array('jpg','jpeg','png');

            //Provera da li je ekstenzija slike dozvoljena
            if(in_array($fileActualExt, $allowed)){
                if($fileError === 0){
                   if($fileSize < 1000000){
                        $fileNameNew = uniqid('',true).".".$fileActualExt;
                        $fileDestination = $_SERVER['DOCUMENT_ROOT'].'/seminarskiphp/public/slike/'.$fileNameNew;
                        move_uploaded_file($fileTmpName, $fileDestination);
                   }else{
                       $data['file_err'] = 'Veličina datoteke je prevelika.';
                        }
                }else{
                    $data['file_err'] = "Došlo je do greške.";
                }
            }else{
                $data['file_err']="Tip datoteke nije dozvoljen.";
            }

        if(empty($data['title'])){
                $data['title_err'] = 'Unesite naziv slike.';}

        //Validacija
        if(empty($data['title_err']) && empty($data['file_err'])){
            if($this->postModel->addPost($data, $fileNameNew)){
                flash('post_added', 'Uspešno dodato.');
                redirect('posts');
            }
            else{
                die('Došlo je do greške.');
            }
         }
         else{
                 $this->view('posts/add' , $data);
             }
        
      }
    
  
      else{
        $data = ['title'=>'',
                 'title_err'=>'',
                 'file_err'=>''];
    
        $this->view('posts/add', $data);
    }

  }

    public function showposts(){
        $posts =$this->postModel->showGallery();
        $count =$this->postModel->countPosts();
        $likes =$this->postModel->countLikes();
        $username = $this->postModel->userName();
        $data = ['posts'=> $posts,
                'count'=> $count[0],
                'likes'=> $likes[0],
                'username'=> $username[0]];

        $this->view('posts/showposts', $data);
    }

    public function admin(){
        if($_SESSION['user_id']!=2){
            redirect('posts/index');
        }else{
        $showusers = $this->postModel->showUsers();
        $data = ['users' => $showusers];
        $this->view('posts/admin', $data);
        }
    }

    public function posted(){
        if($_SESSION['user_id']!=2){
            redirect('posts/index');
        }else{
        $showpost = $this->postModel->showPosts();
        $data = ['posts' => $showpost];

        $this->view('posts/posted', $data);
        }
    }

    public function delete(){
        if($_SESSION['user_id']!=2){
            redirect('posts');
        }else{
            if($_SERVER['REQUEST_METHOD']=='POST'){
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
                $data = ['postid'=>trim($_POST['postid']),
                'postid_err'=>''];

               if(empty($_POST['postid'])){
                   $data['postid_err']="Unesite id objave.";
               }

               if(empty($data['postid_err'])){
                if($this->postModel->delete($data)){
                    redirect('posts/admin');
                }
                else{
                    die('Došlo je do greške.');
                }
             }else{
                  $this->view('posts/delete' , $data);
                 }
            
        }else{
            $data = ['postid'=>'',
                     'postid_err'=>''];
        
            $this->view('posts/delete', $data);
    }
   }
  }
}