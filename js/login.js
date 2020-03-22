function do_login()
{
 var emailLogin=$("#inputLoginEmail").val();
 var passLogin=$("#inputLoginPassword").val();
 if(emailLogin!="" && passLogin!="")
 {

  $.ajax
  ({
  type:'post',
  url:'login.php' ,
  data:{
   login:"login",
   email:emailLogin,
   password:passLogin
  },
  success:function(response) {
  if(response=="success")
  {
    window.location.href="logined.php";
  }
  else
  {
    alert("Wrong Details!");
  }
  }
  });
 }

 else
 {
  alert("Please Fill All The Details");
 }

 return false;
}