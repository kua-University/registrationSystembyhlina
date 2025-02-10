<?php
use PHPUnit\Framework\TestCase;

class StudentRegistrationTest extends TestCase {
    private $pdo;

    protected function setUp(): void {
        $dsn = "mysql:host=localhost;dbname=test_course_registration";
        $username = "root";
        $password = "";
        $this->pdo = new \PDO($dsn, $username, $password);
    }

    public function testStudentRegistrationAndEnrollment() {
        $_POST['email'] = 'student1@example.com';
        $_POST['student_name'] = 'Alice Student';
        $_POST['password'] = 'studentpass123';
        include 'StudentRegistration.php';

        $stmt = $this->pdo->prepare("SELECT * FROM studentregistration WHERE email = ?");
        $stmt->execute([$_POST['email']]);
        $student = $stmt->fetch(\PDO::FETCH_ASSOC);

        $this->assertNotEmpty($student);
        $this->assertEquals('student1@example.com', $student['email']);

        $_POST['course_id'] = 1;
        include 'CourseEnrollment.php';

        $stmt = $this->pdo->prepare("SELECT * FROM enrollments WHERE student_email = ?");
        $stmt->execute([$_POST['email']]);
        $enrollment = $stmt->fetch(\PDO::FETCH_ASSOC);

        $this->assertNotEmpty($enrollment);
        $this->assertEquals(1, $enrollment['course_id']);
    }

    protected function tearDown(): void {
        $this->pdo = null;
    }
}
?>
