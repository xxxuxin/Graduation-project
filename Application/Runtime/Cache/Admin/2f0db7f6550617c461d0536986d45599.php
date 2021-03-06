<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>layui</title>
  <meta name="renderer" content="webkit">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <link rel="stylesheet" type="text/css" href="/Public/css/table.css">
  <link rel="stylesheet" href="/bootstrap-3.3.7-dist/css/bootstrap.min.css" type="text/css" />
  <link rel="stylesheet" href="/layui/css/layui.css"  media="all">

<style type="text/css">
  .empty{
    position: absolute;
    top: 239px;
    left: 43%;
  }
</style>
</head>
<body>  
<div style="height:850px; overflow:hidden;">
<div style="margin-bottom: -15px; overflow:hidden;">          
 
<fieldset class="layui-elem-field layui-field-title" style="margin-top: 50px;">
  <legend>库存查询</legend>
</fieldset> 
 </div>
<form class="layui-form" style="margin-left:20px;" action="">
    <div style="height:39px;">
      <div class="layui-col-md3 layui-col-sm3">  
        <input type="text" name="search" placeholder="请输入编码或名称搜索" autocomplete="off" class="layui-input" style="border-radius: 100px;">
      </div>
      <div class="layui-col-md9 layui-col-sm9" >
         <button class="layui-btn layui-btn-radius" style="margin-left:10px;" lay-submit lay-filter="formDemo" id="btn-add"  onclick="Dsearch()">
          <i class="layui-icon" >&#xe615;</i> 搜索
        </button> 
      </div>
    </div>
</form>

<table  class="layui-table warehouse-table" style="margin-top:20px;z-index:1000;" lay-size="lg">
  <thead>
    <tr>
      <th class="td1">序号</th>
      <th class="td2">编码</th>
      <th class="td3">名称</th>
      <th class="td4">规格型号</th>
      <th class="td5">牙色</th>
      <th class="td6">单位</th>
      <th>库存</th>
      <!-- <th>操作</th> -->
    </tr>
  </thead>
  <tbody>
    <?php if(is_array($details)): $k = 0; $__LIST__ = $details;if( count($__LIST__)==0 ) : echo "$empty" ;else: foreach($__LIST__ as $key=>$detail): $mod = ($k % 2 );++$k;?><tr>
        <td class="td1"><?php echo ($k); ?></td>
        <td class="td2"><?php echo ($detail["d_code"]); ?></td>
        <td class="td3"><?php echo ($detail["d_name"]); ?></td>
        <td class="td4"><?php echo ($detail["d_type"]); ?></td>
        <td class="td5"><?php echo ($detail["d_color"]); ?></td>
        <td class="td6"><?php echo ($detail["d_unit"]); ?></td>
        <td><?php echo ($detail["d_num"]); ?></td>
        <!-- <td><span class="glyphicon glyphicon-edit" aria-hidden="true" id="warehouse-edit" attr-id="<?php echo ($detail["details_id"]); ?>" onclick='edit(this)'></span> &nbsp; <a href="javascript:void(0)" attr-id="<?php echo ($detail["details_id"]); ?>" id="warehouse-delete"  attr-a="menu" attr-message="删除" onclick='isdelete(this)'><span class="glyphicon glyphicon-remove-circle" aria-hidden="true"></span></a></td> -->
                            
      </tr><?php endforeach; endif; else: echo "$empty" ;endif; ?>

  </tbody>
</table>     
</div>
</div>
<script src="/layui/layui.js" charset="utf-8"></script>
<script src="/Public/js/jquery.min.js" charset="utf-8"></script>
<script src="/bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
<script src="/Public/js/commom.js"></script>
<script src="/Public/js/dialog.js"></script>

<script>

  var SCOPE = {
    'search_url' : '/admin.php?c=search'
  }

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