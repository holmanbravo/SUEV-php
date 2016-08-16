<?php

/**
 * Created by PhpStorm.
 * User: cristian
 */
class DbConnection
{
    private static $dbName = 'Universidad';
    private static $dbHost = 'localhost';
    private static $dbUsername = 'postgres';
    private static $dbUserPassword = '1234';
    private static $dbPort = '5432';
    private static $MyConnection = null;


    public function __construct()
    {
        die('Init function is not allowed');
    }

    public static function connect()
    {
        // One connection through whole application
        if (null == self::$MyConnection) {
            try {
                self::$MyConnection = new PDO("pgsql:host=" . self::$dbHost . ";" . "port=" .
                    self::$dbPort . ";" . "dbname=" . self::$dbName, self::$dbUsername, self::$dbUserPassword);
                self::$MyConnection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            }
            catch (PDOException $e) {
                die(' se presenta el siguiente error : ' . $e->getMessage());
            }
        }
        return self::$MyConnection;
    }

    public static function disconnect()
    {
        self::$MyConnection = null;
    }

    public static function singletonConexion()
    {
        if (!isset(self::$instancia)) {
            $miclase = __CLASS__;
            self::$instancia = new $miclase;
        }
        return self::$instancia;
    }
}
?>