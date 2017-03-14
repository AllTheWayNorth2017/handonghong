/**
 * Created by jx on 2017/3/12.
 */
/**
 * 前端登录业务类
 * @author singwa
 */
var login = {
    check : function() {
        // 获取登录页面中的用户名 和 密码
        var username = $('input[name="username"]').val();
        var password = $('input[name="password"]').val();

        if(!username) {
            dialog.error('用户名不能为空');
        }
        if(!password) {
            dialog.error('密码不能为空');
        }

        var url = "http://localhost/mvc/home/login/check";
        var data = {'username':username,'password':password};
        // 执行异步请求  $.post
        $.post(url,data,function(result){
            if(result.status == 400) {
                return dialog.error(result.message);
            }
            if(result.status == 200) {
                return dialog.success(result.message, result.data.url);
            }

        },'JSON');

    }
}