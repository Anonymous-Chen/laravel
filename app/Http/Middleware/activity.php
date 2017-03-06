<?php
/**
 * Created by PhpStorm.
 * User: Anonymou_Chen
 * Date: 2017/3/6
 * Time: 12:58
 */
namespace  App\Http\Middleware;
use Closure;
class  Activity{

    //前置逻辑响应 先逻辑后响应
    public function handle0( $request, Closure $next){

        if (time() < strtotime('2017-05-05')){
            return redirect('activity0');
        }
        return $next($request);
    }

    //后置
    public function handle1( $request, Closure $next){

        $re = $next($request);
        dd($re);

        echo '此处写逻辑';

    }
}