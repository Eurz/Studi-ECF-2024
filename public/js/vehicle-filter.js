window.addEventListener('load', function (event) {
    document
        .querySelector('#btnSearch')
        .addEventListener('click', vehiclesFilter)
})

function vehiclesFilter(e) {
    e.preventDefault()
    const formFilter = document.getElementById('formVehicleFilters')
    const data = new FormData(formFilter)
    const headers = {
        'Content-Type': 'application/json',
    }

    const body = {}
    for (const [key, value] of data) {
        body[key] = value
    }

    // console.log(body)
    const test = fetch(formFilter.action + 'filter', {
        method: 'POST',
        headers,
        body: JSON.stringify(body),
    })
        .then((res) => res.json())
        .then((vehicles) => {
            const vehiclesWrapper = document.querySelector('.js-vehicles')
            vehiclesWrapper.innerHTML = ''
            let html = ''
            for (const vehicle of vehicles) {
                html += `<div class="card border-0 h-100">`
                html += `<img src="../uploads/images/default.png" class="card-img-top img-fluid" alt="${vehicle.title}">`
                html += `<div class="card-body">`
                html += `<h2> ${vehicle.brandName} ${vehicle.model}</h2>`
                html += `<p class="card-text"> ${vehicle.price} </p>`
                html += `<div class="row row-cols-2">`
                html += `<div class="col">Puiss. :${vehicle.power} kW (${vehicle.fiscalPower} ch )</div>`
                html += `<div class="col">Année :${vehicle.releaseDate}</div>`
                html += `<div class="col">Moteur :${vehicle.motorization} (${vehicle.engineDisplacement} cm3)</div>`
                html += `<div class="col">Kilométrage :${vehicle.mileage} </div>`
                html += `</div>`
                html += `<a href="./${vehicle.id}/view" class="btn btn-primary">Détails</a>`
                // html += `<a href="{{ path('vehicles_view', {'id':  ${vehicle.id}  }) }}" class="btn btn-primary">Détails</a>`
                html += `</div>`
                html += `</div>`
                vehiclesWrapper.innerHTML += html
                html = ''
            }
        })
        .catch(function (error) {
            // en cas d’échec de la requête
            console.log(error)
        })
}
