<?php 
class User
{

    public $_DBOBJ = '';

    function __construct()
    {
        global $DBOBJ;
        $this->_DBOBJ = $DBOBJ;

    }

    public function fetchuser()
    {
        $stmt = $this->_DBOBJ->query('SELECT * FROM users');
        $row = $stmt->fetchAll();
        print_r($row);
    }

    public function insert($user){
        $statement = $this->_DBOBJ->prepare("INSERT INTO users(school_name, email, username, password, active_token) VALUES(?, ?, ?, ?, ?)");
        $statement->execute(array($user['school_name'], $user['school_email'], $user['user_name'], $user['password'], $user['active_token']));
        $lastId = $this->_DBOBJ->lastInsertId();
        return $lastId;

    }

    public function check_user($column,$value){
        //$sql = "SELECT * FROM users where ".$column." = ".$value;
        $sql = $this->_DBOBJ->prepare("SELECT * FROM users WHERE " . $column . "=?");
        $sql->execute([$value]);
        return $sql->fetchColumn();
        
    }
    
    public function select_user($where){
        $sql = $this->_DBOBJ->prepare("SELECT * FROM users WHERE active_token =? and id = ?");
        $sql->execute($where);
        return $sql->fetchColumn();
    }
}