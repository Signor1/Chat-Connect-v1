//code for showing and hiding password
const pswrdField = document.querySelector('.form .field input[type="password"]'),
toggleShow = document.querySelector('.form .field i.ri-eye-line'),
toggleClose = document.querySelector('.form .field i.ri-eye-off-line');

toggleShow.onclick = ()=>{
	if(pswrdField.type == "password"){
		pswrdField.type = "text";
		toggleShow.style.display = "none";
		toggleClose.style.display = "flex";
	}
}

toggleClose.onclick = ()=>{
	if(pswrdField.type == "text"){
		pswrdField.type = "password";
		toggleClose.style.display = "none";
		toggleShow.style.display = "flex";
	}
}
