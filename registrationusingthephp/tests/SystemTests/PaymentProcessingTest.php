<?php
use PHPUnit\Framework\TestCase;
use Stripe\Stripe;
use Stripe\Charge;
require 'vendor/autoload.php';

class PaymentProcessingTest extends TestCase {
    public function testPaymentProcessing() {
        Stripe::setApiKey("your_stripe_test_key");

        $charge = Charge::create([
            'amount' => 5000,
            'currency' => 'usd',
            'source' => 'tok_visa',
            'description' => 'Course Payment',
        ]);

        $this->assertEquals('succeeded', $charge->status);
    }
}
?>
