let signin = document.getElementById('signin');
let signup = document.getElementById('signup');
let signupbtn=document.getElementById('sign');
let gotopost=document.getElementById('post');
let gotocat=document.getElementById('categ');
let category=document.getElementById('categories');
let posts=document.getElementById('posts');


category.style.display = 'none';
gotocat.addEventListener('click', function() {
    category.style.display='block'
    posts.style.display='none'
});
gotopost.addEventListener('click', function() {
    posts.style.display='block'
    category.style.display='none'
});
