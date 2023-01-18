<?php
session_start();

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
    <title>Origin Game - Dashboard</title>
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
                            // if(isset($_SESSION["UserName"]))
                            // echo $_SESSION["UserName"];
                        ?>
                        </button>
                        <ul class="dropdown-menu">
                            <li><button class="dropdown-item" type="button">Settings</button></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><form method="POST">
                                <button class="dropdown-item" type="submit" name="logout">Logout</button>
                                </form>
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
                            // counterUser() ?>54</h4>
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
                    <th class="col-4">Articles</th>
                    <th class="col-2">Category</th>
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
                                <label for="message-text" class="col-form-label">Post:</label>
                                <textarea class="form-control" id="message-text"></textarea>
                            </div>
                            <div class="mb-3">
                                    <label class="form-label">Category</label name priority>
                                    <select class="form-select" id="task-priority" name="category">
                                        <option value="">Please select</option>
                                        <option value="1">Game controller</option>
                                        <option value="2">Memory unit</option>
                                        <option value="3">Audio/Video cable</option>
                                        <option value="4">Case</option>
                                        <option value="5">PC</option>
                                        <option value="6">Software accessorie</option>
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
            <a href="#modal-task-category" data-bs-toggle="modal" class="add-btn btn btn-rounded rounded-pill" onclick="document.getElementById('form').reset()"><i class="bi bi-plus me-2 ms-n2 text-success-900"></i> Add Category</a>
        </div>
        <div class="row mt-4 ms-5 fs-5">
            <div class="category col-2 p-3 mx-auto">
                <div class="d-flex justify-content-end"><a href="#"><i class="bi bi-x"></i></a></div>
                <div>chi haja</div>
            </div>
        </div>
        <div class="modal fade" id="modal-task-category">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form action="scripts.php" method="POST" id="form" enctype="multipart/form-data">
                        <div class="modal-header">
                            <h5 class="modal-title">Add Category</h5>
                            <a href="#" class="btn-close" data-bs-dismiss="modal"></a>
                        </div>
                        <div class="modal-body">
                            <input type="hidden" id="task-id" name = 'id'>
                            <div class="mb-3">
                                <input class="form-control" id="text"></input>
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <script src="../assets/scripts/scripts.js"></script>
</body>
</html>