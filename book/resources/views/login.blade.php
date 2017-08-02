@extends('master')

@section('title','登录')



@section('content')
    <div class="page">

        <div class="page__bd">

            <div class="weui-cells weui-cells_form">
                <div class="weui-cell">
                    <div class="weui-cell__hd"><label class="weui-label">qq</label></div>
                    <div class="weui-cell__bd">
                        <input class="weui-input" type="number" pattern="[0-9]*" placeholder="请输入qq号"/>
                    </div>
                </div>
                <div class="weui-cell weui-cell_vcode">
                    <div class="weui-cell__hd">
                        <label class="weui-label">手机号</label>
                    </div>
                    <div class="weui-cell__bd">
                        <input class="weui-input" type="tel" placeholder="请输入手机号"/>
                    </div>
                    <div class="weui-cell__ft">
                        <button class="weui-vcode-btn">获取验证码</button>
                    </div>
                </div>
                <div class="weui-cell">
                    <div class="weui-cell__hd"><label for="" class="weui-label">日期</label></div>
                    <div class="weui-cell__bd">
                        <input class="weui-input" type="date" value=""/>
                    </div>
                </div>
                <div class="weui-cell">
                    <div class="weui-cell__hd"><label for="" class="weui-label">时间</label></div>
                    <div class="weui-cell__bd">
                        <input class="weui-input" type="datetime-local" value="" placeholder=""/>
                    </div>
                </div>
                <div class="weui-cell weui-cell_vcode">
                    <div class="weui-cell__hd"><label class="weui-label">验证码</label></div>
                    <div class="weui-cell__bd">
                        <input class="weui-input" type="number" placeholder="请输入验证码"/>
                    </div>
                    <div class="weui-cell__ft">
                        <img class="weui-vcode-img" src="./images/vcode.jpg" />
                    </div>
                </div>
            </div>


            <div class="weui-btn-area">
                <a class="weui-btn weui-btn_primary" href="javascript:" id="showTooltips">确定</a>
            </div>
        </div>


    </div>
    <script type="text/javascript">
        $(function(){
            var $tooltips = $('.js_tooltips');

            $('#showTooltips').on('click', function(){
                if ($tooltips.css('display') != 'none') return;

                // toptips的fixed, 如果有`animation`, `position: fixed`不生效
                $('.page.cell').removeClass('slideIn');

                $tooltips.css('display', 'block');
                setTimeout(function () {
                    $tooltips.css('display', 'none');
                }, 2000);
            });
        });
    </script>
@endsection




@section('my-js')
    <script type="text/javascript">



    </script>
@endsection
