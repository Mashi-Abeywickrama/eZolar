<!DOCTYPE html>
<head>
    <link rel="stylesheet" href="/ezolar/public/css/style.css">
    <link rel="stylesheet" href="/ezolar/public/css/packages-advanced.css">
    
</head>
<body>
    

</html>
<div id="confirm-pop" class="modal">
    <span onclick="location.href=''" class="close" title="Close">×</span>
    <div class="modal-content" id="del">
          <div class="container popup-container">
              <p id="text"></p>
              <div class="popup-btn-container">
                  <a href="" type="submit"class="popup-yes-btn" style="text-decoration:none;" id="yes-btn">Yes</a>
                  <a href="" type="submit"class="popup-no-btn" style="text-decoration:none; background:#999999;" id="no-btn">No</a>
              </div>
          </div>
    </div>
</div>

<script>
// Get the modal
var modal = document.getElementById('confirm-pop');

//Enter these into view's event listner

// var text_box = document.getElementById('text');
// var yes_btn = document.getElementById('yes-btn');
// var no_btn = document.getElementById('no-btn');
//text_box.innerHTML = /text go here/;
//yes_btn.setAttribute("href", /confirm link/);
//no_btn.setAttribute("href", /reject link/);

//links can be leave black to close popup


// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";   
  }
}

no_btn.addEventListener('click', function(btn) {
    modal.style.display = "none";   
});



</script>

</body>