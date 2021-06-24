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

function showMyLib() {
    mylib = document.getElementById('mylib');
    otherlib = document.getElementById('otherlib');
    MyLibPage = document.getElementById('MyLibPage');
    OtherLibPage = document.getElementById('OtherLibPage');
    AddLibPage = document.getElementById('AddLibPage');

    mylib.classList.add('fwb');
    otherlib.classList.remove('fwb');
    addbook.classList.remove('fwb');

    MyLibPage.style.display = "block";
    OtherLibPage.style.display = "none";
    AddLibPage.style.display = "none";
}

function showOtherLib() {
    mylib = document.getElementById('mylib');
    otherlib = document.getElementById('otherlib');
    MyLibPage = document.getElementById('MyLibPage');
    OtherLibPage = document.getElementById('OtherLibPage');
    AddLibPage = document.getElementById('AddLibPage');

    mylib.classList.remove('fwb');
    addbook.classList.remove('fwb');
    otherlib.classList.add('fwb');

    MyLibPage.style.display = "none";
    OtherLibPage.style.display = "block";
    AddLibPage.style.display = "none";
}

function showAddBook() {
    mylib = document.getElementById('mylib');
    otherlib = document.getElementById('otherlib');
    addbook = document.getElementById('addbook');
    MyLibPage = document.getElementById('MyLibPage');
    OtherLibPage = document.getElementById('OtherLibPage');
    AddLibPage = document.getElementById('AddLibPage');

    mylib.classList.remove('fwb');
    otherlib.classList.remove('fwb');
    addbook.classList.add('fwb');

    MyLibPage.style.display = "none";
    OtherLibPage.style.display = "none";
    AddLibPage.style.display = "block";
}