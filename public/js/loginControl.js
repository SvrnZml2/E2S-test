var element = document.getElementById('submit');
element.hidden=true;
var form = document.getElementById('formE');
var check = document.getElementById('check');
check.addEventListener('click', verif);

// Premier événement click

function verif(){

    verif =true;

    //structure
    var structure = document.getElementById('structure');
    if(verif && structure.value.length < 2 || structure.value.length > 50)
    {
        verif = false;
        alert('probleme lié au champ structure')
    }

    //statut
    var statut = document.getElementById('statut');
    if(verif && statut.value.length < 2 || statut.value.length > 50)
    {
        verif = false;
        alert('probleme lié au champ statut')
    }

    //nom
    var nom = document.getElementById('name');
    if(verif && nom.value.length < 2 || nom.value.length > 50)
    {
        verif = false;
        alert('probleme lié au champ nom')
    }

    //mail
    var regex = /^[a-zA-Z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$/;
    var mail = document.getElementById('email');
    if(verif && !regex.test(mail.value))
    {
        verif = false;
        alert('probleme lié au champ mail')
    }

    var pass1 = document.getElementById('password');
    var pass2 = document.getElementById('password-confirm');

    if(pass1.value != pass2.value || pass1.value.length < 2 || pass1.value.length > 50){
        verif = false;
        alert("Les mots de passes ne sont pas identiques ou n'ont pas un nombre de caracteres valide");
    }


    if(verif){
        element.click();
    }
}
