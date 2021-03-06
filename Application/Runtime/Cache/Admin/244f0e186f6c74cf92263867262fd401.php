<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>仓库管理</title>
  <meta name="renderer" content="webkit">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <link rel="stylesheet" href="/layui/css/layui.css"  media="all">

</head>
<body>
    <fieldset class="layui-elem-field layui-field-title" style="margin-top: 50px;">
  <legend><a href="#" onclick="jump()" style="color:#009688">用户信息</a>>>添加用户</legend>
</fieldset>      
<form class="layui-form" style="margin-top: 50px; font-size: 17px;" id="addform" action="">
<div style="width:  500px;margin-left: 34%;">
  <div class="layui-form-item">
    <label class="layui-form-label">用户名</label>
    <div class="layui-input-block" style="width:190px;">
      <input type="text" name="user_name" placeholder="输入用户名(20字符内)" autocomplete="off" class="layui-input">
    </div>
  </div>
  <div class="layui-form-item">
    <label class="layui-form-label">密码</label>
    <div class="layui-input-inline">
      <input type="password" name="password" placeholder="输入密码" autocomplete="off" class="layui-input">
    </div>
  </div>
  <div class="layui-form-item">
    <label class="layui-form-label">类型</label>
    <div class="layui-input-block">
      <input type="radio" name="user_type" value=0 title="管理员">
      <input type="radio" name="user_type" value=1 title="审核员">
      <input type="radio" name="user_type" value=2 title="员工" checked>
    </div>
  </div>
  <div class="layui-form-item">
    <div class="layui-input-block">
       <button class="layui-btn" lay-submit lay-filter="formDemo" onclick="toadd()">立即提交</button>
      <button type="reset" class="layui-btn layui-btn-primary" onclick="add()">重置</button>
    </div>
  </div>
  </div>
</form>
<script src="/layui/layui.js" charset="utf-8"></script>
<script src="/Public/js/jquery.min.js" charset="utf-8"></script>
<script src="/Public/js/commom.js" charset="utf-8"></script>
<script src="/Public/js/dialog.js"></script>
<script>

var SCOPE = {
  'jump_url' : '/admin.php?c=user',
  'post_url' : '/admin.php?c=user&a=add',
  'add_url' : '/admin.php?c=user&a=indexadd',
};

layui.use('form', function(){
  var form = layui.form;
  
  //监听提交
  form.on('submit(formDemo)', function(data){
    return false;
  });

  //渲染layui表单
  form.render();
});

</script>
</body>
</html>