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
        //return 'test1';
        $students = DB::select('select * from student');
        var_dump($students);

        $students = DB::select('select * from student where id >? ',[1002]);
        var_dump($students);

//        $bool = DB::insert('insert into student(name,age) value(?,?)',['mooc',18]);
//        var_dump($bool);
        $num = DB::update('update student set age = ? where name = ?',[20,'mooc']);
        var_dump($num);

        $num1 = DB::delete('delete from student where id > ?',[1002]);
        var_dump($num1);
    }
}
