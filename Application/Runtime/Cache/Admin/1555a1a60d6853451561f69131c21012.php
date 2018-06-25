<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>仓库管理</title>
  <meta name="renderer" content="webkit">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <link rel="stylesheet" href="/bootstrap-3.3.7-dist/css/bootstrap.min.css" type="text/css" />
  <link rel="stylesheet" href="/layui/css/layui.css"  media="all">
</head>
<style type="text/css">
  .box{
    border: 1px red solid;
  }
  .empty{
    position: absolute;
    top: 270px;
    left: 43%;
  }
  .move{
    margin-left:0!important;
  }
</style>
<body>  
<div style="margin-bottom: -15px; overflow:hidden;">           
<fieldset class="layui-elem-field layui-field-title" style="margin-top: 50px;"><legend>领料审批</legend></fieldset> 
 </div>
<input type="hidden" id="cname" value="<?php echo ($l["check"]); ?>">
<table  class="layui-table warehouse-table" lay-size="lg">
<colgroup>
    <col width="80px">
    <col width="150px">
    <col width="150px">
    <col width="280px">
    <col width="170px">
  <thead>
    <tr>
      <th>序号</th>
      <th>领料单号</th>
      <th>物料编码</th>
      <th>名称</th>
      <th>规格型号</th>
      <th>牙色</th>
      <th>单位</th>
      <th>出库数量</th>
      <th>申请人</th>
      <th>审批人</th>
      <th>审批状态</th>
      <th>操作</th>
    </tr>
  </thead>
  <tbody>
    <?php if(is_array($lists)): $k = 0; $__LIST__ = $lists;if( count($__LIST__)==0 ) : echo "$empty" ;else: foreach($__LIST__ as $key=>$list): $mod = ($k % 2 );++$k;?><tr>
        <td><?php echo ($k); ?></td>
        <td><?php echo ($list["l_lcode"]); ?></td>
        <td><?php echo ($list["l_dcode"]); ?></td>
        <td><?php echo ($list["l_name"]); ?></td>
        <td><?php echo ($list["l_type"]); ?></td>
        <td><?php echo ($list["l_color"]); ?></td>
        <td><?php echo ($list["l_unit"]); ?></td>
        <td><?php echo ($list["l_num"]); ?></td>
        <td><?php echo ($list["l_proposer"]); ?></td>
        <td><?php echo ($list["l_check"]); ?></td>
        <td><?php echo (getL_State($list["l_state"])); ?></td>
        <td style="text-align:center;"><button class="layui-btn layui-btn-sm layui-btn-radius layui-btn-danger" attr-id="<?php echo ($list["l_lcode"]); ?>" attr-num="<?php echo ($list["l_num"]); ?>" attr-dcode="<?php echo ($list["l_dcode"]); ?>" id="list-check" onclick="tocheck(this)" <?php if($list["l_state"] == 1): ?>style="display:none"<?php endif; ?>>审核</button><button class="layui-btn layui-btn-sm layui-btn-radius layui-btn-warm move" attr-id="<?php echo ($list["l_lcode"]); ?>" attr-num="<?php echo ($list["l_num"]); ?>" attr-dcode="<?php echo ($list["l_dcode"]); ?>" id="list-check" onclick="toback(this)" <?php if($list["l_state"] == 0): ?>style="display:none"<?php endif; ?>>退库</button></td>                 
      </tr><?php endforeach; endif; else: echo "$empty" ;endif; ?>

  </tbody>
</table>     
          
<script src="/layui/layui.js" charset="utf-8"></script>
<script src="/Public/js/jquery.min.js" charset="utf-8"></script>
<script src="/bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
<script src="/Public/js/commom.js"></script>
<script src="/Public/js/dialog.js"></script>

<script>
  
  var str = $('#cname').val();
  var SCOPE = {
    'back_url' : '/admin.php?c=list&a=back' ,
    'check_url' : '/admin.php?c=list&a=check&name=' + str ,
    'jump_url' : '/admin.php?c=list&a=indexcheck&name=' + str
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