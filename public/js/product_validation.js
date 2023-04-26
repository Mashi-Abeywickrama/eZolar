var pidErr = document.getElementById("pid-err");
var pnameErr = document.getElementById("pname-err");
var manufErr = document.getElementById("manuf-err");
var priceErr = document.getElementById("price-err");
var pidField = document.getElementById("product-id");
var reordErr = document.getElementById("reorder-err");


function validateProductID(IDs){
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
            if(IDs.includes(productid)){
                pidErr.innerHTML='Product ID already exist';
                return false;
            }
            else
            {
            return true;
            }
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

function validateReorder(){
    var price = document.getElementById('reorder-level').value;
    if(isNaN(price)){
        reordErr.innerHTML='Reorder should be numeric';
        return false;
    }
    else{
        reordErr.innerHTML = "";
        return true;
    }
}



function validateForm(){
    if(!validateProductID() || !validateProductName() || !validateManufacturer() || !validatePrice() || !validateReorder()){
        document.querySelector(".form-submit-btn").disabled = true;
        return false;
    }
    else{
        return true;
    }
}

function generateProductID(IDs){
    var productname = document.getElementById('product-name').value;
    var manufname = document.getElementById('manufacturer').value;
    var productType = document.getElementById('product-type').value;
    if(productname.length<=0 || manufname.length<=0 || productType==''){
        pidErr.innerHTML='Product name, type & Manufacturer should be filled before generating ID';
    }
    else{
        pidErr.innerHTML='';
        var pidprefix = Array.from(productType)[0].concat(Array.from(manufname)[0],Array.from(productname)[0]).toUpperCase();
        var pidno = 1;
        var pid = pidprefix.concat(String(pidno).padStart(3, '0'));
        while (IDs.includes(pid)){
            pidno +=1;
            pid = pidprefix.concat(String(pidno).padStart(3, '0'));
            if (pidno>=999){
                break;
            }
        }
        pidField.value = pid;

    }
}