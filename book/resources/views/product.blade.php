@extends('master')

@section('title','书籍列表')

@section('content')
<div class="page__bd">
    <div class="weui-cells__title">带图标、说明、跳转的列表项</div>
    <div class="weui-cells">
      @foreach($product as $key=>$value )
        <a class="weui-cell weui-cell_access" href="/view/pdtcontent?pro_id={{$value->id}}">
            <div class="weui-cell__hd">
                <img src="/a/{{$value->preview}}" alt="" style="width:60px;height:50px;margin-right:5px;display:block">
            </div>

            <div class="weui-cell__bd">
                <p>{{$value->name}}</p>
            </div>

            <div class="weui-cell__bd">
                <span style="color: red;margin-left: 20px">{{$value->price}}</span>
            </div>

            <div class="weui-cell__ft">
                {{$value->summary}}
            </div>
        </a>
          @endforeach
    </div>
</div>


</div>

<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script type="text/javascript">


</script>
@endsection

@section('my-js')



@endsection