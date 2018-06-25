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
  <link rel="stylesheet" type="text/css" href="/Public/css/table.css">
</head>
<body>  
<div style="height:860px; overflow:hidden;">
<div style="margin-bottom: -15px; overflow:hidden;">          
 
<fieldset class="layui-elem-field layui-field-title" style="margin-top: 50px;">
  <legend><span class='glyphicon glyphicon-user'>&nbsp;</span>用户信息</legend>
</fieldset> 
 </div>

<div style="margin-left:20px; margin-bottom:25px;">
   <button class="layui-btn" id="btn-add" onclick="add()">
    <i class="layui-icon" >&#xe608;</i> 添加用户
  </button>
</div>
<table  class="layui-table warehouse-table" lay-size="lg">
  <thead>
    <tr>
      <th class="td1">编号</th>
      <th class="td9">用户名</th>
      <th class="td9">密码</th>
      <th class="td9">类型</th>
      <th>操作</th>
    </tr>
  </thead>
  <tbody>
    <?php if(is_array($users)): $k = 0; $__LIST__ = $users;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$user): $mod = ($k % 2 );++$k;?><tr>
        <td class="td1"><?php echo ($k); ?></td>
        <td class="td9"><?php echo ($user["user_name"]); ?></td>
        <td class="td9"><?php echo ($user["password"]); ?></td>
        <td class="td9"><?php echo (getU_Type($user["user_type"])); ?></td>
        <td><span class="glyphicon glyphicon-edit" aria-hidden="true" id="warehouse-edit" attr-id="<?php echo ($user["user_id"]); ?>" onclick='edit(this)'></span> &nbsp; <a href="javascript:void(0)" attr-id="<?php echo ($user["user_id"]); ?>" id="warehouse-delete"  attr-a="menu" attr-message="删除" onclick='isdelete(this)'><span class="glyphicon glyphicon-remove-circle" aria-hidden="true"></span></a></td>
                            
      </tr><?php endforeach; endif; else: echo "" ;endif; ?>

  </tbody>
</table>     
</div>     
<script src="/layui/layui.js" charset="utf-8"></script>
<script src="/Public/js/jquery.min.js" charset="utf-8"></script>
<script src="/bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
<script src="/Public/js/commom.js"></script>
<script src="/Public/js/dialog.js"></script>

<script>

  var SCOPE = {
    'add_url' : '/admin.php?c=user&a=indexadd',
    'edit_url' : '/admin.php?c=user&a=edit',
    'delete_url' : '/admin.php?c=user&a=delete',
    'jump_url' : '/admin.php?c=user'
  }
</script>
</body>
</html>