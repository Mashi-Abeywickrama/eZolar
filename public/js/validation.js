var fnameErr = document.getElementById("fname-err");
var lnameErr = document.getElementById("lname-err");
var emailErr = document.getElementById("email-err");
var nicErr = document.getElementById("nic-err");
var pwdErr = document.getElementById("pwd-err");
var mobileErr = document.getElementById("mobile-err");
var cpwdErr = document.getElementById("cpwd-err");
var password = document.getElementById("password");
// var button = document.getElementById("Signupbtn")

function validatefName(){
    var fname = document.getElementById('fname').value;
    var regName = /^[A-Za-z]+$/;
    if(fname === ""){
        fnameErr.innerHTML='This field is required';
    }
    else{
        if(!regName.test(fname)){
            fnameErr.innerHTML='Enter a valid name';
            return false;
        }else{
            if(fname.length>45){
                lnameErr.innerHTML = "Exceed number of characters"
                return false;
            }
            else{
                lnameErr.innerHTML = ""
                return true;
            }
        }
    }
}
function validatelName(){
    var regName = /^[A-Za-z]+$/;
    var fname = document.getElementById('lname').value;
    if(!regName.test(fname)){
        lnameErr.innerHTML='Enter a valid name';
        return false;
    }else{
        if(fname.length>45){
            lnameErr.innerHTML = "Exceed number of characters"
            return false;
        }
        else{
            lnameErr.innerHTML = ""
            return true;
        }
        
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
    
    if (pwd.length>=8 && pwd.length<=10){
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
        pwdErr.innerHTML = "passwords must contain 8 - 10 characters"
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
function validateTelNo(){
    var mobileN = document.getElementById("mobile").value;
    if(mobileN.length>10 || mobileN.length<10){
        mobileErr.innerHTML='Length : 10 characters';
        return false;
    }else {
        if(isNaN(mobileN)){
            mobileErr.innerHTML='Contact Number should contain numbers';
            return false;
        }
        else{
            mobileErr.innerHTML = "";
            return true;
        }
    }
}

function validateForm(){
    if(!validatefName || !validatelName || !validateEmail() || !validatePassword() || !validateNIC || !validateTelNo){
        document.querySelector(".Signupbtn").disabled = true;
        
        // document.querySelector(".Signupbtn").hover = none;
        return false;
    }
    else{
        return true;
    }
}
function showPassword(){
    if (password.type === 'password'){
        password.type = 'text';
    }
    else{
        password.type = 'password';
    }
}