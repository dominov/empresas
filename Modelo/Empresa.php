<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Empresa
 *
 * @author Cristian
 */
class Empresa {

    private $NIT;
    private $password;
    private $nombre;
    private $id;

    function __construct($NIT, $password, $nombre, $id) {
        $this->NIT = $NIT;
        $this->password = $password;
        $this->nombre = $nombre;
        $this->id = $id;
    }
    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

            public function getNIT() {
        return $this->NIT;
    }

    public function getPassword() {
        return $this->password;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function setNIT($NIT) {
        $this->NIT = $NIT;
    }

    public function setPassword($password) {
        $this->password = $password;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

}
