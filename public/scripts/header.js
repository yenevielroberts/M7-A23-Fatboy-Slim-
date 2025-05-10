const header = document.getElementById("header");

const nav = document.createElement("nav")
nav.innerHTML = `
            <h2><a href="/" id="titulo_nav">El universo musical</a></h2>
            <div id="enlancesNav">
                <a href="/"><i class="fas fa-search"></i></a>
                <a href="/">Home</a>
                <a href="/">Log in</a>
                <a href="/">About us</a>
                <a href="/">Soporte</a>
                <a href="/"><i class="fas fa-user"></i></a>
            </div>
        `;
header.appendChild(nav);