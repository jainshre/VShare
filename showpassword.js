let state =false;
let loginstate = false;

let loginpassword = document.getElementById('pass');
let password = document.getElementById('password');

function myFunction(show){
    show.classList.toggle('fa-eye-slash');
}

function toggle(){
    if(state){
        password.setAttribute("type","password");
        state=false;
    }
    else {
        password.setAttribute("type","text");
        state=true;
    }
    if(loginstate){
        loginpassword.setAttribute("type","password");
        loginstate=false;
    }
    else{
        loginpassword.setAttribute("type","text");
        loginstate=true;
    }
}

