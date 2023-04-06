let notificationBtn = document.getElementById("popupBtn")
let notificationDiv = document.getElementById("notificationDiv");
let closeDiv
let visible = false;

// for (let i = 0; i < notificationBtn.length; i++) {

notificationBtn.addEventListener('click', function () {
    if (visible) {
        deleteChildren();
    } else {
       createChildren()
    }
    visible = !visible;
})

function deleteNotification(e) {
    console.log("hello");
    localStorage.removeItem(e.target.dataset.key);
    deleteChildren();
    createChildren();
}

function deleteChildren() {
    while(notificationDiv.hasChildNodes()) {
        notificationDiv.removeChild(notificationDiv.lastChild)
    }
}

function createChildren() {
    let key, value, div, span, textDiv, closeDiv;
    for (let i = 0; i < localStorage.length; i++) {
        // localStorage.clear();
        key = localStorage.key(i);
        value = localStorage.getItem(key);
        console.log(key);
        console.log(value);
        div = document.createElement("div");
        div.innerHTML = key + "<br>" + value;

        span = document.createElement("span");
        span.innerHTML = "X";
        span.dataset.key = key;
        span.addEventListener('click', deleteNotification);

        closeDiv = document.createElement("div")
        textDiv = document.createElement("div")
        notificationDiv.appendChild(div);
        notificationDiv.appendChild(textDiv);
        notificationDiv.appendChild(closeDiv);
        textDiv.appendChild(div)
        textDiv.appendChild(closeDiv)
        closeDiv.appendChild(span);
        div.classList.add("notification");
        closeDiv.classList.add("closeBtnDiv");
        span.classList.add("closeBtn");
        textDiv.classList.add("full")

    }
}