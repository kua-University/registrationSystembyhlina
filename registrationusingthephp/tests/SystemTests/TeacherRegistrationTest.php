<?php
use PHPUnit\Framework\TestCase;

class TeacherRegistrationTest extends TestCase {
    public function testTeacherRegistrationWithProfileUpload() {
        $_POST['email'] = 'teacher5@example.com';
        $_POST['teacher_name'] = 'John Doe';
        $_POST['password'] = 'securepassword';
        include 'TeacherRegistration.php';

        $_FILES['img']['name'] = 'profile5.jpg';
        $_FILES['img']['tmp_name'] = '/path/to/temp/file';
        include 'ProfilePictureUpload.php';

        $this->assertFileExists('../Teacher/upload/profile5.jpg');
    }
}
?>
