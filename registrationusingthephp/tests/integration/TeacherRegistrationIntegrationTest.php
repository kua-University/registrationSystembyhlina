<?php  // TeacherRegistrationIntegrationTest.php
use PHPUnit\Framework\TestCase;

class TeacherRegistrationIntegrationTest extends TestCase {
    public function testTeacherRegistrationIntegration() {
        $_POST['email'] = 'newteacher@example.com';
        $_POST['teacher_name'] = 'Jane Smith';
        $_POST['password'] = 'password456';
        include 'TeacherRegistration.php';  // Simulate registration

        // Check if data exists in the database
        $stmt = $connect->query("SELECT * FROM teachersignup WHERE email='newteacher@example.com'");
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        $this->assertNotEmpty($result);
        $this->assertEquals('newteacher@example.com', $result['email']);
        $this->assertEquals('Jane Smith', $result['teacher_name']);
    }
}
?>
