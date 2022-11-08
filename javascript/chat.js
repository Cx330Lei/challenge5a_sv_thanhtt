const form = document.querySelector('.typing-area');
const inputField = form.querySelector('.input-field');
const sendBtn = form.querySelector('button');
chatBox = document.querySelector(".chat-box");

form.onsubmit = (e)=>{
    e.preventDefault(); // preventing form from submitting
}
sendBtn.onclick = ()=>{
	let xhr = new XMLHttpRequest();
	xhr.open("POST", 'api/insert_chat.php', true);
	xhr.onload = ()=>{
		if((xhr.readyState === XMLHttpRequest.DONE) && (xhr.status === 200)){
            inputField.value = ""; //nếu một tin nhắn được thêm vào database thì làm trống thanh nhập
		}
	}
    //we have to send the form data through ajax to php
    let formData = new FormData(form);
    xhr.send(formData); // sending the form data to php
}

setInterval(() => {
    // Ajax
	let xhr = new XMLHttpRequest(); // creating XML object
	xhr.open("POST", 'api/get_chat.php', true);
	xhr.onload = () => {
		if((xhr.readyState === XMLHttpRequest.DONE) && (xhr.status === 200)){
			chatBox.innerHTML = xhr.response;
		}
	}
    let formData = new FormData(form);
    xhr.send(formData); // sending the form data to php
}, 500); // cứ 500ms thì hàm sẽ chạy lại