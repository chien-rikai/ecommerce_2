<?php

namespace Tests\Unit\Admins;

use App\Http\Controllers\Admins\CategoryController;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Mockery;
use Tests\TestCase;
class CategoryControllerTest extends TestCase
{
    private Mockery $mock;
    // public function setUp():void
    // {
    //     //$this->mock= Mockery::mock('CategoryController');

    // }
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_index(){
        $this->withoutMiddleware();
        $response = $this->get(route("category.index"));
        $response->assertViewIs('admin.category_view');
    }
    public function test_filter(){
        $this->withoutMiddleware();
        $response = $this->get(route("category.filter",['status'=>'trashed']));
        $data = $response->original['categories'];
        $this->assertFalse($data->contains('deleted_at',null));
    }
}
