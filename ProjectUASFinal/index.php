<?php
include 'config/db_connect.php';
session_start();

// Check if the user is logged in
if (!isset($_SESSION['loggedin']) || !$_SESSION['loggedin']) {
    // Redirect to login page if not logged in
    header("Location: login.php");
    exit();
}

// Retrieve the user's role from the session
$userRole = $_SESSION['role'];

// Fetch genres from the database
$sql_genres = "SELECT * FROM genres";
$stmt_genres = $conn->query($sql_genres);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Toon Clover</title>
    <meta name="title" content="Comic - Read">
    <meta name="description" content="Read More For More Fun">

    <!-- FAVICON -->

    <link rel="shortcut icon" href="picture\favicon.png" type="image/png">

    <!-- CSS -->

    <link rel="stylesheet" href="styles/index.css">

    <!-- FONTS -->

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    <!-- Preload -->
    <link rel="Preload" href="picture/favicon.png" as="image">

</head>
<body>

    <!-- HEADER -->

    <header class="header" data-header>
        <div class="container">
            <div class="resonance">
                <img src="picture\favicon.png" alt="logo-image" class="logo-image">
                <a href="index.php" class="logo">Toon Clover</a>
            </div>

            <nav class="navbar" data-navbar>
                <ul class="navbar-list">
                    <li class="navbar-item">
                        <a href="#home" class="navbar-link" data-nav-link>Home</a>
                    </li>
                    <li class="navbar-item">
                        <a href="#genres" class="navbar-link" data-nav-link>Genres</a>
                    </li>
                    <li class="navbar-item">
                        <a href="#author" class="navbar-link" data-nav-link>Author</a>
                    </li>
                    <li class="navbar-item">
                        <a href="#contact" class="navbar-link" data-nav-link>Contact Us</a>
                    </li>
                    <li class="navbar-item">
                        <a href="process/logout.php" class="navbar-link" data-nav-link>Log Out</a>
                    </li>
                </ul>
            </nav>

            <button class="nav-toggle-btn" aria-label="toggle menu" data-nav-toggler>
                <ion-icon name="menu-outline" aria-hidden="true" class="open"></ion-icon>
                <ion-icon name="close-outline" aria-hidden="true" class="close"></ion-icon>
            </button>
        </div>
    </header>

    <main>
        <article>

            <button id="scrollToTopBtn">
                <ion-icon name="chevron-up-outline" aria-hidden="true"></ion-icon>
            </button>

            <!-- HERO -->

            <section class="section hero" id="home" aria-label="home">
                <div class="container">
                    <div class="hero-content">
                        <p class="section-subtitle">
                            Welcome To Our Comic Page
                        </p>
                        <h1 class="h1 hero-title">Toon Clover Yourself in the World of Comic.</h1>
                        <p class="section-text">
                            Explore captivating stories and stunning artwork. Feel free to give us review in the contact.
                        </p>
                    </div>

                    <div class="hero-banner has-before">
                        <img src="picture/team.jpg" width="431" height="596" alt="comic Cover" class="w-100">
                    </div>
                </div>
            </section>

            <!-- AUTHOR -->

            <section class="section author" id="author">
                <div class="container">
        
                  <figure class="author-banner img-holder" style="--width: 700; --height: 720;">
                        <img src="picture/team.jpg" width="700" height="720" loading="lazy" alt="TeamPhoto"
                        class="img-cover">
                  </figure>
        
                    <div class="author-content">
        
                        <p class="section-subtitle">The Team</p>
            
                        <h2 class="h2 section-title">Team: Toon Clover</h2>
            
                        <p class="author-name">Toon In To The Clover!</p>
            
                        <div class="section-text">
                        LIST KELOMPOK: <br>
                        1. CHRISTOPPHER ALECANDER KHOW (220211060150) <br>
                        2. CHRISTIAN MAMANGKEY (220211060149) <br>
                        3.  PASKAL TAMBUWUN (220211060239) <br>
                        </div>
        
                    </div>
        
                </div>
            </section>

            <!-- GENRE -->
            <section class="section genres" id="genres" aria-label="genres">
                <div class="container">
                    <div class="grid-list">
                        <li class="genres-content">
                            <h2 class="h2 section-title">List Of Genres</h2>
                            <p class="section-text">Find your next favorite comic by exploring a wide range of genres. From action-packed fantasy to heartwarming romances, we have something for everyone.</p>
                        </li>
                        <?php while ($row = $stmt_genres->fetch(PDO::FETCH_ASSOC)): ?>
                        <li>
                            <div class="genres-card has-before has-after">
                                <div class="card-icon">
                                    <img src="picture/<?php echo htmlspecialchars($row['genre_icon']); ?>" width="40" height="40" loading="lazy" alt="<?php echo htmlspecialchars($row['genre_name']); ?>">
                                </div>
                                <h3 class="h3 card-title"><?php echo htmlspecialchars($row['genre_name']); ?></h3>
                                <p class="card-text"><?php echo htmlspecialchars($row['genre_desc']); ?></p>
                                <a href="manga.php#<?php echo htmlspecialchars(strtolower($row['genre_name'])); ?>" class="btn-link">
                                    <span class="span">Check Out</span>
                                    <ion-icon name="caret-forward-outline"></ion-icon>
                                </a>
                            </div>
                        </li>
                        <?php endwhile; ?>
                    </div>
                </div>
            </section>

            <!-- CONTACT -->

            <section class="section contact" id="contact" aria-label="contact">
                <div class="container">
        
                    <p class="section-subtitle">Contact</p>
            
                    <h2 class="h2 section-title has-underline">
                        Write Us Your Feedback
                        <span class="span has-before"></span>
                    </h2>
            
                    <div class="wrapper">
            
                    <form action="process/process_contact.php" method="post" class="contact-form">
                        <input type="text" name="name" placeholder="Your Name" required class="input-field">
                        <input type="email" name="email_address" placeholder="Your Email" required class="input-field">
                        <input type="text" name="subject" placeholder="Subject" required class="input-field">
                        <textarea name="message" placeholder="Your Message" class="input-field"></textarea>
                        <button type="submit" class="btn btn-primary">Send Now</button>
                    </form>

            
                        <ul class="contact-card">
            
                            <li>
                                <p class="card-title">Address:</p>
                
                                <address class="address">
                                Gedung IT, Universitas Sam Ratulangi <br>
                                Manado, Indonesia
                                </address>
                            </li>
                
                            <li>
                                <p class="card-title">Phone:</p>
                
                                <a href="tel:081325321495" target="_blank" class="card-link">12345678910</a>
                            </li>
                
                            <li>
                                <p class="card-title">Email:</p>
                
                                <a href="mailto:fachsyan.ismail@gmail.com" target="_blank" class="card-link">email@gmail.com</a>
                            </li>
                
                            <li>
                                <p class="social-list-title h3">Our Official Socials</p>
                
                                <ul class="social-list">
                
                                    <li>
                                        <a href="#" target="_blank" class="social-link">
                                        <ion-icon name="logo-facebook"></ion-icon>
                                        </a>
                                    </li>
                    
                                    <li>
                                        <a href="#" target="_blank" class="social-link">
                                        <ion-icon name="logo-tumblr"></ion-icon>
                                        </a>
                                    </li>
                    
                                    <li>
                                        <a href="#" target="_blank" class="social-link">
                                        <ion-icon name="logo-youtube"></ion-icon>
                                        </a>
                                    </li>
                    
                                    <li>
                                        <a href="#" target="_blank" class="social-link">
                                        <ion-icon name="logo-whatsapp"></ion-icon>
                                        </a>
                                    </li>
                
                                </ul>
                            </li>
            
                        </ul>
            
                    </div>
        
                </div>
            </section>

        </article>
    </main>

    <!-- FOOTER -->

    <footer class="footer">
        <div class="container">
    
            <div class="footer-top">
        
                <a href="#home" class="logo">Toon Clover</a>
        
                <ul class="footer-list">
        
                    <li>
                        <a href="#home" class="footer-link">Home</a>
                    </li>

                    <li>
                        <a href="#author" class="footer-link">Author</a>
                    </li>
            
                    <li>
                        <a href="#genres" class="footer-link">Genres</a>
                    </li> 
            
                    <li>
                        <a href="#contact" class="footer-link">Contact Us</a>
                    </li>
        
                </ul>
        
            </div>
    
            <div class="footer-bottom">
                <p class="copyright">
                &copy; 2024 All right reserved. Made with HardWork By Our Team.
                </p>
            </div>
    
        </div>
      </footer>

    
    <script src="js/index.js"></script>
    <script src="js/comic.js"></script>

    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

</body>
</html>