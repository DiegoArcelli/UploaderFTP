<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Uploader
 *
 * @author diego
 */
class Uploader {
    //put your code here
    
    
    private $ftp_server;
    private $porta;
    private $username;
    private $password;
    
    
    function __construct($ftp_server,$porta,$username,$password) {
        
        $this->ftp_server = filter_input($_POST['ftp_server']);
        $this->porta = filter_input($_POST['port']);
        $this->username = filter_input($_POST['username']);
        $this->password = filter_input($_POST['password']);
        
    }
    
    function upload(){
        if (isset($_POST['send_file'])) {
            //validazione dei parametri di connessione
            if (($ftp_server != 'ftp_server') && ($ftp_server != '')) {
                if (($username != 'username') && ($username != '')) {
                    if (($password != 'password') && ($password != '')) {
                        //validazione nome dei file
                        echo $ftp_server . "<br>";
                        echo $password . "<br>";
                        echo $porta . "<br>";
                        echo $username . "<br>";
                        if (is_uploaded_file($_FILES['file']['tmp_name'])) {
                            $file = $_FILES['file']['tmp_name']; //nome file con percorso assoluto
                            $new_file = $_FILES['file']['name']; //nome file senza percorso
                            //apertura connessione ftp
                            $conn = ftp_connect($ftp_server, $porta) or die('Impossibile connettersi al server');
                            ftp_login($conn, $username, $password) or die('username o password errati');
                            ftp_pasv($conn, true);

                            //upload del file
                            $invia = ftp_put($conn, $new_file, $file, FTP_BINARY);
                            echo (!$invia) ? 'Upload fallito' : 'upload completato';

                            //chiusura connessione
                            ftp_close($conn);
                        } else {
                            echo "<b>Inserire il file</b>";
                        }
                    } else {
                        echo "<b>Inserire la password</b>";
                    }
                } else {
                    echo "<b>Inserire lo username</b>";
                }
            } else {
                echo "<b>Inserire il server ftp</b>";
            }
        }
    }
    
}
