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
  <legend><a href="#" onclick="jump()" style="color:#009688">领料管理</a>>>修改领料单</legend>
</fieldset>      
<form class="layui-form" style="margin-top: 50px; font-size: 17px;" id="addform" action="">
<div style="width:  500px;margin-left: 34%;">
  <div class="layui-form-item">
    <label class="layui-form-label">申请单号</label>
    <div class="layui-input-block" style="width:300px;">
      <input type="text" name="" placeholder="必填" autocomplete="off" class="layui-input layui-disabled" value="<?php echo ($lists["l_lcode"]); ?>" disabled>
    </div>
    <input type="hidden" name="list_code" value="<?php echo ($lists["l_lcode"]); ?>">
  </div>
  <div class="layui-form-item">
    <label class="layui-form-label">物料名称</label>
    <div class="layui-input-block" style="width:300px;">
      <input type="text" name="" placeholder="必填" autocomplete="off" class="layui-input layui-disabled" value="<?php echo ($lists["l_name"]); ?>" disabled>
    </div>
    <input type="hidden" name="details_name" value="<?php echo ($lists["l_name"]); ?>">
  </div>
  <div class="layui-form-item">
    <label class="layui-form-label">规格型号</label>
    <div class="layui-input-block" style="width:300px;">
      <input type="text" name="" placeholder="必填" autocomplete="off" class="layui-input layui-disabled" value="<?php echo ($lists["l_type"]); ?>" disabled>
    </div>
    <input type="hidden" name="details_type" value="<?php echo ($lists["l_type"]); ?>">
  </div>
  <div class="layui-form-item">
    <label class="layui-form-label">牙色</label>
    <div class="layui-input-block" style="width:300px;">
      <input type="text" name="" placeholder="必填" autocomplete="off" class="layui-input layui-disabled" value="<?php echo ($lists["l_color"]); ?>" disabled>
    </div>
    <input type="hidden" name="details_color" value="<?php echo ($lists["l_color"]); ?>">
  </div>
  <div class="layui-form-item">
    <label class="layui-form-label">单位</label>
    <div class="layui-input-block" style="width:300px;">
      <input type="text" name="" placeholder="必填" autocomplete="off" class="layui-input layui-disabled" value="<?php echo ($lists["l_unit"]); ?>" disabled>
    </div>
    <input type="hidden" name="details_unit" value="<?php echo ($lists["l_unit"]); ?>">
  </div>
  <div class="layui-form-item">
    <label class="layui-form-label">领用数量</label>
    <div class="layui-input-block" style="width:300px;">
      <input type="text" name="list_num" placeholder="必填" autocomplete="off" class="layui-input" value="<?php echo ($lists["l_num"]); ?>" >
    </div>
  </div>
  <div class="layui-form-item">
    <label class="layui-form-label">申请人</label>
    <div class="layui-input-block" style="width:300px;">
      <input type="text"  id="pname" name="lproposer" value="<?php echo ($l["proposer"]); ?>" class="layui-input layui-disabled" disabled>
      <input type="hidden"  id="pname" name="l_proposer" value="<?php echo ($l["proposer"]); ?>" class="layui-input">
    </div>
  </div>
  <input type="hidden" name="details_id" value="<?php echo ($details["details_id"]); ?>" />
  <div class="layui-form-item">
    <div class="layui-input-block">
       <button class="layui-btn" lay-submit lay-filter="formDemo" onclick="toadd()">修改</button>
      <button type="reset" class="layui-btn layui-btn-primary" onclick="jump()">取消</button>
    </div>
  </div>
  </div>
</form>
<script src="/layui/layui.js" charset="utf-8"></script>
<script src="/Public/js/jquery.min.js" charset="utf-8"></script>
<script src="/Public/js/commom.js" charset="utf-8"></script>
<script src="/Public/js/dialog.js"></script>
<script>
var str = $('#pname').val();
var SCOPE = {
  'jump_url' : '/admin.php?c=list&name=' + str,
  'post_url' : '/admin.php?c=list&a=listupdate',
  'add_url' : '/admin.php?c=list&a=edit',
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