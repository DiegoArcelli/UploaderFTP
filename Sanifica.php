<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Sanifica
 *
 * @author diego
 */
class Sanifica {
    //put your code here
    
    private $attr;

    
    public function __construct(){

    }
    
    public function setSanifica($attr){
        $this->attr = htmlentities($attr);
        return $this->attr;
    }
    
    
}
