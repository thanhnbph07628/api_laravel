<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Category;
use App\Products;
use DB;

class BaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function ProductsNew()
    {
       return DB::table('products')->orderBy('created_at','desc')->get();
    }

    public function ProductsHighlight()
    {
       return DB::table('products')->orderBy('views','desc')->get();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function Shop()
    {
        return DB::table('products')->get();
    }

    public function Detail_Product($id)
    {
        return DB::table('products')
        ->where('id',$id)
        ->get();
    }

    public function List_ProductCate($id)
    {
        $list_products = DB::table('category')
        ->leftjoin('products', 'category.id', '=', 'products.iddm')
        ->where('iddm','=',$id)
        ->get();
        return $list_products;
    }

    public function List_NewsCate($id)
    {
        $list_news = DB::table('catenews')
        ->leftjoin('news', 'catenews.id', '=', 'news.iddm')
        ->where('iddm','=',$id)
        ->get();
        return $list_news;
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
