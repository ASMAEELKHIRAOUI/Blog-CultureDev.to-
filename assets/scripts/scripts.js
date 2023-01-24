let signin = document.getElementById('signin');
let signup = document.getElementById('signup');
let signupbtn=document.getElementById('sign');
let gotopost=document.getElementById('post');
let gotocat=document.getElementById('categ');
let category=document.getElementById('categories');
let posts=document.getElementById('posts');
let adminsPosts=document.getElementById('adminsPosts');
let gotoadminspost=document.getElementById('gotoadminspost')
let postsUpdate=document.getElementById('postsUpdate')
let dashboard=document.getElementById('dashboard')

category.style.display = 'none';
adminsPosts.style.display = 'none';
postsUpdate.style.display = 'none';

gotocat.addEventListener('click', function() {
    category.style.display='block'
    posts.style.display='none'
    adminsPosts.style.display = 'none';
});
gotopost.addEventListener('click', function() {
    posts.style.display='block'
    category.style.display='none'
    adminsPosts.style.display = 'none';
});
gotoadminspost.addEventListener('click', function() {
    posts.style.display='none'
    category.style.display='none'
    adminsPosts.style.display = 'block';
});

function hideDashboard(){
    dashboard.style.display = 'none';
    postsUpdate.style.display = 'block';
    adminsPosts.style.display = 'none';
    posts.style.display='none'
}


function deleteCategory(id) {
    document.getElementById("deleteCategory").addEventListener('click',function () {
        document.location.href="index.php?delete="+id;
    })
}
function deletePost(id) {
    document.getElementById("deletePost").addEventListener('click',function () {
        document.location.href="index.php?deletepost="+id;
    })
}
if(window.location.href.includes("update")) hideDashboard();