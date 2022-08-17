const form = document.querySelector(".forgot form"),
continueBtn = form.querySelector(".button input"),
errorText = form.querySelector(".error-txt");

form.onsubmit =(e)=>{
	e.preventDefault(); //preventing the DOM from reloading
}

continueBtn.onclick=()=>{
	// Ajax code
	let xhr = new XMLHttpRequest(); //creating XML Object
	xhr.open("POST", "php/forgot.php", true);
	xhr.onload =()=>{
		if(xhr.readyState === XMLHttpRequest.DONE){
			if(xhr.status === 200){
				let data = xhr.response;
				
				if(data == "success"){
					location.href="login.php";
				}else{
					errorText.textContent = data;
					errorText.innerHTML = data;
					errorText.style.display = "block";
				}
			}
		}
	}
	// we have to send the form data through ajax to php 
	let formData = new FormData(form); //creating new form data object
	xhr.send(formData); //sending the form data to php
}