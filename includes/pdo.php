
<?php 
//php file for all PDO calls
$host = '127.0.0.1';
$db = 'fileServ';
$user = 'fileServ';
$pass = 'password';
$dsn = "mysql:host=$host;dbname=$db;";
$options = [
PDO::ATTR_ERRMODE  => PDO::ERRMODE_EXCEPTION,
PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
];
try {
     $pdo = new PDO($dsn, $user, $pass, $options);
} catch (\PDOException $e) {
     throw new \PDOException($e->getMessage(), (int)$e->getCode());
}
?>