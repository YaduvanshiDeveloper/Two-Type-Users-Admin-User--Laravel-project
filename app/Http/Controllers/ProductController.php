<?php

namespace App\Http\Controllers;
use Validator;
use log;
use Crypt;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function createProduct(){
        return view('admin.Product');
    }
    public function manageProduct(){
        $Product = Product::orderBy('id','DESC')->get();
        return view('admin.ManageProduct',compact('Product'));
    }

    public function SaveProduct(Request $req){
        $validated = Validator::make($req->all(),[
            'name'=>'required',
            'price'=>'required',
            'description'=>'required',
            'image'=>"required|image|max:8048",
           
        ]);
        if($validated->fails())
        {  
            
            return redirect()->back()->withErrors($validated);
        }
        
        $Product = new Product;
        $Product->name = $req->name;
        $Product->price = $req->price;
        $Product->description = $req->description;

       
       
        if($req->has('image')){
            $file_name  = time().mt_rand(0000,9999).'.'.$req->image->extension();
            $req->image->move(public_path('Product_image'),$file_name);
            $Product->image = $file_name;
        }
        $Product->save(); 
        if($Product)
        {
             return redirect('manage/Product',)->with('success','Product Addedd Successfully');
           
        }else{
             return redirect()->back()->with('error','Product Not Addedd Successfully');
        }
    }
    
    public function EditProduct($id)
    {
        $data = Product::findorfail(Crypt::decrypt($id));
            if($data)
            {
                return  view('admin.editProduct',compact('data'));
            }else{
                return redirect('manage/Product')->with('error','Failed to Find data');
            }
           
    }

    public function updateProduct(Request $request)
    {
        $validated = Validator::make($request->all(),[
            'name'=>'required',
            'price'=>'required',
            'description'=>'required',
            'image'=>"required|image|max:8048",
  
        ]);
        if($validated->fails())
        {
  
            return redirect()->back()->withErrors($validated)->withInput();
        }
        
        $id = \Crypt::decrypt($request->token);
        $Product =  Product::where('id',$id)->first();
  
        $Product->name = $request->name;
        $Product->price = $request->price;
        $Product->description = $request->description;
    
        if($request->has('image'))
        {
            $file_name = time().'_'.mt_rand(0000,9999).$request->image->extension();
            $request->image->move(public_path('Product_image'),$file_name);
            $Product->image = $file_name;
        }
        $Product->save();
        if($Product){
            return redirect('manage/Product')->with('success','Product Updated SuccessFully');
        }else{
            return redirect()->back()->with('error','Something Went Wrong');
        }
  
    }
    public function createUSerProduct(){
        return view('user.UserProduct'); 
    }

    public function SaveUSerProduct(Request $req){
        $validated = Validator::make($req->all(),[
            'name'=>'required',
            'price'=>'required',
            'description'=>'required',
            'image'=>"required|image|max:8048",
           
        ]);
        if($validated->fails())
        {  
            
            return redirect()->back()->withErrors($validated);
        }
        
        $Product = new Product;
        $Product->name = $req->name;
        $Product->price = $req->price;
        $Product->description = $req->description;
        $Product->status = '2';
       
       
        if($req->has('image')){
            $file_name  = time().mt_rand(0000,9999).'.'.$req->image->extension();
            $req->image->move(public_path('Product_image'),$file_name);
            $Product->image = $file_name;
        }
        $Product->save(); 
        if($Product)
        {
             return redirect('manage/UserProduct',)->with('success','Product Addedd Successfully');
           
        }else{
             return redirect()->back()->with('error','Product Not Addedd Successfully');
        }
    }

    public function manageUserProduct(){
        $Product = Product::orderBy('id','DESC')->get();
        return view('user.UserManageProduct',compact('Product'));
    }
}
