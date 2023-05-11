<!DOCTYPE html>

<head>
    <link rel="stylesheet" href="/ezolar/public/css/style.css">

</head>

<body>
    <div id="id05" class="modal">
        <span onclick="location.href=''" class="close" title="Close">×</span>
        <form class="modal-content" id="del" action="" method="POST">

            <div class="container">
                <h1>Package: <?php echo $data['productname'][0]->name ?> </h1>
                <table style="width:100%">
                    <tr>
                        <th>Product ID</th>
                        <th>Name</th>
                        <th>Quantity</th>
                        <th>Unit Price</th>
                    </tr>
                    <?php 
                    $totalCost = 0;

                    foreach ($data['product'] as $row) {
                        echo '
                        <tr>
                            <td>'.$row ->productID.'</td>
                            <td class="td-name">'.$row ->productName.'</td>
                            <td>'.$row ->productQuantity.'</td>
                            <td>Rs.'.$row ->cost.'.00</td>
                        </tr>';
                        $product = ($row ->productQuantity)*($row ->cost);
                        $totalCost = $totalCost + $product;
                        }
                    ?>
                    
                    
                    
                </table>
                <p>Total Cost: Rs.<?php echo $totalCost?>.00</p>
                <div class="clearfix">
                    <button type="button" onclick="location.href=''" class="okbtn">OK</button>
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
                modal.style.display = "none";
                location.href = '';
            }
        }
    </script>

</body>

</html>