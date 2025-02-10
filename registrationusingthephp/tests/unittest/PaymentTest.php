<?php
// PaymentTest.php
use PHPUnit\Framework\TestCase;
use Stripe\Stripe;
use Stripe\Charge;
require 'vendor/autoload.php';

class PaymentTest extends TestCase {
    public function testStripePayment() {
        Stripe::setApiKey("your_stripe_test_key");

        $charge = Charge::create([
            'amount' => 5000,  // Amount in cents
            'currency' => 'usd',
            'source' => 'tok_visa',  // Use test token
            'description' => 'Test payment',
        ]);

        $this->assertEquals('succeeded', $charge->status);
    }
}
?>