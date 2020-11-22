var dropdwn=document.getElementById("dropdown");
var profile = document.getElementsByClassName("navbar-list")[0];
profile.addEventListener("click", function(){
  if(dropdwn.style.display=='block'){
      dropdwn.style.display='none';
      profile.style.background="#000";
      profile.style.color="#fff";
  }
  else{
       dropdwn.style.display='block';
       profile.style.background="lightcoral";
       profile.style.color="#000";
  }
})