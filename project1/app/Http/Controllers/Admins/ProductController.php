<?php

namespace App\Http\Controllers\Admins;

use App\Enums\ProductStatus;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProductCreateRequest;
use App\Http\Requests\ProductImportRequest;
use App\Http\Requests\ProductUpdateRequest;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\DB;

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
        return view('admin.products_view');
    }

    public function getProductData(){
        $products = Product::with('category')->get();

        return json_encode(array('data'=>$products));
    }

    public function show(){

    }

    public function create(){
        $categories = Category::get();
        
        return view('admin.product_created',['categories' => $categories]);
    }

    

    public function store(ProductCreateRequest $request){          
        $getImg = '';
        if($request->has('images')) {
            $getImg = $this->setImages($request);
        }
        
        
        $params = $request->except(['_token','_method','images']);
        if ($getImg != null) {
            $params['url_img'] = $getImg;
        }

        $insert = Product::create($params);

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
        $salePrice = $product->price * ((100 - $product->discount)/100);
        $product->setAttribute('sale_price',$salePrice);
        $status = ['outofstock' => ProductStatus::OutOfStock, 'instock' => ProductStatus::InStock];
    
        return view('admin.product_edit',compact('categories','product','status'));
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
        $params = $request->except(['_token','_method','images']);    
        if ($getImg != null) {
            $params['url_img'] = $getImg;
        }
        
        $update = $product->update($params);
        if($update){
            return back()->with('success', __('lang.edit-success'));
        }else{
            return back()->with('fail', __('lang.edit-fail'));
        }
    }

    
    public function destroy($id){
        $product = $this->find($id);
        if(blank($product)){
            return back()->with('fail' , __('lang.delete-fail'));
        }

        $urlImg = $product->url_img;
        $delete = $product->delete();
        if($delete){
            unlink(public_path(('images/'.$urlImg))); 
            return response()->json(['success' => __('lang.delete-success'),'hasDelete' => $delete]);
        }else{
            return response()->json(['fail' => __('lang.delete-fail'), 'hasDelete' => $delete]);
        }
    }
}
