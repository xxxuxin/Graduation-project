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
<style type="text/css">
  .box{
    border: 1px red solid;
  }
</style>
<body>
<fieldset class="layui-elem-field layui-field-title" style="margin-top: 50px;">
  <legend><a href="#" onclick="jump()" style="color:#009688">物料信息</a>>>新增物料</legend>
</fieldset>
<form class="layui-form" style="margin-top: 50px; font-size: 17px;" id="addform" action="">
<div style="width:  500px;margin-left: 34%;">
  <div class="layui-form-item">
    <label class="layui-form-label">编码</label>
    <div class="layui-input-block" style="width:300px;">
      <input type="text" name="details_code" placeholder="必填" autocomplete="off" class="layui-input">
    </div>
  </div>
  <div class="layui-form-item">
    <label class="layui-form-label">物料名称</label>
    <div class="layui-input-block" style="width:300px;">
      <input type="text" name="details_name" placeholder="必填" autocomplete="off" class="layui-input">
    </div>
  </div>
  <div class="layui-form-item">
    <label class="layui-form-label">规格型号</label>
    <div class="layui-input-block" style="width:300px;">
      <input type="text" name="details_type" placeholder="必填，没有可填“/”" autocomplete="off" class="layui-input">
    </div>
  </div>
  <div class="layui-form-item">
    <label class="layui-form-label">牙色</label>
    <div class="layui-input-block" style="width:300px;">
      <input type="text" name="details_color" placeholder="必填，没有可填“/”" autocomplete="off" class="layui-input">
    </div>
  </div>
  <div class="layui-form-item">
    <label class="layui-form-label">单位</label>
    <div class="layui-input-block" style="width:300px;">
      <input type="text" name="details_unit" placeholder="必填，没有可填“/”" autocomplete="off" class="layui-input">
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
</div>
<script src="/layui/layui.js" charset="utf-8"></script>
<script src="/Public/js/jquery.min.js" charset="utf-8"></script>
<script src="/Public/js/commom.js" charset="utf-8"></script>
<script src="/Public/js/dialog.js"></script>
<script>

var SCOPE = {
  'jump_url' : '/admin.php?c=details',
  'post_url' : '/admin.php?c=details&a=add',
  'add_url' : '/admin.php?c=details&a=indexadd',
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