<?php
    include("api.php");
    $page = 1;
    $page_limit = 0;
    $error_found = true;
    if(isset($_REQUEST['page'])) {
        $page = $_REQUEST['page'];
    } 
    $url = "https://rickandmortyapi.com/api/character/?page=" . $page;
    $objResultSet = CallAPI("GET", $url);
    if(!empty($objResultSet->info)) {
        $page_limit = $objResultSet->info->pages;
        $error_found = false;
    }
?>

<body>
<div class="container-fluid px-4">
        <div class="row">
            <?php
                if(!$error_found) {
                    foreach($objResultSet->results as $item) {
            ?>
            <div class="col-xl-3 col-md-6">
                <div class="card mb-4 shadow-sm" style="width: 18rem;">
                    <img class="card-img-top" 
                        src=<?= $item->image; ?>
                        alt="Card image cap"
                    >
                    <div class="card-body">
                        <h5 class="card-title">
                            <?= $item->name; ?>
                        </h5>
                        <p class="card-text">
                            <?= $item->species; ?>
                        </p>
                        <a href="#" class="btn btn-primary" 
                            onclick="atest(
                                '<?= $item->image; ?>',
                                '<?= $item->name; ?>',
                                '<?= $item->species; ?>',
                                '<?= $item->gender; ?>', 
                                '<?= $item->status; ?>',
                                '<?= $item->origin->name; ?>'
                            )">
                            More information
                        </a>
                    </div>
                </div>
            </div>
            <?php
                    }
                }
            ?>
        </div>
        <div class=
        "container-fluid px-4">
            <nav aria-label="Page navigation example">
            <ul class="pagination justify-content-center">
                <?php
                    if($page!=1 && $page<=$page_limit) {
                ?>
                    <li class="page-item">
                    <a class="page-link" href="?page=<?= $page-1; ?>" aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                        <span class="sr-only">Previous</span>
                    </a>
                    </li>
                <?php
                    }
                ?>
                <?php
                    for ($page, $i = 0, $max_increment = 3; ($page<=$page_limit && $i<$max_increment); $page++, $i++) {
                ?>
                <li class="page-item"><a class="page-link" href="?page=<?= $page; ?>"><?= $page; ?></a></li>
                <?php
                    }
                ?>
                <?php
                    if($page <= $page_limit) {
                ?>
                <li class="page-item">
                <a class="page-link" href="?page=<?= $page; ?>" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                    <span class="sr-only">Next</span>
                </a>
                </li>
                <?php
                    }
                ?>
            </ul>
            </nav>
        </div>

<div id="myModal" class="modal fade" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 id="modal-title" class="modal-title">Name</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <img id="modal-img" class="card-img-top" src="" alt="Card image cap">
                    <div class="card-body">
                        <p>Species: </p>
                        <p id="modal-species" class="text-secondary"><small>Species</small></p>
                        <p>Gender: </p>
                        <p id="modal-gender" class="text-secondary"><small>Gender</small></p>
                        <p>Status: </p>
                        <p id="modal-status" class="text-secondary"><small>Status</small></p>
                        <p>Origin: </p>
                        <p id="modal-origin" class="text-secondary"><small>Origin</small></p>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

</body>