<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Validator;
use log;
use Crypt;
use App\Models\Category;



class CategoryController extends Controller
{
    public function createCategory(){
        return view('admin.Category');
    }
    public function manageCategory(){
        $Category = Category::orderBy('id','DESC')->get();
        return view('admin.ManageCategory',compact('Category'));
    }

    public function SaveCategory(Request $req){
        $validated = Validator::make($req->all(),[
            'name'=>'required',
           
            'image'=>"required|image|max:8048",
           
        ]);
        if($validated->fails())
        {  
            
            return redirect()->back()->withErrors($validated);
        }
       
        $Category = new Category;
        $Category->name = $req->name;
       
       
        if($req->has('image')){
            $file_name  = time().mt_rand(0000,9999).'.'.$req->image->extension();
            $req->image->move(public_path('Category_image'),$file_name);
            $Category->image = $file_name;
        }
        $Category->save(); 
        if($Category)
        {
             return redirect('manage/Category',)->with('success','Category Addedd Successfully');
           
        }else{
             return redirect()->back()->with('error','Category Not Addedd Successfully');
        }
   
    }
    
    public function EditCategory($id)
    {
        $data = Category::findorfail(Crypt::decrypt($id));
            if($data)
            {
                return  view('admin.editCategory',compact('data'));
            }else{
                return redirect('manage/Category')->with('error','Failed to Find data');
            }
           
    }

    public function updateCategory(Request $request)
    {
        $validated = Validator::make($request->all(),[
            'name'=>'required',
  
        ]);
        if($validated->fails())
        {
  
            return redirect()->back()->withErrors($validated)->withInput();
        }
        
        $id = \Crypt::decrypt($request->token);
        $Category =  Category::where('id',$id)->first();
  
        $Category->name = $request->name;
    
        if($request->has('image'))
        {
            $file_name = time().'_'.mt_rand(0000,9999).$request->image->extension();
            $request->image->move(public_path('Category_image'),$file_name);
            $Category->image = $file_name;
        }
        $Category->save();
        if($Category){
            return redirect('manage/Category')->with('success','Category Updated SuccessFully');
        }else{
            return redirect()->back()->with('error','Something Went Wrong');
        }
  
    }

    public function deletCategory(Request $request){
        try{
    
            $id = Crypt::decrypt($request->id);
            $data = Category::where('id',$id)->delete() ;
            if($data){
                echo 'true';
            }else{
                echo 'false';
            }
        }catch(\Exception $e){
    
            Log::info($e->getMassage());
            echo 'false';
        }
    }
    //User Work Start--->
    public function createUserCategory(){
        return view('user.userCategory');

    }
    public function SaveUserCategory(Request $req){
        $validated = Validator::make($req->all(),[
            'name'=>'required',
           
            'image'=>"required|image|max:8048",
           
        ]);
        if($validated->fails())
        {  
            
            return redirect()->back()->withErrors($validated);
        }
       
        $Category = new Category;
        $Category->name = $req->name;
        $Category->status = '2';

        if($req->has('image')){
            $file_name  = time().mt_rand(0000,9999).'.'.$req->image->extension();
            $req->image->move(public_path('Category_image'),$file_name);
            $Category->image = $file_name;
        }
        $Category->save(); 
        if($Category)
        {
             return redirect('manage/UserCategory',)->with('success','Category Addedd Successfully');
           
        }else{
             return redirect()->back()->with('error','Category Not Addedd Successfully');
        }
   
    }
    public function manageUserCategory(Request $request){
        $Category = Category::orderBy('id')->get();
      //  $Category = Category::where('status')->get();
        return view('user.UserManageCategory',compact('Category'));
        
    }
}
