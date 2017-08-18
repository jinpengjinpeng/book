@extends('master')
@section('title','书籍')


@section('content')
    <div class="page__bd">
        <div class="weui-cells weui-cells_radio">
           {{-- <p onclick="history.go(-1)">     </p>--}}

            <div class="weui-cells">
                <div class="weui-cell weui-cell_select">
                    <div class="weui-cell__bd">
                        <select  class="weui-select" id="category" name="category">
                        @foreach($category as $key=>$value)
                            <option value="{{$value->id}}">{{$value->name}} </option>
                        @endforeach
                        </select>
                    </div>
                </div>

            </div>

            <div class="weui-cells__title">带说明、跳转的列表项</div>
            <div class="weui-cells" id="title_expole">

            </div>

        </div>
        <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
        <script type="text/javascript">
            _getcategory();
            $('#category').change(function(){
                var category = $('#category option:selected').val();
                console.log(category);
                _getcategory(category);
            })

            function _getcategory(category){
                $.ajax({
                    url:'/service/categroy',
                    type:'post',
                    datatype:'Json',
                    data:{category_id:$('#category option:selected').val()},
                    success:function(data){
                        data = JSON.parse(data);
                        console.log(data);
                        $('#title_expole').html('');
                        for(var i=0;i<data.length;i++){
                            var text =  '<a class="weui-cell weui-cell_access" href="/view/product?category_id='+data[i].id+'">'
                                    + '<div class="weui-cell__bd">'
                                    + '<p>'+ data[i].category_no+'</p>'
                                    + '</div>'
                                    + '<div class="weui-cell__ft">'+data[i].name+'</div>'
                                    + '</a>'
                            $('#title_expole').append(text);
                        }
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