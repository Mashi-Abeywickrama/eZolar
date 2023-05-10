<!DOCTYPE html>
<head>
    <link rel="stylesheet" href="/ezolar/public/css/style.css">
    
</head>
<body>
    

</html>
<div id="id001" class="modal">
    <span onclick="location.href=''" class="close" title="Close">×</span>
    <form class="modal-content" id="del" action="<?=URLROOT?>/product/uploadImage/<?php echo $_SESSION['row']->productID?>" method="POST" enctype="multipart/form-data">
    
          <div class="container">
              <p>Upload product image here</p>
              <input type="file" class="fileToUpload"  id="file-input" name="fileToUpload" onchange="loadFile(this)" required>
              <div class="p"><img class="img-slip" scr="" id="output" width="200"/></div>
                  <script>
                      function loadFile(input) {
                          if(input.files && input.files[0] ) {
                              var reader = new FileReader();
                              reader.onload = function (e) {
                                  document.getElementById("output").src = e.target.result;
                              };
                              reader.readAsDataURL(input.files[0]);
                          }
                      }
                  </script>
              <div class="clearfix">
                  <button type="submit"class="okbtn">OK</button>
              <!-- <button type="submit" onclick="document.getElementById('id01').style.display='none'" class="deletebtn">Delete</button> -->
              </div>
          </div>
    </form>
</div>

<script>
// Get the modal
var modal = document.getElementById('id001');
// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
   
  }
}
</script>

</body>