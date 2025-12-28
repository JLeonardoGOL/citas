<?php

class database{

    private function connection() {
        try {
            $pdo = new PDO(
                "mysql:host=mysql;dbname=develop;charset=utf8mb4",
                "root",
                "12303122",
                [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
            );
            return $pdo;
        } catch (PDOException $e) {
            return "Error: " . $e->getMessage();
        }
    }

    public function db(){
        return self::connection();
    }

    public function create_database(){

        $data = new database();
        $data = $data->db();

        $sql = "
            CREATE TABLE IF NOT EXISTS users_data (
                idUser INT AUTO_INCREMENT PRIMARY KEY,
                nombre VARCHAR(255),
                apellidos VARCHAR(255),
                email VARCHAR(255),
                telefono VARCHAR(255),
                fecha_nacimiento DATE,
                direccion VARCHAR(255),
                sexo VARCHAR(20)
            );

            CREATE TABLE IF NOT EXISTS users_login (
                idLogin INT AUTO_INCREMENT PRIMARY KEY,
                idUser INT,
                usuario VARCHAR(255),
                password_hash VARCHAR(255),
                rol VARCHAR(50),
                FOREIGN KEY (idUser) REFERENCES users_data(idUser)
            );

            CREATE TABLE IF NOT EXISTS citas (
                idCita INT AUTO_INCREMENT PRIMARY KEY,
                idUser INT,
                fecha_cita DATE,
                motivo_cita VARCHAR(255),
                FOREIGN KEY (idUser) REFERENCES users_data(idUser)
            );

            CREATE TABLE IF NOT EXISTS noticias (
                idNoticia INT AUTO_INCREMENT PRIMARY KEY,
                titulo VARCHAR(255),
                imagen VARCHAR(255),
                texto TEXT,
                fecha DATE,
                idUser INT,
                FOREIGN KEY (idUser) REFERENCES users_data(idUser)
            );
        ";

        $data->exec($sql);
    }
}