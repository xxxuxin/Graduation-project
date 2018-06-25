<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>travel——让心灵一起跟随 登录</title>
    <link rel="stylesheet" href="../css/travel_show.css" />
    <script type="text/javascript" src="../js/jquery-1.11.3.js"></script>
    <script type="text/javascript" src="../js/travel_show.js"></script>
    <script src="../js/jquery-1.11.3.js"></script>
</head>
<?php
//插入连接数据库的相关信息
require_once "../controllers/connect.php";
//开启一个seesion会话
session_start();
//若用户未登录则跳转至登录页面
//$_SESSION['username']不存在，则说明用户未登录
if(!isset($_SESSION['username'])){
    $home_url = 'index_denglu.php';
    header('Location: '.$home_url);
}
?>
<body>
<div class="nav" align="center">
    <ul>
        <li><a href="index.php">首页</a></li>
        <li><a href="travel_commend.php">旅游景点</a></li>
        <li><a href="demand.php">寻找旅友</a></li>
        <li><a href="story_push.php">游记分享</a></li>
        <li><a href="my.php">个人中心</a></li>
    </ul>
</div>
<div align="center"><img src="../image/toppic.jpg" width="100%">
</div>

<?php
//模糊搜索功能，若其中一个字段已选择，则
if(!empty($_POST["area"])||!empty($_POST["style"])||!empty($_POST["day"])){
    //echo "hello world";
    /*echo $_POST["area"];
    echo $_POST["style"];
    echo $_POST["day"];*/

    $sql = "SELECT * FROM `travel_info` WHERE ";
    $s = "";
    //创建一个数组用来存放字段名
    $col = array("area","style","day");
    //循环遍历各个字段名
    foreach($col as $value){
        //判断该字段的数据是否通过表单发送过来,若存在，则拼凑sql语句
        if(!empty($_POST["$value"])){     //当该字段表单存在时
            $s .= "$value in(";
            $s .= "'".$_POST["$value"]."'";     //$_POST[]为ajax发过来的一个字符串形式的数组，每个元素之间用逗号相隔
            $s = rtrim($s,",");     //去除最后一个逗号
            $s .= ") and ";
        }
    }
    $sql .= $s;     //sql语句连接
    $sql = rtrim($sql,"and ");//删除$sql最后的一个and
}
//否则，展示全部
else{
    $sql = "SELECT * FROM `travel_info` WHERE 1";
}

//echo $sql;
    //查询数据库
    $res = mysqli_query($link,$sql);    //$res为查询的结果集
    $num_rows = mysqli_num_rows($res);  //统计查询结果条数

//若查到，则打印列表
if($num_rows!=0){
    while($row = mysqli_fetch_array($res)){
        //查询该景点是否在用户的收藏表中
        $sql2 = " select * from favo_info where username='".$_SESSION['username']."' AND placename='".$row['placename']."'";
        $res2 = mysqli_query($link,$sql2);
        $num_rows2 = mysqli_num_rows($res2);  //统计查询结果条数
        echo "<div class=\'main\'>";
        echo "<table  class='altrowstable' id='alternatecolor'><tr></tr>";
        echo "<tr><td><div class=\'list\'>";
        echo "<div class=\'image\'><img src='".$row['image']."'></div>";
        echo "<div class=\'list_intro\'>";
        echo "<div class=\'placename\'>".$row['placename']."</div>";
        echo "<div class=\'loveButton\'>";
        //如果用户已收藏该景点,num_row2为收藏表结果集
            if($num_rows2){
             //取消收藏按钮
                echo "<div class=\"love\">";
                echo "<button type=\"button\" class=\"del_btn\" placename=\"".$row['placename']."\">取消收藏</button>";
                echo "</div>";
            }
            //若未收藏，则打印加入收藏按钮
            else{
                echo "<div class=\"love\">";
                echo "<button type=\"button\" class=\"love_btn\" placename=\"".$row['placename']."\">加入收藏</button>";
                echo "</div>";
            }
        echo "</div>";
        echo "<div class=\'keyword\'><ul>";
        echo "<li><div class=\'scence_area\'><p>".$row['area']."</p></div></li>";
        echo "<li><div class=\'scence_day\'><p>".$row['day']."</p></div></li>";
        echo "<li><div class=\'scence_style\'><p>".$row['style']."</p></div></li>";
        echo "</ul></div>";
        echo "<div class=\'introduction\'><p>".$row['introduction']."</p></div>";
        echo "</div></div></td></tr></table></div>";
    }
}
else{
    echo "<div class=\'tip\'>";
    echo "没有符合要求的数据！";
    echo "</div>";
}
 ?>


