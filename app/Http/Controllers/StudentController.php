<?php
/**
 * Created by PhpStorm.
 * User: Anonymou_Chen
 * Date: 2017/3/3
 * Time: 23:14
 */
namespace  App\Http\Controllers;

use App\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class  StudentController extends  Controller{

    public  function  test1(){
        //return 'test1'; DB façade
        $students = DB::select('select * from student');
        var_dump($students);

        $students = DB::select('select * from student where id >? ',[1002]);
        var_dump($students);
//插入数据
//        $bool = DB::insert('insert into student(name,age) value(?,?)',['mooc',18]);
//        var_dump($bool);
        $num = DB::update('update student set age = ? where name = ?',[20,'mooc']);
        var_dump($num);

        $num1 = DB::delete('delete from student where id > ?',[1002]);
        var_dump($num1);
    }

    public function query1(){
        //查询构造器
        //插入数组
//        $bool = DB::table('student')->insert(
//            ['name'=>'imooc','age'=>18]
//        );
//        var_dump($bool);
        //插入数组并得到id
//        $id = DB::table('student')->insertGetid(
//            ['name'=>'imooc1','age'=>18]
//        );
//        var_dump($id);
        //插入多个数据
        $bool = DB::table('student')->insert([
            ['name'=>'imooc2','age'=>18],
            ['name'=>'imooc3','age'=>18]
        ]);
        var_dump($bool);

    }

    public function query2(){
//        $num = DB::table('student')
//            ->where('id',1002)
//            ->update(['age'=> 30]);
//        var_dump($num);

        //自增1
        $num = DB::table('student')
            ->increment('age');
        var_dump($num);
        //自减2 带条件 改数据
        $num = DB::table('student')
            ->where('id',1005)
            ->decrement('age',2,['name'=>'namec']);
        var_dump($num);
    }

    public function query3(){
        //删除
        $num = DB::table('student')
            ->where('id',1004)
            ->delete();

        $num = DB::table('student')
            ->where('id','>=',1004)
            ->delete();

    }

    public function query4(){
        //获取数据
        //get()获取所有表的数据
        //$stu = DB::table('student')->get();

        //first()取结果集的第一条 ，orderby排序
//        $stu = DB::table('student')
//            ->orderBy('id','desc')
//            ->first();

        //where() get符合条件的
//        $stu = DB::table('student')
//            ->where('id','>=','1002')
//            ->get();

        //where() 多条件条件的
//        $stu = DB::table('student')
//            ->whereRaw ('id>=? and age>=?',['1002',19])
//            ->get();

        //pluck() 返回结果集的字段
//        $stu = DB::table('student')
//            ->whereRaw ('id>=? and age>=?',['1002',19])
//            ->pluck('name');
//        dd($stu);



        //select() 返回结果集的指定字段
//        $stu = DB::table('student')
//            ->whereRaw ('id>=? and age>=?',['1002',19])
//            ->select('name','id')
//            ->get();
//        dd($stu);

        //chunk 分段获取
        DB::table('student')
            ->chunk(2,function($stu){
                var_dump($stu);
        });

    }

    //聚合函数
    public function query5(){

        //count() 符合条件的数据数量
        $num = DB::table('student')->count();
        var_dump($num);

        //max() min() avg() sum()
    }

    //orm 模型
    public function orm1(){
        //all 查询表的所有记录
//        $stus = Student::all();
//        dd($stus);

        //find 一条
        $stu = Student::find(1001);
        var_dump($stu);

        //findOrFail 找不到就报错；
        $stu = Student::findOrFail(1001);
        var_dump($stu);

        //在orm中也能使用查询构造器

    }

    public function orm2()
    {
        //使用模型新增数据
//        $stu = new Student();
//        $stu->name = 'name5';
//        $stu->age = 19;
//        $bool = $stu->save();
//        dd($stu);

        //使用模型的create新增数据
//        $stu = Student::create(
//            ['name'=>'imoooc1','age'=>25]
//        );
//        dd($stu);

        //firstOrCreate() 找 有则取无则建
//        $stu = Student::firstOrCreate(
//            ['name'=>'imoooc1']
//        );
//        dd($stu);

        //firstOrNew 找 有则取无则实例化 实例化后决定是否保存 save()
        $stu = Student::firstOrNew(
            ['name' => 'imoooc1']
        );
        dd($stu);
    }

        public function orm3(){
            //更新数据
            //通过模型
//            $stu = Student::find(1010);
//            $stu->name = 'love';
//            $bool = $stu->save();
//            var_dump($bool);
            //结合查询 批量
            $num = Student::where('id','>','1009')->update(
                ['age'=>'25']
            );
            var_dump($num);

        }

    public function orm4(){
            //模型删除
//        $stu = Student::find(1010);
//        $bool = $stu ->delete();
//        var_dump($bool);

        //主键删除
//        $num = Student::destroy(1009);
//        $num = Student::destroy(1008,1007);
//        $num = Student::destroy([1008,1007]);
//        var_dump($num);

        //指定条件
        $num = Student::where('id','>','1005')->delete();
        var_dump($num);

    }

    public  function  section1(){

        $name = 'sean';
        $arr = ['sean','wss'];

        $stu = Student::get();

        return view('student.section1',[
            'name' => $name,
            'arr' => $arr,
            'stu' => $stu,
        ]);

    }

    public  function  urltest(){
        return 'urltest';

    }

    public function  request1( Request $request){
        //1.取值
        //echo $request->input('name');
        echo $request->input('sex','未知');
        //has判断是否存在
//        if( $request->has('name')){
//            echo  $request->input('name');
//        }else{
//            echo 'no';
//        }
        //all 取url中全部参数
//        $res = $request->all();
//        dd( $res);
        //2.判断请求类型

        //是什么类型
        //echo $request->method();

        //是否某一请求
//        if( $request->isMethod('GET')){
//            echo  'YES';
//        }else{
//            echo 'no';
//        }
        //是否ajax
//        $res = $request->ajax();
//        var_dump($res);
//
//        //是否符合条件
//        $res = $request->is('student/*');
//        var_dump($res);

        //获得当前url
        $res = $request->url();
        var_dump($res);


    }

    public function session1( Request $request){
        //1. HTTP request session()
//        $request->session()->put('key1' , 'value1');
//        echo $request->session()->get('key1');

        //2.session()
//        session()->put('key2','value2');
//        echo $request->session()->get('key2');
        //3.Session
        //存储数据到Sesion
        Session::put('key3','value3');
        //获取
//        echo Session::get('key3');
        //若无 则用默认值
       // echo Session::get('key3','default');
        //存数组
        //Session::put(['key3'=>'value3']);

        //将数据存到Session数组中
//        Session::push('student','sean');
//        Session::push('student','imooc');
//        $res = Session::get('student','default');
//        var_dump($res);
        //取一次后删除
        // $res = Session::pull('student','default');

        //取出所有
//        $res = Session::all();
//        dd($res);
        //判断是否存在 if
        //Session::has('key1');
        //删除
//        Session::forget('key1');
        //删除全部
        // Session::flush();
        //暂存 只能呗读取一次
        Session::flash('key-flash','val-f');

        echo 'yes';
    }

    public function session2( Request $request){
        //
        $res = Session::get('message','no');
        dd($res);


    }

    public function response(){

        //3.响应json
//        $data = [
//            'errCode' => 0,
//            'errMsg'=> 'success',
//            'data'=> 'sean',
//        ];
//        var_dump($data);
//        return response()->json($data);

        //4.重定向
//        return redirect('session2');
//        //带数据
//        return redirect('session2')->with('message','快闪');
//
//        //action(),route()别名
//        return redirect()->route('url')-with('','');
        //返回上一个界面
//        return redirect()->back();



    }

    //中间件 App\Http\Middleware
    public function  activity0(){
        return '未开始';
    }

    public function  activity1(){
        return '开始';
    }
    public function  activity2(){
        return '开始1';
    }
    public function  activity3(){
        return '开始2';
    }













































































}
