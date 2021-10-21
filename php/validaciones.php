<?php

function validarE($email){

    if(preg_match("/^[^\s@]+@[^\s@]+\.[^\s@]+$/", $email)){
        return true;
    }

}

function validarT($telef){

    if(preg_match("/^(\+34|0034|34)?[ -]*(6|7)[ -]*([0-9][ -]*){8}$/", $telef)){
        return true;
    }

}