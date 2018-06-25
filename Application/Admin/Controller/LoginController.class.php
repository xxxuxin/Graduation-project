<?php
namespace Admin\Controller;
use Think\Controller;

/**
 * 登录 登出
 */
class LoginController extends Controller {

    public function index(){
        $dname = $_GET['name'];
        if(is_null($dname)){
            $list = D('Details')->getDetails();
        }else{
        $list = D('Details')->getDetailsByName($dname);
        }
        $this->assign('empty','<span class="empty">暂时没有数据！</span>');
        $this->assign('details',$list);
        $this->display();
    }

    public function check() {
        $username = $_POST['username'];
        $password = $_POST['password'];
        if(!trim($username)) {
            return show(0,'用户名不能为空');
        }else if(!trim($password)){
            return show(0,'密码不能为空');
        }

        $arr = D('Admin');
        $ret = $arr->getAdminByUsername($username);
        if(!$ret){
            return show(0,'该用户不存在！');
        }else if ($ret['password']!=$password) {
            return show(0,'密码错误！',$ret['user_id']);
        }
        session('adminUser', $ret);
        return show(1,'登陆成功！',$ret['user_id']);
}
    //退出
    public function loginout(){
        session('adminUser',null);
        redirect('../../../../index.html');
    }

}