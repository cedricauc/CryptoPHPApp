<link href="<?php echo '/assets/bootstrap/css/admin.min.css';?>" rel="stylesheet">

<body id="page-top">
<div id="wrapper">
    <nav class="navbar navbar-dark align-items-start sidebar sidebar-dark accordion bg-gradient-primary p-0">
        <div class="container-fluid d-flex flex-column p-0"><a class="navbar-brand d-flex justify-content-center align-items-center sidebar-brand m-0" href="#">
                <div class="sidebar-brand-icon rotate-n-15"><span><img src="assets/img/logo.png" style="width: 50px; height: 50px;" /></span></div>
                <div class="sidebar-brand-text mx-3"><span>cryptoevol</span></div>
            </a>
            <hr class="sidebar-divider my-0">
            <ul class="navbar-nav text-light" id="accordionSidebar">
                <li class="nav-item"><a class="nav-link active" href="index.html"><span>Dashboard</span></a></li>
                <li class="nav-item"><a class="nav-link" href="profile.html"><span>Profile</span></a></li>
                <li class="nav-item"><a class="nav-link" href="table.html"><span>Table</span></a></li>
                <li class="nav-item"><a class="nav-link" href="login.html"><span>Login</span></a></li>
                <li class="nav-item"><a class="nav-link" href="register.html"><span>Register</span></a></li>
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
                            <div class="nav-item dropdown no-arrow"><a class="dropdown-toggle nav-link" aria-expanded="false" data-bs-toggle="dropdown" href="#"><span class="d-none d-lg-inline me-2 text-gray-600 small"><?= $user->username ?></span><img class="border rounded-circle img-profile" src="assets/img/avatars/avatar1.jpeg"></a>
                                <div class="dropdown-menu shadow dropdown-menu-end animated--grow-in"><a class="dropdown-item" href="#"><i class="fas fa-user fa-sm fa-fw me-2 text-gray-400"></i>&nbsp;Profile</a><a class="dropdown-item" href="#"><i class="fas fa-cogs fa-sm fa-fw me-2 text-gray-400"></i>&nbsp;Settings</a><a class="dropdown-item" href="#"><i class="fas fa-list fa-sm fa-fw me-2 text-gray-400"></i>&nbsp;Activity log</a>
                                    <div class="dropdown-divider"></div><a class="dropdown-item" href="#"><i class="fas fa-sign-out-alt fa-sm fa-fw me-2 text-gray-400"></i>&nbsp;Logout</a>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
            <div class="container-fluid">
                <div class="d-sm-flex justify-content-between align-items-center mb-4">
                    <h3 class="text-dark mb-0">Dashboard</h3>
                </div>
                <div class="row">
                    <div class="col-12 col-xl-6 col-xxl-8 mb-4">
                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <div class="row align-items-center no-gutters">
                                    <div class="col me-2">
                                        <h4 class="text-primary fw-bold m-0">Mon Profil</h4>
                                    </div>
                                    <div class="col-auto"><i class="fas fa-pen"></i></div>
                                </div>
                            </div>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">
                                    <div class="row align-items-center no-gutters">
                                        <div class="col me-2">
                                            <h6 class="mb-0"><strong>email: john_doe@domain.com</strong></h6>
                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item">
                                    <div class="row align-items-center no-gutters">
                                        <div class="col me-2">
                                            <h6 class="mb-0"><strong>date de naissance: 01/01/2000</strong></h6>
                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item">
                                    <div class="row align-items-center no-gutters">
                                        <div class="col me-2">
                                            <h6 class="mb-0"><strong>nom utilisateur: john_doe</strong></h6>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-12 col-xl-6 col-xxl-4 d-flex flex-grow-0 mb-4">
                        <div class="row d-flex flex-grow-1 flex-fill align-items-center no-gutters">
                            <div class="col d-flex flex-grow-1 justify-content-center"><img class="rounded-circle img-fluid border border-1 d-inline-flex justify-content-center align-items-center"><i class="fas fa-pen d-inline-flex justify-content-center align-items-center"></i></div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="card shadow mb-4">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <h6 class="text-primary fw-bold m-0">Liste de vos cryptomonnaies</h6>
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
                    <div class="col-12 mb-4">
                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <h6 class="text-primary fw-bold m-0">Liste des cryptomonnaies</h6>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">

                                    <div class="box-body table-responsive no-padding">
                                        <table class="table row-border hover" style="width:100%;margin-left:0px;" id="data">
                                            <thead>
                                            <tr>
                                                <th>Nom</th>
                                                <th>Prix</th>
                                                <th>24H Volume</th>
                                                <th>Market Cap</th>
                                                <th>Actions</th>
                                            </tr>
                                            </thead>
                                            <?php if (!empty($items)) : ?>
                                            <tbody>

                                            <?php foreach($items as $item): ?>
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
                                                    <?php if(in_array($item->id, $my_crypto)) : ?>
                                                        <a href="/admin/remove/<?= $item->id ?>" class="btn btn-default"><i class="fas fa-trash"></i></a>
                                                        &nbsp;|&nbsp;
                                                    <?php else : ?>
                                                        <a href="/admin/add/<?= $item->id ?>/<?= $item->slug ?>" class="btn btn-default"><i class="fas fa-plus"></i></a>
                                                        &nbsp;|&nbsp;
                                                    <?php endif ?>
                                                    <button class="btn btn-dark ms-3" type="button" data-bs-toggle="modal" data-bs-target="#show<?= $item->id ?>">
                                                        <i class="far fa-eye"></i>
                                                    </button>
                                                    <!-- Modal -->
                                                    <!-- Déclaration du composant -->
                                                    <div class="modal fade" id="show<?= $item->id ?>" tabindex="-1" role="dialog" aria-labelledby="showLabel"
                                                         aria-hidden="true">
                                                        <!-- Mise en place de la fenêtre -->
                                                        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                                                            <div class="modal-content">
                                                                <!-- Classes qui permettent d'en délimiter la structure -->
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="showLabel">Crypto : <?= $item->name ?></h5>
                                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                </div>
                                                                <!-- Classes qui permettent d'en délimiter la structure -->
                                                                <div class="modal-body">
                                                                    <div class="card-body">
                                                                        <div class="chart-area">
                                                                            <canvas data-bss-chart="{&quot;type&quot;:&quot;line&quot;,&quot;data&quot;:{&quot;labels&quot;:[&quot;Jan&quot;,&quot;Feb&quot;,&quot;Mar&quot;,&quot;Apr&quot;,&quot;May&quot;,&quot;Jun&quot;,&quot;Jul&quot;,&quot;Aug&quot;],&quot;datasets&quot;:[{&quot;label&quot;:&quot;Earnings&quot;,&quot;fill&quot;:true,&quot;data&quot;:[&quot;0&quot;,&quot;10000&quot;,&quot;5000&quot;,&quot;15000&quot;,&quot;10000&quot;,&quot;20000&quot;,&quot;15000&quot;,&quot;25000&quot;],&quot;backgroundColor&quot;:&quot;rgba(78, 115, 223, 0.05)&quot;,&quot;borderColor&quot;:&quot;rgba(78, 115, 223, 1)&quot;}]},&quot;options&quot;:{&quot;maintainAspectRatio&quot;:false,&quot;legend&quot;:{&quot;display&quot;:false,&quot;labels&quot;:{&quot;fontStyle&quot;:&quot;normal&quot;}},&quot;title&quot;:{&quot;fontStyle&quot;:&quot;normal&quot;},&quot;scales&quot;:{&quot;xAxes&quot;:[{&quot;gridLines&quot;:{&quot;color&quot;:&quot;rgb(234, 236, 244)&quot;,&quot;zeroLineColor&quot;:&quot;rgb(234, 236, 244)&quot;,&quot;drawBorder&quot;:false,&quot;drawTicks&quot;:false,&quot;borderDash&quot;:[&quot;2&quot;],&quot;zeroLineBorderDash&quot;:[&quot;2&quot;],&quot;drawOnChartArea&quot;:false},&quot;ticks&quot;:{&quot;fontColor&quot;:&quot;#858796&quot;,&quot;fontStyle&quot;:&quot;normal&quot;,&quot;padding&quot;:20}}],&quot;yAxes&quot;:[{&quot;gridLines&quot;:{&quot;color&quot;:&quot;rgb(234, 236, 244)&quot;,&quot;zeroLineColor&quot;:&quot;rgb(234, 236, 244)&quot;,&quot;drawBorder&quot;:false,&quot;drawTicks&quot;:false,&quot;borderDash&quot;:[&quot;2&quot;],&quot;zeroLineBorderDash&quot;:[&quot;2&quot;]},&quot;ticks&quot;:{&quot;fontColor&quot;:&quot;#858796&quot;,&quot;fontStyle&quot;:&quot;normal&quot;,&quot;padding&quot;:20}}]}}}"></canvas>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <!-- Classes qui permettent d'en délimiter la structure -->
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <?php endforeach ?>

                                            </tbody>
                                            <?php else: ?>
                                            <tbody>
                                            <tr>
                                                <td colspan="3" class="no-data-available">No data!</td>
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
    </div><a class="border rounded d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a>
</div>

<script>
     function fetch() {
         return new Promise( (resolve, reject) => {
            const base_url = window.location.origin;
            const xhr = new XMLHttpRequest();
            const verb = 'GET';
            const route = base_url + '/admin/bookmarks';
            let result;

            xhr.open(verb, route);

            xhr.addEventListener('readystatechange', function() {
                if(xhr.readyState === 4) {
                    if(xhr.status !== 200) {
                        alert('An error occured. Code: ' + xhr.status + ', Message : ' + xhr.statusText);
                    } else {
                        result = JSON.parse(xhr.response);
                        return resolve(result)
                    }
                }
            });
            xhr.send();
         });
    }

     function randomRGB() {
         const x = Math.floor(Math.random() * 256);
         const y = Math.floor(Math.random() * 256);
         const z = Math.floor(Math.random() * 256);
         return "rgb(" + x + "," + y + "," + z + ")";
     }


     window.addEventListener("load", (event) => {
        const req = fetch();
        let datasets = [
                // {
                //     label: "My First dataset",
                //     data: [65, 59, 80, 81, 56, 55, 40],
                //     backgroundColor: [
                //         'rgba(105, 0, 132, .2)',
                //     ],
                //     borderColor: [
                //         'rgba(200, 99, 132, .7)',
                //     ],
                //     borderWidth: 2
                // },
                // {
                //     label: "My Second dataset",
                //     data: [28, 48, 40, 19, 86, 27, 90],
                //     backgroundColor: [
                //         'rgba(0, 137, 132, .2)',
                //     ],
                //     borderColor: [
                //         'rgba(0, 10, 130, .7)',
                //     ],
                //     borderWidth: 2
                // }
        ];

        req.then(function(result) {
            const rows = Object.entries(result);

            rows.forEach((itr, index)=> {
                const item =  {
                    label: itr[1].name,
                    data: [itr[1].quote.USD.percent_change_1h, itr[1].quote.USD.percent_change_24h, itr[1].quote.USD.percent_change_30d, itr[1].quote.USD.percent_change_7d],
                    backgroundColor: [
                        randomRGB(),
                    ],
                    borderColor: [
                        randomRGB(),
                    ],
                    borderWidth: 2
                };
                datasets.push(item)
            })

            const ctxL = document.getElementById("lineChart").getContext('2d');
            const myLineChart = new Chart(ctxL, {
                type: 'line',
                data: {
                    labels: ["1h", "24h", "7d", "30d"],
                    datasets: datasets,
                },
                options: {
                    responsive: true
                }
            });
        })

        $('#data').DataTable();
    });
</script>
<script src="assets/js/chart.min.js"></script>
<script src="assets/js/bs-init.js"></script>
<script src="assets/js/theme.js"></script>
