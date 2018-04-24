<?php
$tab = isset($_GET['tab']) && !empty($_GET['tab']) ? sanitize_text_field($_GET['tab']) : 'gup';
$admin_url = admin_url('admin-ajax.php');
?>
<style>
    .btn-green {
        margin-top: 0px;
        padding: 0 0;
        margin-left: 20px;
        margin-right: 0px;
    }
    .form-group {
        margin: 20px 0px;
        margin-bottom: 0px;
        overflow: hidden
    }
</style>
<h4>权限列表</h4>
<div class="divline"></div>
<div class="pl-search-box">
    <input type="text" id="<?= $tab ?>-permission-input" class="form-control <?= $tab ?>-text" placeholder="请输入权限名称">
    <button class="btn btn-green" onclick="addToChosenList('<?= $tab ?>','permission','<?= $admin_url ?>')">搜索</button>
    <button class="btn btn-green" onclick="new_permission()">新建权限</button>
</div>
<div id="autocomplete-permission" style="display: none">
    <ul class="list-group"></ul>
</div>
<div id="pl-table" style="margin-top: 30px">
    <table id="pl-table-border" class="table table-bordered table-hover">
        <thead>
        <tr>
            <th>权限名称</th>
            <th>权限ID</th>
            <th>对应角色</th>
            <th>权限创建时间</th>
            <th>权限说明</th>
            <th>对应资源</th>
            <th>操作</th>
        </tr>
        </thead>
        <tbody>
        <tr>
        </tr>
        </tbody>
    </table>
</div>
<div class="col-sm-12 col-md-12 col-xs-12" id="show_post" style="display:none">
    <!--                资源展示table-->
    <div id="post-info-table">
        <table id="post-choose-table-border" class="table table-bordered table-hover">
            <thead>
            <tr>
                <th colspan="4" style="background-color: lightgrey;">已选择资源</th>
            </tr>
            <tr>
                <th></th>
                <th>资源ID</th>
                <th>资源名称</th>
                <th>资源类型</th>
            </tr>
            </thead>
            <tbody id="post_tbody">
            </tbody>
        </table>
    </div>

    <div style="display: none;overflow: hidden">
        <div class="col-md-2 col-sm-2 col-xs-6" id="addPost">
            <button class="btn-green" onclick="addPost()">添加资源</button>
        </div>
        <div class="col-md-2 col-sm-2 col-xs-6" id="deletePost">
            <button class="btn-green" onclick="deletePost()">删除资源</button>
        </div>
    </div>

    <div id='search_post' style='display:none;'>
        <div class="divline"></div>
        <div class="form-group">
            <label for="creation" class="col-sm-2 col-md-2 col-xs-12 control-label" style="float: left">创建方式
                <span style="color: red">*</span></label>
            <div class="col-sm-8 col-md-8 col-xs-12" style="margin-top: 7px;">
                <input type="radio" id="byname" name="creation" value="name" style="display: inline-block"
                       checked/><span> 按名称创建</span>&nbsp;&nbsp;
                <input type="radio" id="bycate" name="creation" value="cate"
                       style="display: inline-block;margin-left: 30px"/><span> 按分类创建</span>&nbsp;&nbsp;
                <input type="radio" id="bytag" name="creation" value="tag"
                       style="display: inline-block;margin-left: 30px"/><span> 按标签创建</span>
            </div>
        </div>
        <div class="form-group">
            <label for="searchpost" class="col-sm-2 col-md-2 col-xs-12 control-label" style="float: left">检索资源
                <span style="color: red">*</span></label>
            <div class="col-sm-10 col-md-10 col-xs-12">
                <input type="text" class="form-control" id='postname' placeholder="请输入资源标题/分类名称/标签名称">
                <input type="button" class="btn btn-green" onclick="addToPostList('<?=admin_url('admin-ajax.php')?>')" value="搜索">
                <div id="autocomplete-post" style="display: none">
                    <ul class="list-group"></ul>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(function () {   //模糊查询
        var tab = '<?=$tab?>';
        $("#<?=$tab?>-permission-input").keyup(function () {
            var word = $(this).val();
            var data = {
                action: 'rbac_autocomplete',
                part: 'permission',
                word: word
            };
            $.ajax({
                type: 'post',
                url: '<?=admin_url('admin-ajax.php')?>',
                data: data,
                dataType: 'text',
                success: function (response) {
                    var part = 'permission';
                    autoComplete(response.trim(), tab, part);
                }
            })
        });
    });
    $(function () {   //模糊查询
        $("#postname").keyup(function () {
            var creation = $("input[name='creation']:checked").val();
            var word = $(this).val();
            var data = {
                action: 'rbac_post_autocomplete',
                creation:creation,
                word: word
            };
            $.ajax({
                type: 'post',
                url: '<?=admin_url('admin-ajax.php')?>',
                data: data,
                dataType: 'json',
                success: function (response) {
                    var arr = response;
                    var li = "";
                    var ac_id = "#autocomplete-post";
                    if (arr.length != 0) {
                        $.each(arr, function (i, val) {
                            if(creation=='name'){
                                li += "<li class='list-group-item'>" + val.post_title + "</li>";
                            } else {
                                li += "<li class='list-group-item'>" + val.name + "</li>";
                            }
                        });
                        $(ac_id + " ul").html(li);
                        $(ac_id).slideDown('fast');
                        //鼠标经过元素的背景颜色改变
                        $(ac_id + " ul li").bind('mouseenter', function () {
                            $(this).css({'background': '#e9e8e9'})
                        });
                        $(ac_id + " ul li").bind('mouseleave', function () {
                            $(this).css({'background': 'transparent'})
                        });
                        $(ac_id + " ul li").bind('click', function () {
                            $("#postname").val($(this).html());
                            $(ac_id).slideUp('fast');
                        });
                    }
                    else {
                        $(ac_id).slideUp('fast');
                    }
                }
            })
        });
    });
    function new_permission() {
        window.open('<?=site_url() . get_page_address('create_permission')?>');
    }
    function addPost() {
        $('#search_post').css('display', 'block');
        $('#post-choose-table-border tbody').empty();
        var btn = '<button class="btn-green" onclick="appendPost()">确认添加</button>';
        $('#addPost').innerHTML = btn
    }
    function deletePost() {
        var obj = document.getElementsByName("checkItem[]");
        var delete_id= [];
        for (var k in obj) {
            if (obj[k].checked)
                delete_id.push(obj[k].value);
        }
        var node_id = $('#show_post').children(2).attr('id');
        var pid = node_id.split('_')[2];

        var data = {
            action: 'rbac_delete_post',
            permission_id:pid,
            delete_id: delete_id
        };
        $.ajax({
            type: 'post',
            url: '<?=admin_url('admin-ajax.php')?>',
            data: data,
            dataType: 'text',
            success: function () {
                layer.msg('删除成功',{time:2000,icon:1});
            }
        })


    }
</script>


