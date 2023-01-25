<?php
include '../classes/user.class.php';
include '../classes/dashboard.php';

if(isset($_GET['action']) && $_GET['action'] === 'logout') {
    $admin = new Admin();
    $admin->logout();
}

$category = new Categories();
$category->addCategory();
$post = new Posts();
$post->addPost();



$getcategory = new Database();
$getcategory->get('categories','*');
$resultcategory=$getcategory->sql;
// print_r($resultcategory);
$rowscategory=[];
while($resultcat=$resultcategory->fetch(PDO::FETCH_ASSOC)){
    array_push($rowscategory,$resultcat);
};



$getuser = new Database();
$getuser->get('admin','*');
$resultuser=$getuser->sql;
$rowsuser=[];
while($resultusers=$resultuser->fetch(PDO::FETCH_ASSOC)){
    array_push($rowsuser,$resultusers);
};



$getpost = new Database();
$getpost->get('post','*');
$resultpost=$getpost->sql;
$rowspost=[];
while($resultpostt=$resultpost->fetch(PDO::FETCH_ASSOC)){
    array_push($rowspost,$resultpostt);
};
$getadminspost = new Database();
$getadminspost->get('post','id,title,article,image,category,datetime','user='.$_SESSION["id"]);
$rowsadminspost=$getadminspost->sql->fetchAll(PDO::FETCH_ASSOC);
// $rowsadminspost=[];
// while($resultadminspostt=$resultadminspost->fetch(PDO::FETCH_ASSOC)){
//     array_push($rowsadminspost,$resultadminspostt);
// };
if(isset($_GET['deletepost'])){
    $id = $_GET['deletepost'];
    $getpost->delete('post',"id='$id'");
}
if(isset($_GET['delete'])){
    $id = $_GET['delete'];
    $getcategory->delete('categories',"id='$id'");
}

if (isset($_POST['Update'])) {
    $updatePost = new Database();
    $id = $_POST['updateId'];
    $title = $_POST['updateTitle'];
    $article = $_POST['updateArticle'];
    $categ = $_POST['updateCategory'];
    $imgname = $_FILES['image']['name'];
    if(!empty($imgname)){
        $ext = pathinfo($imgname, PATHINFO_EXTENSION);
        $new_imgname = time().'.'.$ext;
        move_uploaded_file($_FILES['image']['tmp_name'], './assets/img/'.$new_imgname);
        $updatePost->update('post',['title'=>$title,'article'=>$article,'image'=>$imgname,'category'=>$categ],"id='$id'");
    }
    else{
        $new_imgname = '';
        $updatePost->update('post',['title'=>$title,'article'=>$article,'category'=>$categ],"id='$id'");
    }

    
    
}

?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
    <script defer src="https://parsleyjs.org/dist/parsley.min.js"></script>
    <link rel="stylesheet" href="../assets/sass/style.css"/>
    
    <title>CultureDev - Dashboard</title>

</head>
<body class="dashboard">
    <header>
        <nav class="navbar navbar-expand navbar-light">
            <div class="container-fluid">
                <div><img class="logo" src="../assets/img/logo.png"></div>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-end" id="navbarColor01">
                    <div class="btn-group">
                        <img src="../assets/img/ppl.png" class="pp">
                        <button type="button" class="btn dropdown-toggle text-light" data-bs-toggle="dropdown" aria-expanded="false">
                        <?php
                            if(isset($_SESSION["name"]))
                            echo $_SESSION["name"];
                        ?>
                        </button>
                        <ul class="dropdown-menu">
                            <li><button class="dropdown-item" type="button">Settings</button></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="link" href="index.php?action=logout">
                                    <button class="dropdown-item">Logout</button>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>
    </header>
    <div id="dashboard">
    <container class="d-flex h-40 text-secondary">
        <div class="">
            <dash class="dash ms-2">
                <stats class="row ms-3">
                    <div class="user ms-4 col_4 row h-50 mt-2" id="gotoadminspost">
                        <img class="blue col-3" src="../assets/img/ppl.png" alt="" style="width:120px;height:100px">
                        <div class="stats col-3 text-light ms-2">
                            <h4 class="mt-2">Developers</h4>
                            <h4 class="mt-3"><?php 
                            echo count($rowsuser); ?></h4>
                        </div>
                    </div>
                    <div class="user ms-4 col_4 row h-50 mt-2" id="categ">
                        <img class="blue col-3" src="../assets/img/categ.png" alt="" style="width:120px;height:100px">
                        <div class="stats col-3 text-light ms-2">
                            <h4 class="mt-2">Categories</h4>
                            <h4 class="mt-3"><?php 
                            echo count($rowscategory); ?></h4>
                        </div>
                    </div>
                    <div class="user ms-4 col-4 row h-50 mt-2" id="post">
                        <img class="blue col-3" src="../assets/img/post.png" alt="" style="width:120px;height:100px">
                        <div class="stats col-3 text-light ms-2">
                            <h4 class="mt-2">Posts/Articles</h4>
                            <h4 class="mt-3"><?php 
                            echo count($rowspost); ?></h4>
                        </div>
                    </div>
                </stats>
            </dash>
            <?php 
            if(isset($_SESSION['message'])){
					if ($_SESSION['message'] == 'Product has been deleted successfully !'){
			?>
				<div class="alert alert-danger alert-dismissible fade show mt-2 ms-3">
				<strong>Success!</strong>
					<?php 
						echo $_SESSION['message']; 
						unset($_SESSION['message']);
					?>
					<button type="button" class="btn-close" data-bs-dismiss="alert"></span>
				</div>
			<?php 
        } else{?>
				<div class="alert alert-success alert-dismissible fade show mt-2 ms-3">
				<strong>Success!</strong>
					<?php 
						echo $_SESSION['message']; 
						unset($_SESSION['message']);
					?>
					<button type="button" class="btn-close" data-bs-dismiss="alert"></span>
				</div> 
				<?php 
            }} ?>
            
        </div>
    </container>
    </div>
    <div id="postsUpdate">
    <div class="container text-white">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="POST" id="postform">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Post</h5>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="updateId" name = 'updateId' value="<?php echo $rowsadminspost[$_GET['update']]['id']; ?>">
                    <input type="hidden" id="updateDatetime" name = 'updateDatetime' value="<?php echo date("Y/m/d h:i:sa"); ?>">
                    <input type="hidden" id="updateUser" name = 'updateUser' value="<?php if(isset($_SESSION["id"]))echo $_SESSION["id"]; ?>">
                    <div class="mb-3">
                        <label class="col-form-label">Title:</label>
                        <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" name="updateTitle" value="<?php if(isset($_GET['update'])){ echo $rowsadminspost[$_GET['update']]['title']; ?>">
                    </div>
                    <div class="mb-3">
                        <label for="message-text" class="col-form-label">Article:</label>
                        <textarea class="form-control" id="updateArticle" name="updateArticle"><?php echo $rowsadminspost[$_GET['update']]['article']; }?></textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Category</label name priority>
                        <select class="form-select" id="updateCategory" name="updateCategory">
                            <option value="">pls select</option>
                            <?php for($i=0;$i<count($rowscategory);$i++) {?>
                            <option value="<?= $rowscategory[$i]['id']?>"<?php if($rowspost[$_GET['update']]['category']==$rowscategory[$i]['id'])echo 'selected';?>><?php echo $rowscategory[$i]['categ'];?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Image</label>
                        <input type="file" class="form-control" id="image" name ='image'/>
                    </div>
                </div>
                <div class="modal-footer">
                    <a href="#" class="btn btn-white" data-bs-dismiss="modal">Cancel</a>
                    <button type="submit" name="Update" class="btn btn-primary task-action-btn ms-1" id="task-save-btn">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
    </div>
    <div id="posts">
        <div class="d-flex justify-content-end mt-3">
            <a href="#modal-post" data-bs-toggle="modal" class="add-btn btn btn-rounded rounded-pill mb-3" onclick="document.getElementById('modal-post').reset()"><i class="bi bi-plus me-2 ms-n2 text-success-900"></i> Add Post</a>
        </div>
        <table class="table ms-3 mt-4" id="table">
            <thead>
                <tr class="line">
                    <th class="col-1"></th>
                    <th class="col-2">Admin</th>
                    <th class="col-2">Date & Time</th>
                    <th class="col-2">Title</th>
                    <th class="col-3">Articles</th>
                    <th class="col-2">Category</th>
                </tr>
            </thead>
            <tbody>
            <?php for($i=0;$i<count($rowspost);$i++) {?>
            <tr>
                <td class="col-1"><img src="../assets/img/<?php echo $rowspost[$i]['image'];?>" style="width:50px;height:50px;"></td>
                <td class="col-2"><?php foreach($rowsuser as $users){if($rowspost[$i]['user']==$users['id'])echo $users['username'];}?></td>
                <td class="col-2"><?php echo $rowspost[$i]['datetime'];?></td>
                <td class="col-2"><?php echo $rowspost[$i]['title'];?></td>
                <td class="col-3"><?php echo $rowspost[$i]['article'];?></td>
                <td class="col-2"><?php foreach($rowscategory as $categoryy){if($rowspost[$i]['category']==$categoryy['id'])echo $categoryy['categ'];}?></th>
            </tr>
            <?php }?></tbody>
        </table>
    </div>
    <div class="modal fade" id="modal-post">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form method="POST" id="postform" enctype="multipart/form-data" data-parsley-validate>
                        <div class="modal-header">
                            <h5 class="modal-title">Add Post</h5>
                            <a href="#" class="btn-close" data-bs-dismiss="modal"></a>
                        </div>
                        <div id="modal-body">
                            <div class="modal-body" id="">
                                <input type="hidden" id="postId" name = 'postId[]'>
                                <input type="hidden" id="datetime" name = 'datetime[]' value="<?php echo date("Y/m/d h:i:sa"); ?>">
                                <input type="hidden" id="user" name = 'user[]' value="<?php if(isset($_SESSION["id"]))echo $_SESSION["id"]; ?>">
                                <div class="mb-3">
                                    <label class="col-form-label">Title:</label>
                                    <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" name="title[]" data-parsley-trigger="keyup" required>
                                </div>
                                <div class="mb-3">
                                    <label for="message-text" class="col-form-label">Article:</label>
                                    <textarea class="form-control" id="message-text" name="article[]" data-parsley-trigger="keyup" required></textarea>
                                </div>
                                <div class="mb-3">
                                        <label class="form-label">Category</label name priority>
                                        <select class="form-select" id="task-priority" name="categorySelect[]" required>
                                            <option value="">Please select</option>
                                        <?php  for($i=0;$i<count($rowscategory);$i++) {?>
                                            <option value="<?= $rowscategory[$i]['id']?>"><?php echo $rowscategory[$i]['categ'];?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                <div class="mb-3">
                                    <label class="form-label">Image</label>
                                    <input type="file" class="form-control" id="image" name ='image[]' required/>
                                </div>
                            </div>
                        </div>
                        <div id="newFormContainer">

                        </div>
                        <div class="modal-footer">
                            <a href="#" class="btn btn-white" data-bs-dismiss="modal">Cancel</a>
                            <button type="button" name="save" class="btn btn-primary task-action-btn ms-1" id="addPost" onclick="newForm()">Add Post</button>
                            <button type="submit" name="save" class="btn btn-primary task-action-btn ms-1" id="task-save-btn">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    <div id="adminsPosts">
        <div class="d-flex justify-content-end mt-3">
            <a href="#modal-post" data-bs-toggle="modal" class="add-btn btn btn-rounded rounded-pill" onclick="document.getElementById('form').reset()"><i class="bi bi-plus me-2 ms-n2 text-success-900"></i> Add Post</a>
        </div>
        <table class="table ms-3 mt-4">
            <thead>
                <tr class="line">
                    <th class="col-1"></th>
                    <th class="col-2">Date & Time</th>
                    <th class="col-2">Title</th>
                    <th class="col-3">Articles</th>
                    <th class="col-1">Category</th>
                    <th class="col-1"></th>
                </tr>
            </thead>
            <?php for($i=0;$i<count($rowsadminspost);$i++) {?>
            <tbody>
                <th class="col-1"><img src="../assets/img/<?php echo $rowspost[$i]['image'];?>" style="width:50px;height:50px;"></th>
                <th class="col-2"><?php echo $rowsadminspost[$i]['datetime'];?></th>
                <th class="col-2"><?php echo $rowsadminspost[$i]['title'];?></th>
                <th class="col-3"><?php echo $rowsadminspost[$i]['article'];?></th>
                <th class="col-1"><?php foreach($rowscategory as $categoryy){if($rowspost[$i]['category']==$categoryy['id'])echo $categoryy['categ'];}?></th>
                <th class="col-1">
                    <div class="d-flex">
                        <a href="index.php?update=<?php echo $i; ?>" class="update mt-2"><i class="bi bi-pencil-square text-primary mt-2 fs-4"></i></a>
                        <button data-bs-toggle="modal" data-bs-target="#deletePost" data-id="<?php echo $rowsadminspost[$i]['id']; ?>"  id="del" class="btn btn-sm ms-3" onclick="deletePost(<?= $rowsadminspost[$i]['id']?>)"><i class="bi bi-trash3 text-danger ms-2 mt-2 fs-4"></i></button>
                    </div>
                </th>
            </tbody>
            <?php }?>
        </table>
    </div>
    <div id="categories">
        <div class="d-flex justify-content-end mt-4">
            <a href="#modal-category" data-bs-toggle="modal" class="add-btn btn btn-rounded rounded-pill" onclick="document.getElementById('form').reset()"><i class="bi bi-plus me-2 ms-n2 text-success-900"></i> Add Category</a>
        </div>
        <div class="row mt-4 ms-5 fs-5">
            <?php  for($i=0;$i<count($rowscategory);$i++) {?>
            <div class="category col-2 p-3 mx-auto">
                
                <div class="d-flex justify-content-end"><button data-bs-toggle="modal" data-bs-target="#deleteCat" data-id="<?php echo $rowscategory[$i]['id']; ?>"  id="del" class="btn btn-danger btn-sm" onclick="deleteCategory(<?= $rowscategory[$i]['id']?>)"><i class="bi bi-x"></i></button></div>
                
                <div><?php echo $rowscategory[$i]['categ'];?></div>
            </div>
        <?php } ?></div>
        <div class="modal fade" id="modal-category">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form method="POST" id="catform">
                        <div class="modal-header">
                            <h5 class="modal-title">Add Category</h5>
                            <a href="#" class="btn-close" data-bs-dismiss="modal"></a>
                        </div>
                        <div class="modal-body">
                            <input type="hidden" id="categoryId" name = 'categoryId'>
                            <div class="mb-3">
                                <input class="form-control" id="text" name='category'></input>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <a href="#" class="btn btn-white" data-bs-dismiss="modal">Cancel</a>
                            <button type="submit" name="submit" class="btn btn-primary task-action-btn ms-1" id="task-save-btn">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="modal fade" id="deleteCat" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">HoldOOON!!!</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Do you really want to delete this category?
                </div>
                <div class="modal-footer d-flex justify-content-between">
                    <button type="button" class="btn btn-secondary ms-5" data-bs-dismiss="modal">NO</button>
                    <button id="deleteCategory" type="button" class="btn btn-primary" name="deletecat" data-bs-dismiss="modal">ofc</button>
                </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="deletePost" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">HoldOOON!!!</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      Do you really want to delete that post?
      </div>
      <div class="modal-footer d-flex justify-content-between">
        <button type="button" class="btn btn-secondary ms-5" data-bs-dismiss="modal">nn</button>
        <button type="button" class="btn btn-primary" name="deletepost" data-bs-dismiss="modal">ofc</button>
      </div>
    </div>
  </div>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap5.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <script src="../assets/scripts/scripts.js"></script>
    <script>
    $(document).ready(function () {
        $('#table').DataTable({
      "pagingType":"full_numbers",
      "lengthMenu":[
        [10, 25, 50, -1],
        [10, 25, 50, "All"]
    ],
    responsive:true,
    language:{
      search: "",
      searchPlaceholder:"Enter Keyword",
    }
    });
});
</script>
</body>
</html>