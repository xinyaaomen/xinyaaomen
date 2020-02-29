<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Goods;
class GoodsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $g_name = request()->g_name??'';
        $where = [];
        if($g_name){
            $where[] = ['g_name','like',"%$g_name%"];
        }
        $pageSize = config('app.pageSize');
        $data = Goods::where($where)->orderby('g_id','desc')->paginate($pageSize);
        //dd($data);
        return view('goods/index',['data'=>$data,'g_name'=>$g_name]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('goods/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->except('_token');
        //dd($data);
        if($request->hasFile('g_img')){
            $data['g_img'] = $this->upload('g_img');
        }
        $res = Goods::insert($data);
        if($res){
            return redirect('/goods/index');
        }
    }


    //上传文件
    public function upload($filename){
        //判断上传当中是否有错
        if(request()->file($filename)->isValid()){
            //接收值
            $photo = request()->file($filename);
            //dd($photo);
            //上传
            $store_result = $photo->store('uploads');
            return $store_result;
        }
        exit('未获取到上传文件获上传过程出错');
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
        $user = Goods::find($id);
        return view('goods/edit',['user'=>$user,]);
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
        $user = $request->except('_token');
        $res = Goods::where('g_id',$id)->update($user);
        //dd($res);
        if($request->hasFile('g_img')){
        $data['g_img'] = $this->upload('g_img');
        }
        if($res!==false){
            return redirect('/goods/index');
        }
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
