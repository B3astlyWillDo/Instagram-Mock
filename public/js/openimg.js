var slike=document.getElementsByClassName("image");
konv_slike = [].slice.call(slike);

function Open(img){
    var link = konv_slike[konv_slike.indexOf(img)].getAttribute('src');
    window.open(link);
}