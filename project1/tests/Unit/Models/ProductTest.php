<?php

namespace Tests\Unit\Models;

use App\Models\Product;
use Tests\TestCase;

class ProductTest extends TestCase
{
    private $params = [
        'name' => 'iphone',
        'describe' => 'nice',
        'url_img' => 'iphone.png',
        'price' => '1000000',
        'discount' => 10,
        'category_id' => 1,
    ];

    public function test_destroy_product()
    {
        $product = Product::create($this->params);
        $delete = Product::destroyProduct($product->id);
        $this->assertTrue($delete);
        $delete = Product::destroyProduct($product->id);
        $this->assertTrue($delete);
        $product = Product::find($product->id);
        $this->assertNull($product);    
    }

    public function test_restore_product(){
        $product = Product::create($this->params);
        Product::destroyProduct($product->id);
        $restore = Product::restoreProduct($product->id);
        $this->assertTrue($restore);
        $product = Product::find($product->id);
        $this->assertNotNull($product); 
    }

    public function test_check_status(){
        $status = 'trashed';
        $check = Product::checkStatus($status);
        $this->assertNotNull($check); 
    }
}
