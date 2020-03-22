function do_forgot()
{
 var emailForgot=$("#inputForgotEmail").val();
 if(emailForgot!="")
 {

  $.ajax
  ({
  type:'post',
  url:'forgot_password.php' ,
  data:{
   forgot:"forgot",
   email:emailForgot
  },
  success:function(response) {
  if(response=="success")
  {
    alert("The password is sent to you on your registered mail!");
  }
  else if(response=="does_not_exists")
  {
    alert("This email doesn't exist!");
  }
  else if(response=="not_sent"){
      alert("Mail not sent!");
  }
  else{ alert(response);}
  }
  });
 }

 else
 {
  alert("Please Fill All The Details");
 }

 return false;
}