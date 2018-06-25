<?php
namespace Admin\Controller;
use Think\Controller;

/**
 * 物料管理模块
 */

class DetailsController extends Controller{

	public function index(){
		$list = D('Details')->getDetails();
		$this->assign('details',$list);
		$this->display('detailsmanagement');
	}

	public function indexadd(){
		$this->display('detailsadd');
	}

    public function indexnumadd(){
        $arr = D('Details');
        $listname = $arr->getDetailsDistinctname();
        $listtype = $arr->getDetailsDistincttype();
        $listcolor = $arr->getDetailsDistinctcolor();
        $listunit = $arr->getDetailsDistinctunit();
        $this->assign('detailsname',$listname);
        $this->assign('detailstype',$listtype);
        $this->assign('detailscolor',$listcolor);
        $this->assign('detailsunit',$listunit);
        $this->display('detailsnumadd');
    }
	public function add(){
		if($_POST){
            $arr = D('Details');
            $d_code = $_POST['details_code'];
            $d_name = $_POST['details_name'];
            $d_type = $_POST['details_type'];
            $d_color = $_POST['details_color'];
            $d_unit = $_POST['details_unit'];
    		//变量不存在或者变量的值为空
    		if(!trim($d_name) || !trim($d_code) || !trim($d_type) || !trim($d_color) || !trim($d_unit)){
    			return show(0,'信息填写不完整！');
    		}
            if(strlen($_POST['details_name'])>30){
                return show(0,'物料名称超出规定长度！');
            }
            //修改时跳转到save函数
            if($_POST['details_id']){
                return $this->save($_POST);
            }
            //判断编码是否重复
            $key1 = $arr->getDetailsByCode($d_code);
            if($key1){
            	return show(0,'编码已存在！',$key1);
            }
            //判断物料是否重复
            $key2 = $arr->getDetailsLimit($d_name,$d_type,$d_color,$d_unit);
            if($key2){
                return show(0,'物料已存在！',$key2);
            }
    		//返回主键ID
    		$detailsid=$arr->insert($_POST);
    		if($detailsid){
    			return show(1,'添加成功！',$detailsid);
    		}else{
    			return show(0,'添加失败!',$detailsid);
    		}
    	}else{
    		$this->display('detailsadd');
    	}
	}

	//更新
    public function save($data){
        $id = $data['details_id'];
        $d_code = $_POST['details_code'];
        $d_name = $_POST['details_name'];
        $d_type = $_POST['details_type'];
        $d_color = $_POST['details_color'];
        $d_unit = $_POST['details_unit'];  
        $arr=D('Details'); 
        try{
            $k =$arr->getDetailsById($id);
            if($k['d_name'] == $data['details_name']&&
               $k['d_type'] == $data['details_type']&&
               $k['d_color'] == $data['details_color']&&
               $k['d_unit'] == $data['details_unit'])
            {
                $key = D('Details')->saveById($id,$data);
                
            }else{
            //判断物料是否重复
                $key2 = $arr->getDetailsLimit($d_name,$d_type,$d_color,$d_unit);
                if($key2){
                return show(0,'物料已存在！',$key2);
                }
                $key = D('Details')->saveById($id,$data);
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

	//编辑
    public function edit(){
        $detailsid = $_GET['id'];
        $details = D('Details')->getDetailsById($detailsid);
        $this->assign('details',$details);
        $this->display('detailsedit');
    }
	//删除
    public function delete(){
        $id = $_POST['id'];
        try{
            $key = D('Details')->deleteById($id);
            if($key == false){
                return show(0,'删除失败!');
            }
           return show(1,'删除成功!');
        }
        catch(Exception $e){
            return show(0,$e->getMessage());
        }
    }
    //库存更新
    public function numUpdata(){
        if($_POST){
            $arr = D('Details');
            $d_name = $_POST['details_name'];
            $d_type = $_POST['details_type'];
            $d_color = $_POST['details_color'];
            $d_unit = $_POST['details_unit'];
            $d_num = $_POST['details_num'];
            //变量的值为空
            if(!trim($d_name) || !trim($d_num) || !trim($d_type) || !trim($d_color) || !trim($d_unit)){
                return show(0,'信息填写不完整！');
            }
            //数量是否为数字
            if(!is_numeric($d_num)){
                return show(0,'入库数量请填写数字！');
            }
            if($d_num <= 0){
                return show(0,'入库数量要大于零！');
            }
            //判断物料是否存在
            $key2 = $arr->getDetailsLimit($d_name,$d_type,$d_color,$d_unit);
            if(!$key2){
                return show(0,'物料不存在！',$key2);
            }
            //返回主键ID
            $detailsid=$arr->updateDetails($d_name,$d_type,$d_color,$d_unit,$d_num);
            if($detailsid){
                return show(1,'入库成功！',$detailsid);
            }else{
                return show(0,'入库失败!',$detailsid);
            }
        }else{
            $this->display('detailsadd');
        }
    }

}