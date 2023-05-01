function check_toggle_status(){
    var element = document.getElementById("togBtn");
    element.addEventListener("change", function (event) {
        var checked = false;
        if (event.target.checked) {
            // DONE state
            checked = true
        } else {
            // NEW State
            checked = false
        }
        console.log(checked);
        return checked

    });
}





