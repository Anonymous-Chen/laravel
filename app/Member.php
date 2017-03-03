<?php
/**
 * Created by PhpStorm.
 * User: Anonymou_Chen
 * Date: 2017/3/3
 * Time: 21:38
 */
namespace APP;

use Illuminate\Database\Eloquent\Model;


class  Member extends Model{
    public  static  function  getMember(){
        return 'member saen';
    }
}