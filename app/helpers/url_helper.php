<?php

//Prosta funkcija za redirekciju
function redirect($page){
    header('location: '.URLROOT. '/'. $page);
}