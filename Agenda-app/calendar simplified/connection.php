<?php 

class Connection 
{
    public PDO $pdo;
    public function __construct()
    {
        $this->pdo = new PDO('mysql:server=localhost;dbname=events', 'root', '');
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public function getEvents()
    {
        $statement = $this->pdo->prepare('SELECT * FROM events ORDER BY datum DESC');
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    public function addEvent($events) 
    {
        $statement = $this->pdo->prepare("INSERT INTO events (evenementen, tijd, datum) 
                                        VALUES (:evenementen, :tijd, :datum)");
        $statement->bindValue('evenementen', $events['evenementen']);
        $statement->bindValue('tijd', $events['tijd']);
        $statement->bindValue('datum', $events['datum']);
        return $statement->execute();
    }
    public function removeEvent($id)
    {
        $statement = $this->pdo->prepare("DELETE FROM events WHERE id = :id");
        $statement->bindValue('id', $id);
        return $statement->execute();
    }
}

return new Connection();
