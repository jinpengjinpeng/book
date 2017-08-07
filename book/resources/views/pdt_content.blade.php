@extends('master')

@section('title',$product->name)

@section('content')
    <div class="page__bd">
        <div class="weui-cells">
            <div class="addWrap">
                <div class="swipe" id="mySwipe">
                    <div class="swipe-wrap">
                        @foreach($pdt_images as $pdt_image)
                            <div>
                                <a href="javascript:;"><img class="img-responsive" src="{{$pdt_image->images_path}}" /></a>
                            </div>
                        @endforeach
                    </div>
                </div>
                <ul id="position">
                    @foreach($pdt_images as $index => $pdt_image)
                        <li class={{$index == 0 ? 'cur' : ''}}></li>
                    @endforeach
                </ul>

            </div>

                <a class="weui-cell weui-cell_access" href="javascript:;">
                    <div class="weui-cell__hd">
                        <img src="/a/{{$product->preview}}" alt="" style="width:60px;height:50px;margin-right:5px;display:block">
                    </div>

                    <div class="weui-cell__bd">
                        <p>{{$product->name}}</p>
                    </div>

                    <div class="weui-cell__bd">
                        <span style="color: red;margin-left: 20px">{{$product->price}}</span>
                    </div>

                    <div class="weui-cell__ft">
                        {{$product->summary}}
                    </div>
                </a>

                <div class="weui-cells__title">详细内容</div>
                <div class="weui-cells">
                    <div class="weui-cell">
                        <div class="weui-cell__bd">
                            <p>{!! $pdtinfo->connent!!}</p>
                        </div>
                    </div>

                </div>

            <div class="bk_fix_bottom">
                <div class="bk_half_area">
                    <button class="weui_btn weui_btn_primary" onclick="_addCart();">加入购物车</button>
                </div>
                <div class="bk_half_area">
                    <button class="weui_btn weui_btn_default" onclick="_toCart()">查看购物车(<span id="cart_num" class="m3_price"></span>)</button>
                </div>
            </div>
        </div>
    </div>

    </div>

    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script type="text/javascript">
        var bullets = document.getElementById('position').getElementsByTagName('li');
        Swipe(document.getElementById('mySwipe'), {
            auto: 2000,
            continuous: true,
            disableScroll: false,
            callback: function(pos) {
                var i = bullets.length;
                while (i--) {
                    bullets[i].className = '';
                }
                bullets[pos].className = 'cur';
            }
        });
      function _addCart()
      {


      }

    </script>
@endsection

@section('my-js')



@endsection