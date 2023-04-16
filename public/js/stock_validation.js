var IAErr = document.getElementById("item-adder-error-box");
var tableErr = document.getElementById("table-error-box");
var typeErr = document.getElementById("type-error-box");

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
        IAErr.innerHTML='Quantity must be numeric.';
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

function checkStockEmpty(){
    var itemcount = document.getElementsByClassName("form-table-row-container").length
    if(itemcount<1){
        tableErr.innerHTML = "A Stock must contain atleast one item.";
        return false;
    } else {
        tableErr.innerHTML = "";
        return true;
    }
}

function checkStockType(){
    var stockType = document.getElementById('stock-type').value;
    if (stockType=="NULL"){
        typeErr.innerHTML = "Select a Stock Type";
        return false;
    } else {
        typeErr.innerHTML = "";
        document.getElementById('Submit-btn').disabled = false;
        return true;
    }

}

function validateStock(){
    if(!checkStockType() || !checkStockEmpty()){
        document.getElementById('Submit-btn').disabled = true;
        return false;
    }
    else{
        return true;
    }
}