<?php
/**
 * Created by PhpStorm.
 * User: philippemourey
 * Date: 18/01/2018
 * Time: 08:06
 */

/**
 * Récupérer la véritable adresse IP d'un visiteur
 */
function get_ip() {
    // IP si internet partagé
    if (isset($_SERVER['HTTP_CLIENT_IP'])) {
        return $_SERVER['HTTP_CLIENT_IP'];
    }
    // IP derrière un proxy
    elseif (isset($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        return $_SERVER['HTTP_X_FORWARDED_FOR'];
    }
    // Sinon : IP normale
    else {
        return (isset($_SERVER['REMOTE_ADDR']) ? $_SERVER['REMOTE_ADDR'] : '');
    }
}

/**
 * Ecrire la log dans un fichier
 * @param $txt
 */
function writeLog($txt) {
    if (!file_exists("log.txt")) file_put_contents("log.txt", "");
    file_put_contents("log.txt",date("[j/m/y H:i:s]")." - $txt \r\n".file_get_contents("log.txt"));
}