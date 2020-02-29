<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Wenzhang;
use App\Http\Requests\StoreWenzhangPost;

class WenzhangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $w_name = request()->w_name??'';
        $where = [];
        if($w_name){
            $where[] = ['w_name','like',"%$w_name%"];
        }
        $pageSize = config('app.pageSize');
        $data = Wenzhang::where($where)->orderby('w_id','desc')->paginate($pageSize);
        //dd($data);
         return view('wenzhang/index',['data'=>$data,'w_name'=>$w_name]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    //添加
    public function create()
    {
        return view('wenzhang/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    //执行添加
    public function store(StoreWenzhangPost $request)
    {
        $data = $request->except('_token');
        //dd($data);
        if($request->hasFile('w_wenjian')){
            $data['w_wenjian'] = $this->upload('w_wenjian');
        }
        $res = Wenzhang::create($data);
        //dd($res);
        if($res){
            return redirect('/wenzhang');
        }
    }


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

    public function checkOnly(){
        $w_name = request()->w_name;
        $count = Wenzhang::where(['w_name'=>$w_name])->count();
        echo json_encode(['code'=>'000000','msg'=>'ok','count'=>$count]);
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
        $user = Wenzhang::find($id);
        //dd($user);
        return view('wenzhang/edit',['user'=>$user]);
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
        //dd($user);
        if($request->hasFile('w_wenjian')){
            $user['w_wenjian'] = $this->upload('w_wenjian');
        }
        $res = Wenzhang::where('w_id',$id)->update($user);
        //dd($res);
        if($res!==false){
            return redirect('/wenzhang');
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
        $res = Wenzhang::destroy($id);
        if($res){
        return redirect('/wenzhang');
    }
}
}
