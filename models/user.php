<?php
  class User {
    // we define 3 attributes
    // they are public so that we can access them using $post->author directly
    public $id;
    public $username;
    public $password;
    public $role;

    public function __construct($id, $username, $password, $role) {
      $this->id      = $id;
      $this->username  = $username;
      $this->password = $password;
      $this->role = $role;
    }

    public static function all() {
      $list = [];
      $db = Db::getInstance();
      $req = $db->query('SELECT * FROM users');

      // we create a list of User objects from the database results
      foreach($req->fetchAll() as $user) {
        $list[] = new User($user['id'], $user['username'], $user['password'], $user['role'] );
      }

      return $list;
    }

    public static function find($username) {
      $db = Db::getInstance();
      // we make sure $id is an integer
      //$id = intval($id);
      $req = $db->prepare('SELECT * FROM users WHERE username = :username');
      // the query was prepared, now we replace :id with our actual $id value
      $req->execute(array('username' => $username));
      $user = $req->fetch();
      if(isset($user['id']))
        return new User($user['id'], $user['username'], $user['password'], $user['role'] );
      else
        return null;

      }

      public static function insertUser($username, $password, $role){
        $db = Db::getInstance();
        $req = $db->prepare("INSERT INTO users (username, password, role) VALUES ('$username','$password','$role')");
        $req->execute(array('username' => $username));
      }
      
    }
  
?>