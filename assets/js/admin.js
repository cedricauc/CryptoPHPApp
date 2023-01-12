const base_url = window.location.origin;

// fonction pour récupérer la liste des cryptomonnaies
function fetch() {
    return new Promise((resolve, reject) => {
        const xhr = new XMLHttpRequest();
        const verb = 'GET';
        const route = base_url + '/admin/bookmarks';
        let result;

        xhr.open(verb, route);

        xhr.addEventListener('readystatechange', function () {
            if (xhr.readyState === 4) {
                if (xhr.status !== 200) {
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

// fonction pour générer une couleur aléatoire
function randomRGB($opacity) {
    const x = Math.floor(Math.random() * 256);
    const y = Math.floor(Math.random() * 256);
    const z = Math.floor(Math.random() * 256);
    return "rgb(" + x + "," + y + "," + z + "," + $opacity + ")";
}

window.addEventListener("load", (event) => {
    let datasets = [];

    const req = fetch();
    req.then(function (result) {
        let rows = [];
        if (result != null)
            rows = Object.entries(result);

        // chargement du dataset avec le résultat de la requête HTTP
        rows.forEach((itr, index) => {
            const item = {
                label: itr[1].name,
                data: [itr[1].quote.USD.percent_change_1h, itr[1].quote.USD.percent_change_24h, itr[1].quote.USD.percent_change_30d, itr[1].quote.USD.percent_change_7d],
                backgroundColor: [
                    randomRGB('.2'),
                ],
                borderColor: [
                    randomRGB('.7'),
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