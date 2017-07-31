<?php

class passwordHash {

	/* Función que sirve para encriptar contraseñas */
    public static function hash($password) {

        return password_hash($password, PASSWORD_BCRYPT);
    }

    /* Función que sirve para verificar si las contraseñas coinciden */
    /* 1st arg: contraseña no encriptada */
    /* 2nd arg: contraseña encriptada */
    public static function check_password($password, $hash) {
        
        return password_verify($password, $hash);
    }

}

?>