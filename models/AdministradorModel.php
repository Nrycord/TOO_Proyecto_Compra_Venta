<?php
require_once "database/Database.php";
require_once "models/Usuario.php";

class AdministradorModel extends Usuario
{
    private $username;
    private $password;

    public function __construct()
    {
        parent::__construct();
    }

    public function getUsername()
    {
        return $this->username;
    }

    public function setUsername($username)
    {
        $this->username = $username;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function setPassword($password)
    {
        $this->password = $password;
    }

    public function obtenerAdministrador($user, $pass)
    {
        $query = "SELECT * FROM " . TBL_ADMIN . " WHERE " . U_USER . " LIKE =:" . U_USER . " AND " . U_PASS . " LIKE =:" . U_PASS;
        $statement = $this->conn->prepare($query);

        $statement->bindValue(':' . U_USER, $user);
        $statement->bindValue(':' . U_PASS, $pass);

        //"<h1>Registro no encontrado!</h1>"
        $message = false;

        if ($statement->execute()) {
            $message = $statement->fetch(PDO::FETCH_ASSOC);
        }

        return $message;
    }
}
