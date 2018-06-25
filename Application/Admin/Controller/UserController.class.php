<?php
namespace Admin\Controller;
use Think\Controller;

/**
 * 用户管理模块
 */
class UserController extends Controller {

    public function index(){
        $data = array();
        /**
         * 分页显示
         */
       /* $page = $REQUEST['p'] ? $REQUEST['p'] : 1;
        $pageSize = $_REQUEST['pageSize'] ? $_REQUEST['pageSize'] : 10;*/
		$users = D('Admin')->GetUsers($data,$page,$pageSize);
       /* $usercount = D('Admin')->GetUsersCount($data);

        $res = new \Think\Page($usercount,$pageSize);
        $pageRes = $res->show();
        $this->assign('pageRes',$pageRes);*/
		$this->assign('users',$users);
		$this->display('usermanagement');

    }

    public function indexadd(){
    	$this->display('useradd');
    }

    //添加
    public function add(){
    	if($_POST){
            $arr = D('Admin');
    		//变量不存在或者变量的值为空
    		if(!isset($_POST['user_name']) || !trim($_POST['user_name'])){
    			return show(0,'用户名不能为空！');
    		}
    		if(!isset($_POST['password']) || !$_POST['password']){
    			return show(0,'密码不能为空！');
    		}
            if(strlen($_POST['user_name'])>20){
                return show(0,'用户名超出规定长度！');
            }
            //修改时跳转到save函数
            if($_POST['user_id']){
                return $this->save($_POST);
            }
            //判断用户名是否重复
            $name = $_POST['user_name'];
            $key = $arr->getAdminByUsername($name);
            if($key){
                return show(0,'用户名重复！',$key);
            }
    		//返回主键ID
    		$userid=$arr->insert($_POST);
    		if($userid){
    			return show(1,'添加成功！',$userid);
    		}else{
    			return show(0,'添加失败!',$userid);
    		}
    	}else{
    		$this->display('useradd');
    	}
    }

    //编辑
    public function edit(){
        $userid = $_GET['id'];
        $user = D('Admin')->getAdminById($userid);
        $this->assign('user',$user);
        $this->display('useredit');
    }

    public function edit2(){
        $userid = $_GET['id'];
        $user = D('Admin')->getAdminById($userid);
        $this->assign('user',$user);
        $this->display('useredit2');
    }

    //更新
    public function save($data){
        $id = $data['user_id'];
        try{
            $k = D('Admin')->getAdminById($id);
            if($k['user_name'] == $data['user_name'])
            {
                $key = D('Admin')->saveById($id,$data);
                
            }else{
            //判断用户名是否重复
            $name = $_POST['user_name'];
            $ke = D('Admin')->getAdminByUsername($name);
            if($ke){
                return show(0,'用户名重复！',$ke);
            }else{
                $key = D('Admin')->saveById($id,$data);
            }
        }
        if($key == false){
                    return show(0,'更新失败!');
                }
                return show(1,'更新成功!');
        }
        catch(Exception $e){
            return show(0,$e->getMessage());
        }
    }

    //删除
    public function delete(){
        $id = $_POST['id'];
        unset($_POST['id']);
        try{
            $key = D('Admin')->deleteById($id);
            if($key == false){
                return show(0,'删除失败!');
            }
           return show(1,'删除成功!');
        }
        catch(Exception $e){
            return show(0,$e->getMessage());
        }
    }
}