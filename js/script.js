window.img = img;
(function() {
    var i = 0;
    var src = [
        window.img.url + '/img/0002.png',
        window.img.url + '/img/0003.png',
        window.img.url + '/img/00001.png',
        window.img.url + '/img/0051.png'
    ];
    var l = src.length;
    var t;

    for(i = 0; i < l; i++) {
        var img = new Image();
        img.src = src[i];
        img.onload = function() {
            delete this;
        }
    }

    i = 0;
    t = setInterval(function() {
        if(i === l){
            i = 0;
        }
        document.getElementById("p-bottom").style.background = 'url(' + src[i] + ') center top no-repeat';
        i++;
    }, 3000);
})();
