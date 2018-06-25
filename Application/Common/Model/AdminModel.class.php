<?php 

namespace Common\Model;
use Think\Model;
/**
* 用户管理相关数据库操作
*/
class AdminModel extends Model{
	
	private $_db = '';
	public function __construct(){
		$this->_db = M('admin');
	}
	//通过用户名获取数据库第一条信息
	public function getAdminByUsername($username){
		$ret = $this->_db->where('user_name="'.$username.'"')->find();
		return $ret;

	}
	//通过id获取数据库第一条信息
	public function getAdminById($id){
		if(!$id || !is_numeric($id)){
			return array();
		}
		$ret = $this->_db->where('user_id="'.$id.'"')->find();
		return $ret;
	}
	//获取用户表所有信息，并根据ID排序
	public function GetUsers($data,$page,$pageSize=10){
		//$offset = ($page - 1) * $pageSize;//起始位置
		$list = $this->_db->where($data)->order('user_type')->select();
		return $list;
	}
	//获取用户表信息条数
	public function GetUsersCount($data = array()){
		return $this->_db->where($data)->count();
	}
	//插入数据
	public function insert($data = array()){

		if(!$data || !is_array($data)){
			return 0;
		}
		return $this->_db->add($data);
	}
	//更新数据
	public function saveById($id,$data){
		if(!$id || !is_numeric($id)){throw_exception('ID不合法');}
		if(!$data || !is_array($data)){throw_exception('更新的数据不合法');}
		$res = $this->_db->where('user_id='.$id)->save($data);
		return $res;
	}
	//删除数据
	public function deleteById($id){
		if(!$id || !is_numeric($id)){throw_exception('ID不合法');}
		$res = $this->_db->where('user_id='.$id)->delete();
		return $res;
	}
}
