var chat = document.getElementById('message-container');
var send_message = document.getElementById('send-message');
var text_field = document.getElementById('insert-message');
var message = document.getElementById('message-form-data');
message.onsubmit = (e) => {e.preventDefault()}

var currentURL = window.location.href;
var parts = currentURL.split("/");
var inquiryID = parts.pop();

// show messages
setInterval(() =>{
    let xhr = new XMLHttpRequest();
    xhr.open("GET","http://localhost/ezolar/ChatSystem/viewMessages/"+inquiryID);
    xhr.onload = () => {
        if (xhr.readyState === XMLHttpRequest.DONE){
            if (xhr.status === 200){
                console.log(xhr.response);
                chat.innerHTML = xhr.response;
            }
        }
    }
    xhr.send();
},500);

// function to send message
send_message.onclick = () => {
    let xhr = new XMLHttpRequest();
    xhr.open("POST","http://localhost/ezolar/ChatSystem/sendMessage/"+inquiryID,true);
    xhr.onload = () => {
        if (xhr.readyState === XMLHttpRequest.DONE){
            if (xhr.status === 200){
                text_field.value = "";
            }
        }
    }
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.send("message="+encodeURIComponent(text_field.value));
}

// const reader = new FileReader();
//
// reader.onload = function(e) {
//     const contents = e.target.result;
//     const lines = contents.split('\n');
//     console.log(lines);
//     // Do something with the lines
// };


// reader.readAsText(file);


// function reset_chat_area(){
//     var chatArea = document.getElementById('message').value;
//     clearInterval(interval);
// }



// xhr.open('GET','http://localhost/ezolar/ChatSystem/message/'+inquiryID,true);
// xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
// console.log("get");


// xhr.onload = function (){
//     if (xhr.readyState === XMLHttpRequest.DONE) {
//         if (xhr.status === 200) {
//             console.log("start");
//             console.log(this.responseText);
//             var json = JSON.parse(xhr.response);
//             console.log(json);
//             // get the no of messages
//             var count = json.length;
//             for (let i = 0; i<count;i++){
//                 // message = json[i].message;
//                 // console.log(message);
//                 if (json[i].sender === 0){
//                     // let senderMessage = document.querySelectorAll('.sender-container');
//                     let senderMessage = document.getElementById('sender');
//                     senderMessage.innerHTML = json[i].message;
//                     console.log("s " + senderMessage);
//                 }else if (json[i].sender === 1){
//                     var receiverMessage = document.getElementById('receiver');
//                     receiverMessage.innerHTML = json[i].message;
//                     console.log("r " + receiverMessage);
//                 }
//
//             }
//
//             // var message = document.getElementById('message');
//             // message.value = this.responseText;
//         }}
//
// }