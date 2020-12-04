
function validate_login(){
    var uname = document.login_form.uname.value;
    var pwd = document.login_form.pwd.value;

    if(uname=="" || pwd==""){
        alert("Please Enter Username and Password");
    }
}

function validate_signup(){
    
    fields = ["nm","mob","add1","add2","add3","state","pin","uname","pwd"];

    for (field in fields){
        if(document.signup_form[field]['value']==""){
            alert("Please enter data in all fields");
            break;
        }
    }

    var mob = document.signup_form.mob.value;
    var pin = document.signup_form.pin.value;

    if(mob!="" && (isNaN(mob) || mob.length!=10))
        alert("Enter a valid Mobile No");

    if(pin!="" && (isNaN(pin) || pin.length!=6))
        alert("Enter a valid PIN Code");
}

function validate_profile(){
    
    fields = ["mob","add1","add2","add3","pin","pwd"];

    for (field in fields){
        if(document.profile_update[field]['value']==""){
            alert("Please enter data in all fields");
            break;
        }
    }

    var mob = document.profile_update.mob.value;
    var pin = document.profile_update.pin.value;

    if(mob!="" && (isNaN(mob) || mob.length!=10))
        alert("Enter a valid Mobile No");

    if(pin!="" && (isNaN(pin) || pin.length!=6))
        alert("Enter a valid PIN Code");
}

