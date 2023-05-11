<?php
    define('__ROOT__', dirname(dirname(dirname(__FILE__))));
    require_once(__ROOT__.'\views\Customer\navbar.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://fonts.googleapis.com/css?family=Work Sans' rel='stylesheet'>
    <link rel="stylesheet" href="\ezolar\public\css\customer.dashboard.common.css">
    <link rel="stylesheet" href="\ezolar\public\css\customer.budgetcal.css">
    <title>user reports</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.5.1"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.2.0/dist/chart.umd.min.js"></script>
    <script
			src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"
			integrity="sha512-BNaRQnYJYiPSqHHDb58B0yaPfCu+Wgds8Gp/gU33kqBtgNS4tSPHuGibyoeqMV/TJlSKda6FXzoEyYGjTe+vXA=="
			crossorigin="anonymous"
			referrerpolicy="no-referrer">
    
    </script>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.4/jspdf.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.2/jspdf.min.js"></script>

</head>
<body>
    <script>
        function exportpdf() {
            const container = document.getElementById("report-container");
            const containerWidth = container.offsetWidth * 0.75; // use 75% of container width
            const containerHeight = window.innerHeight; // use full screen height

            html2canvas(container).then((canvas) => {
              let base64image = canvas.toDataURL('image/png');
              let pdf = new jsPDF('l', 'pt', [containerHeight, containerWidth]); // use landscape orientation and swap width/height
              pdf.addImage(base64image, 'PNG', 10, 10, containerWidth - 20, containerHeight - 20); // adjust image size and position
              pdf.save('report.pdf');
            });
        }

    </script>
<div class = "body-container-main">
<div class="body-container">

    <!-- left navigation panel of customer -->
    <?php
        require_once(__ROOT__.'\views\Customer\navigationpanel.php');
    ?>

    <!-- Remaining... -->
    <div class="main-container">

        <div class="heading">
            <div class="common-main-topic">
                <div class="common-main-topic-left">
                    <div class="common-main-left-img">
                            <img src="\ezolar\public\img\Cal.png">
                    </div>
                    <div class="common-main-txt">
                    Generate Report
                    </div>
                </div>
                <div class="drop">
                    Select project id:
                    <select name="projectID" id="" onchange="location.href= '?projectID='+this.value">
                    <option value="NULL" selected hidden diabled>Select A Project </option>
                       <?php 
                        foreach ($data['com_projects'] as $row) { 
                            if (isset($_GET['projectID'])) {
                                if ($_GET['projectID'] == $row->projectID) {
                                    echo '<option  value="'.$row->projectID.'" selected  >'.$row->projectID.' </option>';
                                }else { ?>
                                    <option  value="<?php echo $row->projectID?>"   ><?php echo $row->projectID?> </option>
                               <?php  }
                            } else{ ?>
                            <option  value="<?php echo $row->projectID?>"   ><?php echo $row->projectID?> </option>
                        <?php }}
                       ?>
                    </select>
                    <div class="g-img" onclick="exportpdf()"><img src="\ezolar\public\img\customer\download.png" class="download"></div>
                </div>
            </div>
        </div>    

        <div class="report-container" id="report-container">
            <div class="main-topic">
                <div class="common-main-topic-left">
                    <div class="main-txt">
                        PROJECT SUMMARY REPORT 
                    </div>
                </div>    
            </div>
            <div class="details-container">
                <div class="pid">
                    PROJECT ID: 
                </div>
                <div class="pdate">
                    REPORT GENERATED DATE:
                </div>
            </div>

            <div class="details-container-t">
                <div class="pid-t">
                    <?php echo $data['project'][0]->projectID ?>
                </div>
                <div class="pdate-t">
                    <?php echo date('d-m-Y');?>
                </div>
            </div>
            <!-- project initialization date and completion date -->
            <div class="details-container">
                <div class="pid">
                    PROJECT REQUESTED DATE: 
                </div>
                <div class="pdate">
                    PROJECT COMPLETED DATE:
                </div>
            </div>

            <div class="details-container-t">
                <div class="pid-t">
                     <?php echo $data['project'][0]->requestDate ?>
                </div>
                <div class="pdate-t">
                     <?php echo $data['lastpay'][0]->verifiedDate ?>
                </div>
            </div>

            <div class="details-container">
                <div class="pid">
                    PACKAGE: 
                </div>
                <div class="pdate-t"></div>
            </div>
            <div class="details-container-t">
                <div class="pack">
                    <?php echo $data['productname'][0]->packageID ?><!-- package ID -->
                    - <?php echo $data['productname'][0]->name ?><!-- package name -->
                </div>
            </div>

            <div class="details-container">
                <div class="pid">
                    PACKAGE DESCRIPTION: 
                </div>
                <div class="pdate-t"></div>
            </div>
            <div class="p-details-container-h">
                <div class="pack-h">
                    Product Name
                </div>
                <div class="pack-h">
                    Quantity
                </div>
                <div class="pack-h">
                    Unit Price
                </div>
            </div>
            <?php
            $total = 0;
             foreach ($data['products'] as $row) { ?>
                
            
            <!-- take package details from db -->
            <div class="p-details-container-t">
                <div class="pack-d-n">
                    <?php echo $row->productName ?>
                </div>
                <div class="pack-d">
                   <?php echo $row->productQuantity ?>
                </div>
                <div class="pack-d-p">
                    Rs.<?php echo $row->cost; echo '.00';
                    $total = $total + ($row->cost*$row->productQuantity) ?>
                </div>
            </div>
            <?php } ?>
            <div class="details-container">
                <div class="pid">
                    TOTAL EXPENCES: 
                </div>
                <div class="pdate-t"></div>
            </div>
            <div class="p-details-container-h">
                <div class="pid-t">
                    INSPECTION PAYMENT
                </div>
                <div class="pdate-t">
                    Rs. 10000.00
                </div>
            </div>
            <div class="p-details-container-t">
                <div class="pid-t">
                    ORDER CONFIRMATION
                </div>
                <div class="pdate-t">
                    Rs. <?php echo $total; ?>.00
                </div>
            </div>
            <!-- <div class="p-details-container-t">
                <div class="pid-t">
                    ADD ON
                </div>
                <div class="pdate-t">
                    Rs.
                </div>
            </div> -->
            <div class="p-details-container-t">
                <div class="pid-t">
                    TOTAL
                </div>
                <div class="pdate-t">
                    Rs. <?php echo $total + 10000 ?>.00
                </div>
            </div>


            <!-- chart for project timeline -->
            <div class="details-container">
                <div class="pid">
                    PROJECT TIMELINE: 
                </div>
                <div class="pdate-t"></div>
            </div>

            <div class="p-details-container-h" style="margin-bottom: 1rem;"><div class="timeline">
                <div class="container left">
                    <div class="content">
                        <h4><?php echo $data['delivery'][0]->date ?></h4>
                        <p>Delivery & Installation Completed</p>
                    </div>
                </div>
                <div class="container right">
                    <div class="content">
                        <h4><?php echo $data['lastpay'][0]->verifiedDate ?></h4>
                        Final Payment Accepted
                    </div>
                </div>
                <div class="container left">
                    <div class="content">
                        <h4><?php echo $data['lastpay'][0]->uploadedTime ?></h4>
                        <p>Final Payment Recieved</p>
                    </div>
                </div>
                <div class="container right">
                    <div class="content">
                        <h4><?php echo $data['inspection'][0]->date ?></h4>
                        <p>Inspection Completed</p>
                    </div>
                </div>
                <div class="container left">
                    <div class="content">
                        <h4><?php echo $data['lastpay'][0]->verifiedDate ?></h4>
                        <p>Inspection Payment Accepted</p>
                    </div>
                </div>
                <div class="container right">
                    <div class="content">
                        <h4><?php echo $data['project'][0]->requestDate ?></h4>
                        <p>Project Request Recieved</p>
                        
                    </div>
                </div>
            </div></div>
            
        </div>
    </div>
    
</div>

<!-- add footer to the page -->
<div class="f">
    <?php 
      $this->view('Includes/footer', $data);
    ?>
</div>
<div>
</body>
</html>