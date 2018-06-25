<?php
namespace Admin\Controller;
use Think\Controller;

/**
 * 领料管理模块
 */
class ListController extends Controller{
	
	function index(){
		$proposer = $_GET['name'];
		$lists = D('List')->getListsByproposer($proposer);
		$l['proposer'] = $proposer;
		$this->assign('empty','<span class="empty">暂时没有数据！</span>');
		$this->assign('l',$l);
		$this->assign('lists',$lists);
		$this->display('listask');
	}

	function indexadd(){
		$arr = D('Details');
		$proposer = $_GET['name'];
		$l['proposer'] = $proposer;
        $listname = $arr->getDetailsDistinctname();
        $listtype = $arr->getDetailsDistincttype();
        $listcolor = $arr->getDetailsDistinctcolor();
        $listunit = $arr->getDetailsDistinctunit();
        $this->assign('l',$l);
        $this->assign('detailsname',$listname);
        $this->assign('detailstype',$listtype);
        $this->assign('detailscolor',$listcolor);
        $this->assign('detailsunit',$listunit);
		$this->display('listaskadd');
	}

	function indexcheck(){
		$lists = D('List')->getLists();
		$l['check'] = $_GET['name'];
		$this->assign('empty','<span class="empty">暂时没有数据！</span>');
		$this->assign('l',$l);
		$this->assign('lists',$lists);
		$this->display('listcheck');
	}
	public function add(){
		if($_POST){
            $arr1 = D('Details');
            $arr2 = D('List');
            $l_code = $_POST['details_code'];
            $d_name = $_POST['details_name'];
            $d_type = $_POST['details_type'];
            $d_color = $_POST['details_color'];
            $d_unit = $_POST['details_unit'];
            $d_num = $_POST['details_num'];

            //领料单号不能包含中文
            if(preg_match('/[\x{4e00}-\x{9fa5}]/u', $l_code) === 1){
                return show(0,'领料单号不能包含中文！');
            }
    		//变量不存在或者变量的值为空
    		if(!trim($d_name) || !trim($l_code) || !trim($d_type) || !trim($d_color) || !trim($d_unit) || !trim($d_num)){
    			return show(0,'信息填写不完整！');
    		}
            if($d_num <= 0){
                return show(0,'领用数量要大于零！');
            }
            //判断单号是否重复
            $key1 = $arr2->getListsByCode($l_code);
            if($key1){
            	return show(0,'单号已存在！',$key1);
            }
            //判断物料是否存在
            $key2 = $arr1->getDetailsLimit($d_name,$d_type,$d_color,$d_unit);
            if(!$key2){
                return show(0,'物料不存在！',$key2);
            }
            //数量是否为数字
            if(!is_numeric($d_num)){
                return show(0,'领用数量请填写数字！');
            }
            $_POST['l_dcode'] = $key2['d_code'];
    		//返回主键ID
    		$detailsid=$arr2->insert($_POST);
    		if($detailsid){
    			return show(1,'申请成功！',$detailsid);
    		}else{
    			return show(0,'申请失败!',$detailsid);
    		}
    	}else{
    		$this->display('detailsadd');
    	}
	}

	//编辑
    public function edit(){
        $lcode = $_GET['id'];
		$l['proposer'] = $_GET['name'];
        $lists = D('List')->getListsByCode($lcode);
        $this->assign('l',$l);
        $this->assign('lists',$lists);
        $this->display('listedit');
    }
    //领料单更新
    public function listupdate(){
        $arr = D('List');
        $lcode = $_POST['list_code'];
        $lnum = $_POST['list_num'];
        if(!is_numeric($lnum)){
            return show(0,'领用数量必须为数字！');
        }
        if($lnum <=0){
            return show(0,'领用数量必须大于零！');
        }
        $listid = $arr->updataNumBylcode($lcode,$lnum);
        if($listid){
                return show(1,'更新成功！',$listid);
            }else{
                return show(0,'更新失败!',$listid);
            }
    }
    //删除
    public function delete(){
        $lcode = $_POST['id'];
        $key = D('List')->deleteByLcode($lcode);
        if($key == false){
            return show(0,'删除失败!');
        }
        return show(1,'删除成功!');
    }
    //审核
    public function check(){
        $cname = $_GET['name'];
        $lcode = $_POST['lcode'];
        $dcode = $_POST['dcode'];
        $num = $_POST['num'];
        $arr1 = D('Details');
        $arr2 = D('List');
        $key1 = $arr1->getNumByCode($dcode);
        if($key1 <= $num){
            return show(0,'出库数量大于库存，出库失败！');
        }else{
            $key2 = $arr1->updataNum($num,$dcode);
            $key3 = $arr2->updataCheckByLcode($cname,$lcode);
            if($key2 && $key3){
                return show(1,'出库成功！');
            }
            return show(0,'出库失败！');
        }
    }
    //出库退库
    public function back(){
        $cname = '';
        $lcode = $_POST['lcode'];
        $dcode = $_POST['dcode'];
        $num = $_POST['num'];
        $arr1 = D('Details');
        $arr2 = D('List');
        $key1 = $arr1->getNumByCode($dcode);
        $key2 = $arr1->addNum($num,$dcode);
        $key3 = $arr2->updataCheckByLcode($cname,$lcode);
            if($key2 && $key3){
                return show(1,'退库成功！');
            }
            return show(0,'退库失败！');
        
    }

}