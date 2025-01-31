<?php
// DatabaseConnectionTest.php
use PHPUnit\Framework\TestCase;
use PDO;

class DatabaseConnectionTest extends TestCase {
    public function testDatabaseConnection() {
        $dsn = "mysql:host=localhost;dbname=test_course_registration";
        $username = "root";
        $password = "";

        try {
            $pdo = new PDO($dsn, $username, $password);
            $this->assertInstanceOf(PDO::class, $pdo);
        } catch (PDOException $e) {
            $this->fail("Database connection failed: " . $e->getMessage());
        }
    }
}
?>
