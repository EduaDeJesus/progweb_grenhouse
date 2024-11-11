var mapainicializado = false; 

function openNav() {
    document.getElementById("navbar").classList.add("navbar-open");
}

function closeNav() {
    document.getElementById("navbar").classList.remove("navbar-open");
}

function inicializarMapa() {

    var map = L.map('map').setView([-20.4697, -54.6201], 13);

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(map);

    var markerData = [
        { lat: -20.4697, lng: -54.6201, title: "Edifício Montes Claros", info: "2 Dorms (1 Suíte) - 1 Vaga" },
        { lat: -20.4672, lng: -54.6254, title: "Residencial Vila Nova", info: "3 Dorms - 2 Banheiros" }
    ];

    markerData.forEach(data => {
        var marker = L.marker([data.lat, data.lng]).addTo(map);
        marker.bindPopup(`<b>${data.title}</b><br>${data.info}`).openPopup();
    });

}

function toggleUserOptions() {
    var userOptions = document.getElementById("user-options");
    userOptions.style.display = userOptions.style.display === "block" ? "none" : "block";
}

window.onclick = function(event) {
    if (!event.target.matches('.btn-info')) {
        var userOptions = document.getElementById("user-options");
        if (userOptions && userOptions.style.display === "block") {
            userOptions.style.display = "none";
        }
    }
}

document.addEventListener('DOMContentLoaded', function() {

    const userButton = document.querySelector(".user-area .btn-info");
    const userOptions = document.querySelector(".user-area .user-options");

    if (userButton && userOptions) {
        userButton.addEventListener("click", function (event) {
            event.preventDefault(); // Evita o redirecionamento

            userOptions.classList.toggle("show");
        });

        document.addEventListener("click", function (event) {
            if (!userButton.contains(event.target) && !userOptions.contains(event.target)) {
                userOptions.classList.remove("show");
            }
        });
    }
    
    const filterType = document.getElementById('filter-type');
    const filterBtns = document.querySelectorAll('.filter-btn');

    filterType.addEventListener('change', function() {
        console.log(`Tipo de imóvel selecionado: ${filterType.value}`);
    });

    filterBtns.forEach(function(btn) {
        btn.addEventListener('click', function() {
            console.log(`${btn.innerText} clicado`);
        });
    });

    const filterNav = document.getElementById('filterNav');
    const openFilterBtn = document.getElementById('openFilterBtn');
    const closeFilterBtn = document.getElementById('closeFilterBtn');

    openFilterBtn.addEventListener('click', function () {
      filterNav.classList.add('open');
    });

    closeFilterBtn.addEventListener('click', function () {
      filterNav.classList.remove('open');
    });

    document.addEventListener('click', function (event) {
        const isClickInside = filterNav.contains(event.target) || openFilterBtn.contains(event.target);
        if (!isClickInside) {
          filterNav.classList.remove('open');
        }
      });

    document.querySelectorAll('.button-option').forEach(button => {
      button.addEventListener('click', function () {
        const parent = this.parentElement;
        parent.querySelectorAll('.button-option').forEach(btn => btn.classList.remove('active'));
        this.classList.add('active');
      });
    });

    document.querySelector('.clear-button').addEventListener('click', function () {
      document.querySelectorAll('input').forEach(input => input.checked = false);
      document.querySelectorAll('.button-option').forEach(btn => btn.classList.remove('active'));
    });

    document.getElementById('toggle-map-btn').addEventListener('click', function () {
        var mapDiv = document.getElementById('map');

        if (mapDiv.style.display === 'none' || mapDiv.style.display === '') {
            mapDiv.style.display = 'block';

            if (!mapainicializado) {
                inicializarMapa();
                mapainicializado = true;
            }
            
        } else {
            mapDiv.style.display = 'none';
        }
    });

});
