icon = document.querySelector('.fa-power-off');
icon.parentElement.style.color = "#fffce9";

let button = document.getElementById('dupliquer');

var i = 0;
var original = document.getElementById('suivi');

function duplicate() {
    var clone = original.cloneNode(true);
    clone.id = "suivi" + ++i;
    let kid=clone.childNodes;
    console.log(kid);
    
    original.parentNode.appendChild(clone);
}

button.addEventListener('click',duplicate);

let remove = document.querySelectorAll('remove');