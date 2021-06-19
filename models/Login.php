<?php
require_once "database/Database.php";

class Login extends Database
{
    private $usuario;
    private $pass;

    public function __construct()
    {
        parent::__construct();
    }

    public function getUsuario()
    {
        return $this->usuario;
    }

    public function setUsuario($usuario)
    {
        $this->usuario = $usuario;

        return $this;
    }

    public function getPass()
    {
        return $this->pass;
    }

    public function setPass($pass)
    {
        $this->pass = $pass;

        return $this;
    }

    public function login()
    {
        $result = false;

        //La sentencia almacena un data en la bd de usuario que coincida el usuario ingresado
        //SELECT U.id_usuario, U.username, U.password, U.id_sucursal, U.rol, S.nombre FROM `tbl_usuarios` AS U INNER JOIN `tbl_sucursal` AS S WHERE U.id_sucursal = S.id_sucursal
        $query = "SELECT U.id_usuario, U.username, U.password, U.id_sucursal, U.rol, S.nombre FROM " . TBL_USUARIOS . " AS U INNER JOIN " . TBL_SUCURSAL . " AS S WHERE " . U_USUARIO . " = :" . U_USUARIO . " AND U." . U_ID_SUCURSAL . " = S." . S_ID;
        $statement = $this->conn->prepare($query);

        //Utilizamos el bindValue para evitar inyecciones de sql
        $statement->bindValue(":" . U_USUARIO, $this->getUsuario());

        //Buscamos en la bd un usuario con el que coincida el usuario ingresado, si se encontro:
        if ($statement->execute()) {
            //Tomamos el numero de concidencias (numero de usuarios que encontro con el usuario ingresado)
            $nRows = $statement->rowCount();
            //Si se encontro solo un usuario continua con el proceso
            if ($nRows == 1) {

                //Tomamos ese usuario como un arreglo asociativo
                $result = $statement->fetch(PDO::FETCH_ASSOC);

                //una vez tenemos todos los datos de el usuario, comprobamos si su contraseña coincide
                //var_dump($statement);
                if ($this->getPass() == $result[U_PASSWORD]) {

                    //Si la contraseña coincide, iniciamos la sesion
                    session_start();

                    //Agregamos a la sesion, valores que podemos llegar a utilizar más adelante
                    $_SESSION[U_ID] = $result[U_ID];
                    $_SESSION[U_USUARIO] = $result[U_USUARIO];
                    $_SESSION[U_ID_SUCURSAL] = $result[U_ID_SUCURSAL];
                    $_SESSION[S_NOMBRE_SUCURSAL] = $result[S_NOMBRE_SUCURSAL];

                    //creamos una cookie
                    setcookie("SessionId", true, strtotime('+1 day'), '/');
                    setcookie("Rol", $result[U_ROL], strtotime('+1 day'), '/');
                    //Retornamos los datos del usuario encontrado
                    return $result;
                } else { //En caso que las contraseñas no coincidan, retornara false
                    $result = false;
                }
            } else { //En caso que no se encuentre ningun usario, o multiples usuarios con el mismo nombre (cosa que no pasaría por la configuracion de la bd)

                $result = false;
            }
        } else { //En caso que ocurra un error en la ejecucion de la sentencia

            $result = false;
        }
        return $result; //Retornamos el false, en caso que no entre a alguna de las verificaciones
    }
}
