<?php

namespace App\Http\Controllers\Index;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

use AlibabaCloud\Client\AlibabaCloud;
use AlibabaCloud\Client\Exception\ClientException;
use AlibabaCloud\Client\Exception\ServerException;
class IndexController extends Controller
{
	public function setCookie(){

		return response('测试生产cookie')->cookie('name','方环敏',2);
	}
	//前台首页
    public function index(){
    	echo request()->cookie('name');
    	return view('index.index');
    }


    public function ajaxsend(){
    	$moblie = '17732715360';
    	$code = rand(1000,9999);
    	$res = $this->sendSms($moblie,$code);
    	//dd($res);
    	if($res['Code']=='OK'){
    		session(['code'=>$code]);
    		request()->session()->save();
    		echo "发送成功";
    	}
    }

    public function sendSms($moblie,$code){
		AlibabaCloud::accessKeyClient('LTAI4FscAVBjX5rqFomTyCvJ', 'BbO6mJFFRUc38pPE1PHPyEWRvd5ueD')
		                        ->regionId('cn-hangzhou')
		                        ->asDefaultClient();

		try {
		    $result = AlibabaCloud::rpc()
		                          ->product('Dysmsapi')
		                          // ->scheme('https') // https | http
		                          ->version('2017-05-25')
		                          ->action('SendSms')
		                          ->method('POST')
		                          ->host('dysmsapi.aliyuncs.com')
		                          ->options([
		                                        'query' => [
		                                          'RegionId' => "cn-hangzhou",
		                                          'PhoneNumbers' => $moblie,
		                                          'SignName' => "卑微小门",
		                                          'TemplateCode' => "SMS_180952006",
		                                          'TemplateParam' => "{code:$code}",
		                                        ],
		                                    ])
		                          ->request();
		    return $result->toArray();
		} catch (ClientException $e) {
		    return $e->getErrorMessage();
		} catch (ServerException $e) {
		    return $e->getErrorMessage();
		}

    }
    //详情页面
    public function proinfo(){
    	return view('/index/proinfo');
    }
    //商品展示列表页
    public function prolist(){
    	return view('/index/prolist');
    }
}
