const footer=document.getElementById('footer');
const div=document.createElement("div");
div.setAttribute("class","footer-content")

div.innerHTML=`<p>© 2025 El universo musical</p>
            <div class="social-icons">
                <a href="#" target="_blank" aria-label="Instagram"><i class="fab fa-instagram"></i></a>
                <a href="#" target="_blank" aria-label="Twitter"><i class="fab fa-twitter"></i></a>
                <a href="#" target="_blank" aria-label="Facebook"><i class="fab fa-facebook"></i></a>
                <a href="#" target="_blank" aria-label="YouTube"><i class="fab fa-youtube"></i></a>
            </div>`;

footer.appendChild(div);