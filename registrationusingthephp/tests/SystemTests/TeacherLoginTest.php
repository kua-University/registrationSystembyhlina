<?php
use PHPUnit\Framework\TestCase;

class TeacherLoginTest extends TestCase {
    public function testTeacherLogin() {
        $_POST['email'] = 'teacher5@example.com';
        $_POST['password'] = 'securepassword';
        include 'TeacherLogin.php';

        $this->assertTrue(isset($_SESSION['email']));
        $this->assertEquals('teacher5@example.com', $_SESSION['email']);
    }
}
?>
