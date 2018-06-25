<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <link rel="shortcut icon" href="/Public/images/icon.png" type="image/x-icon">
  <title>仓库管理</title>
  <link rel="stylesheet" href="/layui/css/layui.css">

</head>
<body class="layui-layout-body">
<!-- 让IE8/9支持媒体查询，从而兼容栅格 -->
<!--[if lt IE 9]>
  <script src="https://cdn.staticfile.org/html5shiv/r29/html5.min.js"></script>
  <script src="https://cdn.staticfile.org/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
<div class="layui-layout layui-layout-admin">
  <div class="layui-header">
    <div class="layui-logo">仓库管理系统</div>
    <!-- 头部区域（可配合layui已有的水平导航） -->
    
    <ul class="layui-nav layui-layout-right">
      <li class="layui-nav-item">
        <a href="javascript:;">
          <span style="color:#009688;font-size:20px">欢迎用户：</span><?php echo ($user["user_name"]); ?>
        </a>
        <dl class="layui-nav-child">
          <dd><a href="javascript:void(0)" attr-id="<?php echo ($user["user_id"]); ?>" onclick='edit(this)'>基本资料</a></dd>
          <dd><a href="/admin.php?m=admin&c=login&a=loginout">安全退出</a></dd>
        </dl>
      </li>
      
    </ul>
  </div>
  
  <div class="layui-side layui-bg-black">
    <div class="layui-side-scroll">
      <!-- 左侧导航区域（可配合layui已有的垂直导航） -->
      <ul class="layui-nav layui-nav-tree"  lay-filter="test">
        <li class="layui-nav-item layui-nav-item">
          <a class="" href="javascript:;">物料管理</a>
          <dl class="layui-nav-child">
            <dd><a href="/admin.php?c=details" target="option">物料定义</a></dd>
            <dd><a href="/admin.php?c=details&a=indexnumadd" target="option">入库管理</a></dd>
            <!-- <dd><a href="javascript:;">退库管理</a></dd> -->
          </dl>
        </li>
        <li class="layui-nav-item">
          <a href="javascript:;">领料管理</a>
          <dl class="layui-nav-child">
            <dd><a href="/admin.php?c=list&name=<?php echo ($user["user_name"]); ?>" target="option">领料申请</a></dd>
            <dd><a href="/admin.php?c=list&a=indexcheck&name=<?php echo ($user["user_name"]); ?>" target="option">领料审批</a></dd>
          </dl>
        </li>
        <li class="layui-nav-item"><a href="/admin.php?c=search" target="option">库存查询</a></li>
        <li class="layui-nav-item"><a href="/admin.php?c=user" target="option">用户管理</a></li>
      </ul>
    </div>
  </div>
  
  <div class="layui-body">
    <!-- 内容主体区域 -->
    <iframe src="/admin.php?c=search" id="mainframe" name="option" width="100%" height="99%"></iframe>
  </div>
  
  <div class="layui-footer">
    <!-- 底部固定区域 -->
    © 雅洁义齿公司欢迎您！
  </div>
</div>
<script src="/layui/layui.js" charset="utf-8"></script>
<script src="/Public/js/jquery.min.js" charset="utf-8"></script>
<script src="/bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
<script src="/Public/js/commom.js"></script>
<script src="/Public/js/dialog.js"></script>
<script>
//JavaScript代码区域
var SCOPE = {
'edit_url' : '/admin.php?c=user&a=edit',
}
layui.use('element', function(){
  var element = layui.element;
  
});

layui.use('form', function(){
  var form = layui.form;
  
  form.render();
});
</script>
</body>
</html>