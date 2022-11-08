const searchBar = document.querySelector(".users .search input"), searchBtn = document.querySelector(".users .search button"), usersList = document.querySelector(".users .users-list");

searchBtn.onclick = ()=>{
    searchBar.classList.toggle("active");
    searchBar.focus();
    searchBtn.classList.toggle("active");
    searchBtn.focus();
}

searchBar.onkeyup = () => {
	let searchTerm = searchBar.value;
	// start Ajax
	let xhr = new XMLHttpRequest();
	xhr.open("POST", 'api/search.php', true);
	xhr.onload = () => {
		if((xhr.readyState === XMLHttpRequest.DONE) && (xhr.status === 200)){
			usersList.innerHTML = xhr.response;
		}
	}
	xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xhr.send("searchTerm="+searchTerm);
}
setInterval(() => {
    // Ajax
	let xhr = new XMLHttpRequest(); // creating XML object
	xhr.open("POST", 'api/listUser_chat.php', true);
	xhr.onload = () => {
		if((xhr.readyState === XMLHttpRequest.DONE) && (xhr.status === 200)){
			if(!searchBar.classList.contains("active")){
				usersList.innerHTML = xhr.response;
			}
		}
	}
	xhr.send();
}, 500); // cứ 500ms thì hàm sẽ chạy lại