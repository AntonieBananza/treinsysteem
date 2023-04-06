let stationInputs = document.getElementsByClassName("station_inputs");
let stationDatalists = document.getElementsByClassName("station_lists");

for (let i = 0; i < stationInputs.length; i++) {

    stationInputs[i].addEventListener('keyup', function () {

        fetch("../fetch/fetch-matching-station.php",
            {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json; charset=UTF-8'
                },
                body: JSON.stringify({
                    "name": stationInputs[i].value
                })
            }).then(res => res.json()).then(data => {
                console.log(data)
            for (let j = 0; j < data.length; j++) {
                
                let option = document.createElement("option");
                option.setAttribute("value", data[j].station);
                option.innerText = data[j].station;
                stationDatalists[i].appendChild(option);
            }
        }).catch(error => console.log(error));

    })
}