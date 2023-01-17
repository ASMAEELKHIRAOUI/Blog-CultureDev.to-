let signin = document.getElementById('signin');
let signup = document.getElementById('signup');
let signupbtn=document.getElementById('sign');


signup.style.display = 'none';
signupbtn.addEventListener('click', function() {
    signup.style.display='block'
    signin.style.display='none'
});
