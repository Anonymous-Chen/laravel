
@extends('layouts')

@section('header')
    @parent
    header



@stop

@section('sidebar')
    sidebar
@stop

@section('content')
    content
    {{--<!-- 1.模版中输出php变量 -->--}}
    {{--<p>{{ $name }}</p>--}}

    {{--<!--2.模版中输出php代码 -->--}}
    {{--<p>{{ time() }}}</p>--}}
    {{--<p>{{ date('Y-m-d H:i:s' , time()) }}}</p>--}}

    {{--<p>{{ in_array($name,$arr) ? 'true':'flase' }}</p>--}}
    {{--<p>{{ var_dump($arr) }}</p>--}}

    {{--<!--2.原样输出 -->--}}
    {{--<p>@{{  $name }}</p>--}}

    {{--4.模版中的注释 --}}

    {{--5.引入子视图 include --}}
    {{--@include('student.commom1',['message' => 'mess'])--}}

    <br>
    @if($name == 'sean')
        im sean
    @elseif($name == 'imm')
        im imm
    @else
        who
    @endif

    <br>
    @unless($name == 'im')
        im not im
    @endunless

    <br>
    @for ($i=0 ; $i<1 ; $i++)
        <p> {{$i}}</p>
    @endfor

    <br>
    {{--@foreach( $stu as $st)--}}
        {{--<p>{{ $st ->name }}</p>--}}
    {{--@endforeach--}}

    {{-- @forelse --}}

    <a href="{{ url('url') }}">urr()</a>
    <br>
    <a href="{{ action( 'StudentController@urltest') }}">action()</a>
    <br>
    <a href="{{ route('ut') }}">route()</a>




@stop

@section('footer')
    页脚
@stop