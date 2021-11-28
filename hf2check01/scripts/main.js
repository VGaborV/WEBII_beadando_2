function validateForm() {
  var name =  document.getElementById('name').value;
  if (name == "") {
    document.querySelector('.status').innerHTML = "Név nem lehet üres";
    return false;
  }
  var email =  document.getElementById('email').value;
  if (email == "") {
    document.querySelector('.status').innerHTML = "Email nem lehet üres";
    return false;
  } else {
    var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    if(!re.test(email)){
      document.querySelector('.status').innerHTML = "Email hibás formátumú";
      return false;
    }
  }
  var subject =  document.getElementById('subject').value;
  if (subject == "") {
    document.querySelector('.status').innerHTML = "Tárgy nem lehet üres";
    return false;
  }
  var message =  document.getElementById('message').value;
  if (message == "") {
    document.querySelector('.status').innerHTML = "Üzenet nem lehet üres";
    return false;
  }
  document.querySelector('.status').innerHTML = "";
  return true;
}