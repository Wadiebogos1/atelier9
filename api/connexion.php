<?php
class Connexion{
   public static function One(){
    try {
    $wadie = new PDO('mysql:host=localhost; dbname=tptdmc.sql; charset=utf8','root','');
    $wadie->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $wadie;
    }
    catch (Exception $e){
      echo(' Erreur :'. $e->getMessage());
    }
   }
   //----------------------------------->exec == "insert , update, delete"
   public static function majour($act){
      try{
         $wadie=Connexion::One();
         $maj=$wadie->exec($act);
         return $maj;
      }
      catch (Exception $e){
       echo('Erreur :'.$e->getMessage());  
      }
      $wadie=null;
   }
    //----------------------------------->query =="select"
   public static function selection($act){
      try{
         $wadie=Connexion::One();
         $selection=$wadie->query($act);
         return $selection;
      }
      catch(Exception $e){
         echo('Erreur : ' . $e->getMessage());
      }
        $wadie=null;
   }
}
?>