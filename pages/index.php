<?php
include '../classes/user.class.php';
include '../classes/dashboard.php';

if(isset($_GET['action']) && $_GET['action'] === 'logout') {
    $spectateur = new Spectateur();
    $spectateur->logout();
}
isset($_SESSION['name']) ?: header('location:../pages/signin.php');
$category = new Categories();
$category->addCategory();
$getcategory = new Database();
$getcategory->getCategory('categories','*');
$result=$getcategory->sql;
$rows=[];
while($resultt=$result->fetch(PDO::FETCH_ASSOC)){
    array_push($rows,$resultt);
};
if(isset($_GET['delete'])){
    $id = $_GET['delete'];
    $getcategory->delete('categories',"id='$id'");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
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
                    <form class="d-flex">
                        <input class="input form-control me-sm-2 mt-1 search" type="text" placeholder="Enter keyword">
                        <button class="btn me-3 text-secondary bg-light btn-rounded rounded-pill h-50" type="submit"><i class="bi bi-search"></i></button>
                    </form>
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
    <container class="d-flex h-40 text-secondary">
        <div class="">
            <dash class="dash ms-2">
                <stats class="row ms-3">
                    <div class="user ms-4 col_4 row h-50 mt-2">
                        <img class="blue col-3" src="../assets/img/ppl.png" alt="" style="width:120px;height:100px">
                        <div class="stats col-3 text-light ms-2">
                            <h4 class="mt-2">Developers</h4>
                            <h4 class="mt-3"><?php 
                            // counterUser() ?>33</h4>
                        </div>
                    </div>
                    <div class="user ms-4 col_4 row h-50 mt-2" id="categ">
                        <img class="blue col-3" src="../assets/img/categ.png" alt="" style="width:120px;height:100px">
                        <div class="stats col-3 text-light ms-2">
                            <h4 class="mt-2">Categories</h4>
                            <h4 class="mt-3"><?php 
                            echo count($rows); ?></h4>
                        </div>
                    </div>
                    <div class="user ms-4 col-4 row h-50 mt-2" id="post">
                        <img class="blue col-3" src="../assets/img/post.png" alt="" style="width:120px;height:100px">
                        <div class="stats col-3 text-light ms-2">
                            <h4 class="mt-2">Posts/Articles</h4>
                            <h4 class="mt-3"><?php 
                            // counterProduct() ?>66</h4>
                        </div>
                    </div>
                </stats>
            </dash>
            <?php 
            // if(isset($_SESSION['message'])){
			// 		if ($_SESSION['message'] == 'Product has been deleted successfully !'){
			?>
				<div class="alert alert-danger alert-dismissible fade show mt-2 ms-3">
				<strong>Success!</strong>
					<?php 
						// echo $_SESSION['message']; 
						// unset($_SESSION['message']);
					?>
					<button type="button" class="btn-close" data-bs-dismiss="alert"></span>
				</div>
			<?php 
        // } else{?>
				<div class="alert alert-success alert-dismissible fade show mt-2 ms-3">
				<strong>Success!</strong>
					<?php 
						// echo $_SESSION['message']; 
						// unset($_SESSION['message']);
					?>
					<button type="button" class="btn-close" data-bs-dismiss="alert"></span>
				</div> 
				<?php 
            // }} ?>
            
        </div>
    </container>
    <div id="posts">
        <div class="d-flex justify-content-end mt-3">
            <a href="#modal-task" data-bs-toggle="modal" class="add-btn btn btn-rounded rounded-pill" onclick="document.getElementById('form').reset()"><i class="bi bi-plus me-2 ms-n2 text-success-900"></i> Add Post</a>
        </div>
        <table class="table ms-3 mt-4 text-light">
            <thead>
                <tr class="line">
                    <th class="col-1"></th>
                    <th class="col-2">Admin</th>
                    <th class="col-2">Date & Time</th>
                    <th class="col-2">Title</th>
                    <th class="col-3">Articles</th>
                    <th class="col-1">Category</th>
                    <th class="col-1"></th>
                </tr>
            </thead>
            <tbody>
                <?php
                    // getProducts()
                ?>
            </tbody>
        </table>
        <div class="modal fade" id="modal-task">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form action="scripts.php" method="POST" id="form" enctype="multipart/form-data">
                        <div class="modal-header">
                            <h5 class="modal-title">Add Post</h5>
                            <a href="#" class="btn-close" data-bs-dismiss="modal"></a>
                        </div>
                        <div class="modal-body">
                            <input type="hidden" id="task-id" name = 'id'>
                            <div class="mb-3">
                                <label class="col-form-label">Title:</label>
                                <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                            </div>
                            <div class="mb-3">
                                <label for="message-text" class="col-form-label">Post:</label>
                                <textarea class="form-control" id="message-text"></textarea>
                            </div>
                            <div class="mb-3">
                                    <label class="form-label">Category</label name priority>
                                    <select class="form-select" id="task-priority" name="category">
                                        <option value="">Please select</option>
                                    <?php  for($i=0;$i<count($rows);$i++) {?>
                                        <option value="<?= $rows[$i]['id']?>"><?php echo $rows[$i]['categ'];?></option>
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
                            <button type="submit" name="save" class="btn btn-primary task-action-btn ms-1" id="task-save-btn">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div id="categories">
        <div class="d-flex justify-content-end mt-4">
            <a href="#modal-category" data-bs-toggle="modal" class="add-btn btn btn-rounded rounded-pill" onclick="document.getElementById('form').reset()"><i class="bi bi-plus me-2 ms-n2 text-success-900"></i> Add Category</a>
        </div>
        <div class="row mt-4 ms-5 fs-5">
            <?php  for($i=0;$i<count($rows);$i++) {?>
            <div class="category col-2 p-3 mx-auto">
                
                <div class="d-flex justify-content-end"><button data-bs-toggle="modal" data-bs-target="#deleteModal" data-id="<?php echo $rows[$i]['id']; ?>"  id="del" class="btn btn-danger btn-sm" onclick="deleteCategory(<?= $rows[$i]['id']?>)"><i class="bi bi-x"></i></button></div>
                
                <div><?php echo $rows[$i]['categ'];?></div>
            </div>
        <?php } ?></div>
        <div class="modal fade" id="modal-category">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form method="POST" id="form">
                        <div class="modal-header">
                            <h5 class="modal-title">Add Category</h5>
                            <a href="#" class="btn-close" data-bs-dismiss="modal"></a>
                        </div>
                        <div class="modal-body">
                            <input type="hidden" id="id" name = 'id'>
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
        <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                    <button id="deleteButton" type="button" class="btn btn-primary" name="deletecat" data-bs-dismiss="modal">ofc</button>
                </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <script src="../assets/scripts/scripts.js"></script>
</body>
</html>