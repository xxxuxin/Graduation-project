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
  <legend><a href="#" onclick="jump()" style="color:#009688">领料管理</a>>>新增申请单</legend>
</fieldset>
<form class="layui-form" style="margin-top: 50px; font-size: 17px;" id="addform" action="">
<div style="width:  500px;margin-left: 34%;">
  <div class="layui-form-item">
    <label class="layui-form-label">申请单号</label>
    <div class="layui-input-block" style="width:300px;">
      <input type="text" name="details_code" placeholder="必填，不包含中文" autocomplete="off" class="layui-input">
    </div>
  </div>
  <div class="layui-form-item">
    <label class="layui-form-label">物料名称</label>
    <div class="layui-input-block" style="width:300px;">
        <select id="details_name" name="details_name" lay-verify="" lay-search="">
            <option value="">请选择物料</option>
            <?php if(is_array($detailsname)): $i = 0; $__LIST__ = $detailsname;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$detail): $mod = ($i % 2 );++$i;?><option value="<?php echo ($detail["d_name"]); ?>"><?php echo ($detail["d_name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
          </select>  
    </div>
  </div>
  <div class="layui-form-item">
    <label class="layui-form-label">规格型号</label>
    <div class="layui-input-block" style="width:300px;">
      <select id="details_type" name="details_type" lay-verify="" lay-search="">
            <option value="">请选择型号</option>
            <?php if(is_array($detailstype)): $i = 0; $__LIST__ = $detailstype;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$detail): $mod = ($i % 2 );++$i;?><option value="<?php echo ($detail["d_type"]); ?>"><?php echo ($detail["d_type"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
          </select> 
    </div>
  </div>
  <div class="layui-form-item">
    <label class="layui-form-label">牙色</label>
    <div class="layui-input-block" style="width:300px;">
      <select id="details_color" name="details_color" lay-verify="" lay-search="">
            <option value="">请选择牙色</option>
            <?php if(is_array($detailscolor)): $i = 0; $__LIST__ = $detailscolor;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$detail): $mod = ($i % 2 );++$i;?><option value="<?php echo ($detail["d_color"]); ?>"><?php echo ($detail["d_color"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
          </select>
    </div>
  </div>
  <div class="layui-form-item">
    <label class="layui-form-label">单位</label>
    <div class="layui-input-block" style="width:300px;">
      <select id="details_unit" name="details_unit" lay-verify="" lay-search="">
            <option value="">请选择单位</option>
            <?php if(is_array($detailsunit)): $i = 0; $__LIST__ = $detailsunit;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$detail): $mod = ($i % 2 );++$i;?><option value="<?php echo ($detail["d_unit"]); ?>"><?php echo ($detail["d_unit"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
          </select>
    </div>
  </div>
  <div class="layui-form-item">
    <label class="layui-form-label">领用数量</label>
    <div class="layui-input-block" style="width:300px;">
      <input type="text" id="details_num" name="details_num" placeholder="必填" autocomplete="off" class="layui-input">
    </div>
  </div>
  <div class="layui-form-item">
    <label class="layui-form-label">申请人</label>
    <div class="layui-input-block" style="width:300px;">
      <input type="text"  id="pname" name="lproposer" value="<?php echo ($l["proposer"]); ?>" class="layui-input layui-disabled" disabled>
      <input type="hidden"  id="pname" name="l_proposer" value="<?php echo ($l["proposer"]); ?>" class="layui-input">
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
var str = $('#pname').val();
var SCOPE = {
  'jump_url' : '/admin.php?c=list&name=' + str ,
  'post_url' : '/admin.php?c=list&a=add',
  'add_url' : '/admin.php?c=list&a=indexadd&name=' + str,
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