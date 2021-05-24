<?php

use App\Enums\ProductStatus;

return [
    ProductStatus::class => [
        ProductStatus::OutOfStock => 'Out of stock',
        ProductStatus::InStock => 'In stock',
    ],
]

?>