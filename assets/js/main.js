
const body = document.querySelector('body'),
    sidebar = body.querySelector('nav'),
    toggle = body.querySelector(".toggle"),
    searchBtn = body.querySelector(".search-box"),
    modeSwitch = body.querySelector(".toggle-switch"),
    modeText = body.querySelector(".mode-text");


toggle.addEventListener("click", () => {
    var iframevar = document.getElementById('iframeId');
    var elmnt = iframevar.contentWindow.document.body;
    elmnt.classList.toggle("close");
    sidebar.classList.toggle("close");
})

modeSwitch.addEventListener("click", () => {
    var iframevar = document.getElementById('iframeId');
    var elmnt = iframevar.contentWindow.document.body;
    elmnt.classList.toggle("dark");
    body.classList.toggle("dark");

    if (body.classList.contains("dark")) {
        modeText.innerText = "Modo dia";
    } else {
        modeText.innerText = "Modo noite";

    }
});

function changeSrc(loc, tituloPagina) {
    document.getElementById('iframeId').src = loc;
    document.getElementById('titlePage').innerHTML = tituloPagina;
}
