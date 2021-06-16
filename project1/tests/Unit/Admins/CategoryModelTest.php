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
    public function test_store_new_category(){
        $params= ['name'=>'computer'];
        $category = Category::store($params);
        $this->assertInstanceOf(Category::class,$category);
        $this->assertEquals($params['name'], $category->name);
    }
    public function test_update(){
        $category = $this->store('mobile_phone');
        $data = ['id'=>$category->id,'category'=>'mobilephone'];
        $update= Category::updateCategory(new CategoryRequest($data));
        $this->assertTrue($update);
        $category = Category::find($category->id);
        $this->assertEquals($data['category'],$category->name);
    }
    public function test_destroy(){
        $category= $this->store('phones');
        $delete = Category::destroy($category->id);
        $this->assertTrue($delete);
        $category = Category::find($category->id);
        $this->assertNull($category);    
    }
    //test store
    public function store($name){
        $params= ['name'=>$name];
        $category = Category::store($params);
        return $category;
    }
}
