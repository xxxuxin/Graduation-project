<?php
namespace Admin\Controller;
use Think\Controller;

/**
 * 后台库存查询
 */
class SearchController extends Controller {

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
}