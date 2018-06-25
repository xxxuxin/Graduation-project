<?php 

namespace Common\Model;
use Think\Model;

/**
* 领料管理相关数据库操作
*/
class ListModel extends Model
{
	private $_db = '';
	public function __construct()
	{
		$this->_db = M('list'); 
	}

	//获取所有领料单
	public function getLists(){
		$res = $this->_db->select();
		return $res;
	}
	//根据申请人获取领料单
	public function getListsByproposer($proposer){
		$res = $this->_db->where('l_proposer="'.$proposer.'"')->select();
		return $res;
	}
	//根据单号获取领料单
	public function getListsByCode($lcode){
		$res = $this->_db->where('l_lcode="'.$lcode.'"')->find();
		return $res;
	}
	//插入数据
	public function insert($data = array()){
		if(!$data || !is_array($data)){
			return 0;
		}
		$dat['l_lcode'] = $data['details_code'];
		$dat['l_name'] = $data['details_name'];
		$dat['l_type'] = $data['details_type'];
		$dat['l_color'] = $data['details_color'];
		$dat['l_unit'] = $data['details_unit'];
		$dat['l_num'] = $data['details_num'];
		$dat['l_dcode'] = $data['l_dcode'];
		$dat['l_proposer'] = $data['l_proposer'];
		return $this->_db->add($dat);
	}
	//更新出库数量
	public function updataNumBylcode($lcode,$lnum){
		$data['l_num'] = $lnum;
		$res = $this->_db->where('l_lcode='.$lcode)->save($data);
		return $res;
	}
	//删除数据
	public function deleteByLcode($id){
		$res = $this->_db->where('l_lcode='.$id)->delete();
		return $res;
	}
	//更新审批人和审批状态
	public function updataCheckByLcode($check,$lcode){
		$data['l_check'] = $check;
		if($check == ''){
			$data['l_state'] = 0;
		}else{
			$data['l_state'] = 1;
		}
		$res = $this->_db->where('l_lcode='.$lcode)->save($data);
		return $res;
	}
}