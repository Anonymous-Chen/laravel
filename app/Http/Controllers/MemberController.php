<?php
/**
 * Created by PhpStorm.
 * User: Anonymou_Chen
 * Date: 2017/3/3
 * Time: 21:09
 */
namespace App\Http\Controllers;

use App\Member;

class MemberController extends Controller{

    public  function  info($id){
        //return 'member-info'.$id;

        return Member::getMember();

//        return view('member/info',[
//            'name'=>'anonymouchen'
//        ]);
}
}