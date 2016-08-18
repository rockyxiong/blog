@extends( 'layouts.admin' )
@section( 'content' )
<!--面包屑导航 开始-->
<div class="crumb_warp">
    <!--<i class="fa fa-bell"></i> 欢迎使用登陆网站后台，建站的首选工具。-->
    <i class="fa fa-home"></i> <a href="{{url( 'admin/info' )}}">首页</a> &raquo;  全部分类
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
<form action="#" method="post">
    <div class="result_wrap">
        <div class="result_title">
            <h3>分类管理</h3>
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
                <a href="{{url( 'admin/category/create' )}}"><i class="fa fa-plus"></i>添加分类</a>
                <a href="{{url( 'admin/category' )}}"><i class="fa fa-recycle"></i>全部分类</a>
            </div>
        </div>
        <!--快捷导航 结束-->
    </div>

    <div class="result_wrap">
        <div class="result_content">
            <table class="list_tab">
                <tr>
                    <th class="tc" width="5%">排序</th>
                    <th class="tc" width="5%">ID</th>
                    <th>分类名字</th>
                    <th>分类标题</th>
                    <th>查看次数</th>
                    <th>操作</th>
                </tr>
                @foreach( $data as $vo )
                <tr>
                    <td class="tc">
                        <input type="text" onchange="changeOrder(this,{{$vo['id']}})" name="ord[]" value="{{$vo['cate_order']}}">
                    </td>
                    <td class="tc">{{$vo['id']}}</td>
                    <td>
                        <a href="#">{{$vo['_cate_name']}}</a>
                    </td>
                    <td>{{$vo['cate_title']}}</td>
                    <td>{{$vo['cate_view']}}</td>
                    <td>
                        <a href="{{url( 'admin/category/'.$vo->id.'/edit' )}}">修改</a>
                        <a href="javascript:;" onclick="delCate( {{$vo->id}} )">删除</a>
                    </td>
                </tr>
                @endforeach
                {{--<tr>--}}
                    {{--<td class="tc"><input type="checkbox" name="id[]" value="59"></td>--}}
                    {{--<td class="tc">--}}
                        {{--<input type="text" name="ord[]" value="0">--}}
                    {{--</td>--}}
                    {{--<td class="tc">59</td>--}}
                    {{--<td>--}}
                        {{--<a href="#">三星 SM-G5308W 白色 移动4G手机 双卡双待</a>--}}
                    {{--</td>--}}
                    {{--<td>0</td>--}}
                    {{--<td>2</td>--}}
                    {{--<td>admin</td>--}}
                    {{--<td>2014-03-15 21:11:01</td>--}}
                    {{--<td></td>--}}
                    {{--<td>--}}
                        {{--<a href="#">修改</a>--}}
                        {{--<a href="#">删除</a>--}}
                    {{--</td>--}}
                {{--</tr>--}}

                {{--<tr>--}}
                    {{--<td class="tc"><input type="checkbox" name="id[]" value="59"></td>--}}
                    {{--<td class="tc">--}}
                        {{--<input type="text" name="ord[]" value="0">--}}
                    {{--</td>--}}
                    {{--<td class="tc">59</td>--}}
                    {{--<td>--}}
                        {{--<a href="#">荣耀 6 (H60-L11) 3GB内存增强版 白色 移动4G手机</a>--}}
                    {{--</td>--}}
                    {{--<td>0</td>--}}
                    {{--<td>2</td>--}}
                    {{--<td>admin</td>--}}
                    {{--<td>2014-03-15 21:11:01</td>--}}
                    {{--<td></td>--}}
                    {{--<td>--}}
                        {{--<a href="#">修改</a>--}}
                        {{--<a href="#">删除</a>--}}
                    {{--</td>--}}
                {{--</tr>--}}
            </table>


            {{--<div class="page_nav">--}}
                {{--<div>--}}
                    {{--<a class="first" href="/wysls/index.php/Admin/Tag/index/p/1.html">第一页</a>--}}
                    {{--<a class="prev" href="/wysls/index.php/Admin/Tag/index/p/7.html">上一页</a>--}}
                    {{--<a class="num" href="/wysls/index.php/Admin/Tag/index/p/6.html">6</a>--}}
                    {{--<a class="num" href="/wysls/index.php/Admin/Tag/index/p/7.html">7</a>--}}
                    {{--<span class="current">8</span>--}}
                    {{--<a class="num" href="/wysls/index.php/Admin/Tag/index/p/9.html">9</a>--}}
                    {{--<a class="num" href="/wysls/index.php/Admin/Tag/index/p/10.html">10</a>--}}
                    {{--<a class="next" href="/wysls/index.php/Admin/Tag/index/p/9.html">下一页</a>--}}
                    {{--<a class="end" href="/wysls/index.php/Admin/Tag/index/p/11.html">最后一页</a>--}}
                    {{--<span class="rows">11 条记录</span>--}}
                {{--</div>--}}
            {{--</div>--}}



            {{--<div class="page_list">--}}
                {{--<ul>--}}
                    {{--<li class="disabled"><a href="#">&laquo;</a></li>--}}
                    {{--<li class="active"><a href="#">1</a></li>--}}
                    {{--<li><a href="#">2</a></li>--}}
                    {{--<li><a href="#">3</a></li>--}}
                    {{--<li><a href="#">4</a></li>--}}
                    {{--<li><a href="#">5</a></li>--}}
                    {{--<li><a href="#">&raquo;</a></li>--}}
                {{--</ul>--}}
            {{--</div>--}}
        </div>
    </div>
</form>
<!--搜索结果页面 列表 结束-->
<script>
    function changeOrder(obj,cate_id){
        var cate_order = $(obj).val();
        $.post( "{{url('admin/cate/changeorder')}}",{'_token':'{{csrf_token()}}','cate_order':cate_order,'id':cate_id},function(data){
            if( data.code == 0 ){
                layer.alert( data.msg, {icon: 6} );
            }else{
                layer.alert( data.msg, {icon: 5} );
            }
        });
    }

    function delCate( cate_id ){
        //询问框
        layer.confirm('你确定要删除这个分类吗？', {
            btn: ['确定','取消'] //按钮
        }, function(){
            $.post( "{{url( 'admin/category/' )}}/"+cate_id,{'_method':'delete','_token':"{{csrf_token()}}"},function(e){
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