<?php

class Connect
{
    public PDO $db;
    public function __construct()
    {
        $this->db = new PDO('mysql:server=localhost;dbname=basiccrud', 'root', '');
        $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public function getStudents()
    {
        $students = $this->db->prepare('SELECT * FROM student ORDER BY id');
        $students->execute();
        return $students->fetchAll(PDO::FETCH_ASSOC);
    }

    public function addStudent($data)
    {
        $students = $this->db->prepare("INSERT INTO student (firstName, surname, Email, telephone_number, street_name, house_number, huisnummer_toevoeging, residence, post_cose)
                                                VALUE (:firstName, :surname, :Email, :telephone_number, :street_name, :house_number, :huisnummer_toevoeging, :residence, :post_cose)");
        $students->bindValue("firstName", $data['voornaam']);
        $students->bindValue("surname", $data['achternaam']);
        $students->bindValue("Email", $data['email']);
        $students->bindValue("telephone_number", $data['telephone_nummmer']);
        $students->bindValue("street_name", $data['straatnaam']);
        $students->bindValue("house_number", $data['huisnummer']);
        $students->bindValue("huisnummer_toevoeging", $data['toevoeging']);
        $students->bindValue("residence", $data['woonplaats']);
        $students->bindValue("post_cose", $data['postcode']);
        return $students->execute();
    }

    public function getStudentById($id)
    {
        $students = $this->db->prepare("SELECT * FROM student WHERE id = :id");
        $students->bindValue('id', $id);
        $students->execute();
        return $students->fetch(PDO::FETCH_ASSOC);
    }
    public function updateStudent($id, $student)
    {
        $students = $this->db->prepare("UPDATE student SET  firstName = :firstName, surname = :surname, Email = :Email, telephone_number = :telephone_number,
                   street_name = :street_name, house_number = :house_number, huisnummer_toevoeging = :huisnummer_toevoeging, residence = :residence, post_cose = :post_cose WHERE id = :id");
        $students->bindValue("id", $id);
        $students->bindValue("firstName", $student['voornaam']);
        $students->bindValue("surname", $student['achternaam']);
        $students->bindValue("Email", $student['email']);
        $students->bindValue("telephone_number", $student['telephone_nummmer']);
        $students->bindValue("street_name", $student['straatnaam']);
        $students->bindValue("house_number", $student['huisnummer']);
        $students->bindValue("huisnummer_toevoeging", $student['toevoeging']);
        $students->bindValue("residence", $student['woonplaats']);
        $students->bindValue("post_cose", $student['postcode']);
        return $students->execute();
    }

    public function removeStudent($id)
    {
        $students = $this->db->prepare("DELETE FROM student WHERE id = :id");
        $students->bindValue("id", $id);
        return $students->execute();
    }


}

return new Connect();
