<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Jiafang;
use Illuminate\Support\Facades\Cache;
class JiafangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $j_name = request()->j_name??'';
        $where = [];

        if($j_name){
            $where[] = ['j_name','like',"%$j_name%"];
        }
        Cache::forget('jiafang');
        $data = Cache::get('jiafang');
        //dump($data);
        if(!$data){
            //echo "走DB==";
            $pageSize = config('app.pageSize');
        $data = Jiafang::where($where)->orderby('j_id','desc')->paginate($pageSize);
       Cache::put('jiafang',$data,60*60*24*30);
        }
            
        return view('/jiafang/index',['data'=>$data,'j_name'=>$j_name]);
        
        //dd($data);
        
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('/jiafang/create');
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
        if($request->hasFile('j_img')){
        $data['j_img'] = $this->upload('j_img');
        }
        $res = Jiafang::insert($data);
        if($res){
            return redirect('/jiafang/index');
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
        $user = Jiafang::find($id);
        return view('/jiafang/edit',['user'=>$user]);
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
        $res = Jiafang::where('j_id',$id)->update($user);
        //dd($res);
        if($request->hasFile('j_img')){
        $data['j_img'] = $this->upload('j_img');
        }
        if($res!==false){
            return redirect('/jiafang/index');
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
        $res = Jiafang::destroy($id);
        //dd($res);
       if($res){
        return redirect('/jiafang/index');
       }
    }
}
