
const logMsg = document.getElementById("logMsg");
let userData = JSON.parse(localStorage.getItem("userData")) || [];//getting local storage data
let email;
let pass;
let username;
userData.map(profile => {
	email = profile.email;
	pass = profile.pass;
	username = profile.username;
	return logMsg.innerHTML = `<p>${username}</p>`;
 });