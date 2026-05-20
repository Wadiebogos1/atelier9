<?php
include_once 'connexion.php';
class Students{
    //-------------------> this is first action 
    static function checkuser($login,$pass){
        $act="select * from utilisateur where login='$login' and pass='$pass'";
        $cursor=Connexion::selection($act);
        $nbr=$cursor->rowCount();
        return $nbr;
    }
    static function AddStudent($nom,$prenom,$ville,$temp,$des){
        $act="insert into student(nom,prenom,ville,photo)
            values('$nom','$prenom','$ville','$des')";
        $son=Connexion::majour($act);
        move_uploaded_file($temp,$des);
        return $son;   
    }
    static function AllStudents(){
        $act='select * from student';
        $tchitchi=Connexion::selection($act);
        return $tchitchi;
    }

    static function SearchStudents($ville){
        $act="select * from student where ville='$ville'";
        $cur=Connexion::selection($act);
        return $cur;
    }
}