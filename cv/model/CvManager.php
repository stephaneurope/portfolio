<?php
namespace Model;

class CvManager extends Manager
{

    public function getProCv(){
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT id,profil  FROM  profil_personnel ');

        $req->execute(array());
        return $req;
    }
    public function getExpCv(){
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT id,title,period,description  FROM  experience_professionnel');

        $req->execute(array());
        return $req;
    }
    public function getAvCv(){
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT id,avantage  FROM  competences');

        $req->execute(array());
        return $req;
    }
    public function getEdCv(){
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT id,title,year,description  FROM  education');

        $req->execute(array());
        return $req;
    }

    public function updateProCv($profil){
        $db = $this->dbConnect();
        $req = $db->prepare('UPDATE profil_personnel  SET  profil = ? ');

        $affected = $req->execute(array($profil));
        return $affected;
    }
    public function updateExpCv($expId,$title,$period,$description){
        $db = $this->dbConnect();
        $req = $db->prepare('UPDATE experience_professionnel  SET title = ?, period = ?, description = ? WHERE id = ?');

        $req->execute(array($title,$period,$description,$expId));
        return $req;
    }
    public function updateAvCv($avId,$avantage){
        $db = $this->dbConnect();
        $req = $db->prepare('UPDATE competences  SET avantage = ? WHERE id = ?');                
        $affected = $req->execute(array($avantage,$avId));
        return  $affected;
    }
    public function updateEdCv($edId,$title,$year,$description){
        $db = $this->dbConnect();
        $req = $db->prepare('UPDATE education   SET title = ?,year = ?,description = ? WHERE id = ?');

        $req->execute(array($title,$year,$description,$edId));
        return $req;
    }

    public function insertExpCv($title,$period,$description){
        $db = $this->dbConnect();
        $req = $db->prepare('INSERT INTO experience_professionnel(title,period,description) VALUES (?,?,?)');

        $affected = $req->execute(array($title,$period,$description));
        return $affected;
    }
    public function insertAvCv($avantage){
        $db = $this->dbConnect();
        $req = $db->prepare('INSERT INTO  competences (avantage) VALUES (?)');   
        $affected = $req->execute(array($avantage));
        return  $affected;
    }
    public function insertEdCv($title,$year,$description){
     $db = $this->dbConnect();
     $req = $db->prepare('INSERT INTO education(id,user_id,title , year, description) VALUES (NUll,1,?,?,?)');
     $reaffected = $req->execute(array($title,$year,$description));
     return $reaffected;
 }

 public function deleteExpCv($ExpId){
    $db = $this->dbConnect();
    $req = $db->prepare('DELETE FROM experience_professionnel  WHERE id = ?');

    $affected = $req->execute(array($ExpId));
    return $affected;
}
public function deleteAvCv($AvId){
    $db = $this->dbConnect();
    $req = $db->prepare('DELETE FROM  competences WHERE id = ?');                
    $affected = $req->execute(array($AvId));
    return  $affected;
}
public function deleteEdCv($EdId){
    $db = $this->dbConnect();
    $req = $db->prepare('DELETE FROM  education WHERE id = ?');
    $affected = $req->execute(array($EdId));
    return $affected;
}


}