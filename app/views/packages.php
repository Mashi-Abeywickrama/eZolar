<?php
     define('__ROOT__', dirname(dirname(dirname(__FILE__))));
// require_once(__ROOT__.'\views\Customer\navbar.php');

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="\ezolar\public\css\customer.dashboard.common.css">
    <link rel="stylesheet" href="\ezolar\public\css\customer.packages.css">
    <link href='https://fonts.googleapis.com/css?family=Work Sans' rel='stylesheet'>
    <title>My Profile</title>
</head>
<body>
    
<div class="body-container">
    <div class="category-container">
        <div class="category-btn" id="res-btn">Residential</div>
        <div class="category-btn" id="com-btn">Commercial</div>
        <div class="category-btn" id="ind-btn">Industial</div>
    </div>

    <div class="packages-wrapper" id="res-packs">
        <div class="pack-card">
            <div class="pack-title" style="color:#999999;"><div class="pack-subtitle">Solar Home</div>Lite</div>
            <div class="pack-description">Best for small households with low energy needs and a tight budget.</div>
            <div class="pack-content">
                <ul>
                    <li><b>Monthly Power Generation:</b> 230-250 kWh</li>
                    <li><b>Roof Space Required:</b> Approx. 20-25 m²</li>
                </ul>
            </div>
            <div class="pack-price-text">Starting From <div class="pack-price" style="color:#999999;">Rs.580,000</div></div>
            <a href="/ezolar/Project/requestProjectPage" class="pack-btn">Request Project</a>
        </div>
        <div class="pack-card">
            <div class="pack-title" style="color:#2C61A3;"><div class="pack-subtitle">Solar Home</div>Plus</div>
            <div class="pack-description">Best for medium-sized households with moderate energy needs and a desire for high-quality components.</div>
            <div class="pack-content">
                <ul>
                    <li><b>Monthly Power Generation:</b> 610-650 kWh</li>
                    <li><b>Roof Space Required:</b> Approx. 35-40 m²</li>
                </ul>
            </div>
            <div class="pack-price-text">Starting From <div class="pack-price" style="color:#2C61A3;">Rs.1,900,000</div></div>
            
            <a href="/ezolar/Project/requestProjectPage" class="pack-btn">Request Project</a>
        </div>
        <div class="pack-card">
            <div class="pack-title" style="color:#DE8500;"><div class="pack-subtitle">Solar Home</div>Ultra</div>
            <div class="pack-description">Best for larger households with high energy needs and a desire for premium components and maximum energy independence.</div>
            <div class="pack-content">
                <ul>
                    <li><b>Monthly Power Generation:</b> 1,000-1,200 kWh</li>
                    <li><b>Roof Space Required:</b> Approx. 50-60 m²</li>
                </ul>
            </div>
            <div class="pack-price-text">Starting From <div class="pack-price" style="color:#DE8500;">Rs.6,000,000</div></div>
            <a href="/ezolar/Project/requestProjectPage" class="pack-btn">Request Project</a>
        </div>


    </div>
    <div class="packages-wrapper" id="com-packs">
        <div class="pack-card">
            <div class="pack-title" style="color:#999999;"><div class="pack-subtitle">Solar Office</div>Lite</div>
            <div class="pack-description">Best for small commercial offices with low to moderate energy needs and a tight budget.</div>
            <div class="pack-content">
                <ul>
                    <li><b>Monthly Power Generation:</b> 800-900 kWh</li>
                    <li><b>Roof Space Required:</b> Approx. 80-100 m²</li>
                </ul>
            </div>
            <div class="pack-price-text">Starting From <div class="pack-price" style="color:#999999;">Rs.2,900,000</div></div>
            <a href="/ezolar/Project/requestProjectPage" class="pack-btn">Request Project</a>
        </div>
        <div class="pack-card">
            <div class="pack-title" style="color:#2C61A3;"><div class="pack-subtitle">Solar Office</div>Plus</div>
            <div class="pack-description">Best for medium-sized commercial offices with moderate energy needs and a desire for high-quality components.</div>
            <div class="pack-content">
                <ul>
                    <li><b>Monthly Power Generation:</b> 1,500-1,650 kWh</li>
                    <li><b>Roof Space Required:</b> Approx. 150-170 m²</li>
                </ul>
            </div>
            <div class="pack-price-text">Starting From <div class="pack-price" style="color:#2C61A3;">Rs.6,200,000</div></div>
            
            <a href="/ezolar/Project/requestProjectPage" class="pack-btn">Request Project</a>
        </div>
        <div class="pack-card">
            <div class="pack-title" style="color:#DE8500;"><div class="pack-subtitle">Solar Office</div>Ultra</div>
            <div class="pack-description"> Best for larger commercial offices with high energy needs and a desire for premium components and maximum energy independence.</div>
            <div class="pack-content">
                <ul>
                    <li><b>Monthly Power Generation:</b> 4,000-4,500 kWh</li>
                    <li><b>Roof Space Required:</b> Approx. 250-300 m²</li>
                </ul>
            </div>
            <div class="pack-price-text">Starting From <div class="pack-price" style="color:#DE8500;">Rs.22,000,000</div></div>
            <a href="/ezolar/Project/requestProjectPage" class="pack-btn">Request Project</a>
        </div>


    </div>
    <div class="packages-wrapper" id="ind-packs">
        <div class="pack-card">
            <div class="pack-title" style="color:#2C61A3;"><div class="pack-subtitle">Solar Factory</div>Plus</div>
            <div class="pack-description">Best for small to medium-sized factories with low to moderate energy needs and a tight budget.</div>
            <div class="pack-content">
                <ul>
                    <li><b>Monthly Power Generation:</b> 6,500-7,000 kWh</li>
                    <li><b>Roof Space Required:</b> Approx. 350-400 m²</li>
                </ul>
            </div>
            <div class="pack-price-text">Starting From <div class="pack-price" style="color:#2C61A3;">Rs.16,000,000</div></div>
            <a href="/ezolar/Project/requestProjectPage" class="pack-btn">Request Project</a>
        </div>
        <div class="pack-card">
            <div class="pack-title" style="color:#DE8500;"><div class="pack-subtitle">Solar Factory</div>Ultra</div>
            <div class="pack-description">Best for medium to large-sized factories with moderate energy needs and a desire for high-quality components.</div>
            <div class="pack-content">
                <ul>
                    <li><b>Monthly Power Generation:</b> 12,000-14,000 kWh</li>
                    <li><b>Roof Space Required:</b> Approx. 700-800 m²</li>
                </ul>
            </div>
            <div class="pack-price-text">Starting From <div class="pack-price" style="color:#DE8500;">Rs.48,000,000</div></div>
            
            <a href="/ezolar/Project/requestProjectPage" class="pack-btn">Request Project</a>
        </div>


    </div>

</div>
<script>
    var res_btn = document.getElementById("res-btn");
    var com_btn = document.getElementById("com-btn");
    var ind_btn = document.getElementById("ind-btn");

    var res_packs = document.getElementById("res-packs");
    var com_packs = document.getElementById("com-packs");
    var ind_packs = document.getElementById("ind-packs");
    var all_packs = document.getElementsByClassName("packages-wrapper");
    Array.from(all_packs).forEach(hidePackages);
    res_btn.classList.add('select');
    res_packs.classList.remove('hide');
    res_packs.classList.add('select');

    function hidePackages(pack){
        pack.classList.remove('select');
        pack.classList.add('hide');
    }

    function selectPackages(pack){
        Array.from(all_packs).forEach(hidePackages);
        pack.classList.remove('hide');
        pack.classList.add('select');
    }


    res_btn.addEventListener('click', function(btn) {
        btn.target.classList.add('select');
        com_btn.classList.remove('select');
        ind_btn.classList.remove('select');
        selectPackages(res_packs);
    });
    com_btn.addEventListener('click', function(btn) {
        btn.target.classList.add('select');
        res_btn.classList.remove('select');
        ind_btn.classList.remove('select');
        selectPackages(com_packs);
    });
    ind_btn.addEventListener('click', function(btn) {
        btn.target.classList.add('select');
        res_btn.classList.remove('select');
        com_btn.classList.remove('select');
        selectPackages(ind_packs);
    })

    </script>
</body>
</html>
