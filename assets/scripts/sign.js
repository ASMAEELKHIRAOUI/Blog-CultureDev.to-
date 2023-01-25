
let btnLogin = document.getElementById("signin");
let email = document.getElementById("email") ;
let Name = document.getElementById("username") ;
let password = document.getElementById("password")



function error(input, message){
    let formControl = input.parentElement ;
    input.classList.add('border-danger') ;
    let small = formControl.querySelector("small") ;
    small.classList.add("text-danger") ;
    small.innerText = message ;
}

function success(input){
    input.classList.add("border-success")
}


btnLogin.addEventListener('click', (e)=>{

    if (Name != null) {
     if(Name.value == ""){
         e.preventDefault() ;
         error(Name, "Name is required !!")
     }else{
         success(Name, "life is good")
     }
    }
     
     if(email.value == ""){
         e.preventDefault() ;
         error(email, "Email is required !!")
     }else{
         if (isValidEmail(email)) {
             success(email, "Email is good")
         }
          
     }
 
     if(password.value == ""){
         e.preventDefault() ;
         error(password, "Password is required !!")
     }else{ 
         success(password, "Password is good")
     }
 
 
 })