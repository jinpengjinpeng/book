@extends('master')
@section('title','书籍')


@section('content')
    <div class="page__bd">
        <div class="weui-cells weui-cells_radio">
            <p onclick="history.go(-1)">     </p>

            <div class="weui-cells">
                <div class="weui-cell weui-cell_select">
                    <div class="weui-cell__bd">
                        <select  class="weui-select" name="select1">
                        @foreach($category as $key=>$value)
                            <option value="{{$value->id}}">{{$value->name}} </option>
                        @endforeach

                        </select>
                    </div>
                </div>

            </div>

            <div class="weui-cells__title">带说明、跳转的列表项</div>
            <div class="weui-cells">
                <a class="weui-cell weui-cell_access" href="javascript:;">
                    <div class="weui-cell__bd">
                        <p>cell standard</p>
                    </div>
                    <div class="weui-cell__ft">说明文字</div>
                </a>
                <a class="weui-cell weui-cell_access" href="javascript:;">
                    <div class="weui-cell__bd">
                        <p>cell standard</p>
                    </div>
                    <div class="weui-cell__ft">说明文字</div>
                </a>

            </div>

        </div>
@endsection

<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>

@section('my-js')
    <script type="text/javascript">


    </script>
@endsection