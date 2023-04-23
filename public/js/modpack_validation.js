var IAErr = document.getElementById("IA-err");
var ExErr = document.getElementById("extra-err");

function validateID(){
    var itemID = document.getElementById('item-id').value;
    if(itemID == "NULL"){
        IAErr.innerHTML='ID can not be blank';
        return false;
    }
    else{
        IAErr.innerHTML = "";
        return true;
    }
}

function validateQuantity(){
    var itemQuantity = document.getElementById('item-quantity').value;
    if(isNaN(itemQuantity)){
        IAErr.innerHTML='Quantity must be numeric';
        return false;
    } else if(itemQuantity == ""){
        IAErr.innerHTML='Quantity cannot be blank';
        return false;
    }
    else{
        IAErr.innerHTML = "";
        return true;
    }
}

function resetError(){
    IAErr.innerHTML = "";
    document.getElementById('add-item-btn').disabled = false;
}

function validateItemAdder(){
    if(!validateID() || !validateQuantity()){
        document.getElementById('add-item-btn').disabled = true;
        return false;
    }
    else{
        return true;
    }
}

function validateDescription(){
    var description = document.getElementById('extra-desc').value;
    if (description.length<=0){
        ExErr.innerHTML = "Service Name cannot be empty";
        return false;
    } else if (description.length>255) {
        ExErr.innerHTML = "Service Name cannot be longer than 255 characters";
        return false;
    } else {
        ExErr.innerHTML = "";
        return true;
    }
}

function validateExtraPrice(){
    var price = document.getElementById('extra-price').value;
    if(isNaN(price)){
        ExErr.innerHTML='Price must be numeric.';
        return false;
    } else if(price == ""){
        ExErr.innerHTML='Price cannot be blank';
        return false;
    }
    else{
        ExErr.innerHTML = "";
        return true;
    }
}

function resetExError(){
    ExErr.innerHTML = "";
    document.getElementById('add-extra-btn').disabled = false;
}

function validateExtra(){
    if(!validateDescription() || !validateExtraPrice()){
        document.getElementById('add-extra-btn').disabled = true;
        return false;
    }
    else{
        return true;
    }
}