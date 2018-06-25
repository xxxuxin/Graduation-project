<?php 

namespace Common\Model;
use Think\Model;
/**
* 物料管理相关数据库操作
*/
class DetailsModel extends Model{
	
	private $_db = '';
	public function __construct(){
		$this->_db = M('details');
	}
	//查询库存，按名称排序
	public function getDetails(){
			//utf8转换成gb2312后进行中文排序
			$res = $this->_db->order('convert(d_name using gb2312) ASC')->select();
			return $res;
		}
	//查询库存按名称去重，按名称排序
	public function getDetailsDistinctname(){
			//utf8转换成gb2312后进行中文排序
			$res = $this->_db->distinct(ture)->field('d_name')->order('convert(d_name using gb2312) ASC')->select();
			return $res;
		}
	public function getDetailsDistincttype(){
			//utf8转换成gb2312后进行中文排序
			$res = $this->_db->distinct(ture)->field('d_type')->order('convert(d_type using gb2312) ASC')->select();
			return $res;
		}
	public function getDetailsDistinctcolor(){
			//utf8转换成gb2312后进行中文排序
			$res = $this->_db->distinct(ture)->field('d_color')->order('convert(d_color using gb2312) ASC')->select();
			return $res;
		}
	public function getDetailsDistinctunit(){
			//utf8转换成gb2312后进行中文排序
			$res = $this->_db->distinct(ture)->field('d_unit')->order('convert(d_unit using gb2312) ASC')->select();
			return $res;
		}
	//按照名称查询库存，支持模糊查询
	public function getDetailsByName($dname){
		$where['d_name'] = array('like','%'.$dname.'%');
		$where['d_code'] = $dname;
		$where['_logic'] = 'OR';
		$res = $this->_db->where($where)->order('convert(d_name using gb2312) ASC')->select();
		return $res;
	}
	//按照编码查询库存
	public function getDetailsByCode($dcode){
		$res = $this->_db->where('d_code="'.$dcode.'"')->find();
		return $res;
	}
	//通过id获取数据库第一条信息
	public function getDetailsById($id){
		if(!$id || !is_numeric($id)){
			return array();
		}
		$res = $this->_db->where('details_id="'.$id.'"')->find();
		return $res;
	}
	//按照限制条件查询库存
	public function getDetailsLimit($dname,$dtype,$dcolor,$dunit){
		$where['d_name'] = $dname;
		$where['d_type'] = $dtype;
		$where['d_color'] = $dcolor;
		$where['d_unit'] = $dunit;
		$res = $this->_db->where($where)->find();
		return $res;
	}
	//根据编码查找库存
	public function getNumByCode($dcode){
		$res = $this->_db->where('d_code='.$dcode)->find();
		return $res['d_num'];
	}
	//插入数据
	public function insert($data = array()){
		if(!$data || !is_array($data)){
			return 0;
		}
		$dat['d_code'] = $data['details_code'];
		$dat['d_name'] = $data['details_name'];
		$dat['d_type'] = $data['details_type'];
		$dat['d_color'] = $data['details_color'];
		$dat['d_unit'] = $data['details_unit'];
		return $this->_db->add($dat);
	}
	//更新数据
	public function saveById($id,$data){
		if(!$id || !is_numeric($id)){throw_exception('ID不合法');}
		if(!$data || !is_array($data)){throw_exception('更新的数据不合法');}
		$dat['d_code'] = $data['details_code'];
		$dat['d_name'] = $data['details_name'];
		$dat['d_type'] = $data['details_type'];
		$dat['d_color'] = $data['details_color'];
		$dat['d_unit'] = $data['details_unit'];
		$res = $this->_db->where('details_id='.$id)->save($dat);
		return $res;
	}
	//删除数据
	public function deleteById($id){
		if(!$id || !is_numeric($id)){throw_exception('ID不合法');}
		$res = $this->_db->where('details_id='.$id)->delete();
		return $res;
	}

	//入库库存更新
	public function updateDetails($dname,$dtype,$dcolor,$dunit,$dnum){
		$where['d_name'] = $dname;
		$where['d_type'] = $dtype;
		$where['d_color'] = $dcolor;
		$where['d_unit'] = $dunit;
		$num = $this->_db->where($where)->find();
		$data['d_num'] = $dnum + $num['d_num'];
		$res = $this->_db->where($where)->save($data);
		return $res;
	}
	//出库库存更新
	public function updataNum($num,$dcode){
		$dnum = $this->_db->where('d_code='.$dcode)->find();
		$data['d_num'] = $dnum['d_num'] - $num;
		$res = $this->_db->where('d_code='.$dcode)->save($data);
		return $res;
	}
	//退库库存更新
	public function addNum($num,$dcode){
		$dnum = $this->_db->where('d_code='.$dcode)->find();
		$data['d_num'] = $dnum['d_num'] + $num;
		$res = $this->_db->where('d_code='.$dcode)->save($data);
		return $res;
	}
}