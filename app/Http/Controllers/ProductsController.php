<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Products;
use DB;
use Illuminate\Support\Facades\Session;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return 1;
        // return DB::table('products')
        // ->join('category', 'category.id', '=', 'products.iddm')
        // ->select('products.*', 'category.name  as ten_danh_muc')
        // ->get();
        $pardam =  request()->all();
        $query_pardam=[];
        $query_pardam['key'] = ($pardam['key']!='')?$pardam['key']:null;
        

        $queryBulder = Products::query(); 
        if (isset($query_pardam['key']) && $query_pardam['key'] != null) {
            $queryBulder->where('name', 'like', '%'.$query_pardam['key'].'%');
        }    
        $resurt = $queryBulder->get();
        foreach ($resurt as $value) {
            if($value->iddm == 0){
                $value->tendm ='Chưa có danh mục';
            }
            else{
                    $value->tendm =$value->category->name;
                }
            
        }    
        return $resurt;
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(ProductRequest $ProductRequest)
    {
        $data = $ProductRequest->all();
        DB::table('products')->insert($data);
        DB::table('category')->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\ProductRequest  $ProductRequest
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $ProductRequest)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $productkey = 'products_'.$id; 
        if(!Session::has($productkey)){
            DB::table('products')->where('id',$id)->increment('views');
            Session::put($productkey,1);
        }
        return DB::table('products')->where('id',$id)->get();
    }

    public function Products_Involve($id)
    {
        // $list_productscate = DB::table('category')
        // ->leftjoin('products', 'category.id', '=', 'products.iddm')
        // ->where('products.iddm','=',$id)
        // ->get();
        // return $list_productscate;
        return DB::table('products')->orderBy('views','desc')->get();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return DB::table('products')
        ->where('id',$id)
        ->get();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\ProductRequest  $ProductRequest
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $ProductRequest, $id)
    {
        $data = $ProductRequest->all();
         DB::table('products')
        ->where('id', $id)
        ->update($data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {   
        $delete = DB::table('products')->delete($id);
        if($delete){
            return ['success' => 'xoa thanh cong'];
        }else{
            return ['success' => ' khong xoa duoc'];
        }
    }
}
