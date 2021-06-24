<?php

namespace App\Http\Controllers\Admins;

use App\Enums\ProductStatus;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProductCreateRequest;
use App\Http\Requests\ProductImportRequest;
use App\Http\Requests\ProductUpdateRequest;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ProductController extends Controller
{
    

    public function find($id){
        $product = Product::find($id);

        return $product;
    }

    
    public function setImages($request){        
        $img = $request->file('images');
        $getImg = $img->getClientOriginalName() . time();
        $destinationPath = public_path('images');
        $img->move($destinationPath, $getImg);

        return $getImg;
    }

    public function index(){
        $products = Product::with('category')->orderBy('created_at','desc')->paginate(30);

        return view('admin.products_view',compact('products'));
    }

    public function show(){

    }

    public function create(){    
        return view('admin.product_created');
    }

    

    public function store(ProductCreateRequest $request){          
        $getImg = '';
        if($request->has('images')) {
            $getImg = $this->setImages($request);
        }
        
        
        $params = $request->only(['name','describe','discount','category_id','price']);
        if ($getImg != null) {
            $params['url_img'] = $getImg;
        }
        
        $insert = Product::create($params);

        $data = $this->setDataProductCategory($request,$insert->id);
        $insert = ProductCategory::store($data,$insert);
        if(isset($insert)){
            return back()->with('success', __('lang.add-success'));
        }else{
            return back()->with('fail', __('lang.add-fail'));
        }
    }
    public function productImport(ProductImportRequest $request){
        $file = file($request->file->getRealPath());
        $data = array_slice($file, 1);

        $parts = (array_chunk($data, 50));

        foreach($parts as $index=>$part){
            $fileName = resource_path('file/'.date('y-m-d-H-i-s').$index.'.csv');
            
            file_put_contents($fileName, $part);
        }
        $import =(new Product())->productImport();

        return back()->with('success',__('lang.add-success'));
    }


    public function edit($id){
        $product =   $this->find($id);
        if(blank($product)){
            return back()->with('fail', __('lang.edit-fail'));
        }

        $categories = Category::get();
        $productCategory = ProductCategory::where('product_id',$id)->get();
        $salePrice = $product->price * ((100 - $product->discount)/100);
        $product->setAttribute('sale_price',$salePrice);
        $status = ['outofstock' => ProductStatus::OutOfStock, 'instock' => ProductStatus::InStock];
    
        return view('admin.product_edit',compact('categories','product','status','productCategory'));
    }


    public function update(ProductUpdateRequest $request, $id){
        $getImg = '';
        if($request->has('images')){
            $this->validate($request, [
                'images' => 'image:png|dimensions:min_width=150,min_height=200',
            ],[
                'images.image' => __('requestVali.images-pro'),
                'images.dimensions' => __('requestVali.images-dimensions'),
            ]);
            $deleteImg = DB::table('products')->select('url_img')->where('id',$id)->first();  
         
            if($deleteImg->url_img != null && file_exists(public_path('images/'.$deleteImg->url_img))){
                unlink(public_path(('images/'.$deleteImg->url_img)));  
            }        
            
            $getImg = $this->setImages($request);
        }  
        
        $product = $this->find($id);
        if(blank($product)){
            return back()->with('fail', __('lang.edit-fail'));
        }
        $params = $request->only(['name','describe','discount','category_id','price']);    
        if ($getImg != null) {
            $params['url_img'] = $getImg;
        }
        
        $update = $product->update($params);
        $data = $this->setDataProductCategory($request,$id);

        $update = ProductCategory::updateProductCategory($data,$id,$update);
        if($update){
            return back()->with('success', __('lang.edit-success'));
        }else{
            return back()->with('fail', __('lang.edit-fail'));
        }
    }

    
    public function destroy(Request $request,$id){
        $delete = Product::destroyProduct($id);
        $products =  Product::checkStatus($request->status);
        $products = Product::productSearch($request->name,$request->category_id,$products);
        if($delete){
            Session::put('success',__('lang.delete-success'));
        }else{
            Session::put('fail' , __('lang.delete-success'));
        }
        return view('admin.table.products',compact('products'));
    }

    public function filter(Request $request,$status){
        $products = Product::checkStatus($status);
        $products = Product::productSearch($request->name,$request->id,$products);
        return view('admin.table.products',compact('products'));
    }

    public function restore(Request $request,$id){
        $update = Product::restoreProduct($id);
        $products = Product::checkStatus($request->status);
        $products = Product::productSearch($request->name,$request->category_id,$products);
        if($update){
            Session::put('success' , __('lang.restore-success'));
        }else{
            Session::put('fail' , __('lang.restore-fail'));
        }
        return view('admin.table.products',compact('products'));
    }

    public function productCategory(Request $request){
        if($request->parent_id != null){
            $categories = Category::where('parent_id','=',$request->parent_id)->get();
            return view('admin.table.product_category',compact('categories'));
        }elseif($request->parent_id_2 != null){
            $categories = Category::where('parent_id','=',$request->parent_id_2)->get();
            return view('admin.table.product_category_2',compact('categories')); 
        }
    }

    public function setDataProductCategory($request, $id){
        $data = [ 0 => ['category_id' => $request->category_id,'product_id' => $id],
                1 => ['category_id' => $request->category_id_1,'product_id' => $id],
                2 => ['category_id' => $request->category_id_2,'product_id' => $id]];

        return $data;
    }
}
