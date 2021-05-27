function verificareCredentiale() {
    var firstName=document.getElementById('firstName');
    var lastName=document.getElementById('lastName');
    var email=document.getElementById('email');
    var password=document.getElementById('password');
    
    var element1=document.getElementById('firstName1');
    var element2=document.getElementById('lastName1');
    var element3=document.getElementById('email1');
    var element4=document.getElementById('password1');
    
    var ok=0;
    if(firstName.value==="")
        element1.textContent="Trebuie sa fie completat";
    else{
        element1.textContent="";
        ok++;
    }
    if(lastName.value==="")
        element2.textContent="Trebuie sa fie completat";
    else{
        element2.textContent="";
        ok++;
    }
    if(email.value==="")
        element3.textContent="Trebuie sa fie completat";
    else{
        element3.textContent="";
        ok++;
    }
    if(password.value==="")
        element4.textContent="Trebuie sa fie completat";
    else{
        element4.textContent="";
        ok++;
    }
    
    if(ok===4){
        if(password.value.length<8)
            element4.textContent="Parola trebuie sa aiba minim 8 caractere";
        else
            ok++;

        const object ={"firstName":[firstName.value],"lastName":[lastName.value],"email":[email.value],"password":[password.value]};
        const xhr = new XMLHttpRequest();
        xhr.onload=function(){
            var raspuns=this.responseText;
            if(raspuns==0)
                element3.textContent="email deja luat";
            else{
                ok++;
                if(ok===6){
                    var elem=document.getElementById("reusit");
                    elem.textContent="Autentificare Reusita";
                    Tutor1();
                        
                }
            }
        }
        xhr.open("POST","functionRegister.php");
        xhr.setRequestHeader("Content-type","application/json");
        xhr.send(JSON.stringify(object));
        
    }
}
function verificareCredentialeLogin(){
    var email=document.getElementById("Email");
    var password=document.getElementById("Password");

    var element=document.getElementById("gresit");

    const object={"email" : [email.value],"password" : [password.value]};
    const xhr = new XMLHttpRequest();
        xhr.onload=function(){
            var raspuns=this.responseText;
            console.log(raspuns);
            if(raspuns==0)
                element.textContent="Credentiale gresite";
            else{
                element.textContent="Autentificare Reusita";
                Tutor2();
            }
        }
        xhr.open("POST","functionLogin.php");
        xhr.setRequestHeader("Content-type","application/json");
        xhr.send(JSON.stringify(object));
}
function sleep(ms) {
    return new Promise(resolve => setTimeout(resolve, ms));
 }
 async function Tutor1() {
    await sleep(3000);
    window.location.href = "../login/login.php";
}
async function Tutor2() {
    await sleep(1500);
    window.location.href = "../statistici/statistici.php";
}