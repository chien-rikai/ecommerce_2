<?php

use App\Enums\ProductStatus;

return [
    ProductStatus::class => [
        ProductStatus::OutOfStock => 'Hết hàng',
        ProductStatus::InStock => 'Còn hàng',
    ],
]

?>