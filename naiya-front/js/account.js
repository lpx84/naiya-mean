$.bt_validate.method("pass_eq",function(a){return($("#newPassword").val()==$("#confirmNewPassword").val())},"两次输入的密码不一致");$("#changePassword").bt_validate();$(document).ready(function(){$("#changeSubmit").click(function(){if(checkChangeForm()&&checkAuthCode()){$.ajax({type:"POST",url:"/instant/account/changePassword",dataType:"json",data:$("#changePassword").serialize(),success:function(a){if(a.code==1){alert("密码修改成功");window.location.href="/home"}else{$("#changeAuthCode").attr("src","/account/login/authcode/"+Math.random());$(".errorNotice").text(a.msg).css("visibility","visible")}}})}return false});$("#refreshAuthCode,#changeAuthCode").click(function(a){a.preventDefault();$("#changeAuthCode").attr("src","/account/login/authcode/"+Math.random())})});function checkAuthCode(){var a=$.trim($("#authCode").val());var b=/^[0-9a-zA-Z]{4,6}$/;if(a!=""&&b.test(a)){$(".authError").empty().hide();return true}else{$(".authError").text("验证码错误").show();return false}}function checkChangeForm(){$.bt_validate.result=true;$.bt_validate.form.find("input[validate],select[validate],textarea[validate]").trigger("blur");if($.bt_validate.blocked){return false}return $.bt_validate.result};