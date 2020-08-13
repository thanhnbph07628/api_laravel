<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\News;
use DB;
use Illuminate\Support\Facades\Session;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return DB::table('news')
        // ->join('catenews', 'catenews.id', '=', 'news.iddm')
        // ->select('news.*', 'catenews.name  as ten_danh_muc')
        // ->get();

        $resurt = News::all();
        foreach ($resurt as $value) {
            if($value->iddm == 0){
                $value->tendm ='Chưa có danh mục';
            }
            else{
                    $value->tendm =$value->catenews->name;
                }
            
        }    
        return $resurt;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $data = $request->all();
        DB::table('news')->insert($data);
        DB::table('catenews')->get();
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
        $newskey = 'news_'.$id;
        
        if(!Session::has($newskey)){
            DB::table('news')->where('id',$id)->increment('views');
            Session::put($newskey,1);
        }
        return DB::table('news')->where('id',$id)->get();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return DB::table('news')
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
    public function update(Request $request, $id)
    {
        $data = $request->all();
        DB::table('news')
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
        $delete = DB::table('news')->delete($id);
        if($delete){
            return ['success' => 'xoa thanh cong'];
        }else{
            return ['success' => ' khong xoa duoc'];
        }
    }
}
