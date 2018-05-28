<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of FTPClass
 *
 * @author diego
 */
class FTPClass {
    //put your code here
    
    private $ftp_server;
    private $porta;
    private $username;
    private $password;
    
    public function __construct($ftp_server,$porta,$username,$password) {
        $this->ftp_server = $ftp_server;
        $this->porta = $porta;
        $this->username = $username;
        $this->password = $password;
    }
    
    public function connetti(){
        echo "echooooooooo" . $this->ftp_server . " " . $this->username;
        $file = $_FILES['file']['tmp_name']; //nome file con percorso assoluto
        $new_file = $_FILES['file']['name']; //nome file senza percorso
        //apertura connessione ftp
        $conn = ftp_connect($ftp_server, $porta) or die ('Impossibile connettersi al server');
        ftp_login($conn, $username, $password) or die ('username o password errati');        
    }
    
    public function invia(){
        $invia = ftp_put($conn, $new_file, $file, FTP_BINARY);
        echo (!$invia) ? 'Upload fallito' : 'upload completato';
    }
    
    
}
