<?php
class CriarBanco
{
    public static function criar()
    {
        $db = new Database();

        $sql = '';
        $sql .= "CREATE DATABASE IF NOT EXISTS budogs;";
        $sql .= "CREATE TABLE IF NOT EXISTS usuarios (
                id INT(11) NOT NULL AUTO_INCREMENT,
                nome VARCHAR(255) NOT NULL,
                email VARCHAR(255) NOT NULL,
                senha VARCHAR(255) NOT NULL,
                PRIMARY KEY (id)
            );";

        $sql .= "CREATE TABLE IF NOT EXISTS mesas (
                id INT(11) NOT NULL AUTO_INCREMENT,
                numero VARCHAR(255) NOT NULL,
                cliente VARCHAR(255) NOT NULL,
                PRIMARY KEY (id)
            );";

        $sql .= "CREATE TABLE IF NOT EXISTS ingredientes (
                id INT(11) NOT NULL AUTO_INCREMENT,
                nome VARCHAR(255) NOT NULL,
                quantidade VARCHAR(255) NOT NULL,
                status int(1) NOT NULL,
                PRIMARY KEY (id)
            );";

        $sql .= "CREATE TABLE IF NOT EXISTS combos (
                id INT(11) NOT NULL AUTO_INCREMENT,
                nome VARCHAR(255) NOT NULL,
                valor VARCHAR(255) NOT NULL,
                status int(1) NOT NULL,
                ingredientes VARCHAR(255) NOT NULL,
                img VARCHAR(255) NOT NULL,
                PRIMARY KEY (id)
            );";

        $sql .= "CREATE TABLE IF NOT EXISTS combinados (
                id INT(11) NOT NULL AUTO_INCREMENT,
                nome VARCHAR(255) NOT NULL,
                valor VARCHAR(255) NOT NULL,
                status int(1) NOT NULL,
                ingredientes VARCHAR(255) NOT NULL,
                img VARCHAR(255) NOT NULL,
                PRIMARY KEY (id)
            );";

        $sql .= "CREATE TABLE IF NOT EXISTS gourmet (
                id INT(11) NOT NULL AUTO_INCREMENT,
                nome VARCHAR(255) NOT NULL,
                valor VARCHAR(255) NOT NULL,
                status int(1) NOT NULL,
                ingredientes VARCHAR(255) NOT NULL,
                img VARCHAR(255) NOT NULL,
                PRIMARY KEY (id)
            );";

        $sql .= "INSERT INTO combinados (nome, valor, status, ingredientes, img)
                VALUES ('teste', 'R$ 24, 00', 1, 'pao, carne, cebola', 'teste/teste')
        ;";

        $sql .= "INSERT INTO ingredientes (nome, quantidade)
                VALUES ('cebola', 10), ('macarrao',20), ('pao', 5);";

        // $resul = $db->insere($s

        $sql .= "INSERT INTO combos (nome, valor, status, ingredientes, img)
                VALUES ('Budog', 'R$ 20,00', 1, 'cebola, macarrao, pao', 'img/budog.jpg')
        ;";

        $sql .= "INSERT INTO gourmet (nome, valor, status, ingredientes, img)
                VALUES ('Budog', 'R$ 20,00', 1, 'cebola, macarrao, pao', 'img/budog.jpg')
        ;";

        $resul = $db->multi_query($sql);

        if ($resul) {
            echo ("banco criado!");
        } else {
            echo ("Erro");
        }
    }
}
