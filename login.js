const staffformel = document.querySelector(".main div form");
const studentformel = document.getElementById("studentlogin");
const messageboxstaff = document.getElementById("messagestaff");
const messageboxstudent = document.getElementById("messagestudent");
staffformel.addEventListener("submit", (event) => {
	event.preventDefault();
	var formdata = new FormData(staffformel);
	var username = formdata.get("username");
	var password = formdata.get("password");

	
	const xhr = new XMLHttpRequest();
	xhr.open("POST", "login.php", true);
	xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xhr.onreadystatechange = function () {
		if (xhr.readyState === 4 && xhr.status === 200) {
			const response = JSON.parse(xhr.responseText);
			if (response.success) {
				// Redirect to a success page or perform other actions.
				window.location.href = "./dashboard.html";
			} else {

				messageboxstaff.textContent = response.message;
				setTimeout(() => {messageboxstaff.style.display="none"},1000);
			}
		}
	};
	xhr.send(`username=${username}&password=${password}&submit=stafflogin`);

});
studentformel.addEventListener("submit", (event) => {
	event.preventDefault();
	var formdata = new FormData(studentformel);
	var query = new URLSearchParams(formdata).toString();
	console.log(query)
	// var regno=formdata.get("regno");

	///chatgpt

	const xhr = new XMLHttpRequest();
	xhr.open("POST", "login.php", true);
	xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xhr.onreadystatechange = function () {
		if (xhr.readyState === 4 && xhr.status === 200) {
			const response = JSON.parse(xhr.responseText);
			if (response.success) {
				// Redirect to a success page or perform other actions.
				window.location.href = "studentdashboard.html";
			} else {

				messageboxstudent.textContent = response.message;
			}
		}
	};
	xhr.send(`${query}&submit=studentlogin`);

});