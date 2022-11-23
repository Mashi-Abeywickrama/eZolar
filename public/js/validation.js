var fnameErr = document.getElementById("fname-err");
var lnameErr = document.getElementById("lname-err");
var emailErr = document.getElementById("email-err");
var nicErr = document.getElementById("nic-err");
var pwdErr = document.getElementById("pwd-err");
var cpwdErr = document.getElementById("cpwd-err");
// var button = document.getElementById("Signupbtn")

function validatefName(){
    var regName = /^[A-Za-z]+$/;
    var fname = document.getElementById('fname').value;
    if(!regName.test(fname)){
        fnameErr.innerHTML='Enter a valid name';
        return false;
    }else{
        fnameErr.innerHTML = ""
        return true;
    }
}
function validatelName(){
    var regName = /^[A-Za-z]+$/;
    var fname = document.getElementById('lname').value;
    if(!regName.test(fname)){
        lnameErr.innerHTML='Enter a valid name';
        return false;
    }else{
        lnameErr.innerHTML = ""
        return true;
    }
}
function validateNIC(){
    var nic = document.getElementById("nic").value;
    if(nic.length==10){
        const lastLetter = nic[nic.length-1];
        const numbers = nic.slice(0,nic.length-1);
        console.log(numbers,!isNaN(numbers))
        if((lastLetter==='V' || lastLetter==='X') && !isNaN(numbers)){
            nicErr.innerHTML = " "
            return true;
        }else{
            nicErr.innerHTML = "Enter a valid nic"
            return false;
        }
    }
    else if (nic.length==12){
        if(!isNaN(nic)){
            nicErr.innerHTML = " "
            return true;
            // console.log('This is a valid new nic number');
        }
        else {
            nicErr.innerHTML = "Enter a valid nic"
            return false;
            // console.log('This is not a valid new nic number', nic);
        }
    }
    else{
        nicErr.innerHTML = "Enter a valid nic"
        return false;
    }
}
function validatePassword(){
    let pwd = document.getElementById("pwd").value;
    // console.log(pwd)
    let cpwd = document.getElementById("cpwd").value;
    
    if (pwd.length>=8){
        pwdErr.innerHTML = ""
        if (pwd==cpwd){
            // console.log("matched")
            cpwdErr.innerHTML = "";
            return true;
        }
        else{
            cpwdErr.innerHTML = "passwords didn't match"
            return false;
        }
    }
    else{
        pwdErr.innerHTML = "passwords must contain at least 8 characters"
        return false;

    }
}

function validateEmail(){
    var email = document.getElementById("email").value;
    var format = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
    
    if (email.match(format)){
        emailErr.innerHTML = "";
        return true;
    }
    else{
        emailErr.innerHTML = "Enter a Valid Email";
        return false;
    }
    //  emailErr.innerHTML = "aaaaaaaaaaaaa"
}

function validateForm(){
    if(!validatefName || !validatelName || !validateEmail() || !validatePassword() || !validateNIC ){
        document.querySelector(".Signupbtn").disabled = true;
        // document.querySelector(".Signupbtn").hover = none;
        return false;
    }
    else{
        return true;
    }
}