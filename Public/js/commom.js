/**
 * 公共js
 */

//添加按钮操作
function add () {
	var url = SCOPE.add_url;
	parent.frames['option'].window.location.href=url;
}
//用户信息跳转
function jump () {
	var url = SCOPE.jump_url;
	parent.frames['option'].window.location.href=url;
}
//提交form表单操作
function toadd(){
	var data = $('#addform').serializeArray();
	var postdata = {};
	$(data).each(function(i, v){
		postdata[this.name] = this.value;
	});
	console.log(postdata);
	//将获取到的数据post给服务器
	var url = SCOPE.post_url;
	var jump_url = SCOPE.jump_url;
	$.post(url,postdata,function(result){
		console.log(result.status);
        console.log(result);
		if(result.status == 0){
			//失败
			return dialog.error(result.message);
		}else if(result.status == 1){
			//成功
			return dialog.success(result.message,jump_url);
		}
	},'JSON');

}

//用户编辑
function edit(o){
	var id = $(o).attr('attr-id');
	var url = SCOPE.edit_url + '&id=' + id;
	parent.frames['option'].window.location.href=url;
}

//删除操作
function isdelete(o){
	var id = $(o).attr('attr-id');
	var num = $(o).attr('attr-num');
	var message = $(o).attr('attr-message');
	var url = SCOPE.delete_url;

	data = {};
	data['id'] = id;
	//弹窗
	if(num>0){dialog.error("该物料库存不为零，无法删除！");}
	else{
	layui.use('layer',function(){
            layer.open({
                type : 0,
		        title : '是否提交？',
		        btn: ['是', '否'],
		        icon : 3,
		        closeBtn : 2,
		        content: "是否确定"+message,
		        scrollbar: true,
                yes : function(){
                	//执行相关跳转
                    todelete(url, data);
                },
            })
        });
    }
}

function todelete(url,data){
	var jump_url = SCOPE.jump_url;
	$.post(
		url,
		data,
		function(result){
        console.log(result);
		if(result.status == 0){
			//失败
			return dialog.error(result.message);
		}else if(result.status == 1){
			//成功
			return dialog.success(result.message,jump_url);
		}
	},'JSON');
}

//审核
function tocheck(o){
	var lcode = $(o).attr('attr-id');
	var dcode = $(o).attr('attr-dcode');
	var num = $(o).attr('attr-num');
	var url = SCOPE.check_url;
	var jump_url = SCOPE.jump_url;

	data={};
	data['lcode'] = lcode;
	data['dcode'] = dcode;
	data['num'] = num;
	$.post(
		url,
		data,
		function(result){
			if(result.status == 0){
				return dialog.error(result.message);
			}else if(result.status == 1){
				return dialog.success(result.message,jump_url);
			}
		},'JSON');
}
//退库
function toback(o){
	var lcode = $(o).attr('attr-id');
	var dcode = $(o).attr('attr-dcode');
	var num = $(o).attr('attr-num');
	var url = SCOPE.back_url;
	var jump_url = SCOPE.jump_url;

	data={};
	data['lcode'] = lcode;
	data['dcode'] = dcode;
	data['num'] = num;
	$.post(
		url,
		data,
		function(result){
			if(result.status == 0){
				return dialog.error(result.message);
			}else if(result.status == 1){
				return dialog.success(result.message,jump_url);
			}
		},'JSON');
}
//搜索操作
function Dsearch(){
	
	var res = $('input[name="search"]').val();
	var url = SCOPE.search_url + '&name=' + res;
	parent.frames['option'].window.location.href=url;
}
//登录页搜索
function Dsearch1(){
	
	var res = $('input[name="search"]').val();
	var url = SCOPE.search_url + '&name=' + res;
	window.location.href=url;
}