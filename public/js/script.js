setInterval('slider()',5000);

let i=0;

function slider(){
    var slides = ['1.jpg','2.jpg'];
    i++
    if(i>1)
        i=0;
    var poster = document.getElementById('poster');
    var image = 'url(images/'+'poster/'+slides[i]+')';
    poster.style.backgroundImage = image;
}

function mode() {
    var element = document.body;
    element.classList.toggle("light");
}