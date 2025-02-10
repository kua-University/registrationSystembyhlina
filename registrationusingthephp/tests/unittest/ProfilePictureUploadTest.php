
<?php
// ProfilePictureUploadTest.php
use PHPUnit\Framework\TestCase;

class ProfilePictureUploadTest extends TestCase {
    public function testProfilePictureUpload() {
        // Simulate file upload
        $_FILES['img']['name'] = 'profile.jpg';
        $_FILES['img']['tmp_name'] = '/path/to/temp/file';
        
        include 'ProfilePictureUpload.php';  // Profile picture upload script

        // Verify the uploaded file exists in the correct directory
        $this->assertFileExists('../Teacher/upload/profile.jpg');
    }
}
?>
