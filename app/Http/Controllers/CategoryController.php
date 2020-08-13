<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Category;
use App\Products;
use DB;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Category::orderBy('id', 'desc')->get();      
        foreach ($data as $value) {
            $value->slsp =$value->total_products;
        }
        return $data;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(CategoryRequest $CategoryRequest)
    {
        $data = $CategoryRequest->all();
        DB::table('category')->insert($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return DB::table('category')
        ->where('id',$id)
        ->get();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryRequest $CategoryRequest, $id)
    {
        $data = $CategoryRequest->all();
        DB::table('category')
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
        Products::where('iddm', $id)->update(['iddm' => '0']);
        $delete = DB::table('category')->delete($id);
        if($delete){
            return ['success' => 'xoa thanh cong'];
        }else{
            return ['success' => ' khong xoa duoc'];
        }
    }

}
