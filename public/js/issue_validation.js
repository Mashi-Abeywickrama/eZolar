var topicErr = document.getElementById("issue-topic-err");
var mssgErr = document.getElementById("issue-mssg-err");

function validateTopic(){
    var topic = document.getElementById('issue-topic').value;
    if(topic.length<1){
        topicErr.innerHTML='Topic can not be blank';
        return false;
    }
    else{
        topicErr.innerHTML = "";
        return true;
    }
}

function validateMessage(){
    var message = document.getElementById('issue-message').value;
    if(message.length<1){
        mssgErr.innerHTML='Message can not be blank';
        return false;
    }
    else{
        mssgErr.innerHTML = "";
        return true;
    }
}

function validateForm(){
    if(!validateTopic() || !validateMessage()){
        document.querySelector(".form-submit-btn").disabled = true;
        return false;
    }
    else{
        return true;
    }
}