<?php

class Connection
{
    public $pdo;
    public function connect() {
        try {
            $this->pdo = new PDO('mysql:server=localhost;dbname=SchoolBook', 'root','');
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $this->pdo;
        } catch (PDOException $e) {
            print "Error!: " . $e->getMessage() . "<br/>";
            die();
        }
    }

    public function get_post() {
        $statement = $this->pdo->prepare('SELECT * FROM post ORDER BY id');
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    public function get_post_byID($id) {
        $statement = $this->pdo->prepare('SELECT * FROM post WHERE id = ?');
        $statement->execute(array($id));
        return $statement->fetch(PDO::FETCH_ASSOC);
    }

    public function add_post($array) {
        $statement = $this->pdo->prepare('INSERT INTO post (Auteur, Titel, Bericht, image) VALUE (:Auteur, :Titel, :Bericht, :image)');
        $statement->bindValue('Auteur', $array['Auteur']);
        $statement->bindValue('Titel', $array['Titel']);
        $statement->bindValue('Bericht', $array['Bericht']);
        $statement->bindValue('image', $array['image']);
        return $statement->execute();
    }

    public function update_post($array) {
        $statement = $this->pdo->prepare("UPDATE post SET Auteur = :Auteur, Titel = :Titel, Bericht = :Bericht, image = :image WHERE id = :id");
        $statement->bindValue('Auteur', $array['Auteur']);
        $statement->bindValue('Titel', $array['Titel']);
        $statement->bindValue('Bericht', $array['Bericht']);
        $statement->bindValue('image', $array['image']);
        $statement->bindValue('id', $array['id']);
        return $statement->execute();
    }

    public function addLike($like, $id) {
        $statement = $this->pdo->prepare('UPDATE post  SET likes = ? WHERE id = ?');
        return $statement->execute(array($like, $id));
    }

    public function getLike($id) {
        $statement = $this->pdo->prepare('SELECT likes FROM post WHERE id = ?');
        $statement->execute(array($id));
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public function addComment($comment, $id) {
        $statement = $this->pdo->prepare('UPDATE post SET comments = ? WHERE id = ?');
        return $statement->execute(array($comment, $id));
    }

    public function getComment($id) {
        $statement = $this->pdo->prepare('SELECT comments FROM post WHERE id = ?');
        $statement->execute(array($id));
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }
}


