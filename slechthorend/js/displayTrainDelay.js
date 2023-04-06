let modal = document.getElementById("myModal");
let span = document.getElementsByClassName("close")[0];
let card = document.getElementsByClassName("card");
let trainInfo = document.getElementById("trainInfo");
let trainBtns = document.getElementsByClassName("trainBtn");

for (let i = 0; i < trainBtns.length; i++) {

    trainBtns[i].addEventListener('click', function() {
        fetch("../fetch/fetch-train-delay.php",
            {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json; charset=UTF-8'
                },
                body: JSON.stringify({
                    "station_name": trainBtns[i].dataset.name
                })
            }).then(res => res.json()).then(data => {
                trainInfo.innerHTML = '';

                let div = document.createElement("div");
                if  (data.delay == null) {
                    let message2 = "Uw trein is op tijd";
                    div.innerHTML = message2;
                    localStorage.setItem(trainBtns[i].dataset.name, message2);
                    trainInfo.appendChild(div);
                    modal.classList.toggle("show");
                } else {
                    let message = `Uw trein is ${data.delay} minuten te laat.`;
                    div.innerHTML = message;
                    localStorage.setItem(trainBtns[i].dataset.name, message);
                    trainInfo.appendChild(div);
                    modal.classList.toggle("show");
                }

            })
    })
}
span.addEventListener('click', function () {
   modal.classList.toggle("show");
})