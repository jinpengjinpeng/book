@extends('master')
@section('title','书籍')


@section('content')
    <div class="page bk_content" style="top: 0;margin-left: 50px">
        <div class="weui_cells weui_cells_checkbox">
            @foreach($cart_items as $key=>$cart_item)
                <label class="weui_cell weui_check_label" for="{{$cart_item['id']}}">
                    <div class="weui_cell_hd" style="width: 43px;">
                        <input type="checkbox" class="weui_check cart_item" name="cart_item" id="{{$cart_item['id']}}" >
                        <i class="weui_icon_checked"></i>
                    </div>
                    <div class="weui_cell_bd weui_cell_primary">
                        <div style="position: relative;">
                            <img class="bk_preview" src="/a/{{$cart_item['preview']}}" class="m3_preview" onclick="_toProduct({{$cart_item['id']}});"/>
                            <div style="position: absolute; left: 100px; right: 0; top: 0">
                                <p>{{$cart_item['name']}}</p>
                                <p class="bk_time" style="margin-top: 15px;">数量: <span class="bk_summary">x{{$cart_item['count']}}</span></p>
                                <p class="bk_time">总计: <span class="bk_price">￥{{$cart_item['price'] * $cart_item['count']}}</span></p>
                            </div>
                        </div>
                    </div>
                </label>
            @endforeach
        </div>
    </div>
    {{-- <form action="/order_commit" id="order_commit" method="post">
      {{ csrf_field() }}
      <input type="hide" name="product_ids" value="" />
      <input type="hide" name="is_wx" value="" />
    </form> --}}
    <div class="bk_fix_bottom">
        <div class="bk_half_area">
            <button class="weui_btn weui_btn_primary" onclick="_toCharge();">结算</button>
        </div>
        <div class="bk_half_area">
            <button class="weui_btn weui_btn_default" onclick="_onDelete();">删除</button>
        </div>
    </div>
        <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
        <script type="text/javascript">
            $('input:checkbox[name=cart_item]').click(function(){
                var check = $(this).attr('attr');
                if(check=='checked'){
                    $(this).attr('checked','');
                }else {
                    $(this).attr('checked','checked');
                }

            })

        function _onDelete()
        {
            var pro_ids_arr = [];
            $('input:checkbox[name=cart_item]').each(function(index,el){
                if($(this).attr('checked')=='checked'){
                    pro_ids_arr.push($(this).attr('id'));
                }
            })
             console.log(pro_ids_arr);
            $.ajax({
                url:'/service/delcart',
                type:'post',
                datatype:'json',
                data:{pro_ids_arr:pro_ids_arr+''},
                success:function(data){
                    console.log(data);
                  //  var data1 = JSON.parse(data);
                 //   console.log(data1);
                    location.reload();

                },
                error:function(xhr,status,error){
                    console.log(xhr);
                    console.log(status);
                    console.log(error);
                }
            })

        }

        </script>
@endsection

@section('my-js')
    <script type="text/javascript">


    </script>
@endsection