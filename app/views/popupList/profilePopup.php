<!DOCTYPE html>
<head>
    <link rel="stylesheet" href="/ezolar/public/css/style.css">
    
</head>
<body>
    

</html>
<div id="id01" class="modal">
  <span onclick="location.href='editprofile'" class="close" title="Close">×</span>
  <form class="modal-content" id="del" action="" method="POST">
  
    <div class="container">
      <h1>UPDATE</h1>
      <p>Your Profile has been Updated Successfully</p>
    
      <div class="clearfix">
        <button type="button" onclick="location.href='editprofile'"class="okbtn">OK</button>
        <!-- <button type="submit" onclick="document.getElementById('id01').style.display='none'" class="deletebtn">Delete</button> -->
      </div>
    </div>
  </form>
</div>

<script>
// Get the modal
var modal = document.getElementById('id01');
// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
    location.href='editprofile';
  }
}
</script>

</body>