<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="/assets/styles/dashboard.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    </head>
    
<style>
    .freelancer td {
      word-wrap: break-word; /* Permet aux mots longs de se casser et d'occuper plusieurs lignes */
      max-width: 200px; /* Définissez la largeur maximale souhaitée */
    }
</style>

<body>
    <div class="wrapper">
        <div class="main">
            <nav class="navbar justify-content-space-between pe-4 ps-2">
            <button class="btn open">
                    <span></span>
                </button>
                <div class="navbar  gap-4">
                    <!-- <img src="img/search.svg" alt="icon"> -->
                    <div class="card new w-auto">
                        <div class="list-group list-group-light">
                            <div class="list-group-item px-3 d-flex justify-content-between align-items-center ">
                                <p class="mt-auto">Notification</p><a href="#"><img src="assets/img/settingsno.svg" alt="icon"></a>
                            </div>
                            <div class="list-group-item px-3 d-flex"><img src="assets/img/notif.svg" alt="iconimage">
                                <div class="card-body">
                                    <h5 class="card-title">Card title</h5>
                                    <p class="card-text mb-3">Some quick example text to build on the card title and make up
                                        the bulk of the card's content.</p>
                                    <small class="card-text">1  day ago</small>
                                </div>
                            </div>
                            <div class="list-group-item px-3 d-flex"><img src="assets/img/notif.svg" alt="iconimage">
                                <div class="card-body">
                                    <h5 class="card-title">Card title</h5>
                                    <p class="card-text mb-3">Some quick example text to build on the card title and make up
                                        the bulk of the card's content.</p>
                                    <small class="card-text">1  day ago</small>
                                </div>
                            </div>
                            <div class="list-group-item px-3 text-center"><a href="#">View all notifications</a></div>
                        </div>
                    </div>
                    <div></div>
                    <ul class="navbar-nav">
                        <li class="nav-item dropdown">
                            <a href="#" class="nav-icon pe-md-0 position-relative" data-bs-toggle="dropdown">
                                <img src="assets/img/photo_admin.svg" alt="icon">
                            </a>
                            <div class="dropdown-menu dropdown-menu-end position-absolute">
                                <a class="dropdown-item" href="#">Profile</a>
                                <a class="dropdown-item" href="#">Account Setting</a>
                                <a class="dropdown-item" href="?route=login">Log out</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
            <section class="Agents px-4">
                <table class="agent table align-middle bg-white">
                    <a href="?route=addview"><button type="button" class="btn btn-dark  btn btn-outline-light ">Add New Wiki</button></a>
                    <thead class="bg-light">
                        <tr>
                            <th>titre</th>
                            <th>description</th>
                            <th>Image</th>
                            <th>Action</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($wikies as $row):?>
                    <tr class="freelancer">
                        <td>
                            <p class="fw-bold mb-1 f_name"><?= $row['titre'];?></p>
                        </td>
                        <td>
                            <?= $row['description'];?>
                        </td>
                        <td>
                            <img class='grid-img' src="/../../<?= $row['image'] ?>" style="width : 90px;" />
                        </td>
                        <td class="f_position">
                            <a href="?route=deleteWikie&id=<?= $row['id'];?>"><img src="/assets/img/icons8-poubelle-30.png" style="width:20px;"></a>
                        </td>
                        <td>
                            <a href='?route=updateWiki&id=<?= $row['id'];?>'><img class='ms-2 edit' src='/assets/img/edit.svg' style= 'width:20px;'></a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
        <script src="/assets/js/dashboard.js"></script>
        <script src="/assets/js/script1.js"></script>
</body>

</html>