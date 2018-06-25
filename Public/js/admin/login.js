/*
 * 前端登录业务类
 */

var login = {
    check : function(){
        // 获取用户名和密码
        var username = $('input[name="username"]').val();
        var password = $('input[name="password"]').val();
        /*if(!username){
            dialog.error('用户名不能为空');
        }
        else if(!password){
            dialog.error('密码不能为空');
        }*/

        var url = "/index.php?m=admin&c=login&a=check";
        var data = {'username':username,'password':password};
        //执行异步请求
        $.post(url,data,function(result){
            console.log(result.data);
            console.log(result);
            if(result.status == 0) {
                return dialog.error(result.message);
            }
            if(result.status == 1){
                window.location.href='/admin.php?id='+result.data;
            }
        },'JSON');
    },

//回车事件
    loginKeyDown: function(){
        if (event.keyCode == 13){
            event.returnValue=false;
            event.cancel = true;
            form2.btn2.click();
        }
    },

    searchKeyDown: function(){
        if (event.keyCode == 13){
            event.returnValue=false;
            event.cancel = true;
            form1.btn1.click();
        }
    },

}