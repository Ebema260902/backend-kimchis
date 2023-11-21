 <!--HEADER -->
 <header class="hero-container">
            <nav class="top-nav">
                <div>
                    <a class="logo-image" href="#"><img src="./imgs/imgsproyect/Logo Kimchis 1imgs2.png" alt="Kimchis logo"></a>
                </div>
                    <a class="name-kimchis" href="./Homepage.html">KIMCHIS</a>
                
                <ul class="nav-list">
                    <li><a class="nav-list-link" href="./Menu.html">Menu</a></li>
                    <li><a class="nav-list-link" href="./Menu.html">Reservations</a></li>
                    <?php 
                        session_start();
                        if(isset($_SESSION["isLoggedIn"])){
                            echo "<li><a class='nav-list-link' href='profile.php'>".$_SESSION["fullname"]."</a></li>";
                            echo "<li><a class='nav-list-link' href='logout.php'>Logout</a></li>";
                        }else{
                            echo "<li><a class='nav-list-link' href='./forms.php'>Login</a></li>";
                        }
                     ?>
            </nav>
            
            <Section>
                <h1 class="hero-title-homepage">Experience <br> Korean <br> Cuisine</h1>
                <div>
                    <p class="hero-text-homepage">Indulge in the vibrant and flavorful world of Korean gastronomy, where each dish is a masterpiece.</p>
                </div>

                <div class="btn-container">
                    <a class="btn-get-started-homepage" href="#">GET STARTED</a>
                </div>
                <div>
                    <img class="image-header-homepage" src="./imgs/imgsproyect/image-main33.jpg" alt="Image-Header">
                </div>
            </Section>
        </header>