var pckidErr = document.getElementById("pckid-err");
var packnameErr = document.getElementById("pckname-err");
var pcktypeErr = document.getElementById("pck-type-err");
var budgetErr = document.getElementById("price-rng-err");


function validatePackageID(){
    var regName = /^[A-Za-z0-9]+$/;
    var packid = document.getElementById('pack-id').value;
    if(!regName.test(packid)){
        pckidErr.innerHTML='Enter a valid Package ID';
        return false;
    }
    else{
        pckidErr.innerHTML = "";
        if(packid.length!=6){
            pckidErr.innerHTML='Package ID should contain 6 characters';
            return false;
        }
        else{
            return true;
        }
    }
}

function validatePackageName(){
    var packname = document.getElementById('pack-name').value;
    if(packname.length>=100){
        packnameErr.innerHTML='Package Name should contain less than 100 characters';
        return false;
    }
    else{
        packnameErr.innerHTML = "";
        return true;
    }
}

function validateType(){
    var pcktype = document.getElementById('pack-type').value;
    if(pcktype.length>=45){
        pcktypeErr.innerHTML='Type should contain less than 45 characters';
        return false;
    }
    else{
        pcktypeErr.innerHTML = "";
        return true;
    }
}

function validateBudget(){
    var budget_lower = document.getElementById('price-range-lower').value;
    var budget_upper = document.getElementById('price-range-upper').value;

    if((isNaN(budget_lower)) || (isNaN(budget_upper))){
        budgetErr.innerHTML='Budget Range should be numeric';
        return false;
    }
    else if(parseInt(budget_lower) >= parseInt(budget_upper)){
        budgetErr.innerHTML='Lower Limit shoud be less than the Upper Limit';
        return false;
    }
    else{
        budgetErr.innerHTML = "";
        return true;
    }

}


function validateForm(){
    if(!validatePackageID() || !validatePackageName() || !validateType() || !validateBudget()){
        document.querySelector(".form-submit-btn").disabled = true;
        return false;
    }
    else{
        return true;
    }
}