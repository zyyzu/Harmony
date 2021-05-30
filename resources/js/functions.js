require('./ajax');

var profilepick_js = document.getElementById("profilepick_js")
if(profilepick_js!=null){
    profilepick_js.addEventListener("mouseover",function (){
        document.getElementById("profile_picture").style.opacity = "0.6";
        document.getElementById("profilepick_p").style.visibility = "visible";
        console.log("mouse over");
    } , false);
    profilepick_js.addEventListener("mouseout",function (){
        document.getElementById("profile_picture").style.opacity = "1";
        document.getElementById("profilepick_p").style.visibility = "hidden";
        console.log("mouse out");
    } , false);
}



