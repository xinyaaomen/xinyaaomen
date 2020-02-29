<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Brand;
use App\Http\Requests\StoreBrandPost;
class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $b_name = request()->b_name??'';
        $where = [];
        if($b_name){
            $where[] = ['b_name','like',"%$b_name%"];
        }
        $pageSize = config('app.pageSize');
        $data = Brand::where($where)->orderby('b_id','desc')->paginate($pageSize);
        //dd($data);
        return view('brand/index',['data'=>$data],['b_name'=>$b_name]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('brand/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBrandPost $request)
    {
        $data = $request->except('_token');
        //文件上传
        if($request->hasFile('b_img')){
            $data['b_img'] = $this->upload('b_img');
        }
        $res = Brand::create($data);
        //dd($res);
        if($res){
            return redirect('brand');
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
        $res = Brand::find($id);
        return view('brand/edit',['res'=>$res]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreBrandPost $request, $id)
    {
        $user = $request->except('_token');
        //文件上传
        if($request->hasFile('b_img')){
            $user['b_img'] = $this->upload('b_img');
        }
        $res = Brand::where('b_id',$id)->update($user);
        //dd($res);
        if($res!==false){
            return redirect('/brand');
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
        $res = Brand::destroy($id);
        if($res){
            return redirect('/brand');
        }
    }
}
