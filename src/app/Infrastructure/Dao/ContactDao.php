<?php
namespace App\Infrastructure\Dao;
use \PDO;

/**
 * contactsテーブルとやりとりするクラス
 */
class ContactDao
{
    private $pdo;

    public function __construct()
    {
        $dbUserName = 'root';
        $dbPassword = 'password';
        $this->pdo = new PDO(
            'mysql:dbname=contactform;host=mysql;charset=utf8',
            $dbUserName,
            $dbPassword
        );
    }

    /**
     * お問合せ情報を全件取得
     */
    public function fetchAllContactsData(): ?array
    {
        $statement = $this->pdo->prepare('SELECT * FROM contacts');
        $statement->execute();
        $contacts = $statement->fetchAll();

        return $contacts ? $contacts : null;
    }
}
