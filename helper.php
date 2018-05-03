<?php

require 'filter.php';

//Tecnica postback
//se secondo accesso prendo i dati dal form
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
?>