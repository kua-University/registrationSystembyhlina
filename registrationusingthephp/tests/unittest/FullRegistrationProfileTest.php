<?php
// FullRegistrationProfileTest.php
use PHPUnit\Framework\TestCase;

class FullRegistrationProfileTest extends TestCase {
    public function testFullRegistrationAndProfileCreation() {
        // Simulate registration
        $_POST['email'] = 'teacher3@example.com';
        $_POST['teacher_name'] = 'Alice Cooper';
        $_POST['password'] = 'password321';
        include 'TeacherRegistration.php';

        // Simulate file upload
        $_FILES['img']['name'] = 'profile3.jpg';
        $_FILES['img']['tmp_name'] = '/path/to/temp/file';
        include 'ProfilePictureUpload.php';

        // Check if profile picture exists
        $this->assertFileExists('../Teacher/upload/profile3.jpg');
    }
}
?>