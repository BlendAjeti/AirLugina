<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AirLugina - Live & Travel</title>
    <link rel="stylesheet" href="/AirLugina/assets/landingpage.css">
</head>
<body>
<div class="hero">
        <div class="hero-overlay">
            <nav class="navbar">
                <div style="display: flex;" class="left-nav">
                    <img style="margin-right: 5px;" src="Assets/Images/logo.png" alt="">
                    <a href="booking.php">Find Flight</a>
                </div>
                <div class="logo">
                    <span><img src="Assets/Images/AirLuginaBARDH.png" alt=""></span>
                </div>
                <?php if (isset($_SESSION['user_id'])): ?>
                    <div class="user-ctnn">
                        <div class="user-ctn">
                            <div class="user-img">
                                <img src="assets/Images/user-image.jpg" alt="User">
                            </div>
                            <div class="user-name">
                                <p><?php echo $_SESSION['username']; ?></p>
                            </div>
                            <div class="arrow-down" id="arrow-down">
                                <img src="assets/Images/arrow-down.png" alt="Arrow">
                            </div>
                        </div>
                        
                        <div class="user-logo">
                        <div class="dropdown">
                            <?php
                            if (isset($_SESSION['role']) && $_SESSION['role'] == 1) {
                                echo '
                                <div class="dropdown-ctn">
                                    <img src="assets/Images/Support.png" alt="Admin Panel">
                                    <a href="deals.php">Admin Panel</a>
                                </div>';
                            }
                            ?>
                            <div class="dropdown-ctn">
                                <img src="assets/Images/logout.png" alt="logout">
                                <a href="logout.php" id="logout">Logout</a>
                            </div>
                        </div>
                        </div>
                    </div>
                <?php else: ?>
                    <div class="buttons">
                        <button class="log" onclick="window.location.href='login.php'">Login</button>
                        <button class="sig" onclick="window.location.href='signup.php'">Sign up</button>
                    </div>
                <?php endif; ?>
                <div class="menu-ctn">
                    <div class="menu-toggle">
                        <img src="assets/Images/white-m.png" alt="menu">
                    </div>
                    <div class="dropdown-second" id="dropdown-second">
                        <ul>
                            <li><a href="landingpage.php">Home</a></li>
                            <li><a href="contact-us.php">Contact Us</a></li>
                            <li><a href="booking.php">Flights</a></li>
                            <?php if (!isset($_SESSION['user_id'])): ?>
                                <li id="login-signup"><a href="login.php">Login</a></li>
                                <li id="login-signup"><a href="signup.php">Sign Up</a></li>
                            <?php endif; ?>

                        </ul>
                    </div>
                </div>
            </nav>
            <h3>Helping Others</h3>
            <h1>LIVE & TRAVEL</h1>
            <p>Special offers to suit your plan</p>
        </div>
    </div>


    <div class="form-container">
        <div>
            <h2 style="font-size: 1em; display: flex; align-items: center;"><img src="Assets/Images/airplanee.png" alt="icon" style="padding-right: 6px;"> Flights</h2>
        </div>
        <form action="booking.php" method="GET">
            <div class="form-group">
                <div>
                    <fieldset>
                        <legend>From</legend>
                        <select id="from" name="from">
                            <option value="" <?= empty($origin) ? 'selected' : '' ?>>Select Origin</option>
                            <option value="Burrel">Burrel</option>
                            <option value="Stamboll">Stamboll</option>
                            <option value="Paris">Paris</option>
                            <option value="Geneva">Geneva</option>
                        </select>
                    </fieldset>
                </div>
                <div>
                    <fieldset>
                        <legend>To</legend>
                        <select id="to" name="to">
                            <option value="" <?= empty($origin) ? 'selected' : '' ?>>Select Origin</option>
                            <option value="Stamboll">Stamboll</option>
                            <option value="Paris">Paris</option>
                            <option value="Geneva">Geneva</option>
                        </select>
                    </fieldset>
                </div>
            </div>
            <div class="form-group">
                <div>
                    <fieldset>
                        <legend>Depart</legend>
                        <input type="datetime-local" id="depart" name="depart">
                    </fieldset>
                </div>
                <div>
                    <fieldset>
                        <legend>Return</legend>
                        <input type="datetime-local" id="return" name="return">
                    </fieldset>
                </div>
            </div>
            <button type="submit" class="submit-btn">Show Flights</button>
        </form>

    </div>
      
      <div class="offerts">
        <div class="tit">
          <div class="features">
            <h1>Plan your perfect trip</h1>
            <p>Search Flights & Places Hire to our most popular destinations</p>
          </div>
          <div>
            <button class="submit-btn"><a href="/AirLugina/deals.html">Show More</a></button>
          </div>
        </div>
        <div class="cards">
          <div class="card">
            <img src="/AirLugina/assets/Images/Frame 197-1.png" alt="Card Image" class="card-image">
          
            <div class="card-content">
              <h3 class="card-title">Istanbul, Turkey</h3>
              <p class="card-text">Flights • Hotels • Resorts</p>
            </div>
          </div>
          <div class="card">
            <img src="/AirLugina/assets/Images/Frame 197-2.png" alt="Card Image" class="card-image">
          
            <div class="card-content">
              <h3 class="card-title">Sydney, Australia</h3>
              <p class="card-text">Flights • Hotels • Resorts</p>
            </div>
          </div>
          <div class="card">
            <img src="/AirLugina/assets/Images/Frame 197.png" alt="Card Image" class="card-image">
          
            <div class="card-content">
              <h3 class="card-title">Baku, Azerbaijan</h3>
              <p class="card-text">Flights • Hotels • Resorts</p>
            </div>
          </div>
          <div class="card">
            <img src="/AirLugina/assets/Images/Frame 74.png" alt="Card Image" class="card-image">
          
            <div class="card-content">
              <h3 class="card-title">Malé, Maldives</h3>
              <p class="card-text">Flights • Hotels • Resorts</p>
            </div>
          </div>
          <div class="card">
            <img src="/AirLugina/assets/Images/Rectangle 3-1.png" alt="Card Image" class="card-image">
          
            <div class="card-content">
              <h3 class="card-title">Paris, France</h3>
              <p class="card-text">Flights • Hotels • Resorts</p>
            </div>
          </div>
          <div class="card">
            <img src="/AirLugina/assets/Images/Rectangle 3-2.png" alt="Card Image" class="card-image">
          
            <div class="card-content">
              <h3 class="card-title">New York, US</h3>
              <p class="card-text">Flights • Hotels • Resorts</p>
            </div>
          </div>
          <div class="card">
            <img src="/AirLugina/assets/Images/Rectangle 3.png" alt="Card Image" class="card-image">
          
            <div class="card-content">
              <h3 class="card-title">London, UK</h3>
              <p class="card-text">Flights • Hotels • Resorts</p>
            </div>
          </div>
          <div class="card">
            <img src="/AirLugina/assets/Images/Rectangle 4-1.png" alt="Card Image" class="card-image">
          
            <div class="card-content">
              <h3 class="card-title">Tokyo, Japan</h3>
              <p class="card-text">Flights • Hotels • Resorts</p>
            </div>
          </div>
          <div class="card">
            <img src="/AirLugina/assets/Images/Rectangle 4.png" alt="Card Image" class="card-image">
          
            <div class="card-content" id="dubai">
              <h3 class="card-title">Dubai, UAE</h3>
              <p class="card-text">Flights • Hotels • Resorts</p>
            </div>
          </div>
        </div>
      </div>
      
     
    <div class="fli">
        <div class="cardd2">
            <div class="slider-container">
                <div class="slider-content active" data-bg="url('../assets/Images/back.png')" data-title="Cheap Flights" data-description="Search Flights & Places Hire to our most popular destinations">
                    <h1>Cheap Flights</h1>
                    <p>Search Flights & Places Hire to our most popular destinations</p>
                </div>
                <div class="slider-content" data-bg="url('../assets/Images/backkk.png')" data-title="Explore Destinations" data-description="Find amazing destinations around the world.">
                    <h1>Explore Destinations</h1>
                    <p>Find amazing destinations around the world.</p>
                </div>
                <div class="slider-content" data-bg="url('../assets/Images/frame3.png')" data-title="Book Now" data-description="Book your flights now and get the best deals!">
                    <h1>Book Now</h1>
                    <p>Book your flights now and get the best deals!</p>
                </div>
            </div>

            <button style="display: flex;" class="submit-btn">
                <i><img src="Assets/Images/tg.png" style="padding-right: 6px;" alt=""></i>
                <a href="booking.php">Show Flights</a>
            </button>
        </div>
        <div class="cardd2">
            <div class="slider-container">
                <div class="slider-content" data-bg="url('../assets/Images/frame3.png')" data-title="Book Now" data-description="Book your flights now and get the best deals!">
                    <h1>Book Now</h1>
                    <p>Book your flights now and get the best deals!</p>
                </div>
                <div class="slider-content active" data-bg="url('../assets/Images/back.png')" data-title="Cheap Flights" data-description="Search Flights & Places Hire to our most popular destinations">
                    <h1>Cheap Flights</h1>
                    <p>Search Flights & Places Hire to our most popular destinations</p>
                </div>
                <div class="slider-content" data-bg="url('../assets/Images/backkk.png')" data-title="Explore Destinations" data-description="Find amazing destinations around the world.">
                    <h1>Explore Destinations</h1>
                    <p>Find amazing destinations around the world.</p>
                </div>

                
            </div>

            <button style="display: flex;" class="submit-btn">
                <i><img src="Assets/Images/tg.png" style="padding-right: 6px;" alt=""></i>
                <a href="booking.php">Show Flights</a>
            </button>
        </div>
    </div>
    <?php
    include 'footer.php';
    ?>
    <script>
       function initializeSlider(cardd2) {
            let currentIndex = 0;
            const sliderContents = cardd2.querySelectorAll('.slider-content');
            const cardd2Element = cardd2;

            function showSlide(index) {
                sliderContents.forEach((content, i) => {
                    content.classList.remove('active');
                    if (i === index) {
                        content.classList.add('active');
                        // Change background, title, and description
                        const bg = content.getAttribute('data-bg');
                        const title = content.getAttribute('data-title');
                        const description = content.getAttribute('data-description');
                        
                        cardd2Element.style.backgroundImage = bg;
                        cardd2Element.querySelector('h1').textContent = title; 
                        cardd2Element.querySelector('p').textContent = description;
                    }
                });
            }

            setInterval(() => {
                currentIndex = (currentIndex + 1) % sliderContents.length;
                showSlide(currentIndex);
            }, 3000);

            showSlide(currentIndex);
        }

        document.querySelectorAll('.cardd2').forEach(cardd2 => {
            initializeSlider(cardd2);
    });

    </script>

</body>
</html>