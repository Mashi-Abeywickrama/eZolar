<!DOCTYPE html>
<head>
    <link rel="stylesheet" href="/ezolar/public/css/style.css">
    
</head>
<body>
    

</html>
<div id="id03" class="modal">
    <span onclick="location.href=''" class="close" title="Close">×</span>
    <form class="modal-content" id="del" action="<?=URLROOT?>/project/confirmOrder?project_id=<?=$_GET['project_id']?>" method="POST" enctype="multipart/form-data">
    
          <div class="container">
              <!-- <h1>UPDATE</h1> -->
              <p>Upload your payment reciept here</p>
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
var modal = document.getElementById('id03');
// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
   
  }
}
</script>

</body>