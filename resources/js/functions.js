require('./ajax');

document.getElementById("profilepick_js").addEventListener("mouseover",function (){
    document.getElementById("profilepic_img").style.opacity = "0.6";
    document.getElementById("profilepick_p").style.visibility = "visible";
    console.log("mouse over");
} , false);
