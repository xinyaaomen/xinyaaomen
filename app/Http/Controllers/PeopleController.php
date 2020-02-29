<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use DB;
use App\People;
use App\Http\Requests\StorePeoplePost;
use Validator;
class PeopleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    //列表页展示
    public function index()
    {
        $username = request()->username??'';
        $where = [];
        if($username){
            $where[] = ['username','like',"%$username%"];
        }
        //echo $username;
        //$data = DB::table('people')->get();
        //dd($data);
        $pageSize = config('app.pageSize');
        $data = People::where($where)->orderby('p_id','desc')->paginate($pageSize);
        //$data = People::get();99%兼容DB;
        //dd($data);
     return view('people/index',['data'=>$data,'username'=>$username]);  
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    //添加页面
    public function create()
    {
         return view('people/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    //执行添加的方法
    //第二种验证StorePeoplePost
    public function store(StorePeoplePost $request)
    {
        //第一种验证
        // $request->validate([
        //     'username' => 'required|unique:people|max:12|min:2',
        //     'age' => 'required|integer|between:1,130',
        //     'username.required'=>'名字不能为空',
        //     'username.unique'=>'名字已存在',
        //     'username.max'=>'名字长度不超过12位',
        //     'username.min'=>'名字长度不少于2位',
        //     'age.required'=>'年龄不能为空',
        //     'age.integer'=>'年龄必须位数字',
        //     'age.between'=>'年龄数据不合法',
        // ]);

       $data = $request->except('_token');
        //dd($data);
        
        //第三种验证
        // $validator = Validator::make($data,
        //     [
        //       'username' => 'required|unique:people|max:12|min:2',
        //       'age' => 'required|integer|between:1,130',
        //     ],[
        //     'username.required'=>'名字不能为空',
        //     'username.unique'=>'名字已存在',
        //     'username.max'=>'名字长度不超过12位',
        //     'username.min'=>'名字长度不少于2位',
        //     'age.required'=>'年龄不能为空',
        //     'age.integer'=>'年龄必须位数字',
        //     'age.between'=>'年龄数据不合法',
        // ]);
        //dd($validator->fails());
        // if($validator->fails()){
        //     return redirect('people/create')
        //     ->withErrors($validator)
        //     ->withInput();
        // }


        //文件上传
        if($request->hasFile('head')){
            $data['head'] = $this->upload('head');
        }
        //
        $data['add_time'] = time();
        //DB
        //$res = DB::table('people')->insert($data);
        //ORM save操作
        // $people = new People;
        // $people->username = $data['username'];
        // $people->age = $data['age'];
        // $people->card = $data['card'];
        // $people->head = $data['head'];
        // $people->add_time = $data['add_time'];
        // $res = $people->save();
        // ORM create操作
        $res = People::create($data);//也可以用insert进行添加;
        //dd($res);
        if($res){
            return redirect('/people');
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
    //预览详情页
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
    //修改页面
    public function edit($id)
    {
        //DB操作
        //$user = DB::table('people')->where('p_id',$id)->first();
        //ORM操作
        $user = People::find($id);
        return view('people/edit',['user'=>$user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //修改执行页面
    public function update(Request $request, $id)
    {
        $user = $request->except('_token');
        // dd($user);
        if($request->hasFile('head')){
            $user['head'] = $this->upload('head');
        }
        //DB操作
        //$res = DB::table('people')->where('p_id',$id)->update($user);
        //ORM操作
        // $people = People::find($id);
        // $people->username = $user['username'];
        // $people->age = $user['age'];
        // $people->card = $user['card'];
        // $people->head = $user['head']??''; 
        // $res = $people->save();
        $res = People::where('p_id',$id)->update($user);
        if($res!==false){
            return redirect('/people');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //删除页面
    public function destroy($id)
    {
        //DB操作
       //$res = DB::table('people')->where('p_id',$id)->delete();
       //ORM操作
       $res = People::destroy($id);
       if($res){
        return redirect('/people');
       }
    }
}
