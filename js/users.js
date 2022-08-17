//selectors for displaying and hiding on click, users and chats
const allUsersDisplay = document.querySelector(".allusers"),
allUsersChatDisplay = document.querySelector(".allchats"),
showUser = document.querySelector(".users-chats .showUsers"),
showChats = document.querySelector(".users-chats .showChats");
//searchbar selectors
const usersSearchBar = document.querySelector(".allusers .search input"),
chatsSearchBar = document.querySelector(".allchats .search input"),
usersList = document.querySelector(".allusers .users-list"),
chatsList = document.querySelector(".allchats .users-list");


// showing and hiding users and chats code
showChats.onclick = ()=>{
	if(showUser.classList.contains("active")){
		showUser.classList.remove("active");
		showChats.classList.add("active");
		allUsersDisplay.style.display = "none";
		allUsersChatDisplay.style.display = "flex";
	}
}

showUser.onclick=()=>{
	if(showChats.classList.contains("active")){
		showChats.classList.remove("active");
		showUser.classList.add("active");
		allUsersDisplay.style.display = "flex";
		allUsersChatDisplay.style.display = "none";
	}
}



//searching for users using ajax call
usersSearchBar.onkeyup=()=>{
	let searchTerm = usersSearchBar.value;
	if(searchTerm != ""){
		usersSearchBar.classList.add('active');
	}else{
		usersSearchBar.classList.remove('active');
	}
	// Ajax code
	let xhr = new XMLHttpRequest(); //creating XML Object
	xhr.open("POST", "php/search.php", true);
	xhr.onload =()=>{ 
		if(xhr.readyState === XMLHttpRequest.DONE){
			if(xhr.status === 200){
				let data = xhr.response;
				//console.log(data);
				usersList.innerHTML = data;
			}
		}
	}
	xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xhr.send("searchTerm=" + searchTerm);
}

//searching for users' chats using ajax call
chatsSearchBar.onkeyup=()=>{
	let searchTerm =chatsSearchBar.value;
	if(searchTerm != ""){
		chatsSearchBar.classList.add('active');
	}else{
		chatsSearchBar.classList.remove('active');
	}
	// Ajax code
	let xhr = new XMLHttpRequest(); //creating XML Object
	xhr.open("POST", "php/chatsearch.php", true);
	xhr.onload =()=>{ 
		if(xhr.readyState === XMLHttpRequest.DONE){
			if(xhr.status === 200){
				let data = xhr.response;
				//console.log(data);
				chatsList.innerHTML = data;
			}
		}
	}
	xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xhr.send("searchTerm=" + searchTerm);
}

setInterval(()=>{
	// Ajax code
	let xhr = new XMLHttpRequest(); //creating XML Object
	xhr.open("GET", "php/allusers.php", true);
	xhr.onload =()=>{
		if(xhr.readyState === XMLHttpRequest.DONE){
			if(xhr.status === 200){
				let data = xhr.response;

				if(!usersSearchBar.classList.contains("active")){ //if the search box has no text inside
					usersList.innerHTML = data;
				}
				
			}
		}
	}
	xhr.send();
}, 500); // this function will run every 500ms 

setInterval(()=>{
	// Ajax code
	let xhr = new XMLHttpRequest(); //creating XML Object
	xhr.open("GET", "php/allchats.php", true);
	xhr.onload =()=>{
		if(xhr.readyState === XMLHttpRequest.DONE){
			if(xhr.status === 200){
				let data = xhr.response;

				if(!chatsSearchBar.classList.contains("active")){ //if the search box has no text inside
					chatsList.innerHTML = data;
				}
				
			}
		}
	}
	xhr.send();
}, 500); // this function will run every 500ms 