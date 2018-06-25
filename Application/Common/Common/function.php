<?php

/**
 * 公用的方法
 */

function  show($status, $message,$data=array()) {
    $result = array(
        'status' => $status,
        'message' => $message,
        'data' => $data,
    );

    exit(json_encode($result));
}

function getU_Type($type){
	if($type == 0){
		$str= '管理员';
	}elseif ($type == 1) {
		$str = '审核员';
	}elseif ($type == 2) {
		$str = '员工';
	}else{
		$str = '';
	}
	return $str;
}

function getL_State($state){
	if($state == 0){
		$str = '未审批';
	}else{
		$str = '审批出库';
	}
	return $str;
}
