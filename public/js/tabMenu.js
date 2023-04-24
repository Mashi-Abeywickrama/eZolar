var tabs = document.querySelectorAll(".tabs_wrap ul li");
var salesElement = document.getElementById("sales");
var packagesElement = document.getElementById("packages");
var schedulesElement = document.getElementById("schedules");
// var packagesElement = document.querySelectorAll(".packages");
var all = document.querySelectorAll(".item_wrap");
var tabval = sales;
packagesElement.style.display = "none";
schedulesElement.style.display = "none";


tabs.forEach((tab)=>{
    tab.addEventListener("click", ()=>{
        tabs.forEach((tab)=>{
            tab.classList.remove("active");
        })
        tab.classList.add("active");
        tabval = tab.getAttribute("data-tabs");
        console.log("tabVal : " + tabval)

        all.forEach((item)=>{
            item.style.display = "none";
        })

        salesElement.style.display = "none";
        packagesElement.style.display = "none";
        schedulesElement.style.display = "none";

        if(tabval == "sales"){
            salesElement.style.display = "block";
        }
        else if(tabval == "packages"){
            // packagesElement.forEach((packages)=>{
            //     packages.style.display = "block";
            // })
            packagesElement.style.display = "block";
        }
        else if(tabval == "schedules"){
            schedulesElement.style.display = "block";
        }

    })
})