var pidErr = document.getElementById("pid-err");
var pnameErr = document.getElementById("pname-err");
var manufErr = document.getElementById("manuf-err");
var priceErr = document.getElementById("price-err");


function validateProductID(){
    var regName = /^[A-Za-z0-9]+$/;
    var productid = document.getElementById('product-id').value;
    if(!regName.test(productid)){
        pidErr.innerHTML='Enter a valid Product ID';
        return false;
    }
    else{
        pidErr.innerHTML = "";
        if(productid.length!=6){
            pidErr.innerHTML='Product ID should contain 6 characters';
            return false;
        }
        else{
            return true;
        }
    }
}

function validateProductName(){
    var productname = document.getElementById('product-name').value;
    if(productname.length>=100){
        pnameErr.innerHTML='Product Name should contain less than 100 characters';
        return false;
    }
    else{
        pnameErr.innerHTML = "";
        return true;
    }
}

function validateManufacturer(){
    var manufname = document.getElementById('manufacturer').value;
    if(manufname.length>=100){
        manufErr.innerHTML='Manufacturer Name should contain less than 100 characters';
        return false;
    }
    else{
        manufErr.innerHTML = "";
        return true;
    }
}

function validatePrice(){
    var price = document.getElementById('price').value;
    if(isNaN(price)){
        priceErr.innerHTML='Cost should be numeric';
        return false;
    }
    else{
        priceErr.innerHTML = "";
        return true;
    }
}


function validateForm(){
    if(!validateProductID() || !validateProductName() || !validateManufacturer() || !validatePrice()){
        document.querySelector(".form-submit-btn").disabled = true;
        return false;
    }
    else{
        return true;
    }
}