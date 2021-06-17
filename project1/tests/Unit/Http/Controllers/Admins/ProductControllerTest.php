<?php

namespace Tests\Unit\Http\Controllers\Admins;

use App\Http\Controllers\Admins\ProductController;
use App\Http\Requests\ProductCreateRequest;
use App\Http\Requests\ProductImportRequest;
use App\Http\Requests\ProductUpdateRequest;
use App\Models\Product;
use Tests\TestCase;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\ParameterBag;

class ProductControllerTest extends TestCase
{
    private $controller;
    private $params = [
        'name' => 'iphone',
        'describe' => 'nice',
        'url_img' => 'iphone.png',
        'price' => '1000000',
        'discount' => 10,
        'category_id' => 1,
    ];

    public function setUp(): void{
        parent::setUp();

        $this->controller = new ProductController;
    }

    public function test_index_has_product(){
        $products = Product::factory()->make($this->params);
        $products = Product::paginate(30);

        $view = $this->view('admin.products_view',compact('products'));
        $view->assertSee($products);
    }

    public function test_create_has_product(){
        $this->assertEquals('admin.product_created', $this->controller->create()->getName());
    }
  
    public function test_store_product(){
        $request = new ProductCreateRequest();
        $request->headers->set('content-type', 'application/json');
        $request->setJson(new ParameterBag($this->params));

        $response = $this->controller->store($request);

        $this->assertInstanceOf(RedirectResponse::class, $response);
        $this->assertEquals(config('app.url'), $response->headers->get('Location'));
    }

    public function test_update_product(){
        $id = 1;
        $request = new ProductUpdateRequest();
        $request->headers->set('content-type', 'application/json');
        $request->setJson(new ParameterBag($this->params));

        $response = $this->controller->update($request,$id);

        $this->assertInstanceOf(RedirectResponse::class, $response);
        $this->assertEquals(config('app.url'), $response->headers->get('Location'));
    }

    public function test_destroy_product(){
        $product = Product::create($this->params);
        $request = new Request();
        $this->assertEquals('admin.table.products', $this->controller->destroy($request,$product->id)->getName());
    }

    public function test_filter(){
        $this->withoutMiddleware();
        $response = $this->get(route("product.filter",['status'=>'trashed']));
        $data = $response->original['products'];
        $this->assertFalse($data->contains('deleted_at',null));
    }
}
