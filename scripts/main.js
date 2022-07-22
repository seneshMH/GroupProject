class MyHeader extends HTMLElement {
    connectedCallback() {
        this.innerHTML = `
        <header class="nav-header">
            <a href="index.html"class="logo"><img src="images/logo-1.png" alt="logo"><span>G/ SIRI WIMALASIRI <br>VIDYALAYA</span></a>

            <input type="checkbox" id="menu-bar">
            <label for="menu-bar">Menu</label>

            <nav class="nv-main">
                <ul>
                    <li><a href="index.html">Home</a></li>
                    <li><a href="#">Academic +</a>
                        <ul>
                            <li><a href="Education Achievements.html">Best Achievers</a></li>
                            <li><a href="staf.html">Staff</a></li>
                            <li><a href="Other Achievements.html">Event Gallery</a></li>
                        </ul>
                    </li>
                    <li><a href="#">Extra Curricular +</a>
                        <ul>
                            <li><a href="Sports Achievements.html">Sports</a></li>
                            <li><a href="clubs.html">Clubs & Societies</a></li>
                        </ul>
                    </li>
                    <li><a href="#">About +</a>
                        <ul>
                            <li><a href="history.html">History</a></li>
                            <li><a href="visionmission.html">Vision & Mission</a></li>
                            <li><a href="principle.html">Principal massage</a></li>
                            <li><a href="anthem.html">School Anthem</a></li>
                            <li><a href="identity.html">Highlights</a></li>
                        </ul>
                    </li>
                    <li><a href="view-news.php">Notice</a></li>
                    <li><a href="index.html#contact">Contact</a></li>
                    <li><a href="login.php">Login</a></li>
                </ul>
            </nav>
        </header>`;
    }
}

class MyFooter extends HTMLElement {
    connectedCallback() {
        this.innerHTML = `
        <footer>
        <div class="social">
            <a href="mailto:pelessavidyalaya@gmail.com" target="_blank"><svg xmlns="http://www.w3.org/2000/svg" width="40"
                    height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                    stroke-linecap="round" stroke-linejoin="round" class="feather feather-mail">
                    <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path>
                    <polyline points="22,6 12,13 2,6"></polyline>
                </svg></a>
            <a href="https://www.facebook.com/Pelessa-Siri-Wimalasiri-Vidyalaya-107779381961785" target="_blank"><svg xmlns="http://www.w3.org/2000/svg" width="40"
                    height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                    stroke-linecap="round" stroke-linejoin="round" class="feather feather-facebook">
                    <path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"></path>
                </svg></a>
            <a href="https://www.instagram.com/pelessasiriwimalasirividyal/" target="_blank"><svg xmlns="http://www.w3.org/2000/svg" width="40"
                    height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                    stroke-linecap="round" stroke-linejoin="round" class="feather feather-instagram">
                    <rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect>
                    <path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path>
                    <line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line>
                </svg></a>
            <a href="https://twitter.com/PelessaV" target="_blank"><svg xmlns="http://www.w3.org/2000/svg" width="40"
                    height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                    stroke-linecap="round" stroke-linejoin="round" class="feather feather-twitter">
                    <path
                        d="M23 3a10.9 10.9 0 0 1-3.14 1.53 4.48 4.48 0 0 0-7.86 3v1A10.66 10.66 0 0 1 3 4s-4 9 5 13a11.64 11.64 0 0 1-7 2c9 5 20 0 20-11.5a4.5 4.5 0 0 0-.08-.83A7.72 7.72 0 0 0 23 3z">
                    </path>
                </svg></a>
            <a href="https://www.youtube.com/channel/UCVOFy7mHHgdCx5vCrBGAnbg/featured" target="_blank"><svg xmlns="http://www.w3.org/2000/svg" width="40"
                    height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                    stroke-linecap="round" stroke-linejoin="round" class="feather feather-youtube">
                    <path
                        d="M22.54 6.42a2.78 2.78 0 0 0-1.94-2C18.88 4 12 4 12 4s-6.88 0-8.6.46a2.78 2.78 0 0 0-1.94 2A29 29 0 0 0 1 11.75a29 29 0 0 0 .46 5.33A2.78 2.78 0 0 0 3.4 19c1.72.46 8.6.46 8.6.46s6.88 0 8.6-.46a2.78 2.78 0 0 0 1.94-2 29 29 0 0 0 .46-5.25 29 29 0 0 0-.46-5.33z">
                    </path>
                    <polygon points="9.75 15.02 15.5 11.75 9.75 8.48 9.75 15.02"></polygon>
                </svg></a>
        </div>
        <p> © G/ SIRI WIMALASIRI VIDYALAYA</p>
    </footer>
        `;
    }
}

customElements.define('my-header', MyHeader);
customElements.define('my-footer', MyFooter);