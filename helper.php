<?php
    include('FTPClass.php');
    include('Sanifica.php');   


    $s = new Sanifica();
    /*$ftp_server = $s->setSanifica($_POST['ftp_server']);
    $porta = $s->setSanifica($_POST['port']);
    $username = $s->setSanifica($_POST['username']);
    $password = $s->setSanifica($_POST['password']);*/
    $ftp_server = $s->setSanifica($_POST['ftp_server']);
    $porta = $s->setSanifica($_POST['port']);
    $username = $s->setSanifica($_POST['username']);
    $password = $s->setSanifica($_POST['password']);
    $ftp = new FTPClass($ftp_server,$porta,$username,$password);
    $ftp->connetti();
    $ftp->invia();

  ?>