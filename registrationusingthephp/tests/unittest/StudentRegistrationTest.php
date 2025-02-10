<?php
// StudentRegistrationTest.php
use PHPUnit\Framework\TestCase;
use PDO;

class StudentRegistrationTest extends TestCase {
    private $pdo;

    protected function setUp(): void {
        $dsn = "mysql:host=localhost;dbname=your_database";
        $username = "root";
        $password = "";
        $this->pdo = new PDO($dsn, $username, $password);
    }

    public function testStudentRegistration() {
        $email = "teststudent@example.com";
        $student_name = "Alice Brown";
        $password = "studentpassword123";
        $stmt = $this->pdo->prepare("INSERT INTO studentregistration (email, student_name, password) VALUES (?, ?, ?)");
        $stmt->execute([$email, $student_name, $password]);

        // Check if data was inserted
        $stmt = $this->pdo->prepare("SELECT * FROM studentregistration WHERE email = ?");
        $stmt->execute([$email]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        $this->assertNotEmpty($result);
        $this->assertEquals($email, $result['email']);
        $this->assertEquals($student_name, $result['student_name']);
    }

    protected function tearDown(): void {
        // Clean up
        $this->pdo = null;
    }
}
?>