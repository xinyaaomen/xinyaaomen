<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests\StoreStudentPost;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $s_name = request()->s_name??'';
        $s_class = request()->s_class??'';
        $where = [];
        if($s_name){
            $where[] = ['s_name','like',"%$s_name%"];
        }
        if($s_class){
            $where[] = ['s_class','like',"%$s_class%"];
        }
        $pageSize = config('app.pageSize');
        $data = DB::table('student')->where($where)->orderby('s_id','desc')->paginate($pageSize);
        return view('student/index',['data'=>$data],['s_name'=>$s_name,'s_class'=>$s_class]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('student/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreStudentPost $request)
    {
        $data = $request->except('_token');
        //文件上传
        if($request->hasFile('s_img')){
            $data['s_img'] = $this->upload('s_img');
        }
       $res = DB::table('student')->insert($data);
       //dd($res);
       if($res){
        return redirect('/student');
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
       $data =  DB::table('student')->where('s_id',$id)->first();
        return view('student/edit',['data'=>$data]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreStudentPost $request, $id)
    {
        $user = $request->except('_token');
         //文件上传
        if($request->hasFile('s_img')){
            $user['s_img'] = $this->upload('s_img');
        }
        $res = DB::table('student')->where('s_id',$id)->update($user);
        if($res!==false){
             return redirect('/student');
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

        $res = DB::table('student')->where('s_id',$id)->delete();
        if($res){
            return redirect('/student');
        }
    }
}
