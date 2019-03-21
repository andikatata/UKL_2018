
function validasiLogin()
{
  var Username = document.getElementById('Username');
  var password = document.getElementById('password');
  if (Username.value == "" && password.value == "")
  {
    alert("Anda belum mengisi Username dan Password");
    Username.focus();
    return false;
  }
  else if (Username.value == "")
  {
    alert("Anda belum mengisi username");
    Username.focus();
    return false;
  }
  else if (password.value == "")
  {
      alert("Anda belum mengisi password");
      password.focus();
      return false;
  }
  else {
    return true;
  }

}
