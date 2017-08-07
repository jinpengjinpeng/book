@extends('master')

@section('title','登录')

@section('content')

    <div class="page">
        <form id="register-form1" class="form" data-validator-option="{timely:1, theme:'yellow_top'}">
        <div class="weui-cells" id="validate-from" style="display: none">
            <input type="text" class="weui-label" value="" id="validatecode" readonly/>
        </div>

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

            <div class="weui-cells weui-cells_form" >
                <div class="weui-cell">
                    <div class="weui-cell__hd"><label class="weui-label">账号</label></div>
                    <div class="weui-cell__bd">
                        <input class="weui-input" type="text" name="name"  placeholder="请输入账号"/>
                    </div>
                </div>
                <div class="weui-cell">
                    <div class="weui-cell__hd"><label class="weui-label">密码</label></div>
                    <div class="weui-cell__bd">
                        <input class="weui-input" type="text"  name="password" pattern="[a-Z0-9]" placeholder="请输入密码"/>
                    </div>
                </div>
                <div class="weui-cell">
                    <div class="weui-cell__hd"><label class="weui-label">确认密码</label></div>
                    <div class="weui-cell__bd">
                        <input class="weui-input" type="text" name="confirm" pattern="[a-Z0-9]" placeholder="请确认密码"/>
                    </div>
                </div>
                <div class="weui-cell weui-cell_vcode">
                    <div class="weui-cell__hd">
                        <label class="weui-label">手机号</label>
                    </div>
                    <div class="weui-cell__bd">
                        <input class="weui-input" name="phone" id="phone" type="tel" value="" placeholder="请输入手机号"/>
                    </div>
                    <div class="weui-cell__ft">
                        <button type="button" class="weui-vcode-btn">获取验证码</button>
                    </div>
                </div>

                <div class="weui-cell weui-cell_vcode">
                    <div class="weui-cell__hd"><label class="weui-label">手机验证码</label></div>
                    <div class="weui-cell__bd">
                        <input class="weui-input" type="number" name="phone_code" placeholder="请输入验证码"/>
                    </div>
                </div>

                <div class="weui-cell weui-cell_vcode">
                    <div class="weui-cell__hd"><label class="weui-label">验证码</label></div>
                    <div class="weui-cell__bd">
                        <input class="weui-input" type="number" name="validate_code" placeholder="请输入验证码"/>
                    </div>
                    <div class="weui-cell__ft">
                        <img class="weui-vcode-img bk_validate_code" src="/validatecode/create" onclick="javascript:this.src='/validatecode/create?tm='+Math.random();"  alt="点击更换" title="点击更换"/>
                    </div>
                </div>
            </div>
            <div class="weui-btn-area">
                <button class="weui-btn weui-btn_primary"  type="button" onclick="submitbtn()" id="showTooltips">注册</button>
            </div>
        </div>
    </form>
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

    </div>
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script type="text/javascript">
             //更换验证码
//        $('.bk_validate_code').click(function(){
//            $(this).attr('src','/validatecode/create?code='+Math.random());
//        });

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
        var enable = true;
        $('.weui-vcode-btn').click(function(){
            var phone = $('#phone').val();
            //验证手机号码
            if(phone.length !=11 || phone[0] !=1 ){
                $('#validate-from').show();
                var validatecode = $('#validatecode');
                $('#validatecode').val('手机号码不正确');
                window.setTimeout(function(){
                    $('#validate-from').hide();
                },2000);
                return false;
            }

            if(enable==false){
                return false;
            }
            $(this).css('color','red');

            enable = false; //关闭点击

            var num = 10;//10秒后

            var interval = window.setInterval(function(){
                $('.weui-vcode-btn').html(--num + 's 重新发送');
                if(num == 0){
                    enable = true;//打开发送
                    window.clearInterval(interval);
                    $('.weui-vcode-btn').text('重新发送');
                    $('.weui-vcode-btn').css('color','green');
                }
            },1000);

            $.ajax({
                url: '/validatecode/sendSMS',
                dataType :'json',
                type:'POST',
                data:{phone:phone},
                cache :false,
                success :function(data){
                  console.log(data);
                  if(data == null || data ==''){
                      var $iosDialog2 = $('#iosDialog2');
                      $('#dialog_phone').html('服务失败'+data.$message);
                      $iosDialog2.fadeIn(200);
                      $('#weui_dialog_btn_phone').click(function(){
                          $('#iosDialog2').fadeOut();
                      });
                      setTimeout(function(){
                          $('#iosDialog2').fadeOut();
                      },2000);
                  }else {
                      if(data.status !=0){
                          var $iosDialog2 = $('#iosDialog2');
                          $('#dialog_phone').html('发送失败'+data.$message);
                          $iosDialog2.fadeIn(200);
                          $('#weui_dialog_btn_phone').click(function(){
                              $('#iosDialog2').fadeOut();
                          });
                          setTimeout(function(){
                              $('#iosDialog2').fadeOut();
                          },2000);
                      }
                      if(data.status==0){
//                          var $iosDialog2 = $('#iosDialog2');
//                          $('#dialog_phone').html('发送成功'+data.$message);
//                          $iosDialog2.fadeIn(200);
//                          $('#weui_dialog_btn_phone').click(function(){
//                              $('#iosDialog2').fadeOut();
//                          });
//                          setTimeout(function(){
//                              $('#iosDialog2').fadeOut();
//                          },2000);
                          //return;
                          location.href='/';
                      }
                  }
                },
                error :function(xhr,status,error){
                    console.log(xhr);
                    console.log(status);
                    console.log(error);
                }

            });

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

function  submitbtn(){

        var data = $('#register-form1').serializeArray();
        $.ajax({
            url:'/service/register',
            type:'POST',
            dataType:'json',
            data:data,
            cache :false,
            success:function(data) {
                console.log(data);
            }
    });

}


    </script>
@endsection




@section('my-js')
    <script type="text/javascript">


    </script>
@endsection
