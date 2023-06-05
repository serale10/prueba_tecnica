<?php

require_once 'model/connection.php';

class ModelPrincipal{

    /* ===============================
            MODELO REGISTROS
    ==================================*/

    static public function mdlRegisterUser($table, $dates){

        $stmt = Connection::connect()->prepare("INSERT INTO $table(name, phone_number, email, password) VALUES (:name, :phone_number, :email, :password)");

        $stmt->bindParam(":name", $dates["name"], PDO::PARAM_STR);
        $stmt->bindParam(":phone_number", $dates["phone_number"], PDO::PARAM_STR);
        $stmt->bindParam(":email", $dates["email"], PDO::PARAM_STR);
        $stmt->bindParam(":password", $dates["password"], PDO::PARAM_STR);

        if($stmt->execute()){

            return "ok";
            
        }else{
            print_r(Connection::connect()->errorInfo());
        }


    }

    /* ===============================
            MODELO LISTAR USUARIOS
    ==================================*/

    static public function mdlListUsers($table, $item, $value){

        if ($item == null && $value == null) {
            
            $stmt = Connection::connect()->prepare("SELECT $table.*, DATE_format(users.date_update, '%d/%m/%y') AS date_update, SUM(sessions.logg_session) AS total_logged_sessions, SUM(sessions.failed_tries) AS total_failed_tries
                                        FROM users
                                        LEFT JOIN sessions ON users.id_user = sessions.id_users
                                        GROUP BY users.id_user
                                        ORDER BY users.id_user DESC");

            $stmt->execute();

            return $stmt->fetchAll();
            
        }else{

            $stmt = Connection::connect()->prepare("SELECT users.*, sessions.failed_tries
                                                FROM users
                                                LEFT JOIN sessions ON users.id_user = sessions.id_users
                                                WHERE users.$item =  :$item 
                                                ORDER BY users.id_user DESC");

            $stmt->bindParam(":".$item, $value, PDO::PARAM_STR);

            $stmt->execute();

            return $stmt->fetch();

        }

    }

    /* ===============================
            AGREGAR INICIOS DE SESSION
    ==================================*/

    static public function mdlInsertLoggedFalied($table, $failed_tries, $logg_session, $id_users){
        $stmt = Connection::connect()->prepare("INSERT INTO $table (failed_tries, logg_session, id_users) VALUES (:failed_tries, :logg_session, :id_users)");

        $stmt->bindParam(":failed_tries", $failed_tries, PDO::PARAM_INT);
        $stmt->bindParam(":logg_session", $logg_session, PDO::PARAM_INT);
        $stmt->bindParam(":id_users", $id_users, PDO::PARAM_INT);
    
        if ($stmt->execute()) {
            return "ok";
        } else {
            print_r(Connection::connect()->errorInfo());
        }
    }

    static public function mdlGetSessionStats() {
        $stmt = Connection::connect()->prepare("SELECT id_users, SUM(logg_session) AS total_logged_sessions, SUM(failed_tries) AS total_failed_tries
                                                FROM sessions
                                                GROUP BY id_users");
    
        $stmt->execute();
    
        return $stmt->fetchAll();
    }


}