function showHide(id){
    elem = document.getElementById(id);
    state = elem.style.display; 
    if (state =='') elem.style.display='none'; 
    else elem.style.display=''; 
}

function showRegForm() {
    Reg = document.getElementById('Reg');
    Login = document.getElementById('Login');
    Login.style.display = "none";
    Reg.style.display = "block";
}

function showLoginForm() {
    Reg = document.getElementById('Reg');
    Login = document.getElementById('Login');
    Login.style.display = "block";
    Reg.style.display = "none";
}