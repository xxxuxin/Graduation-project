<?php
namespace Admin\Controller;
use Think\Controller;

/**
 * 后台首页相关
 */
class IndexController extends Controller {

    public function index(){
    	$userid = $_GET['id'];
        $user = D('Admin')->getAdminById($userid);
        if($user['user_type'] == 1){
            return $this->indexcheck($user);
        }
        if($user['user_type'] == 2){
            return $this->indexuser($user);
        }
        $this->assign('user',$user);
        $this->display();
    }

    public function indexcheck($data){
        $this->assign('user',$data);
    	$this->display('indexcheck');
    }

    public function indexuser($data){
        $this->assign('user',$data);
    	$this->display('indexuser');
    }
}