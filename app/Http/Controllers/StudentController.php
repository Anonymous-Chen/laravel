<?php
/**
 * Created by PhpStorm.
 * User: Anonymou_Chen
 * Date: 2017/3/3
 * Time: 23:14
 */
namespace  App\Http\Controllers;

use Illuminate\Support\Facades\DB;

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

















}
