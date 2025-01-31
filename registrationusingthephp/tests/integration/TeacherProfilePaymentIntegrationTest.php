<?php   // TeacherProfilePaymentIntegrationTest.php
use PHPUnit\Framework\TestCase;
use Stripe\Stripe;
use Stripe\Charge;

class TeacherProfilePaymentIntegrationTest extends TestCase {
    public function testProfileAndPaymentIntegration() {
        // Simulate teacher registration
        $_POST['email'] = 'teacher4@example.com';
        $_POST['teacher_name'] = 'Tom Riddle';
        $_POST['password'] = 'password123';
        include 'TeacherRegistration.php';

        // Simulate payment
        Stripe::setApiKey("your_stripe_test_key");
        $charge = Charge::create([
            'amount' => 5000,
            'currency' => 'usd',
            'source' => 'tok_visa',
            'description' => 'Test payment',
        ]);

        // Verify the payment
        $this->assertEquals('succeeded', $charge->status);
    }
}
?>