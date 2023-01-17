<?php
declare(strict_types=1);

require dirname(__DIR__)."\core\auth\identifiants.php";
require dirname(__DIR__)."\core\db.php";
require dirname(__DIR__)."\core\model.php";
require dirname(__DIR__)."\application\model\user.php";

use App\Model\User;
use PHPUnit\Framework\TestCase;

final class DbTest extends TestCase
{
    // n'instancier pdo qu'une seule fois pour test clean-up/fixture chargement
    static private $pdo = null;

    // n'instancier uniquemenet PHPUnit\DbUnit\Database\Connection une seule fois par test
    private $conn = null;

    final public function getConnection(): ?PDO
    {
        if ($this->conn === null) {
            if (self::$pdo == null) {
                self::$pdo = new PDO( $GLOBALS['DB_DSN'], $GLOBALS['DB_USER'], $GLOBALS['DB_PASSWD'] );
                self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            }
            $this->conn = self::$pdo;
        }
        return $this->conn;
    }

    public function testCreateQueryTable()
    {
        $queryTable = $this->getConnection()->query( 'SELECT * FROM user');
        $queryTable->execute();
        $this->assertSame(1, $queryTable->rowCount());
    }

    public function testAddEntry()
    {
        $user = new User();
        $user->create("john_doe@domain.com", "john_doe", "password");

        $queryTable = $this->getConnection()->query( 'SELECT * FROM user');
        $queryTable->execute();
        $this->assertSame(2, $queryTable->rowCount(), "Échec de l'insertion");
    }


}