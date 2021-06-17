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
    public function test_view_has_category()
    {   
        $categories = Category::factory()->make([
            'id'=>1,
            'name' => 'laptop',
        ]);
        $categories = array($categories);
        $view = $this->view('admin.category_view',['categories'=>$categories]);
        $view->assertSee('laptop');
    }
}
