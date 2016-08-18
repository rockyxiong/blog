@extends( 'layouts.admin' )
@section( 'content' )
        <!--面包屑导航 开始-->
<div class="crumb_warp">
    <!--<i class="fa fa-bell"></i> 欢迎使用登陆网站后台，建站的首选工具。-->
    <i class="fa fa-home"></i> <a href="{{url( 'admin/info' )}}">首页</a> &raquo; 配置项管理
</div>
<!--面包屑导航 结束-->

<!--结果集标题与导航组件 开始-->
<div class="result_wrap">
    <div class="result_title">
        <h3>快捷操作</h3>
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
    <div class="result_content">
        <div class="short_wrap">
            <a href="{{url( 'admin/config/create' )}}"><i class="fa fa-plus"></i>添加配置项</a>
            <a href="{{url( 'admin/config' )}}"><i class="fa fa-recycle"></i>全部配置项</a>
        </div>
    </div>
</div>
<!--结果集标题与导航组件 结束-->

<div class="result_wrap">
    <form action="{{url( 'admin/config/'.$field->id )}}" method="post">
        {{method_field( 'PUT' )}}
        {{csrf_field()}}
        <table class="add_tab">
            <tbody>
            <tr>
                <th><i class="require">*</i>标题：</th>
                <td>
                    <input type="text" name="conf_title" value="{{$field->conf_title}}" >
                    <span><i class="fa fa-exclamation-circle yellow"></i>标题必须填写</span>
                </td>
            </tr>
            <tr>
                <th><i class="require">*</i>名称：</th>
                <td>
                    <input type="text" name="conf_name" value="{{$field->conf_name}}" >
                    <span><i class="fa fa-exclamation-circle yellow"></i>名称必须填写</span>
                </td>
            </tr>

            <tr>
                <th>类型：</th>
                <td>
                    <label for="input"><input type="radio" id="input" name="field_type" @if( $field->field_type == 'input' ) checked @endif onclick="showTr()" value="input">input &nbsp;</label>
                    <label for="textarea"><input type="radio" id="textarea" name="field_type" @if( $field->field_type == 'textarea' ) checked @endif onclick="showTr()" value="textarea">textarea &nbsp;</label>
                    <label for="radio"><input type="radio" id="radio" name="field_type" @if( $field->field_type == 'radio' ) checked @endif onclick="showTr()" value="radio">radio</label>
                    <span><i class="fa fa-exclamation-circle yellow"></i>类型：input textarea radio</span>
                </td>
            </tr>
            <tr class="field_value">
                <th>类型值：</th>
                <td>
                    <input type="text" class="lg" name="field_value">
                    <p><i class="fa fa-exclamation-circle yellow"></i>类型值只有radio的情况下才需要配置，格式：1|开启,0|关闭</p>
                </td>
            </tr>


            <tr>
                <th>排序：</th>
                <td>
                    <input type="text" class="sm" name="conf_order" value="{{$field->conf_order}}">
                </td>
            </tr>
            <tr>
                <th>说明：</th>
                <td>
                    <textarea name="conf_tips" id="" cols="30" rows="10">{{$field->conf_tips}}</textarea>
                </td>
            </tr>
            <tr>
                <th></th>
                <td>
                    <input type="submit" value="提交">
                    <input type="button" class="back" onclick="history.go(-1)" value="返回">
                </td>
            </tr>
            </tbody>
        </table>
    </form>
</div>
<script>
    showTr();
    function showTr(){
        var type = $( "input[name='field_type']:checked").val();
        if( type == 'radio' ){
            $( ".field_value").show();
        }else{
            $( ".field_value").hide();
        }
    }
</script>
@endsection
