<?php
namespace Test;

require_once '../vendor/autoload.php';
require_once '../examples/create_wallet.php';

use PHPUnit\Framework\TestCase;
use examples\IntaSendPHP\Wallet;

class CreateWalletTest extends TestCase {
    
    private $wallet;
    
    protected function setUp(): void {
        $this->wallet = new Wallet();
        $this->wallet->init([
            'publishable_key' => 'ADD-YOUR-KEY-FROM-SANDBOX.INTASEND.COM',
            'token' => 'ADD-YOUR-SECRET-KEY-FROM-SANDBOX.INTASEND.COM'
        ]);
    }

    public function testCreate() {
        $currency = "KES";
        $label = "WALLET-2";
        $response = $this->wallet->create($currency, $label);

        $this->assertIsArray($response);
        $this->assertArrayHasKey('wallet_id', $response);
        $this->assertArrayHasKey('label', $response);
        $this->assertEquals($label, $response['label']);
        $this->assertEquals($currency, $response['currency']);
    }
}