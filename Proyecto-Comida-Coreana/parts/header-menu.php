<header>
    <nav class="top-nav">

        <a class="logo" href="./Homepage.html"><img src="./imgs/imgsMenu/Logo Kimchis 1imgs2.png" alt="Kimchis logo"><span>KIMCHIS</span> </a>

        <ul class="nav-list">
            <li><a class="nav-list-link" href="./Homepage.php">Homepage</a></li>
            <li><a class="nav-list-link" href="#">Reservations</a></li>
            <?php 
                        session_start();
                        if(isset($_SESSION["isLoggedIn"])){
                            echo "<li><a class='nav-list-link' href='profile.php'>".$_SESSION["fullname"]."</a></li>";
                            echo "<li><a class='nav-list-link' href='logout.php'>Logout</a></li>";
                        }else{
                            echo "<li><a class='nav-list-link' href='./forms.php'>Login</a></li>";
                        }
                     ?>
        </ul>

    </nav>
    <section class="landing-page">

            <img class="img-container" src="./imgs/imgsMenu/ComidaInicio0.jpeg" alt="Menú"><span class="txt-container">김치</span>
            <div class="rectangle">
                <h1>MENU</h1>
            </div>
    </section>
</header>
        