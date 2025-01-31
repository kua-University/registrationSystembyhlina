<?php  // PaymentIntegrationTest.php
use PHPUnit\Framework\TestCase;
use Stripe\Stripe;
use Stripe\Charge;

class PaymentIntegrationTest extends TestCase {
    public function testPaymentFlow() {
        // Simulate registration
        $_POST['email'] = 'paymentteacher@example.com';
        $_POST['teacher_name'] = 'Mark Taylor';
        $_POST['password'] = 'password789';
        include 'TeacherRegistration.php';

        // Simulate payment
        Stripe::setApiKey("your_stripe_test_key");
        $charge = Charge::create([
            'amount' => 5000,
            'currency' => 'usd',
            'source' => 'tok_visa',  // Use a test token
            'description' => 'Test Payment',
        ]);

        // Verify the payment status
        $this->assertEquals('succeeded', $charge->status);
    }
}
?>
