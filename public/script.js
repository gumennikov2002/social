function showHide(id){
    elem = document.getElementById(id);
    state = elem.style.display; 
    if (state =='') elem.style.display='none'; 
    else elem.style.display=''; 
}

function changeTheme(){
    elem = document.getElementById('body');
    
    if(elem.classList.contains("light-theme")) {
        elem.classList.remove("light-theme");
        elem.classList.add('black-theme');
    } else {
        elem.classList.remove('black-theme');
        elem.classList.add("light-theme");
    }
}

function showRegForm() {
    Reg = document.getElementById('Reg');
    Login = document.getElementById('Login');
    Login.style.display = "none";
    Reg.style.display = "block";
}

mylib = document.getElementById('mylib');
otherlib = document.getElementById('otherlib');
MyLibPage = document.getElementById('MyLibPage');
OtherLibPage = document.getElementById('OtherLibPage');
AddLibPage = document.getElementById('AddLibPage');
access = document.getElementById('access');
AccessLibPage = docume.getElementById('AccessLibPage');

function showLoginForm() {
    Reg = document.getElementById('Reg');
    Login = document.getElementById('Login');
    Login.style.display = "block";
    Reg.style.display = "none";
}

function showMyLib() {
    mylib.classList.add('fwb');
    otherlib.classList.remove('fwb');
    access.classList.remove('fwb');
    addbook.classList.remove('fwb');

    MyLibPage.style.display = "block";
    AccessLibPage.style.display="nonek";
    OtherLibPage.style.display = "none";
    AddLibPage.style.display = "none";
}

function showOtherLib() {
    mylib.classList.remove('fwb');
    addbook.classList.remove('fwb');
    access.classList.remove('fwb');
    otherlib.classList.add('fwb');

    MyLibPage.style.display = "none";
    OtherLibPage.style.display = "block";
    AccessLibPage.style.display="none";
    AddLibPage.style.display = "none";
}

function showAddBook() {
    mylib.classList.remove('fwb');
    otherlib.classList.remove('fwb');
    access.classList.remove('fwb');
    addbook.classList.add('fwb');

    MyLibPage.style.display = "none";
    OtherLibPage.style.display = "none";
    AddLibPage.style.display = "block";
    AccessLibPage.style.display="none";
}

function showAccess()
{
    mylib.classList.remove('fwb');
    otherlib.classList.remove('fwb');
    addbook.classList.remove('fwb');
    access.classList.add('fwb');

    MyLibPage.style.display = "none";
    OtherLibPage.style.display = "none";
    AddLibPage.style.display = "none";
    AccessLibPage.style.display="block";
}