<?php

// class Database {
//     private static $pdo = null;

//     public static function connect() {
//         if (self::$pdo === null) {
//             $host = '127.0.0.1:3307';  // Verifica si el puerto es el correcto para tu base de datos
//             $db   = 'tienda de ropa';   // Verifica que el nombre de la base de datos sea correcto
//             $user = 'root';             // Usuario de la base de datos
//             $pass = '';                 // Contraseña de la base de datos
//             $charset = 'utf8mb4';       // Codificación de caracteres

//             $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
//             $options = [
//                 PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
//                 PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
//                 PDO::ATTR_EMULATE_PREPARES   => false,
//             ];

//             try {
//                 self::$pdo = new PDO($dsn, $user, $pass, $options);
//             } catch (\PDOException $e) {
//                 throw new \PDOException($e->getMessage(), (int)$e->getCode());
//             }
//         }
//         return self::$pdo;
//     }

// }

$host = 'localhost';
$user = 'root';
$password = '';
$dbname = 'tienda de ropa';

// Conexión a la base de datos
$conn = new mysqli($host, $user, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
?>
