require('./ajax');

document.getElementById("profilepick_js").addEventListener("mouseover",function (){
    document.getElementById("profile_picture").style.opacity = "0.6";
    document.getElementById("profilepick_p").style.visibility = "visible";
    console.log("mouse over");
} , false);
document.getElementById("profilepick_js").addEventListener("mouseout",function (){
    document.getElementById("profile_picture").style.opacity = "1";
    document.getElementById("profilepick_p").style.visibility = "hidden";
    console.log("mouse out");
} , false);
