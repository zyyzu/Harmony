//const { dump } = require("laravel-mix");
//postid, button

var elements = document.getElementsByClassName("postLikeButton");

for(let i = 0; i<elements.length; i++){
    elements[i].addEventListener("click", function(){
        var postid = this.value;
        var csrftoken = this.dataset.csrf;
        console.log(this);
        toggleLike(postid, csrftoken, this);
    });
}

/*elements.forEach(element => {
    element.addEventListener("click", function(){
        var postid = this.value;
        var csrftoken = this.dataset.csrf;
        console.log(this);
        toggleLike(postid, csrftoken, this);
    });
});*/

/*document.getElementById("postLikeButton").addEventListener("click", function() {
    var postid = this.value;
    var csrftoken = this.dataset.csrf;
    console.log(this);
    toggleLike(postid, csrftoken, this);
});*/
function toggleLike(postid, csrftoken, button) {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
            //document.getElementById("test").innerHTML=this.responseText;
        console.log(this.responseText);
        let jsonObject = JSON.parse(this.responseText);
        console.log(jsonObject);
        if(jsonObject.status == 0){
            console.log('nie istnieje taki post');
            return;
        }
        if(jsonObject.status == 200){
            let isLiked = jsonObject.liked;
            let likesCount = jsonObject.likes;
            if(isLiked){
                button.classList.remove("btn-outline-info");
                button.classList.add("btn-info");
                button.innerHTML = '<i class="fas fa-thumbs-up"></i> Lubisz to | '+likesCount;
            }else {
                button.classList.add("btn-outline-info");
                button.classList.remove("btn-info");
                button.innerHTML = '<i class="far fa-thumbs-up"></i> Polub | '+likesCount;
            }
        }

        }
    };
    xhttp.open("POST", "http://localhost:8000/ajax/liketoggle/"+postid, true);
    xhttp.setRequestHeader('X-CSRF-TOKEN', csrftoken);
    xhttp.setRequestHeader("X-Requested-With", "XMLHttpRequest");
    xhttp.send();
  }
