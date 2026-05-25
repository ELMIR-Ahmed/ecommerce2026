<?php

namespace App\Service\Cart;

use App\Entity\Cart;
use Symfony\Component\DependencyInjection\Attribute\Autowire;

class CartHandler
{
    public function __construct(
        #[Autowire(service: SessionCart::class)]
        private readonly CartInterface $strategy
    ) {}

    public function handle(Cart $cart)
    {
        
    }

}
