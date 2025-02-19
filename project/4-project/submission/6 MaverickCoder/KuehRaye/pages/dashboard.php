<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Buyer Membership Dashboard</title>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
  <!-- Custom CSS -->
  <style>
    body {
      background-color: black;
      color: white;
    }

    .navbar {
      background-color: black;
    }

    .navbar-brand {
      color: orange;
      font-weight: bold;
    }

    .nav-link {
      color: orange;
    }

    .sidebar {
      background-color: black;
      color: white;
      height: 100vh;
    }

    .sidebar ul {
      list-style: none;
      padding: 0;
    }

    .sidebar li {
      padding: 15px;
    }

    .sidebar li a {
      color: white;
    }

    .main-content {
      margin-top: 50px;
    }

    .membership-card {
      background-color: orange;
      color: black;
      border: none;
      border-radius: 10px;
      padding: 15px;
      margin-bottom: 20px;
    }

    .membership-card h3 {
      font-weight: bold;
      margin-bottom: 10px;
    }

    .membership-card p {
      margin: 0;
    }

    /* Profile Pic */
    .profile-pic {
      width: 100px;
      height: 100px;
      border-radius: 50%;
      background-color: #ccc;
      margin-bottom: 10px;
      /* Add some styles for positioning the profile picture if necessary */
      background-size: cover;
      background-position: center;
    }

    /* Custom button style for Profile Picture Upload */
    .profile-pic-upload-btn {
      background-color: orange;
      color: black;
      border: none;
      border-radius: 5px;
      padding: 5px 10px;
      cursor: pointer;
    }

    /* Hide the file input element */
    input[type="file"] {
      display: none;
    }

    /* Membership Levels Section */
    .membership-levels {
      margin-top: 30px;
    }

    .membership-level {
      background-color: #222;
      color: white;
      border-radius: 10px;
      padding: 20px;
      margin-bottom: 20px;
    }

    .membership-level h4 {
      font-weight: bold;
    }

    .membership-level p {
      margin: 0;
    }

    .membership-level .progress {
      height: 10px;
      margin-bottom: 10px;
    }

    .membership-level .progress-bar {
      border-radius: 5px;
    }

    .membership-level .upgrade-btn {
      background-color: orange;
      color: black;
      border: none;
      border-radius: 5px;
      padding: 5px 10px;
      cursor: pointer;
    }

    /* Custom CSS styles for the Membership Benefits Section */
    .membership-benefits .card {
      background-color: transparent;
      /* Set the background color of the card to transparent */
      border: none;
      /* Remove the border around the card */
    }

    .membership-benefits .card-header {
      background-color: transparent;
      /* Set the background color of the card header to transparent */
      border: none;
      /* Remove the border around the card header */
    }

    .membership-benefits .card-header button {
      color: orange;
      /* Set the font color to orange */
    }

    .membership-benefits .card-header button:hover {
      background-color: rgba(255, 165, 0, 0.2);
      /* Add a slight orange background on hover */
    }

    .membership-benefits .card-header button.collapsed {
      color: orange;
      /* Set the font color to orange for the collapsed state */
    }

    .membership-benefits .card-header button.collapsed:hover {
      background-color: transparent;
      /* Set the background of the button to transparent on hover for collapsed state */
    }

    /* Set the font color of the explanation text to white when the dropdown is expanded */
    .membership-benefits .card-body {
      color: white;
    }
  </style>
</head>

<body>
  <?php

  // Start the session (if not already started)
  session_start();

  // Check if the user is not logged in
  if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    // Redirect to the login page
    header("Location: login.php");
    exit; // Ensure that the script stops executing after the redirect
  }

  ?>
  <nav class="navbar navbar-expand-lg">
    <div class="container">
      <a class="navbar-brand" href="#">Buyer Membership Dashboard</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item">
            <a class="nav-link" href="../index.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">My Profile</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Logout</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <div class="container">
    <div class="row">
      <div class="col-md-3">
        <div class="sidebar">
          <ul>
            <li><a href="#">Dashboard</a></li>
            <li><a href="#">Membership Status</a></li>
            <li><a href="#">Membership Benefits</a></li>
            <li><a href="#">Order History</a></li>
            <li><a href="#">Support</a></li>
          </ul>
        </div>
      </div>
      <div class="col-md-9">
        <div class="main-content">
          <h2>Welcome, John Doe!</h2>
          <!-- Profile Pic Section -->
          <div class="profile-pic" id="profilePic" style="background-image: url('https://via.placeholder.com/150');">
          </div>
          <input type="file" id="profilePicUpload" accept="image/*">
          <label for="profilePicUpload" class="profile-pic-upload-btn">Upload Profile Picture</label>
          <!-- End of Profile Pic Section -->

          <!-- Membership Levels Section -->
          <div class="membership-levels">
            <div class="row">
              <div class="col-md-4">
                <div class="membership-level">
                  <h4>Basic Membership</h4>
                  <p>Status: Active</p>
                  <p>Expires on: 31st Dec 2023</p>
                  <div class="progress">
                    <div class="progress-bar bg-success" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                  <p>Congratulations! You have unlocked Basic Membership.</p>
                  <button class="upgrade-btn" disabled>Unlocked</button>
                </div>
              </div>
              <div class="col-md-4">
                <div class="membership-level">
                  <h4>Premium Membership</h4>
                  <p>Status: Inactive</p>
                  <p>Expires on: 15th Jun 2023</p>
                  <div class="progress">
                    <div class="progress-bar bg-success" role="progressbar" style="width: 20%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                  <p>Points needed to unlock Premium Membership: 50</p>
                  <button class="upgrade-btn">Upgrade Now</button>
                </div>
              </div>
              <div class="col-md-4">
                <div class="membership-level">
                  <h4>Gold Membership</h4>
                  <p>Status: Inactive</p>
                  <p>Expired on: 15th Jun 2023</p>
                  <div class="progress">
                    <div class="progress-bar bg-success" role="progressbar" style="width: 0%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                  <p>Points needed to unlock Gold Membership: 100</p>
                  <button class="upgrade-btn">Upgrade Now</button>
                </div>
              </div>
            </div>
          </div>
          <!-- End of Membership Levels Section -->

          <!-- Membership Benefits Section -->
          <div class="membership-benefits">
            <h3 id="membershipBenefitsTitle">Membership Benefits</h3>
            <div class="accordion" id="membershipAccordion">
              <div class="card">
                <div class="card-header bg-transparent" id="basicMembershipHeading">
                  <h2 class="mb-0">
                    <button class="btn btn-link text-orange dropdown-toggle" type="button" data-bs-toggle="collapse" data-bs-target="#basicMembershipCollapse" aria-expanded="true" aria-controls="basicMembershipCollapse">
                      Basic Membership
                    </button>
                  </h2>
                </div>
                <div id="basicMembershipCollapse" class="collapse show" aria-labelledby="basicMembershipHeading" data-bs-parent="#membershipAccordion">
                  <div class="card-body">
                    <ul>
                      <li>Benefits of being a member: Welcome to our community! As a Basic Member, you gain access to a
                        world of convenience and savings. Enjoy hassle-free shopping with streamlined checkout and
                        exclusive access to members-only discounts on a wide range of products.</li>
                      <li>Special offers and rewards: Get ready for surprises! Our Basic Members receive periodic
                        rewards and special offers tailored to their preferences. Keep an eye on your inbox for
                        exclusive deals and early notifications on limited-time promotions.</li>
                      <li>Early access to promotions: Don't miss out on great deals! As a Basic Member, you get early
                        access to our major promotions and seasonal sales. Be among the first to explore the latest
                        trends and secure your favorite items before they sell out.</li>
                      <li>Fast and reliable customer support: Your satisfaction is our priority! Reach out to our
                        dedicated support team for prompt assistance. Our experts are here to address any queries,
                        concerns, or product-related questions to ensure your shopping experience is top-notch.</li>
                    </ul>
                  </div>
                </div>
              </div>

              <div class="card">
                <div class="card-header bg-transparent" id="premiumMembershipHeading">
                  <h2 class="mb-0">
                    <button class="btn btn-link text-orange collapsed dropdown-toggle" type="button" data-bs-toggle="collapse" data-bs-target="#premiumMembershipCollapse" aria-expanded="false" aria-controls="premiumMembershipCollapse">
                      Premium Membership
                    </button>
                  </h2>
                </div>
                <div id="premiumMembershipCollapse" class="collapse" aria-labelledby="premiumMembershipHeading" data-bs-parent="#membershipAccordion">
                  <div class="card-body">
                    <ul>
                      <li>Benefits of being a member: Upgrade to Premium for an exceptional shopping experience. Our
                        Premium Members enjoy all the benefits of Basic Membership and more. Unlock a world of exclusive
                        perks, personalized recommendations, and priority access to limited-edition products.</li>
                      <li>Special offers and rewards: Be pampered like a VIP! Premium Members receive frequent surprise
                        gifts, exclusive discounts, and access to member-only events. Your loyalty is rewarded with
                        premium treats tailored to your interests.</li>
                      <li>Early access to promotions: Stay one step ahead of the crowd! Premium Members get early bird
                        access to our most sought-after promotions. Don't wait for the best deals—grab them before they
                        become available to the general public.</li>
                      <li>Fast and reliable customer support: Your satisfaction, our commitment! Premium Members receive
                        top-tier customer support with a dedicated hotline for quick resolutions and personalized
                        assistance. We value your time and prioritize your queries with utmost care.</li>
                    </ul>
                  </div>
                </div>
              </div>

              <div class="card">
                <div class="card-header bg-transparent" id="goldMembershipHeading">
                  <h2 class="mb-0">
                    <button class="btn btn-link text-orange collapsed dropdown-toggle" type="button" data-bs-toggle="collapse" data-bs-target="#goldMembershipCollapse" aria-expanded="false" aria-controls="goldMembershipCollapse">
                      Gold Membership
                    </button>
                  </h2>
                </div>
                <div id="goldMembershipCollapse" class="collapse" aria-labelledby="goldMembershipHeading" data-bs-parent="#membershipAccordion">
                  <div class="card-body">
                    <ul>
                      <li>Benefits of being a member: Welcome to the elite club of Gold Members. Experience unparalleled
                        luxury and exclusivity. Along with all the perks of Basic and Premium Memberships, Gold Members
                        receive priority handling, concierge service, and invitations to exclusive events.</li>
                      <li>Special offers and rewards: Embrace opulence! Gold Members are showered with lavish rewards,
                        from high-value surprise gifts to custom-made products. Enjoy personalized discounts and access
                        to limited-edition luxury collections.</li>
                      <li>Early access to promotions: Stay ahead in style! Gold Members get front-row seats to the
                        latest launches, designer collaborations, and luxury brand partnerships. Secure the most
                        prestigious items before anyone else.</li>
                      <li>Fast and reliable customer support: Receive royal treatment! Gold Members enjoy 24/7 VIP
                        customer support with dedicated representatives to cater to your every need. From product
                        consultations to special requests, we are here to serve you like a true VIP.</li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- End of Membership Benefits Section -->

        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <!-- Custom JavaScript -->
  <script>
    // Placeholder for handling profile picture upload and display
    const profilePic = document.getElementById("profilePic");
    const profilePicUpload = document.getElementById("profilePicUpload");

    profilePicUpload.addEventListener("change", (event) => {
      const file = event.target.files[0];
      // Add your code here to handle the uploaded file and display it in the profilePic container
      const reader = new FileReader();
      reader.onload = function() {
        profilePic.style.backgroundImage = `url(${reader.result})`;
      };
      reader.readAsDataURL(file);
    });
  </script>
</body>

</html>