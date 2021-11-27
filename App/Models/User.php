<?php

namespace Models;

class User {

    protected $table = 'users';

    protected $fillable = [
        'id',
        'name',
        'email',
        'password',
        'image'
    ];

    public static function signUp($name,$email,$password,$image){
        $insert = \DB::connect()->prepare("INSERT INTO `users` VALUES (?,?,?,?,?,?,?)");
        $insert->execute(array(uniqid(),$name,$email,$password,$image['name'], date("Y-m-d H-i-s"), date("Y-m-d H-i-s")));
        move_uploaded_file($image['tmp_name'], BASE_UPLOADS.$image['name']);
        self::signIn($email, $password);
    }

    public static function signIn($email, $password){
        $signIn = \DB::connect()->prepare("SELECT * FROM `users` WHERE email = ? AND password = ?");
        $signIn->execute(array($email, $password));
        if($signIn->rowCount() == 1){
            $user = $signIn->fetch();
            $_SESSION['login'] = true;
            $_SESSION['id'] = $user['id'];
            $_SESSION['name'] = $user['name'];
            $_SESSION['email'] = $email;
            $_SESSION['password'] = $password;
            $_SESSION['image'] = $user['image'];
            header("Location:".BASE.'');
        }else{
            echo "<script> alert('Email ou senha inválidos!') </script>";
            header("Refresh");
        }
    }

    public static function get(){
        $get = \DB::connect()->prepare("SELECT * FROM `users`");
        $get->execute();
        $get = $get->fetchAll();
        return $get;
    } 

    public static function profile($data){
        $profile = \DB::connect()->prepare("SELECT * FROM `users` WHERE id = '$data'");
        $profile->execute();
        $profile = $profile->fetch();
        return $profile;
    }

    public static function updateProfile($user, $name, $email, $password, $image){
        $update = \DB::connect()->prepare("UPDATE `users` SET name = ?, email = ?, password = ?, image = ? WHERE id = '$user'");
        $update->execute(array($name,$email,$password,$image['name']));
        move_uploaded_file($image['tmp_name'], BASE_UPLOADS.$image['name']);
    }

    public static function logout($data){
        unset($_SESSION['id']);
        unset($_SESSION['name']);
        unset($_SESSION['email']);
        unset($_SESSION['password']);
        unset($_SESSION['image']);
        unset($_SESSION['songs']);
        session_destroy();
    }

}


?>