
const inputs = document.querySelector("input");
const username = document.getElementById("username");
const fullname = document.getElementById("fullname");
const saveDataBtn = document.getElementById("signup");
const pass = document.getElementById("password");
const pass2 = document.getElementById("password_rep");
const email = document.getElementById("email");
let userData = JSON.parse(localStorage.getItem("userData")) || [];
const reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;

inputs.addEventListener("keyup", () => {
  saveDataBtn.disabled = !inputs.value;
});

saveData = e => {
  e.preventDefault();
  if(!email.value || !pass.value){
    alert ("Please input an email and Password!");
    return false;
  }
  if(reg.test(email.value) == false){
    alert ("Please enter valid email!");
    return false;
  }
  if(pass.value == pass2.value){
  const profile = {
    pass: pass.value,
    email: email.value,
    username: username.value
  };

  userData.push(profile);
  localStorage.setItem("userData", JSON.stringify(userData));
  alert ("signup successfully!");
  window.location.assign("login.html");
}else{

alert ("Password not match!");
    return false;
  }
};


// login script
let name_log;
let username_log;
let email_log;
let pass_log;
let attempt = 3; // Variable to count number of attempts.
userProfile = () => { userData.map(profile => {
  user_name = profile.username;
  email_log = profile.email;
  pass_log = profile.pass;
  return;
 });
};

// Below function Executes on click of login button.
validate = e => {
e.preventDefault();
const username_log = document.getElementById("email_log").value;
const password_log = document.getElementById("password_log").value;
userProfile();
 if(!username){
    alert ("Please input an email and Password!");
    return false;
  }
  if ( username_log == email_log && password_log == pass_log){
  alert ("Login successfully "+user_name);
  window.location.assign("dashboard.html"); // Redirecting to other page.
}
else{
const error = document.getElementById('errorLog');
attempt --;// Decrementing by one.
error.innerHTML = `<p style="color:red;font-size:.8em;">Wrong login detailes entered! <br>You have ${attempt} attempt left!</p>`;

// Disabling fields after 3 attempts.
if( attempt == 0){
  username_log.disabled = true;
  password_log.disabled = true;
  document.getElementById("submit").disabled = true;
  return false;
    }
  }
};