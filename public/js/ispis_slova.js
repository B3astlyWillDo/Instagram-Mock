var y=0,z=0;
	var reci=['UMETNICI','SLIKE','TALENTI','PEJZAŽI'];
	var recenica=document.getElementById("main-text");
	  function Obrisi(){
  	if(recenica.innerHTML!=""){
  	if(y>=1){
  	    y--;
  	    recenica.innerHTML = reci[z].slice(0,y);
  	    setTimeout(Obrisi,100);
         }
  	else{
         y=0;
      }
      }
      else{
      	if(z<reci.length-1)
      		z++;
      	else
      		z=0;
      	typeWriter();
      }
    }
    function typeWriter() {
    if (y < reci[z].length) {
    recenica.innerHTML += reci[z].charAt(y);
    y++;
    setTimeout(typeWriter, 500);
      }
  else{
  	if(recenica.innerHTML!=""){
  		Obrisi();
  	}
  	else{
  	if(z<reci.length-1){
  		z++;
  	   typeWriter();}
  	else{
  		z=0;
  		typeWriter();
  	 }
  	}
   }
 }
typeWriter();