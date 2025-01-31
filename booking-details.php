<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking details</title>
    <link rel="stylesheet" href="/AirLugina/Assets/booking-details.css">
</head>
<body>
    <div class="container">
        <div class="navbar">
            <div class="navbar-elements">
                <div class="flights">
                    <div class="plane-logo">
                        <img src="/AirLugina/Assets/Images/plane.logo.png" alt="small-plane">
                    </div>
                    <div class="flight-name">
                        <p><a href="/AirLugina/booking.html">Find Flight</a></p>
                    </div>
                </div>
                <div class="home">
                    <p><a href="/AirLugina/landingpage.html">Home</a></p>
                </div>
                <div class="logo" id="img-logo">
                    <img src="/AirLugina/Assets/Images/Air-Lugina-Logo.png" alt="AirLugina-logo">
                </div>  
                
                <div class="home">
                    <p><a href="/AirLugina/landingpage.html">Contact Us</a></p>
                </div>
                <div class="user-ctnn">
                    <div class="user-ctn">
                        <div class="user-img">
                            <img src="/AirLugina/assets/Images/user-photo.jpg" alt="User">
                        </div>
                        <div class="user-name">
                            <p>Blend A.</p>
                        </div>
                        <div class="arrow-down">
                            <img src="/AirLugina/assets/Images/arrow-down.png" alt="Arrow">
                        </div>
                    </div>
                    <div class="user-logo">
                        <div class="dropdown">
                            <div class="dropdown-ctn">
                            <img src="/AirLugina/assets/Images/Support.png " alt="logout"><a href="/AirLugina/landingpage.html">Admin Panel</a>

                            </div>
                            <div class="dropdown-ctn">
                                <img src="/AirLugina/assets/Images/logout.png" alt="logout">
                                <a href="#" id="logout">Logout</a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <div class="s-upload">
            <div class="upload">
                <img src="/AirLugina/Assets/Images/upload-vector.png" alt="upload">
                <p>Upload Flight Logo</p>
            </div>
        </div>
        <div class="form-container">
            
            <form action="#">
                <div class="form-group">
                    <div class="exp-date">
                        <fieldset class="fieldseti">
                            <legend>From</legend>
                            <input type="text" id="prishtina" name="prishtina" placeholder="Prishtina" required>
                        </fieldset>
                    </div>
                    <div class="cvc">
                        <fieldset> 
                            <legend>To</legend>
                            <input type="text" id="presheva" name="presheva" placeholder="Presheva" required>
                        </fieldset>
                    </div>
                </div>
                <div class="name-on-card">
                    <fieldset> 
                        <legend>Date & Hour</legend>
                        <input type="datetime" id="datetime" name="datetime" placeholder="28.11.2025" required>
                    </fieldset>
                </div>
                <div class="name-on-card">
                    <fieldset> 
                        <legend>Flight Hours</legend>
                        <input type="text" id="hours" name="hours" placeholder="2 hours 52 minutes" required>
                    </fieldset>
                </div>
                <div class="name-on-card">
                      <fieldset> 
                        <legend>Airbus Name</legend>
                        <input type="text" id="bus-name" name="bus-name" placeholder="Emirates" required>
                    </fieldset>
                </div>
                <div class="name-on-card">
                    <fieldset> 
                        <legend>Stock</legend>
                        <input type="text" id="stock" name="stock" placeholder="21 Tickets" required>
                    </fieldset>
                </div>
                <div class="name-on-card">
                    <fieldset> 
                        <legend>Price</legend>
                        <input type="text" id="price" name="price" placeholder="$112" required>
                    </fieldset>
                </div>
                <div class="upload-images">
                    <img src="/AirLugina/Assets/Images/upload-vector.png" alt="upload">
                    <p>Upload Images</p>
                </div>
                <button type="submit">Add new ticket</button>
            </form>
        </div>
        </div>
    </div>
    <div class="footer">
        <div class="lugina-logo">
            <div class="air-img">
                <img src="/AirLugina/Assets/Images/AirLugina-footer.png" alt="Air-Lugina">
            </div>
            <div class="social-medias">
                <img src="/AirLugina/Assets/Images/Social-medias.png" alt="Social-Medias">
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
    <script src="/AirLugina/assets/dropdown.js"></script>
</body>
</html>