<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html lang="en">
<head>
  <meta http-equiv="content-type" content="text/html; charset=utf-8" >
  <title>义齿仓库管理平台</title>
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link rel="stylesheet" href="/bootstrap-3.3.7-dist/css/bootstrap.min.css" type="text/css" />
  <link rel="stylesheet" href="/layui/css/layui.css">
  <link rel="stylesheet" href="/Public/css/index.css" type="text/css" />

  <!-- 让低版本的浏览器兼容html5的写法，兼容响应式布局-->
<!--[if lt IE 9]>
  <script src="https://cdn.bootcss.com/html5shiv/3.7.3/hyml5shiv.min.js"></script>
  <script src="https://cdn.bootcss.com/respond.js/1.4.2/hyml5shiv.min.js"></script>
<![endif]-->

<style type="text/css">
  .empty{
    position: absolute;
    top: 115px;
    left: 43%;
  }
</style>
</head>
<body>
<div class="bg">
  <div class="header">
    <span class="header-text">雅洁义齿仓库管理平台</span>
  </div>
    <div class="main">
      <div class="main-left col-lg-8 col-md-8 col-sm-8 ">
        <div class="main-search">
          <div class="input-group ">
              <form class="form-inline" name="form1" method="post">
                <div class="form-group">
                  <label class="main-search-text">输入名称进行查找库存</label>
                </div>
                <div class="form-group">
                  <input type="text" class="form-control" name="search"  placeholder="请输入编码或名称" onkeydown="login.searchKeyDown()">
                </div>
                <button type="button" class="btn btn-default" name="btn1" onclick="Dsearch1()">Go!</button>
              </form>
          </div>
        </div>
          <div class="form-list">
            <table class="table table-striped table-hover">
            <thead>
              <tr>
                <th>编码</th>
                <th>名称</th>
                <th>规格型号</th>
                <th>牙色</th>
                <th>单位</th>
                <th>库存</th>
              </tr>
            </thead>
            <tbody>
              <?php if(is_array($details)): $i = 0; $__LIST__ = $details;if( count($__LIST__)==0 ) : echo "$empty" ;else: foreach($__LIST__ as $key=>$detail): $mod = ($i % 2 );++$i;?><tr>
                  <td><?php echo ($detail["d_code"]); ?></td>
                  <td><?php echo ($detail["d_name"]); ?></td>
                  <td><?php echo ($detail["d_type"]); ?></td>
                  <td><?php echo ($detail["d_color"]); ?></td>
                  <td><?php echo ($detail["d_unit"]); ?></td>
                  <td><?php echo ($detail["d_num"]); ?></td>                    
                </tr><?php endforeach; endif; else: echo "$empty" ;endif; ?>
            </tbody>
            </table>
          </div>
      </div>
      <div class="main-right col-lg-4 col-md-4 col-sm-4 ">
          <div class="htext2"><span>后台登录</span></div>
          <form class="form-horizontal main-right1" name="form2" method="post">
          <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">用户名</label>
            <div class="col-sm-10">
              <input type="text" name="username" class="form-control radius" placeholder="用户名..." onkeydown="login.loginKeyDown()">
            </div>
          </div>
          <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label">密码</label>
            <div class="col-sm-10">
              <input type="password" name="password" class="form-control radius" id="inputPassword3" placeholder="密码..." onkeydown="login.loginKeyDown()">
            </div>
          </div>
          <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
              <button type="button" class="btn btn-default btn-define radius" name="btn2" onclick="login.check()">登录</button>
            </div>
          </div>
        </form>
        <div><img src="/Public/images/login.gif" alt="义齿仓库管理平台"></div>
      </div>   
    </div>
</div>

<script src="/Public/js/jquery.min.js"></script>
<script src="/bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
<script src="./layui/layui.js"></script>
<script src="/Public/js/dialog.js"></script>
<script src="/Public/js/admin/login.js"></script>
<script src="/Public/js/commom.js"></script>

<script>

  var SCOPE = {
    'search_url' : '/admin.php?c=login'
  }

</script>

</body>
</html>