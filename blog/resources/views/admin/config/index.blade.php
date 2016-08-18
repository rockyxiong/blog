@extends( 'layouts.admin' )
@section( 'content' )
<!--面包屑导航 开始-->
<div class="crumb_warp">
    <!--<i class="fa fa-bell"></i> 欢迎使用登陆网站后台，建站的首选工具。-->
    <i class="fa fa-home"></i> <a href="{{url( 'admin/info' )}}">首页</a> &raquo;  系统配置
</div>
<!--面包屑导航 结束-->

<!--结果页快捷搜索框 开始-->
{{--<div class="search_wrap">--}}
    {{--<form action="" method="post">--}}
        {{--<table class="search_tab">--}}
            {{--<tr>--}}
                {{--<th width="120">选择分类:</th>--}}
                {{--<td>--}}
                    {{--<select onchange="javascript:location.href=this.value;">--}}
                        {{--<option value="">全部</option>--}}
                        {{--<option value="http://www.baidu.com">百度</option>--}}
                        {{--<option value="http://www.sina.com">新浪</option>--}}
                    {{--</select>--}}
                {{--</td>--}}
                {{--<th width="70">关键字:</th>--}}
                {{--<td><input type="text" name="keywords" placeholder="关键字"></td>--}}
                {{--<td><input type="submit" name="sub" value="查询"></td>--}}
            {{--</tr>--}}
        {{--</table>--}}
    {{--</form>--}}
{{--</div>--}}
<!--结果页快捷搜索框 结束-->

<!--搜索结果页面 列表 开始-->

    <div class="result_wrap">
        <div class="result_title">
            <h3>网站系统配置</h3>
            @if( count( $errors ) > 0 )
                <div class="mark">
                    @if( is_object( $errors ) )
                        @foreach($errors->all() as $error)
                            <p>{{$error}}</p>
                        @endforeach
                    @else
                        <p>{{$errors}}</p>
                    @endif
                </div>
            @endif
        </div>
        <!--快捷导航 开始-->
        <div class="result_content">
            <div class="short_wrap">
                <a href="{{url( 'admin/config/create' )}}"><i class="fa fa-plus"></i>添加配置</a>
                <a href="{{url( 'admin/config' )}}"><i class="fa fa-recycle"></i>全部配置</a>
            </div>
        </div>
        <!--快捷导航 结束-->
    </div>

    <div class="result_wrap">
        <div class="result_content">
            <form action="{{url( 'admin/config/changecontent' )}}" method="post">
                {{csrf_field()}}
            <table class="list_tab">
                <tr>
                    <th class="tc" width="5%">排序</th>
                    <th class="tc" width="5%">ID</th>
                    <th>名称</th>
                    <th>标题</th>
                    <th>内容</th>
                    <th>操作</th>
                </tr>
                @foreach( $data as $vo )
                <tr>
                    <td class="tc">
                        <input type="text" onchange="changeOrder(this,{{$vo['id']}})" value="{{$vo['conf_order']}}">
                    </td>
                    <td class="tc">{{$vo['id']}}</td>
                    <td>
                        <a href="#">{{$vo['conf_title']}}</a>
                    </td>
                    <td>
                        <a href="#">{{$vo['conf_name']}}</a>
                    </td>
                    <td>
                        <input type="hidden" name="id[]" value="{{$vo['id']}}">
                        {!!$vo['_html']!!}
                    </td>
                    <td>
                        <a href="{{url( 'admin/config/'.$vo->id.'/edit' )}}">修改</a>
                        <a href="javascript:;" onclick="delNav( {{$vo->id}} )">删除</a>
                    </td>
                </tr>
                @endforeach

            </table>
            <div class="btn_group">
                <input type="submit" value="提交">
                <input type="button" class="back" onclick="history.go(-1)" value="返回" >
            </div>
            </form>
        </div>
    </div>

<!--搜索结果页面 列表 结束-->
<script>
    function changeOrder(obj,conf_id){
        var conf_order = $(obj).val();
        $.post( "{{url('admin/config/changeorder')}}",{'_token':'{{csrf_token()}}','conf_order':conf_order,'id':conf_id},function(data){
            if( data.code == 0 ){
                layer.alert( data.msg, {icon: 6} );
            }else{
                layer.alert( data.msg, {icon: 5} );
            }
        });
    }

    function delNav( conf_id ){
        //询问框
        layer.confirm('你确定要删除这个分类吗？', {
            btn: ['确定','取消'] //按钮
        }, function(){
            $.post( "{{url( 'admin/config/' )}}/"+conf_id,{'_method':'delete','_token':"{{csrf_token()}}"},function(e){
//                alert( e.msg );
//                layer.msg(e.msg, {icon: 1});
                if( e.code==0 ){
                    layer.msg(e.msg, {icon: 6});
                    location.href = location.href;
                }else{
                    layer.msg(e.msg, {icon: 5});
                }
            });
//            layer.msg('的确很重要', {icon: 1});
        }, function(){
//            layer.msg('也可以这样', {
//                time: 20000, //20s后自动关闭
//                btn: ['明白了', '知道了']
//            });
        });
    }

</script>
@endsection