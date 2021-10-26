<?php
class UserController{
    public function __construct()
    {
        //$users=User::all();
        
    }
    public function login(){
        
        if(isset($_POST['username'])&&isset($_POST['password'])){
            $user=User::find($_POST['username']);
            if($user!=null)
            if($_POST['username']==$user->username&&$_POST['password']==$user->password){
                echo 'Successfuly logged in';
                
                $_SESSION['user']=$user->username;
                echo $user->username; 
            }
            echo 'valami';
            
            
        }
    }
    public function logout(){
        session_destroy();
    }

    public function register(){
        if(isset($_POST['username'])&&isset($_POST['password'])&&isset($_POST['passwordAgain'])){
            if($_POST['password']!=$_POST['passwordAgain']){
                return;
            }
            $registerUser=User::find($_POST['username']);
            if($registerUser==null){
                $registerUser=User::insertUser($_POST['username'],$_POST['password'],2);

            }
        }
    }

 }



?>