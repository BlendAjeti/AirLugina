<?php
$conn = new mysqli('localhost', 'root', '', 'database');
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = intval($_GET['id']);

    $sql = "SELECT * FROM tickets WHERE id = $id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $ticket = $result->fetch_assoc();
    } else {
        echo "Ticket not found.";
        exit;
    }
} else {
    echo "Invalid ticket ID.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CARD</title>
    <link rel="stylesheet" href="assets/card.css">
</head>

<body>
    <div class="container">
    <?php
    include 'navbar.php';
    ?>
        <div class="direction">
            
        </div>
        <div class="ticket-price">
            <div class="ticket">
                <div class="emirate">
                    <div class="airbus">
                        <h1><?php echo $ticket['airline_name']; ?></h1>
                    </div>
                    <div class="S240">
                        <h1><span>$<?php echo $ticket['price']; ?></span></h1>
                    </div>
                </div>
                <div class="return">
                    <div class="wed">
                        <p><?php 
                        $date = new DateTime($ticket['date_time']); 
                        echo $date->format('h:i A - d.m.Y'); 
                        ?></p>
                    </div>
                    <div class="hours">
                        <p><?php echo $ticket['flight_duration']; ?> Hours</p>
                    </div>
                </div>
                <div class="plane-accesories">
                    <div class="e-logo">
                        <img src="<?php echo $ticket['flight_logo']; ?>" alt="Emirate-logo">
                    </div>
                    <div class="wifi-logo">
                        <img src=" Assets/Images/Accessories.png" alt="Accessories">
                    </div>
                </div>
                <div class="plane-arrive">
                    <div class="newark">
                        <div class="inline">
                            <p><?php echo $ticket['origin']; ?></p>
                        </div>
                    </div>
                    <div class="plane-direction">
                        <img src=" Assets/Images/Plane-direction.png" alt="plane-direction">
                    </div>
                    <div class="newark">
                        <div class="inline">
                            <p><?php echo $ticket['destination']; ?></p>
                        </div>
                    </div>
                </div>


            </div>
            <div class="price-fee">
                <div class="pricee">
                    <div class="ecoonomyf">
                        <div class="plane-img">
                            <img src="<?php echo $ticket['flight_logo']; ?>" alt="plane">
                        </div>
                        <div class="economy">
                            <p>Economy</p>
                            <h3><?php echo $ticket['airline_name']; ?></h3>
                        </div>
                    </div>
                    <div class="getobe">
                        <p>Your booking is protected by <span>AirLugina</span></p>
                    </div>
                    <div class="service-fee">
                        <div class="d">
                            <p>Price Details</p>
                        </div>
                    </div>
                    <div class="total">
                        <div class="d">
                            <p>Total</p>
                        </div>
                        <div class="d-price">
                            <p>$<?php echo $ticket['price']; ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="loader" class="loader" style="display: none;">
            <div class="spinner"></div>
        </div>
        <div class="add-new" id="karta">
            <div class="new-card">
                <div class="big-text">
                    <div class="newa">
                        <h1>Add a new Card</h1>
                    </div>
                    <div class="x-img">
                       
                    </div>
                </div>
                <div class="form-container">
                <form id="cardForm" action="#">
                    <div class="c-number">
                        <fieldset>
                            <legend>Card Number</legend>
                            <input type="text" id="card-number" name="card-number" placeholder="4321 4321 4321 4321" required oninput="formatCardNumber(this)">
                            <img src="Assets/Images/Visa.png" alt="visa">
                        </fieldset>
                    </div>

                    <div class="form-group">
                        <div class="exp-date">
                            <fieldset class="fieldseti">
                                <legend>Exp. Date</legend>
                                <input type="text" id="exp-date" name="exp-date" placeholder="02/27" required oninput="formatExpDate(this)">
                            </fieldset>
                        </div>
                        <div class="cvc">
                            <fieldset>
                                <legend>CVC</legend>
                                <input type="text" id="cvc" name="cvc" placeholder="123" required>
                            </fieldset>
                        </div>
                    </div>

                    <div class="name-on-card">
                        <fieldset>
                            <legend>Name on card</legend>
                            <input type="text" id="name" name="name" placeholder="Enver Hoxha" required>
                        </fieldset>
                    </div>

                    <div class="selecti">
                        <fieldset>
                            <legend>Country or Region</legend>
                            <select id="country" name="country" required>
                                <option value="united-states">Albania</option>
                                <option value="canada">Canada</option>
                                <option value="uk">United Kingdom</option>
                                <option value="other">Other</option>
                            </select>
                        </fieldset>
                    </div>

                    <div class="checkbox">
                        <input type="checkbox" name="checkbox" id="checkbox">
                        <label for="checkbox">Securely save my information for 1-click checkout</label>
                    </div>

                    <button type="submit">
                        <a style="text-decoration:none; color:white;" href="ticket.php?id=<?php echo $ticket['id']; ?>">Pay Now</a>
                    </button>

                    <div class="paragraph">
                        <p>By confirming your subscription, you allow The Outdoor Inn Crowd Limited to charge your card for this payment and future payments in accordance with their terms. You can always cancel your subscription.</p>
                    </div>

                    <div id="error-message" style="color: red;"></div>
                </form>
                </div>
            </div>
        </div>

    </div>
    <div class="space">

    </div>
    <?php
        include 'footer.php';
        ?>
   
    <script src="assets/card.js"></script>
</body>

</html>