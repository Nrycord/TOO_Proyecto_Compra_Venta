let btn1 = document.getElementById("li1");

if(document.getElementById("li2") != null) {
    let btn2 = document.getElementById("li2");

    btn2.onmouseover = function() {
        if ( document.getElementById("t2").className.match(/(?:^|\s)invisible(?!\S)/) ) {
            document.getElementById("t2").className = "visible";
        }
    }
    btn2.onmouseleave = function() {
        if ( document.getElementById("t2").className.match(/(?:^|\s)visible(?!\S)/) ) {
            document.getElementById("t2").className = "invisible";
        }
    }
}

let btn3 = document.getElementById("li3");
let btn4 = document.getElementById("li4");
let btn5 = document.getElementById("li5");

btn1.onmouseover = function() {
    if ( document.getElementById("t1").className.match(/(?:^|\s)invisible(?!\S)/) ) {
        document.getElementById("t1").className = "visible";
    }
}
btn1.onmouseleave = function() {
    if ( document.getElementById("t1").className.match(/(?:^|\s)visible(?!\S)/) ) {
        document.getElementById("t1").className = "invisible";
    }
}

btn3.onmouseover = function() {
    if ( document.getElementById("t3").className.match(/(?:^|\s)invisible(?!\S)/) ) {
        document.getElementById("t3").className = "visible";
    }
}
btn3.onmouseleave = function() {
    if ( document.getElementById("t3").className.match(/(?:^|\s)visible(?!\S)/) ) {
        document.getElementById("t3").className = "invisible";
    }
}

btn4.onmouseover = function() {
    if ( document.getElementById("t4").className.match(/(?:^|\s)invisible(?!\S)/) ) {
        document.getElementById("t4").className = "visible";
    }
}
btn4.onmouseleave = function() {
    if ( document.getElementById("t4").className.match(/(?:^|\s)visible(?!\S)/) ) {
        document.getElementById("t4").className = "invisible";
    }
}

btn5.onmouseover = function() {
    if ( document.getElementById("t5").className.match(/(?:^|\s)invisible(?!\S)/) ) {
        document.getElementById("t5").className = "visible";
    }
}
btn5.onmouseleave = function() {
    if ( document.getElementById("t5").className.match(/(?:^|\s)visible(?!\S)/) ) {
        document.getElementById("t5").className = "invisible";
    }
}