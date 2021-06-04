// on click verify that form is not empty
// get field, label and button
let field = document.getElementsByTagName('input');
let btn = document.getElementById('validate');
let label = document.getElementsByTagName('label');

// get the place where display text
let target = document.getElementById('target');

// create element witch contain the text
let info = document.createElement('p');
info.style.textAlign = "center";

// on click count the length of each field
if(btn){
    btn.addEventListener('click', function (event){
        info.innerHTML = "Veuillez remplir le(s) champs :";
        for(let i = 0 ; i < field.length ; i++){
            if(field[i].value.length <= 0){
                event.preventDefault();
                info.innerHTML += "<br>" + label[i].innerText;
            }
        }
        target.appendChild(info);
    })
}
