<?php
// TeacherLoginIntegrationTest.php
use PHPUnit\Framework\TestCase;

class TeacherLoginIntegrationTest extends TestCase {
    public function testTeacherLoginFlow() {
        $_POST['email'] = 'newteacher@example.com';
        $_POST['password'] = 'password456';
        include 'TeacherLogin.php';  // Simulate login script

        $this->assertTrue(isset($_SESSION['emai']));

        // Optionally check session data
        $this->assertEquals('newteacher@example.com', $_SESSION['emai']);
    }
}
?>
