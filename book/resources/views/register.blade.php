@extends('master')

@section('title','登录')

@section('content')
    <div class="page">
        <div class="weui-cells weui-cells_radio">
            <label class="weui-cell weui-check__label" for="x11">
                <div class="weui-cell__bd">
                    <p>手机</p>
                </div>
                <div class="weui-cell__ft">
                    <input type="radio" class="weui-check" name="radio1" id="x11" checked="checked"/>
                    <span class="weui-icon-checked"></span>
                </div>
            </label>
            <label class="weui-cell weui-check__label" for="x12">

                <div class="weui-cell__bd">
                    <p>邮箱</p>
                </div>
                <div class="weui-cell__ft">
                    <input type="radio" name="radio1" class="weui-check" id="x12" />
                    <span class="weui-icon-checked"></span>
                </div>
            </label>

        </div>

        <div class="page__bd">

            <div class="weui-cells weui-cells_form">
                <div class="weui-cell">
                    <div class="weui-cell__hd"><label class="weui-label">账号</label></div>
                    <div class="weui-cell__bd">
                        <input class="weui-input" type="" pattern="[a-Z0-9]" placeholder="请输入账号"/>
                    </div>
                </div>
                <div class="weui-cell">
                    <div class="weui-cell__hd"><label class="weui-label">密码</label></div>
                    <div class="weui-cell__bd">
                        <input class="weui-input" type="" pattern="[a-Z0-9]" placeholder="请输入密码"/>
                    </div>
                </div>
                <div class="weui-cell">
                    <div class="weui-cell__hd"><label class="weui-label">确认密码</label></div>
                    <div class="weui-cell__bd">
                        <input class="weui-input" type="" pattern="[a-Z0-9]" placeholder="请确认密码"/>
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

                <div class="weui-cell weui-cell_vcode">
                    <div class="weui-cell__hd"><label class="weui-label">验证码</label></div>
                    <div class="weui-cell__bd">
                        <input class="weui-input" type="number" placeholder="请输入验证码"/>
                    </div>
                    <div class="weui-cell__ft">
                        <img class="weui-vcode-img bk_validate_code" src="/validatecode/create" onclick="javascript:this.src='/validatecode/create?tm='+Math.random();"  alt="点击更换" title="点击更换"/>
                    </div>
                </div>
            </div>
        </div>



        <div class="page__bd" style="display:none" >

            <div class="weui-cells weui-cells_form">
                <div class="weui-cell weui-cell_vcode">
                    <div class="weui-cell__hd">
                        <label class="weui-label">邮箱</label>
                    </div>
                    <div class="weui-cell__bd">
                        <input class="weui-input" type="tel" placeholder="请输入手机号"/>
                    </div>
                    <div class="weui-cell__ft">
                        <button class="weui-vcode-btn">获取验证码</button>
                    </div>
                </div>
                <div class="weui-cell">
                    <div class="weui-cell__hd"><label class="weui-label">密码</label></div>
                    <div class="weui-cell__bd">
                        <input class="weui-input" type="" pattern="[a-Z0-9]" placeholder="请输入密码"/>
                    </div>
                </div>
                <div class="weui-cell">
                    <div class="weui-cell__hd"><label class="weui-label">确认密码</label></div>
                    <div class="weui-cell__bd">
                        <input class="weui-input" type="" pattern="[a-Z0-9]" placeholder="请确认密码"/>
                    </div>
                </div>
                <div class="weui-cell weui-cell_vcode">
                    <div class="weui-cell__hd"><label class="weui-label">验证码</label></div>
                    <div class="weui-cell__bd">
                        <input class="weui-input" type="number" placeholder="请输入验证码"/>
                    </div>
                    <div class="weui-cell__ft">
                        <img class="weui-vcode-img bk_validate_code" src="/validatecode/create" onclick="javascript:this.src='/validatecode/create?tm='+Math.random();"  alt="点击更换" title="点击更换"/>
                    </div>
                </div>
            </div>
        </div>
        <div class="weui-btn-area">
            <a class="weui-btn weui-btn_primary" href="javascript:" id="showTooltips">注册</a>
        </div>

    </div>
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script type="text/javascript">

        $('.bk_validate_code').click(function(){
            $(this).attr('src','/validatecode/create?code='+Math.random());
        });

        //显示隐藏
        $('input:radio[name=radio1]').click(function(event){
         $('input:radio[name=radio1]').attr('checked',false);
            $('this').attr('checked',true);
            if($(this).attr('id')=='x11'){
                $('.page__bd').eq(0).show();
                $('.page__bd').eq(1).hide();
            }else if($(this).attr('id')=='x12'){
                $('.page__bd').eq(0).hide();
                $('.page__bd').eq(1).show();
            }

        })

        //获取验证码
        $('.weui-vcode-btn').click(function(){
            alert(11);
            $.ajax(function(){
                url:'ValidateCode/sendSMS';
                type: 'POST';
                data:{};
            })


        });



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
