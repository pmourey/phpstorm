<?php
/**
 * Created by PhpStorm.
 * User: philippemourey
 * Date: 17/01/2018
 * Time: 18:04
 */

include 'functions.php';

if ( isset($_GET['pwd']) )
{
    $ip_visitor = get_ip();
    $hostname_visitor = gethostbyaddr($ip_visitor);
    $log = $_GET['pwd'] . "|" . $ip_visitor . "|" . $hostname_visitor;
    writeLog($log);

    if ($_GET['pwd'] == "afpa")
    {
        header("Location: http://2.15.32.3:3000");
        exit();
    }
    else
        echo "Mot de passe incorrect!";
}
else {
?>
    <!DOCTYPE html>
    <html lang="fr">
    <head>
        <meta charset="UTF-8">
        <title>Code d'accès au super FPS</title>
    </head>
    <body>
    <h1>Page d'accès au super FPS</h1>
    <form method="get" action="index.php">
        <label>Mot de passe
            <input type=password name="pwd">
        </label>
        <input type="submit" value="OK">
    </form>

    </body>
    </html>

<?php
    }
?>



