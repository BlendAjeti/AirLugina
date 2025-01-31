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
        <div class="cardd">
          <h1 style="font-size: 3rem; margin-bottom: 2px;">Flights</h1>
          <p style="font-size: 1rem; margin-bottom: 20px;">Search Flights & Places Hire to our most popular destinations</p>
          <button style="display: flex;" class="submit-btn"><i><img src="/AirLugina/assets/Images/tg.png" style="padding-right: 6px;" alt=""></i>Show Filghts</button>
        </div>
        <div class="cardd2">
          <h1 style="font-size: 3rem; margin-bottom: 2px;">Cheap Flights</h1>
          <p style="font-size: 1rem; margin-bottom: 20px;">Search Flights & Places Hire to our most popular destinations</p>
          <button style="display: flex;" class="submit-btn"><i><img src="/AirLugina/assets/Images/tg.png" style="padding-right: 6px;" alt=""></i>Show Filghts</button>
        </div>
     </div>
     <div class="foot">
        <div class="footer">
          <div class="lugina-logo">
              <div class="air-img">
                  <img src="/AirLugina/assets/Images/AirLugina.png" alt="Air-Lugina">
              </div>
              <div class="social-medias">
                  <img src="/AirLugina/assets/Images/Social-medias.png" alt="Social-Medias">
              </div>
          </div>
          <div class="our-destinations">
              <h4>Our destinations</h4>
              <p>Canada</p>
              <p>Alaska</p>
              <p>France</p>
              <p>Iceland</p>
          </div>
          <div class="our-destinations">
              <h4>Our Activities</h4>
              <p>Northern Lights</p>
              <p>Cruising & Sailing</p>
              <p>Multi-Activities</p>
              <p>Kayaing</p>
          </div>
          
          <div class="our-destinations">
              <h4>Travel Blogs</h4>
              <p>Bali Travel Guide</p>
              <p>Sri Lanks Travel Guide</p>
              <p>Peru Travel Guide</p>
              <p>Bali Travel Guide</p>
          </div>
          <div class="our-destinations">
              <h4>About Us</h4>
              <p>Our Story</p>
              <p>Work with us</p>
              <p>Destinations</p>
              <p>Our Journey</p>
          </div>
          <div class="our-destinations">
              <h4>Contact Us</h4>
              <p>Our Contacts</p>
              <p>Emails</p>
              <p>Our staff</p>
              <p>Connections</p>
          </div>
       </div>
    </div>
</body>
</html>