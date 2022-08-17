//code for detecting internet connection and disconnection
const internetStatus = document.getElementById("status");
window.addEventListener("load", (e) => {
	setInterval(()=>{
		internetStatus.textContent = navigator.onLine ? "Online" : "OFFline";
		internetStatus.innerText = navigator.onLine ? "Online" : "OFFline";
  },200);
  
});
//time update
function showTime(){
	let currentDate = new Date();
	let h = currentDate.getHours() //0 - 23
	let m = currentDate.getMinutes()  // 0 - 59
	let session = "AM";

	if(h == 0){
		 h = 12;
	}
	if(h > 12){
		 h = h - 12;
		 session = "PM";
	}
	h = (h < 10) ? "0" + h : h;
	m = (m < 10) ? "0" + m : m;

	let time = `${h} : ${m} ${session}`;
	let clockHolder = document.getElementById("timeUpdate");
	clockHolder.innerText = time;
	clockHolder.textContent = time;

	setTimeout(showTime, 1000);
}
showTime();