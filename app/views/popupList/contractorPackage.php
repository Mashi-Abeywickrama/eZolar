<!DOCTYPE html>

<head>
    <link rel="stylesheet" href="/ezolar/public/css/style.css">

</head>

<body>
    <div id="id05" class="modal">
        <span onclick="location.href='/ezolar/project/COntractorAssignedProjects'" class="close" title="Close">×</span>
        <form class="modal-content" id="del" action="" method="POST">

            <div class="container">
                <h1>Package ID: <?php echo $data['rows'][0]->Package_packageID ?> </h1>
                <table style="width:100%">
                    <tr>
                        <th>Product ID</th>
                        <th>Name</th>
                        <th>Quantity</th>
                    </tr>
                    <?php 
                    

                    foreach ($data['product'] as $row) {
                        echo '
                        <tr>
                            <td>'.$row ->productID.'</td>
                            <td class="td-name">'.$row ->productName.'</td>
                            <td>'.$row ->productQuantity.'</td>
                        </tr>';
                        }
                    ?>
                    
                    
                    
                </table>
                <div class="clearfix">
                    <button type="button" onclick="location.href='/ezolar/project/COntractorAssignedProjects'" class="okbtn">OK</button>
                </div>
            </div>
        </form>
    </div>

    <script>
        // Get the modal
        var modal = document.getElementById('id05');
        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function (event) {
            if (event.target == modal) {
                location.href = '/ezolar/project/COntractorAssignedProjects';
            }
        }
    </script>

</body>

</html>