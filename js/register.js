function do_register()
{
 var name=$("#inputName").val();
 var email1=$("#inputEmail").val();
 var pass1=$("#inputPassword").val();

 if(name!="" && email1!="" && pass1!="")
 {
  $.ajax
  ({
  type:'post',
  url:'register.php',
  data:{
   register:"register",
   name:name,
   email:email1,
   password:pass1
  },
  success:function(response) {
  if(response=="success")
  {
    alert("Registered successfully !");
  }
 
  else if(response=="name")
  {
    alert("Invalid name (with numbers/special characters) !");
  }
  else if(response=="email")
  {
    alert("Invalid email or password !");
  }
  else if(response=="emailexists")
  {
    alert("This email already exists !");
  }
  else
  {
    alert("Registered successfully !");
  }
  }
  });
 }

 else
 {
  alert("Fill all the details !");
 }

 return false;
}