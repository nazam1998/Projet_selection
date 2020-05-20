icon = document.querySelector('.fa-power-off');
icon.parentElement.style.color = "#fffce9";

let button = document.getElementById('dupliquer');



var i = 0;
var original = document.getElementById('suivi');

function duplicate() {
    var clone = original.cloneNode(true);
    clone.id = "suivi" + ++i;
    original.parentNode.appendChild(clone);

    let temp = document.createElement('button');
    temp.type = 'button';
    temp.innerHTML = '&times;';
    temp.className = 'btn btn-danger remove';
    temp.style.width='100%';
    clone.appendChild(temp);

    let remove = document.querySelectorAll('.remove');
    remove.forEach(e => {
        e.addEventListener('click', function (event) {
            event.currentTarget.parentElement.remove();
        });
    });
}

button.addEventListener('click', duplicate);
