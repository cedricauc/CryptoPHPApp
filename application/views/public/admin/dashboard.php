<link href="<?php echo '/assets/bootstrap/css/admin.min.css'; ?>" rel="stylesheet">

<body id="page-top">
<div id="wrapper">
    <nav class="navbar navbar-dark align-items-start sidebar sidebar-dark accordion bg-gradient-primary p-0">
        <div class="container-fluid d-flex flex-column p-0"><a
                    class="navbar-brand d-flex justify-content-center align-items-center sidebar-brand m-0" href="#">
                <div class="sidebar-brand-icon rotate-n-15"><span><img src="/assets/img/logo.png"
                                                                       style="width: 50px; height: 50px;"/></span></div>
                <div class="sidebar-brand-text mx-3"><span>cryptoevol</span></div>
            </a>
            <hr class="sidebar-divider my-0">
            <ul class="navbar-nav text-light" id="accordionSidebar">
                <li class="nav-item"><a class="nav-link active" href="/admin#profil"><span>Mon Profil</span></a></li>
                <li class="nav-item"><a class="nav-link" href="/admin#favoris"><span>Mes Favoris</span></a></li>
                <li class="nav-item"><a class="nav-link" href="/admin#cryptomonnaies"><span>Liste Cryptomonnaies</span></a>
                </li>
            </ul>
            <div class="text-center d-none d-md-inline"></div>
        </div>
    </nav>
    <div class="d-flex flex-column" id="content-wrapper">
        <div id="content">
            <nav class="navbar navbar-light navbar-expand bg-white shadow mb-4 topbar static-top">
                <div class="container-fluid">
                    <ul class="navbar-nav flex-nowrap ms-auto">
                        <div class="d-none d-sm-block topbar-divider"></div>
                        <li class="nav-item dropdown no-arrow">
                            <div class="nav-item dropdown no-arrow"><a class="dropdown-toggle nav-link"
                                                                       aria-expanded="false" data-bs-toggle="dropdown"
                                                                       href="#"><span
                                            class="d-none d-lg-inline me-2 text-gray-600 small"><?= $user->username ?></span></a>
                                <div class="dropdown-menu shadow dropdown-menu-end animated--grow-in">
                                    <a class="dropdown-item" href="/admin/logout"><i
                                                class="fas fa-sign-out-alt fa-sm fa-fw me-2 text-gray-400"></i>&nbsp;Se
                                        déconnecter</a>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
            <div class="container-fluid">
                <div class="d-sm-flex justify-content-between align-items-center mb-4">
                    <h3 class="text-dark mb-0">Tableau de bord</h3>
                </div>
                <div class="row">
                    <div class="col-12" id="profil">
                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <div class="row align-items-center no-gutters">
                                    <div class="col me-2">
                                        <h4 class="text-primary fw-bold m-0">Mon Profil</h4>
                                    </div>
                                    <div class="col-auto" style="cursor:pointer"><i id="profile-action"
                                                                                    class="fas <?php if ($message) : ?>fa-times<?php else : ?>fa-pen<?php endif ?>"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body <?php if ($message) : ?>d-none<?php else : ?>d-block<?php endif ?>"
                                 id="profile-show">
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item">
                                        <div class="row align-items-center no-gutters">
                                            <div class="col me-2">
                                                <h6 class="mb-0"><strong>Email: <?= $user->email ?></strong></h6>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="list-group-item">
                                        <div class="row align-items-center no-gutters">
                                            <div class="col me-2">
                                                <h6 class="mb-0"><strong>Pseudo: <?= $user->username ?></strong></h6>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <div class="card-body <?php if ($message) : ?>d-block<?php else : ?>d-none<?php endif ?>"
                                 id="profile-edit">
                                <form class="user" method="post" action="/admin/edit">
                                    <div class="form-group">
                                        <label for="inputUsername">Username</label>
                                        <input type="text" name="username" class="form-control" id="username"
                                               placeholder="Enter username">
                                    </div>
                                    <div class="form-group">
                                        <label for="password">Password</label>
                                        <input type="password" class="form-control" id="password"
                                               placeholder="Password">
                                    </div>
                                    <div class="form-group">
                                        <label for="confirm">Confirm</label>
                                        <input type="text" class="form-control" name="verify" id="verifyPassword"
                                               placeholder="Confirm password">
                                    </div>
                                    <div class="row mb-3">
                                        <?php if ($message) : ?>
                                            <p id="errorMsg" class="text-info"><?= $message ?></p>
                                        <?php endif ?>
                                        <p id="usernameErrorMsg" class="text-danger" style="display:none;">Paragraph</p>
                                        <p id="passwordErrorMsg" class="text-danger" style="display:none;">Paragraph</p>
                                    </div>

                                    <button type="submit" id="submitBtn" class="btn btn-primary mt-3">Submit</button>
                                </form>
                            </div>


                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12" id="favoris">
                        <div class="card shadow mb-4">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <h4 class="text-primary fw-bold m-0">Mes favoris</h4>
                            </div>
                            <div class="card-body">
                                <div class="chart-area">
                                    <canvas id="lineChart" height="100"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 mb-4" id="cryptomonnaies">
                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <h4 class="text-primary fw-bold m-0">Liste des cryptomonnaies</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">

                                    <div class="box-body table-responsive no-padding">
                                        <table class="table row-border hover" style="width:100%;margin-left:0px;"
                                               id="data">
                                            <thead>
                                            <tr>
                                                <th>Nom</th>
                                                <th>Prix</th>
                                                <th>24H Volume</th>
                                                <th>Market Cap</th>
                                                <th>Actions</th>
                                            </tr>
                                            </thead>
                                            <?php if (!empty($data)) : ?>
                                                <tbody>

                                                <?php foreach ($data as $item): ?>
                                                    <tr role="row">
                                                        <td>
                                                            <?= $item->name ?>
                                                        </td>
                                                        <td>
                                                            <?= $item->quote->USD->price ?>
                                                        </td>
                                                        <td>
                                                            <?= $item->quote->USD->volume_24h ?>
                                                        </td>
                                                        <td>
                                                            <?= $item->quote->USD->market_cap ?>
                                                        </td>
                                                        <td class="button-column text-center">
                                                            <?php if (in_array($item->id, $bookmarks_id)) : ?>
                                                                <a href="/admin/remove/<?= $item->id ?>"
                                                                   class="btn btn-default"><i class="fas fa-trash"></i>
                                                                    Supprimer</a>
                                                            <?php else : ?>
                                                                <a href="/admin/add/<?= $item->id ?>/<?= $item->slug ?>"
                                                                   class="btn btn-default"><i class="fas fa-plus"></i>
                                                                    Ajouter</a>
                                                            <?php endif ?>
                                                        </td>
                                                    </tr>
                                                <?php endforeach ?>

                                                </tbody>
                                            <?php else: ?>
                                            <tbody>
                                            <tr>
                                                <td colspan="5" class="no-data-available">No data!</td>
                                            </tr>
                                            <tbody>
                                            <?php endif ?>
                                        </table>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <footer class="bg-white sticky-footer">
                <div class="container my-auto">
                    <div class="text-center my-auto copyright"><span>Cryptoevol © 2023</span></div>
                </div>
            </footer>
        </div>
        <a class="border rounded d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a>
    </div>
    <script src="/assets/js/edit.js"></script>
    <script src="/assets/js/admin.js"></script>
    <script src="/assets/js/chart.min.js"></script>
    <script src="/assets/js/bs-init.js"></script>
    <script src="/assets/js/theme.js"></script>
