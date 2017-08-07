<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=0">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="/a/css/weui.css">
   {{-- <link rel="stylesheet" href="/a/css/example.css"/>--}}
</head>
<body>
<div class="page">
    {{--<div class="page__bd page__bd_spacing">--}}
        {{--<a href="javascript:;" class="weui-btn weui-btn_default" id="showIOSActionSheet">菜单</a>--}}
    {{--</div>--}}
    {{--<!--BEGIN actionSheet-->--}}
    {{--<div>--}}
        {{--<div class="weui-mask" id="iosMask" style="display: none"></div>--}}
        {{--<div class="weui-actionsheet" id="iosActionsheet">--}}

            {{--<div class="weui-actionsheet__menu">--}}
                {{--<div class="weui-actionsheet__cell">用户中心</div>--}}
                {{--<div class="weui-actionsheet__cell">选择套餐</div>--}}
                {{--<div class="weui-actionsheet__cell">周边加油</div>--}}
                {{--<div class="weui-actionsheet__cell">常见问题</div>--}}
            {{--</div>--}}
            {{--<div class="weui-actionsheet__action">--}}
                {{--<div class="weui-actionsheet__cell" id="iosActionsheetCancel">取消</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}
    <div class="js_dialog" id="iosDialog2" style="display: none;">
        <div class="weui-mask"></div>
        <div class="weui-dialog">
            <div class="weui-dialog__bd">
                <p id="dialog_phone"></p>
            </div>
            <div class="weui-dialog__ft">
                <a href="" id="weui_dialog_btn_phone" class="weui-dialog__btn weui-dialog__btn_primary">知道了</a>
            </div>
        </div>
    </div>
 @yield('content')
</body>
    <script src="/a/js/jquery-3.2.1.min.js" ></script>
    <script src="/dist/jquery.validator.js?local=zh-CN"></script>
   {{-- <script src="/a/js/example.js" ></script>--}}
<script type="text/javascript">

    // ios
    $(function(){
        var iosActionsheet = $('#iosActionsheet');
        var iosMask = $('#iosMask');

        function hideActionSheet() {
            iosActionsheet.removeClass('weui-actionsheet_toggle');
            iosMask.fadeOut(200);
        }

        iosMask.on('click', hideActionSheet);
        $('#iosActionsheetCancel').on('click', hideActionSheet);
        $("#showIOSActionSheet").on("click", function(){
            iosActionsheet.addClass('weui-actionsheet_toggle');
            iosMask.fadeIn(200);
        });
    });

</script>
@yield('my-js')
</html>
