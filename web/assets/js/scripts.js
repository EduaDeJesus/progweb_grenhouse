let map;
let waypoints = [];
let markers = [];

function initMap() {
    map = new google.maps.Map(document.getElementById('map'), {
        center: { lat: -20.4697105, lng: -54.6201211 },
        zoom: 12,
    });

    fetchEnderecos();
}

function fetchEnderecos() {
    fetch('/home/get-enderecos')
        .then(response => response.json())
        .then(data => {
            data.forEach(item => {
                addWaypoint(item.endereco, item.nome);
            });
        })
        .catch(error => console.error('Erro ao buscar endereços:', error));
}

function addWaypoint(address, nomeImovel) {
    const geocoder = new google.maps.Geocoder();
    geocoder.geocode({ address: address }, function (results, status) {
        if (status === 'OK') {
            const location = results[0].geometry.location;
            waypoints.push({ location: location, stopover: true });

            const marker = new google.maps.Marker({
                position: location,
                map: map,
                title: nomeImovel,
            });

            const infoWindow = new google.maps.InfoWindow({
                content: `<strong>${nomeImovel}</strong><br>${address}`,
            });

            marker.addListener('click', () => {
                infoWindow.open(map, marker);
            });

            markers.push(marker);
        } else {
            console.error('Erro ao buscar o endereço:', status);
        }
    });
}

function toggleUserOptions() {
    const userOptions = document.getElementById('user-options');
    const isVisible = userOptions.style.display === 'block';
    userOptions.style.display = isVisible ? 'none' : 'block';
}

window.addEventListener('click', function (e) {
    const userArea = document.querySelector('.user-area');
    const userOptions = document.getElementById('user-options');
    if (!userArea.contains(e.target)) {
        userOptions.style.display = 'none';
    }
});


document.addEventListener('DOMContentLoaded', function () {
    
    let isMapVisible = false;

    function toggleMap() {
        const mapDiv = document.getElementById('map');
        const toggleBtn = document.getElementById('toggle-map-btn');

        if (isMapVisible) {
            mapDiv.style.display = 'none';
            toggleBtn.innerText = 'Mostrar Mapa';
        } else {
            mapDiv.style.display = 'block';
            toggleBtn.innerText = 'Ocultar Mapa';

            if (!window.mapInicializado) {
                initMap();
                window.mapInicializado = true;
            }
        }

        isMapVisible = !isMapVisible;
        console.log('Mapa visível:', isMapVisible);
    }

    const toggleMapButton = document.getElementById('toggle-map-btn');
    if (toggleMapButton) {
        toggleMapButton.addEventListener('click', toggleMap);
    }
});


document.addEventListener('DOMContentLoaded', function () {
    const userButton = document.querySelector(".user-area .btn-info");
    const userOptions = document.querySelector(".user-area .user-options");

    if (userButton && userOptions) {
        userButton.addEventListener("click", function (event) {
            event.preventDefault();
            userOptions.classList.toggle("show");
        });

        document.addEventListener("click", function (event) {
            if (!userButton.contains(event.target) && !userOptions.contains(event.target)) {
                userOptions.classList.remove("show");
            }
        });
    }
});

document.addEventListener('DOMContentLoaded', function () {

        
    const filterNav = document.getElementById('filterNav');
    const openFilterBtn = document.getElementById('openFilterBtn');
    const closeFilterBtn = document.getElementById('closeFilterBtn');
    const form = document.getElementById("filterForm");

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

    document.querySelector('.apply-button').addEventListener('click', function () {
        document.querySelectorAll('.button-option').forEach(button => {
            button.addEventListener('click', function () {
                const parent = this.parentElement;
                parent.querySelectorAll('.button-option').forEach(btn => btn.classList.remove('active'));
                this.classList.add('active');
            });
        });
    });
    
    document.querySelector('.clear-button').addEventListener('click', function () {
        document.querySelectorAll('input').forEach(input => input.value = '');
        document.querySelectorAll('select').forEach(select => select.selectedIndex = 0);
        document.querySelectorAll('.button-option').forEach(btn => btn.classList.remove('active'));
    });

    document.querySelector('.apply-button').addEventListener('click', function () {
        const form = document.getElementById('filtro-imoveis');
        const formData = new FormData(form);
    
        const filters = {};
        formData.forEach((value, key) => {
            if (!filters[key]) {
                filters[key] = [];
            }
            filters[key].push(value);
        });

        // Enviando os filtros via AJAX para o servidor
        fetch('/imoveis/filtrar', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify(filters),
        })
        .then(response => response.json())
        .then(data => {
            console.log(data);
            atualizarImoveis(data);
        })
        .catch(error => console.error('Erro:', error));
    });
    
    function atualizarImoveis(imoveis) {
        const container = document.getElementById('imoveisContainer');
        container.innerHTML = ''; 
        imoveis.forEach(imovel => {
            const div = document.createElement('div');
            div.className = 'imovel-card';
            div.innerHTML = `
                <img src="${imovel.imagem}" alt="${imovel.nome}">
                <h3>${imovel.nome}</h3>
                <p>${imovel.descricao}</p>
                <p>R$ ${imovel.preco}</p>
            `;
            container.appendChild(div);
        });
    }

});

