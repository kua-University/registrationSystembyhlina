
<?php  // TeacherLoginTest.php
use PHPUnit\Framework\TestCase;

class TeacherLoginTest extends TestCase {
    public function testTeacherLogin() {
        $_POST['email'] = 'testteacher@example.com';
        $_POST['password'] = 'password123';

        include 'TeacherLogin.php';  // Simulate login script

        $this->assertTrue(isset($_SESSION['emai']));
    }
}
?>
