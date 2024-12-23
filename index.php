<!-- 
////////////////////////////////////////////////////////////////

Author: Free-Template.co
Author URL: http://free-template.co.
License: https://creativecommons.org/licenses/by/3.0/
License URL: https://creativecommons.org/licenses/by/3.0/
Site License URL: https://free-template.co/template-license/
  
Website:  https://free-template.co
Facebook: https://www.facebook.com/FreeDashTemplate.co
Twitter:  https://twitter.com/Free_Templateco
RSS Feed: https://feeds.feedburner.com/Free-templateco

////////////////////////////////////////////////////////////////
-->
<?php
$servername = "localhost";
$username = "root"; // Replace with your MySQL username
$password = ""; // Replace with your MySQL password
$dbname = "sports_booking";
$showPopup = false;
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check availability when the form is submitted
$availabilityMessage = "";

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {	
	if (isset($_POST['book'])) {
    $username = $_POST['username'];
    $members = $_POST['members'];
    $date = $_POST['date'];
    $time = $_POST['time'];
    $phone = $_POST['phone'];

    $sql = "INSERT INTO bookings (username, members, date, time_slot, phone) 
            VALUES ('$username', $members, '$date', '$time', '$phone')";

    if ($conn->query($sql) === TRUE) {
		header("Location: submit_booking.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
	}
	
}
if ($showPopup) {
    echo "<script type='text/javascript'>
            window.onload = function() {
                document.getElementById('successModal').style.display = 'block';
            }
          </script>";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <title>Stamina &mdash; Free Website Template by Free-Template.co</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <meta name="description" content="" />
  <meta name="keywords" content="" />
  <meta name="author" content="Free-Template.co" />

  <link rel="shortcut icon" href="ftco-32x32.png">

  <link href="https://fonts.googleapis.com/css?family=Muli:300,400,700,900" rel="stylesheet">
  <link rel="stylesheet" href="fonts/icomoon/style.css">

  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/jquery-ui.css">
  <link rel="stylesheet" href="css/owl.carousel.min.css">
  <link rel="stylesheet" href="css/owl.theme.default.min.css">
  <link rel="stylesheet" href="css/owl.theme.default.min.css">

  <link rel="stylesheet" href="css/jquery.fancybox.min.css">

  <link rel="stylesheet" href="css/bootstrap-datepicker.css">

  <link rel="stylesheet" href="fonts/flaticon/font/flaticon.css">

  <link rel="stylesheet" href="css/aos.css">
  <link href="css/jquery.mb.YTPlayer.min.css" media="all" rel="stylesheet" type="text/css">

  <link rel="stylesheet" href="css/style.css">
    <script>
        // Function to send POST request and populate the dropdown
        function loadDropdown() {
            // Get the category ID (or any other parameter you want to send in the POST request)
            var date = document.getElementById("date").value;

            // Create a new XMLHttpRequest object
            var xhr = new XMLHttpRequest();

            // Configure the request: POST method, URL, and async flag
            xhr.open("POST", "fetch_data.php", true);
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

            // Define the response handling
            xhr.onload = function() {
                if (xhr.status === 200) {
                    try {
                        // Parse the JSON response and ensure it's an array
                        var data = JSON.parse(xhr.responseText);

                        // Check if data is an array before calling forEach
                        if (Array.isArray(data)) {
                            // Get the dropdown element
                            var dropdown = document.getElementById("time");

                            // Clear any previous options
                            dropdown.innerHTML = "";

                            // Add a default "Select" option
                            var defaultOption = document.createElement("option");
                            defaultOption.text = "Select a slot";
                            dropdown.add(defaultOption);

                            // Loop through the data and create options for each item
                            data.forEach(function(item) {
                                var option = document.createElement("option");
                                option.value = item;  // Set the value as the item
                                option.text = item;   // Set the display text as the item
                                dropdown.add(option);
                            });
                        } else {
                            console.error("Response is not an array");
                        }
                    } catch (e) {
                        console.error("Error parsing JSON response", e);
                    }
                } else {
                    console.error("Error fetching data");
                }
            };
			
            // Send the POST request with category ID
            xhr.send("date=" + date);
        }

        // Call the function to load dropdown when the page loads
        window.onload = loadDropdown;
    </script>

</head>

<body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">

  <div class="site-wrap">

    <div class="site-mobile-menu site-navbar-target">
      <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close mt-3">
          <span class="icon-close2 js-menu-toggle"></span>
        </div>
      </div>
      <div class="site-mobile-menu-body"></div>
    </div>


    <header class="site-navbar py-4 js-sticky-header site-navbar-target" role="banner">

      <div class="container-fluid">
        <div class="d-flex align-items-center">
          <div class="site-logo"><a href="index.html">The Happy Court<span>.</span> </a></div>
          <div class="ml-auto">
            <nav class="site-navigation position-relative text-right" role="navigation">
              <ul class="site-menu main-menu js-clone-nav mr-auto d-none d-lg-block">
                <li><a href="#home-section" class="nav-link">Home</a></li>
                <li><a href="#classes-section" class="nav-link">Classes</a></li>
                <li><a href="#schedule-section" class="nav-link">Schedule</a></li>
                <li><a href="#trainer-section" class="nav-link">Trainer</a></li>
                <li><a href="#services-section" class="nav-link">Services</a></li>
                <li><a href="#contact-section" class="nav-link">Booking</a></li>
              </ul>
            </nav>
            <a href="#" class="d-inline-block d-lg-none site-menu-toggle js-menu-toggle float-right"><span class="icon-menu h3"></span></a>
          </div>

        </div>
      </div>

    </header>

    <a id="bgndVideo" class="player"
      data-property="{videoURL:'https://www.youtube.com/watch?v=w-cRWOjlk8c',showYTLogo:false, showAnnotations: false, showControls: false, cc_load_policy: false, containment:'#home-section',autoPlay:true, mute:true, startAt:255, stopAt: 271, opacity:1}">
    </a>

    <div class="intro-section" id="home-section" style="background-color: #ccc; background-image: images/pickleball.jpg">
      <div class="container">

        <div class="row align-items-center">
          <div class="col-lg-12 mx-auto text-center" data-aos="fade-up">
            <h1 class="mb-3">Thinking of a new sport!</h1>
            <p class="lead mx-auto desc mb-5">Try pickleball <a href="https://free-template.co" target="_blank">Free-Template.co</a></p>
            <p class="text-center">
              <a href="#contact-section" class="btn btn-outline-white py-3 px-5">Lets Book</a>
            </p>
          </div>
        </div>

      </div>
    </div>

    <div class="schedule-wrap">



      <div class="d-md-flex align-items-center">
        <div class="hours mr-md-4 mb-4 mb-lg-0">
          <strong class="d-block">Hours</strong>
          Open: 5:00am - 11:00am and
           3:00pm - 10:00pm
        </div>
        <div class="cta ml-auto">
          <a href="#contact-section" class="smoothscroll d-flex d-md-flex align-items-center btn">
            <span class="mx-auto">  <span>Lets Pickleball</span> <span class="arrow icon-keyboard_arrow_right"></span></span>
          </a>
        </div>
      </div>
    </div>

    <div class="site-section">
      <div class="container">

        <div class="row justify-content-center text-center mb-5">
          <div class="col-md-8 section-heading">
            <span class="subheading">Stay Healthy</span>
            <h2 class="heading mb-3">Get A Perfect Body</h2>
            <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.
            Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>
          </div>
        </div>

        <!-- Slider -->
        <div class="owl-carousel nonloop-block-14 block-14" data-aos="fade">
          <div class="slide">
            <div class="ftco-feature-1">
              <span class="icon flaticon-fit"></span>
              <div class="ftco-feature-1-text">
                <h2>Be Fit</h2>
                <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
              </div>
            </div>
          </div>

          <div class="slide">
            <div class="ftco-feature-1">
              <span class="icon flaticon-gym-1"></span>
              <div class="ftco-feature-1-text">
                <h2>Join Club</h2>
                <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind
                  texts.</p>
              </div>
            </div>
          </div>

          <div class="slide">
            <div class="ftco-feature-1">
              <span class="icon flaticon-gym"></span>
              <div class="ftco-feature-1-text">
                <h2>Gym Fitness</h2>
                <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind
                  texts.</p>
              </div>
            </div>
          </div>

          <div class="slide">
            <div class="ftco-feature-1">
              <span class="icon flaticon-vegetables"></span>
              <div class="ftco-feature-1-text">
                <h2>Eat Vegie</h2>
                <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind
                  texts.</p>
              </div>
            </div>
          </div>

          <div class="slide">
            <div class="ftco-feature-1">
              <span class="icon flaticon-fruit-juice"></span>
              <div class="ftco-feature-1-text">
                <h2>Fruit Juices</h2>
                <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind
                  texts.</p>
              </div>
            </div>
          </div>
          
          <div class="slide">
            <div class="ftco-feature-1">
              <span class="icon flaticon-stationary-bike"></span>
              <div class="ftco-feature-1-text">
                <h2>Body Warmup</h2>
                <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind
                  texts.</p>
              </div>
            </div>
          </div>

        </div>

      </div>
    </div>

    <div class="bgimg" style="background-image: url('images/bg_2.jpg');"  data-stellar-background-ratio="0.5">

      <div class="container">
        <div class="row align-items-center justify-content-center text-center">
          <div class="col-md-7">
            <h2 class="">Get The Result You Want</h2>
            <p class="lead mx-auto desc mb-5">A new free template for fitness website template created with love by the fine folks
              at <a href="https://free-template.co" target="_blank">Free-Template.co</a></p>
          </div>
        </div>
      </div>

    </div>

    <div class="site-section" id="classes-section">
      <div class="container">
        <div class="row justify-content-center text-center mb-5">
          <div class="col-md-8  section-heading">
            <span class="subheading">Fitness Class</span>
            <h2 class="heading mb-3">Classes</h2>
            <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.
            Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-6">
            <div class="class-item d-flex align-items-center">
              <a href="single.html" class="class-item-thumbnail">
                <img src="images/img_1.jpg" alt="Free website template by Free-Template.co">
              </a>
              <div class="class-item-text">
                
                <h2><a href="single.html">Fitness Class Name #1</a></h2>
                <span>By Justin Daniel</span>,
                <span>30 minutes</span>
              </div>
            </div>

            <div class="class-item d-flex align-items-center">
              <a href="single.html" class="class-item-thumbnail">
                <img src="images/img_2.jpg" alt="Free website template by Free-Template.co">
              </a>
              <div class="class-item-text">
                
                <h2><a href="single.html">Fitness Class Name #2</a></h2>
                <span>By Justin Daniel</span>,
                <span>30 minutes</span>
              </div>
            </div>

            <div class="class-item d-flex align-items-center">
              <a href="single.html" class="class-item-thumbnail">
                <img src="images/img_3.jpg" alt="Free website template by Free-Template.co">
              </a>
              <div class="class-item-text">
                
                <h2><a href="single.html">Fitness Class Name #3</a></h2>
                <span>By Justin Daniel</span>,
                <span>30 minutes</span>
              </div>
            </div>
            
            <div class="class-item d-flex align-items-center">
              <a href="single.html" class="class-item-thumbnail">
                <img src="images/img_4.jpg" alt="Free website template by Free-Template.co">
              </a>
              <div class="class-item-text">
                
                <h2><a href="single.html">Fitness Class Name #4</a></h2>
                <span>By Justin Daniel</span>,
                <span>30 minutes</span>
              </div>
            </div>

            <div class="class-item d-flex align-items-center">
              <a href="single.html" class="class-item-thumbnail">
                <img src="images/img_1.jpg" alt="Free website template by Free-Template.co">
              </a>
              <div class="class-item-text">
                
                <h2><a href="single.html">Fitness Class Name #5</a></h2>
                <span>By Justin Daniel</span>,
                <span>30 minutes</span>
              </div>
            </div>
            
           
          </div>
          <div class="col-lg-6">
            <div class="class-item d-flex align-items-center">
              <a href="single.html" class="class-item-thumbnail">
                <img src="images/img_1.jpg" alt="Free website template by Free-Template.co">
              </a>
              <div class="class-item-text">
                
                <h2><a href="single.html">Fitness Class Name #1</a></h2>
                <span>By Justin Daniel</span>,
                <span>30 minutes</span>
              </div>
            </div>
            
            <div class="class-item d-flex align-items-center">
              <a href="single.html" class="class-item-thumbnail">
                <img src="images/img_2.jpg" alt="Free website template by Free-Template.co">
              </a>
              <div class="class-item-text">
                
                <h2><a href="single.html">Fitness Class Name #2</a></h2>
                <span>By Justin Daniel</span>,
                <span>30 minutes</span>
              </div>
            </div>
            
            <div class="class-item d-flex align-items-center">
              <a href="single.html" class="class-item-thumbnail">
                <img src="images/img_3.jpg" alt="Free website template by Free-Template.co">
              </a>
              <div class="class-item-text">
                
                <h2><a href="single.html">Fitness Class Name #3</a></h2>
                <span>By Justin Daniel</span>,
                <span>30 minutes</span>
              </div>
            </div>
            
            <div class="class-item d-flex align-items-center">
              <a href="single.html" class="class-item-thumbnail">
                <img src="images/img_4.jpg" alt="Free website template by Free-Template.co">
              </a>
              <div class="class-item-text">
                
                <h2><a href="single.html">Fitness Class Name #4</a></h2>
                <span>By Justin Daniel</span>,
                <span>30 minutes</span>
              </div>
            </div>
            
            <div class="class-item d-flex align-items-center">
              <a href="single.html" class="class-item-thumbnail">
                <img src="images/img_1.jpg" alt="Free website template by Free-Template.co">
              </a>
              <div class="class-item-text">
                
                <h2><a href="single.html">Fitness Class Name #5</a></h2>
                <span>By Justin Daniel</span>,
                <span>30 minutes</span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="bgimg" style="background-image: url('images/bg_3.jpg');"  data-stellar-background-ratio="0.5">
      <div class="container">
        <div class="row align-items-center justify-content-center text-center">
          <div class="col-md-7">
            <h2 class="">Every Step Counts</h2>
            <p class="lead mx-auto desc mb-5">A new free template for fitness website template created with love by the fine folks
              at <a href="https://free-template.co" target="_blank">Free-Template.co</a></p>
          </div>
        </div>
      </div>
    </div>

    <div class="site-section" id="schedule-section">
      <div class="container">
        <div class="row justify-content-center text-center mb-5">
          <div class="col-md-8  section-heading">
            <span class="subheading">Fitness Sched</span>
            <h2 class="heading mb-3">Schedule</h2>
            <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind
              texts.
              Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>
          </div>
        </div>

        
        <div class="row">
          <div class="col-12">
            <ul class="nav days d-flex" role="tablist">
              <li class="nav-item">
                <a class="nav-link active" id="sunday-tab" data-toggle="tab" href="#nav-sunday" role="tab" aria-controls="sunday"
                  aria-selected="true">S</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="monday-tab" data-toggle="tab" href="#nav-monday" role="tab" aria-controls="monday"
                  aria-selected="false">M</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="tuesday-tab" data-toggle="tab" href="#nav-tuesday" role="tab" aria-controls="tuesday"
                  aria-selected="false">T</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="wednesday-tab" data-toggle="tab" href="#nav-wednesday" role="tab" aria-controls="wednesday"
                  aria-selected="false">W</a>
              </li>

              <li class="nav-item">
                <a class="nav-link" id="thursday-tab" data-toggle="tab" href="#nav-thursday" role="tab" aria-controls="thursday"
                  aria-selected="false">T</a>
              </li><li class="nav-item">
                <a class="nav-link" id="friday-tab" data-toggle="tab" href="#nav-friday" role="tab" aria-controls="friday"
                  aria-selected="false">F</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="saturday-tab" data-toggle="tab" href="#nav-saturday" role="tab" aria-controls="saturday"
                  aria-selected="false">S</a>
              </li>
            </ul>
          </div>
        </div>

        <div class="tab-content">
          <div class="tab-pane fade show active" id="nav-sunday" role="tabpanel" aria-labelledby="nav-sunday-tab">
            <div class="row">
              <div class="col-lg-6">
                <div class="class-item d-flex align-items-center">
                  <a href="single.html" class="class-item-thumbnail">
                    <img src="images/img_1.jpg" alt="Free website template by Free-Template.co">
                  </a>
                  <div class="class-item-text">
                    <span>Sunday 7:30am - 9:00am</span>
                    <h2><a href="single.html">Fitness Class Name #1</a></h2>
                    <span>By Justin Daniel</span>,
                    <span>30 minutes</span>
                  </div>
                </div>
            
                <div class="class-item d-flex align-items-center">
                  <a href="single.html" class="class-item-thumbnail">
                    <img src="images/img_2.jpg" alt="Free website template by Free-Template.co">
                  </a>
                  <div class="class-item-text">
                    <span>Sunday 7:30am - 9:00am</span>
                    <h2><a href="single.html">Fitness Class Name #2</a></h2>
                    <span>By Justin Daniel</span>,
                    <span>30 minutes</span>
                  </div>
                </div>
            
                <div class="class-item d-flex align-items-center">
                  <a href="single.html" class="class-item-thumbnail">
                    <img src="images/img_3.jpg" alt="Free website template by Free-Template.co">
                  </a>
                  <div class="class-item-text">
                    <span>Sunday 7:30am - 9:00am</span>
                    <h2><a href="single.html">Fitness Class Name #3</a></h2>
                    <span>By Justin Daniel</span>,
                    <span>30 minutes</span>
                  </div>
                </div>
            
                <div class="class-item d-flex align-items-center">
                  <a href="single.html" class="class-item-thumbnail">
                    <img src="images/img_4.jpg" alt="Free website template by Free-Template.co">
                  </a>
                  <div class="class-item-text">
                    <span>Sunday 7:30am - 9:00am</span>
                    <h2><a href="single.html">Fitness Class Name #4</a></h2>
                    <span>By Justin Daniel</span>,
                    <span>30 minutes</span>
                  </div>
                </div>
            
                <div class="class-item d-flex align-items-center">
                  <a href="single.html" class="class-item-thumbnail">
                    <img src="images/img_1.jpg" alt="Free website template by Free-Template.co">
                  </a>
                  <div class="class-item-text">
                    <span>Sunday 7:30am - 9:00am</span>
                    <h2><a href="single.html">Fitness Class Name #5</a></h2>
                    <span>By Justin Daniel</span>,
                    <span>30 minutes</span>
                  </div>
                </div>
            
            
              </div>
              <div class="col-lg-6">
                <div class="class-item d-flex align-items-center">
                  <a href="single.html" class="class-item-thumbnail">
                    <img src="images/img_1.jpg" alt="Free website template by Free-Template.co">
                  </a>
                  <div class="class-item-text">
                    <span>Sunday 7:30am - 9:00am</span>
                    <h2><a href="single.html">Fitness Class Name #1</a></h2>
                    <span>By Justin Daniel</span>,
                    <span>30 minutes</span>
                  </div>
                </div>
            
                <div class="class-item d-flex align-items-center">
                  <a href="single.html" class="class-item-thumbnail">
                    <img src="images/img_2.jpg" alt="Free website template by Free-Template.co">
                  </a>
                  <div class="class-item-text">
                    <span>Sunday 7:30am - 9:00am</span>
                    <h2><a href="single.html">Fitness Class Name #2</a></h2>
                    <span>By Justin Daniel</span>,
                    <span>30 minutes</span>
                  </div>
                </div>
            
                <div class="class-item d-flex align-items-center">
                  <a href="single.html" class="class-item-thumbnail">
                    <img src="images/img_3.jpg" alt="Free website template by Free-Template.co">
                  </a>
                  <div class="class-item-text">
                    <span>Sunday 7:30am - 9:00am</span>
                    <h2><a href="single.html">Fitness Class Name #3</a></h2>
                    <span>By Justin Daniel</span>,
                    <span>30 minutes</span>
                  </div>
                </div>
            
                <div class="class-item d-flex align-items-center">
                  <a href="single.html" class="class-item-thumbnail">
                    <img src="images/img_4.jpg" alt="Free website template by Free-Template.co">
                  </a>
                  <div class="class-item-text">
                    <span>Sunday 7:30am - 9:00am</span>
                    <h2><a href="single.html">Fitness Class Name #4</a></h2>
                    <span>By Justin Daniel</span>,
                    <span>30 minutes</span>
                  </div>
                </div>
            
                <div class="class-item d-flex align-items-center">
                  <a href="single.html" class="class-item-thumbnail">
                    <img src="images/img_1.jpg" alt="Free website template by Free-Template.co">
                  </a>
                  <div class="class-item-text">
                    <span>Sunday 7:30am - 9:00am</span>
                    <h2><a href="single.html">Fitness Class Name #5</a></h2>
                    <span>By Justin Daniel</span>,
                    <span>30 minutes</span>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="tab-pane fade" id="nav-monday" role="tabpanel" aria-labelledby="nav-monday-tab">
            <div class="row">
              <div class="col-lg-6">
                <div class="class-item d-flex align-items-center">
                  <a href="single.html" class="class-item-thumbnail">
                    <img src="images/img_4.jpg" alt="Free website template by Free-Template.co">
                  </a>
                  <div class="class-item-text">
                    <span>Monday 7:30am - 9:00am</span>
                    <h2><a href="single.html">Fitness Class Name #4</a></h2>
                    <span>By Justin Daniel</span>,
                    <span>30 minutes</span>
                  </div>
                </div>
                <div class="class-item d-flex align-items-center">
                  <a href="single.html" class="class-item-thumbnail">
                    <img src="images/img_1.jpg" alt="Free website template by Free-Template.co">
                  </a>
                  <div class="class-item-text">
                    <span>Monday 7:30am - 9:00am</span>
                    <h2><a href="single.html">Fitness Class Name #1</a></h2>
                    <span>By Justin Daniel</span>,
                    <span>30 minutes</span>
                  </div>
                </div>
          
                <div class="class-item d-flex align-items-center">
                  <a href="single.html" class="class-item-thumbnail">
                    <img src="images/img_2.jpg" alt="Free website template by Free-Template.co">
                  </a>
                  <div class="class-item-text">
                    <span>Monday 7:30am - 9:00am</span>
                    <h2><a href="single.html">Fitness Class Name #2</a></h2>
                    <span>By Justin Daniel</span>,
                    <span>30 minutes</span>
                  </div>
                </div>
          
                <div class="class-item d-flex align-items-center">
                  <a href="single.html" class="class-item-thumbnail">
                    <img src="images/img_3.jpg" alt="Free website template by Free-Template.co">
                  </a>
                  <div class="class-item-text">
                    <span>Monday 7:30am - 9:00am</span>
                    <h2><a href="single.html">Fitness Class Name #3</a></h2>
                    <span>By Justin Daniel</span>,
                    <span>30 minutes</span>
                  </div>
                </div>
          
                
          
                <div class="class-item d-flex align-items-center">
                  <a href="single.html" class="class-item-thumbnail">
                    <img src="images/img_1.jpg" alt="Free website template by Free-Template.co">
                  </a>
                  <div class="class-item-text">
                    <span>Monday 7:30am - 9:00am</span>
                    <h2><a href="single.html">Fitness Class Name #5</a></h2>
                    <span>By Justin Daniel</span>,
                    <span>30 minutes</span>
                  </div>
                </div>
          
          
              </div>
              <div class="col-lg-6">
                <div class="class-item d-flex align-items-center">
                  <a href="single.html" class="class-item-thumbnail">
                    <img src="images/img_1.jpg" alt="Free website template by Free-Template.co">
                  </a>
                  <div class="class-item-text">
                    <span>Monday 7:30am - 9:00am</span>
                    <h2><a href="single.html">Fitness Class Name #1</a></h2>
                    <span>By Justin Daniel</span>,
                    <span>30 minutes</span>
                  </div>
                </div>
          
                <div class="class-item d-flex align-items-center">
                  <a href="single.html" class="class-item-thumbnail">
                    <img src="images/img_2.jpg" alt="Free website template by Free-Template.co">
                  </a>
                  <div class="class-item-text">
                    <span>Monday 7:30am - 9:00am</span>
                    <h2><a href="single.html">Fitness Class Name #2</a></h2>
                    <span>By Justin Daniel</span>,
                    <span>30 minutes</span>
                  </div>
                </div>
          
                <div class="class-item d-flex align-items-center">
                  <a href="single.html" class="class-item-thumbnail">
                    <img src="images/img_3.jpg" alt="Free website template by Free-Template.co">
                  </a>
                  <div class="class-item-text">
                    <span>Monday 7:30am - 9:00am</span>
                    <h2><a href="single.html">Fitness Class Name #3</a></h2>
                    <span>By Justin Daniel</span>,
                    <span>30 minutes</span>
                  </div>
                </div>
          
                <div class="class-item d-flex align-items-center">
                  <a href="single.html" class="class-item-thumbnail">
                    <img src="images/img_4.jpg" alt="Free website template by Free-Template.co">
                  </a>
                  <div class="class-item-text">
                    <span>Monday 7:30am - 9:00am</span>
                    <h2><a href="single.html">Fitness Class Name #4</a></h2>
                    <span>By Justin Daniel</span>,
                    <span>30 minutes</span>
                  </div>
                </div>
          
                <div class="class-item d-flex align-items-center">
                  <a href="single.html" class="class-item-thumbnail">
                    <img src="images/img_1.jpg" alt="Free website template by Free-Template.co">
                  </a>
                  <div class="class-item-text">
                    <span>Monday 7:30am - 9:00am</span>
                    <h2><a href="single.html">Fitness Class Name #5</a></h2>
                    <span>By Justin Daniel</span>,
                    <span>30 minutes</span>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="tab-pane fade" id="nav-tuesday" role="tabpanel" aria-labelledby="nav-tuesday-tab">
            <div class="row">
              <div class="col-lg-6">
                <div class="class-item d-flex align-items-center">
                  <a href="single.html" class="class-item-thumbnail">
                    <img src="images/img_2.jpg" alt="Free website template by Free-Template.co">
                  </a>
                  <div class="class-item-text">
                    <span>Tuesday 7:30am - 9:00am</span>
                    <h2><a href="single.html">Fitness Class Name #2</a></h2>
                    <span>By Justin Daniel</span>,
                    <span>30 minutes</span>
                  </div>
                </div>
                <div class="class-item d-flex align-items-center">
                  <a href="single.html" class="class-item-thumbnail">
                    <img src="images/img_1.jpg" alt="Free website template by Free-Template.co">
                  </a>
                  <div class="class-item-text">
                    <span>Tuesday 7:30am - 9:00am</span>
                    <h2><a href="single.html">Fitness Class Name #1</a></h2>
                    <span>By Justin Daniel</span>,
                    <span>30 minutes</span>
                  </div>
                </div>
          
                
          
                <div class="class-item d-flex align-items-center">
                  <a href="single.html" class="class-item-thumbnail">
                    <img src="images/img_3.jpg" alt="Free website template by Free-Template.co">
                  </a>
                  <div class="class-item-text">
                    <span>Tuesday 7:30am - 9:00am</span>
                    <h2><a href="single.html">Fitness Class Name #3</a></h2>
                    <span>By Justin Daniel</span>,
                    <span>30 minutes</span>
                  </div>
                </div>
          
                <div class="class-item d-flex align-items-center">
                  <a href="single.html" class="class-item-thumbnail">
                    <img src="images/img_4.jpg" alt="Free website template by Free-Template.co">
                  </a>
                  <div class="class-item-text">
                    <span>Tuesday 7:30am - 9:00am</span>
                    <h2><a href="single.html">Fitness Class Name #4</a></h2>
                    <span>By Justin Daniel</span>,
                    <span>30 minutes</span>
                  </div>
                </div>
          
                <div class="class-item d-flex align-items-center">
                  <a href="single.html" class="class-item-thumbnail">
                    <img src="images/img_1.jpg" alt="Free website template by Free-Template.co">
                  </a>
                  <div class="class-item-text">
                    <span>Tuesday 7:30am - 9:00am</span>
                    <h2><a href="single.html">Fitness Class Name #5</a></h2>
                    <span>By Justin Daniel</span>,
                    <span>30 minutes</span>
                  </div>
                </div>
          
          
              </div>
              <div class="col-lg-6">
                <div class="class-item d-flex align-items-center">
                  <a href="single.html" class="class-item-thumbnail">
                    <img src="images/img_3.jpg" alt="Free website template by Free-Template.co">
                  </a>
                  <div class="class-item-text">
                    <span>Tuesday 7:30am - 9:00am</span>
                    <h2><a href="single.html">Fitness Class Name #3</a></h2>
                    <span>By Justin Daniel</span>,
                    <span>30 minutes</span>
                  </div>
                </div>
                <div class="class-item d-flex align-items-center">
                  <a href="single.html" class="class-item-thumbnail">
                    <img src="images/img_1.jpg" alt="Free website template by Free-Template.co">
                  </a>
                  <div class="class-item-text">
                    <span>Tuesday 7:30am - 9:00am</span>
                    <h2><a href="single.html">Fitness Class Name #1</a></h2>
                    <span>By Justin Daniel</span>,
                    <span>30 minutes</span>
                  </div>
                </div>
          
                <div class="class-item d-flex align-items-center">
                  <a href="single.html" class="class-item-thumbnail">
                    <img src="images/img_2.jpg" alt="Free website template by Free-Template.co">
                  </a>
                  <div class="class-item-text">
                    <span>Tuesday 7:30am - 9:00am</span>
                    <h2><a href="single.html">Fitness Class Name #2</a></h2>
                    <span>By Justin Daniel</span>,
                    <span>30 minutes</span>
                  </div>
                </div>
          
                
          
                <div class="class-item d-flex align-items-center">
                  <a href="single.html" class="class-item-thumbnail">
                    <img src="images/img_4.jpg" alt="Free website template by Free-Template.co">
                  </a>
                  <div class="class-item-text">
                    <span>Tuesday 7:30am - 9:00am</span>
                    <h2><a href="single.html">Fitness Class Name #4</a></h2>
                    <span>By Justin Daniel</span>,
                    <span>30 minutes</span>
                  </div>
                </div>
          
                <div class="class-item d-flex align-items-center">
                  <a href="single.html" class="class-item-thumbnail">
                    <img src="images/img_1.jpg" alt="Free website template by Free-Template.co">
                  </a>
                  <div class="class-item-text">
                    <span>Tuesday 7:30am - 9:00am</span>
                    <h2><a href="single.html">Fitness Class Name #5</a></h2>
                    <span>By Justin Daniel</span>,
                    <span>30 minutes</span>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="tab-pane fade" id="nav-wednesday" role="tabpanel" aria-labelledby="nav-wednesday-tab">
            <div class="row">
              <div class="col-lg-6">
                <div class="class-item d-flex align-items-center">
                  <a href="single.html" class="class-item-thumbnail">
                    <img src="images/img_2.jpg" alt="Free website template by Free-Template.co">
                  </a>
                  <div class="class-item-text">
                    <span>Wednesday 7:30am - 9:00am</span>
                    <h2><a href="single.html">Fitness Class Name #2</a></h2>
                    <span>By Justin Daniel</span>,
                    <span>30 minutes</span>
                  </div>
                </div>
                <div class="class-item d-flex align-items-center">
                  <a href="single.html" class="class-item-thumbnail">
                    <img src="images/img_1.jpg" alt="Free website template by Free-Template.co">
                  </a>
                  <div class="class-item-text">
                    <span>Wednesday 7:30am - 9:00am</span>
                    <h2><a href="single.html">Fitness Class Name #1</a></h2>
                    <span>By Justin Daniel</span>,
                    <span>30 minutes</span>
                  </div>
                </div>
          
          
          
                <div class="class-item d-flex align-items-center">
                  <a href="single.html" class="class-item-thumbnail">
                    <img src="images/img_3.jpg" alt="Free website template by Free-Template.co">
                  </a>
                  <div class="class-item-text">
                    <span>Wednesday 7:30am - 9:00am</span>
                    <h2><a href="single.html">Fitness Class Name #3</a></h2>
                    <span>By Justin Daniel</span>,
                    <span>30 minutes</span>
                  </div>
                </div>
          
                <div class="class-item d-flex align-items-center">
                  <a href="single.html" class="class-item-thumbnail">
                    <img src="images/img_4.jpg" alt="Free website template by Free-Template.co">
                  </a>
                  <div class="class-item-text">
                    <span>Wednesday 7:30am - 9:00am</span>
                    <h2><a href="single.html">Fitness Class Name #4</a></h2>
                    <span>By Justin Daniel</span>,
                    <span>30 minutes</span>
                  </div>
                </div>
          
                <div class="class-item d-flex align-items-center">
                  <a href="single.html" class="class-item-thumbnail">
                    <img src="images/img_1.jpg" alt="Free website template by Free-Template.co">
                  </a>
                  <div class="class-item-text">
                    <span>Wednesday 7:30am - 9:00am</span>
                    <h2><a href="single.html">Fitness Class Name #5</a></h2>
                    <span>By Justin Daniel</span>,
                    <span>30 minutes</span>
                  </div>
                </div>
          
          
              </div>
              <div class="col-lg-6">
                <div class="class-item d-flex align-items-center">
                  <a href="single.html" class="class-item-thumbnail">
                    <img src="images/img_3.jpg" alt="Free website template by Free-Template.co">
                  </a>
                  <div class="class-item-text">
                    <span>Wednesday 7:30am - 9:00am</span>
                    <h2><a href="single.html">Fitness Class Name #3</a></h2>
                    <span>By Justin Daniel</span>,
                    <span>30 minutes</span>
                  </div>
                </div>
                <div class="class-item d-flex align-items-center">
                  <a href="single.html" class="class-item-thumbnail">
                    <img src="images/img_1.jpg" alt="Free website template by Free-Template.co">
                  </a>
                  <div class="class-item-text">
                    <span>Wednesday 7:30am - 9:00am</span>
                    <h2><a href="single.html">Fitness Class Name #1</a></h2>
                    <span>By Justin Daniel</span>,
                    <span>30 minutes</span>
                  </div>
                </div>
          
                <div class="class-item d-flex align-items-center">
                  <a href="single.html" class="class-item-thumbnail">
                    <img src="images/img_2.jpg" alt="Free website template by Free-Template.co">
                  </a>
                  <div class="class-item-text">
                    <span>Wednesday 7:30am - 9:00am</span>
                    <h2><a href="single.html">Fitness Class Name #2</a></h2>
                    <span>By Justin Daniel</span>,
                    <span>30 minutes</span>
                  </div>
                </div>
          
          
          
                <div class="class-item d-flex align-items-center">
                  <a href="single.html" class="class-item-thumbnail">
                    <img src="images/img_4.jpg" alt="Free website template by Free-Template.co">
                  </a>
                  <div class="class-item-text">
                    <span>Wednesday 7:30am - 9:00am</span>
                    <h2><a href="single.html">Fitness Class Name #4</a></h2>
                    <span>By Justin Daniel</span>,
                    <span>30 minutes</span>
                  </div>
                </div>
          
                <div class="class-item d-flex align-items-center">
                  <a href="single.html" class="class-item-thumbnail">
                    <img src="images/img_1.jpg" alt="Free website template by Free-Template.co">
                  </a>
                  <div class="class-item-text">
                    <span>Wednesday 7:30am - 9:00am</span>
                    <h2><a href="single.html">Fitness Class Name #5</a></h2>
                    <span>By Justin Daniel</span>,
                    <span>30 minutes</span>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="tab-pane fade" id="nav-thursday" role="tabpanel" aria-labelledby="nav-thursday-tab">
            <div class="row">
              <div class="col-lg-6">
                <div class="class-item d-flex align-items-center">
                  <a href="single.html" class="class-item-thumbnail">
                    <img src="images/img_4.jpg" alt="Free website template by Free-Template.co">
                  </a>
                  <div class="class-item-text">
                    <span>Thursday 7:30am - 9:00am</span>
                    <h2><a href="single.html">Fitness Class Name #4</a></h2>
                    <span>By Justin Daniel</span>,
                    <span>30 minutes</span>
                  </div>
                </div>
                <div class="class-item d-flex align-items-center">
                  <a href="single.html" class="class-item-thumbnail">
                    <img src="images/img_1.jpg" alt="Free website template by Free-Template.co">
                  </a>
                  <div class="class-item-text">
                    <span>Thursday 7:30am - 9:00am</span>
                    <h2><a href="single.html">Fitness Class Name #1</a></h2>
                    <span>By Justin Daniel</span>,
                    <span>30 minutes</span>
                  </div>
                </div>
          
                <div class="class-item d-flex align-items-center">
                  <a href="single.html" class="class-item-thumbnail">
                    <img src="images/img_2.jpg" alt="Free website template by Free-Template.co">
                  </a>
                  <div class="class-item-text">
                    <span>Thursday 7:30am - 9:00am</span>
                    <h2><a href="single.html">Fitness Class Name #2</a></h2>
                    <span>By Justin Daniel</span>,
                    <span>30 minutes</span>
                  </div>
                </div>
          
                <div class="class-item d-flex align-items-center">
                  <a href="single.html" class="class-item-thumbnail">
                    <img src="images/img_3.jpg" alt="Free website template by Free-Template.co">
                  </a>
                  <div class="class-item-text">
                    <span>Thursday 7:30am - 9:00am</span>
                    <h2><a href="single.html">Fitness Class Name #3</a></h2>
                    <span>By Justin Daniel</span>,
                    <span>30 minutes</span>
                  </div>
                </div>
          
          
          
                <div class="class-item d-flex align-items-center">
                  <a href="single.html" class="class-item-thumbnail">
                    <img src="images/img_1.jpg" alt="Free website template by Free-Template.co">
                  </a>
                  <div class="class-item-text">
                    <span>Thursday 7:30am - 9:00am</span>
                    <h2><a href="single.html">Fitness Class Name #5</a></h2>
                    <span>By Justin Daniel</span>,
                    <span>30 minutes</span>
                  </div>
                </div>
          
          
              </div>
              <div class="col-lg-6">
                <div class="class-item d-flex align-items-center">
                  <a href="single.html" class="class-item-thumbnail">
                    <img src="images/img_1.jpg" alt="Free website template by Free-Template.co">
                  </a>
                  <div class="class-item-text">
                    <span>Thursday 7:30am - 9:00am</span>
                    <h2><a href="single.html">Fitness Class Name #1</a></h2>
                    <span>By Justin Daniel</span>,
                    <span>30 minutes</span>
                  </div>
                </div>
          
                <div class="class-item d-flex align-items-center">
                  <a href="single.html" class="class-item-thumbnail">
                    <img src="images/img_2.jpg" alt="Free website template by Free-Template.co">
                  </a>
                  <div class="class-item-text">
                    <span>Thursday 7:30am - 9:00am</span>
                    <h2><a href="single.html">Fitness Class Name #2</a></h2>
                    <span>By Justin Daniel</span>,
                    <span>30 minutes</span>
                  </div>
                </div>
          
                <div class="class-item d-flex align-items-center">
                  <a href="single.html" class="class-item-thumbnail">
                    <img src="images/img_3.jpg" alt="Free website template by Free-Template.co">
                  </a>
                  <div class="class-item-text">
                    <span>Thursday 7:30am - 9:00am</span>
                    <h2><a href="single.html">Fitness Class Name #3</a></h2>
                    <span>By Justin Daniel</span>,
                    <span>30 minutes</span>
                  </div>
                </div>
          
                <div class="class-item d-flex align-items-center">
                  <a href="single.html" class="class-item-thumbnail">
                    <img src="images/img_4.jpg" alt="Free website template by Free-Template.co">
                  </a>
                  <div class="class-item-text">
                    <span>Thursday 7:30am - 9:00am</span>
                    <h2><a href="single.html">Fitness Class Name #4</a></h2>
                    <span>By Justin Daniel</span>,
                    <span>30 minutes</span>
                  </div>
                </div>
          
                <div class="class-item d-flex align-items-center">
                  <a href="single.html" class="class-item-thumbnail">
                    <img src="images/img_1.jpg" alt="Free website template by Free-Template.co">
                  </a>
                  <div class="class-item-text">
                    <span>Thursday 7:30am - 9:00am</span>
                    <h2><a href="single.html">Fitness Class Name #5</a></h2>
                    <span>By Justin Daniel</span>,
                    <span>30 minutes</span>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="tab-pane fade" id="nav-friday" role="tabpanel" aria-labelledby="nav-friday-tab">
            <div class="row">
              <div class="col-lg-6">
                <div class="class-item d-flex align-items-center">
                  <a href="single.html" class="class-item-thumbnail">
                    <img src="images/img_2.jpg" alt="Free website template by Free-Template.co">
                  </a>
                  <div class="class-item-text">
                    <span>Friday 7:30am - 9:00am</span>
                    <h2><a href="single.html">Fitness Class Name #2</a></h2>
                    <span>By Justin Daniel</span>,
                    <span>30 minutes</span>
                  </div>
                </div>
                <div class="class-item d-flex align-items-center">
                  <a href="single.html" class="class-item-thumbnail">
                    <img src="images/img_1.jpg" alt="Free website template by Free-Template.co">
                  </a>
                  <div class="class-item-text">
                    <span>Friday 7:30am - 9:00am</span>
                    <h2><a href="single.html">Fitness Class Name #1</a></h2>
                    <span>By Justin Daniel</span>,
                    <span>30 minutes</span>
                  </div>
                </div>
          
          
          
                <div class="class-item d-flex align-items-center">
                  <a href="single.html" class="class-item-thumbnail">
                    <img src="images/img_3.jpg" alt="Free website template by Free-Template.co">
                  </a>
                  <div class="class-item-text">
                    <span>Friday 7:30am - 9:00am</span>
                    <h2><a href="single.html">Fitness Class Name #3</a></h2>
                    <span>By Justin Daniel</span>,
                    <span>30 minutes</span>
                  </div>
                </div>
          
                <div class="class-item d-flex align-items-center">
                  <a href="single.html" class="class-item-thumbnail">
                    <img src="images/img_4.jpg" alt="Free website template by Free-Template.co">
                  </a>
                  <div class="class-item-text">
                    <span>Friday 7:30am - 9:00am</span>
                    <h2><a href="single.html">Fitness Class Name #4</a></h2>
                    <span>By Justin Daniel</span>,
                    <span>30 minutes</span>
                  </div>
                </div>
          
                <div class="class-item d-flex align-items-center">
                  <a href="single.html" class="class-item-thumbnail">
                    <img src="images/img_1.jpg" alt="Free website template by Free-Template.co">
                  </a>
                  <div class="class-item-text">
                    <span>Friday 7:30am - 9:00am</span>
                    <h2><a href="single.html">Fitness Class Name #5</a></h2>
                    <span>By Justin Daniel</span>,
                    <span>30 minutes</span>
                  </div>
                </div>
          
          
              </div>
              <div class="col-lg-6">
                <div class="class-item d-flex align-items-center">
                  <a href="single.html" class="class-item-thumbnail">
                    <img src="images/img_3.jpg" alt="Free website template by Free-Template.co">
                  </a>
                  <div class="class-item-text">
                    <span>Friday 7:30am - 9:00am</span>
                    <h2><a href="single.html">Fitness Class Name #3</a></h2>
                    <span>By Justin Daniel</span>,
                    <span>30 minutes</span>
                  </div>
                </div>
                <div class="class-item d-flex align-items-center">
                  <a href="single.html" class="class-item-thumbnail">
                    <img src="images/img_1.jpg" alt="Free website template by Free-Template.co">
                  </a>
                  <div class="class-item-text">
                    <span>Friday 7:30am - 9:00am</span>
                    <h2><a href="single.html">Fitness Class Name #1</a></h2>
                    <span>By Justin Daniel</span>,
                    <span>30 minutes</span>
                  </div>
                </div>
          
                <div class="class-item d-flex align-items-center">
                  <a href="single.html" class="class-item-thumbnail">
                    <img src="images/img_2.jpg" alt="Free website template by Free-Template.co">
                  </a>
                  <div class="class-item-text">
                    <span>Friday 7:30am - 9:00am</span>
                    <h2><a href="single.html">Fitness Class Name #2</a></h2>
                    <span>By Justin Daniel</span>,
                    <span>30 minutes</span>
                  </div>
                </div>
          
          
          
                <div class="class-item d-flex align-items-center">
                  <a href="single.html" class="class-item-thumbnail">
                    <img src="images/img_4.jpg" alt="Free website template by Free-Template.co">
                  </a>
                  <div class="class-item-text">
                    <span>Friday 7:30am - 9:00am</span>
                    <h2><a href="single.html">Fitness Class Name #4</a></h2>
                    <span>By Justin Daniel</span>,
                    <span>30 minutes</span>
                  </div>
                </div>
          
                <div class="class-item d-flex align-items-center">
                  <a href="single.html" class="class-item-thumbnail">
                    <img src="images/img_1.jpg" alt="Free website template by Free-Template.co">
                  </a>
                  <div class="class-item-text">
                    <span>Friday 7:30am - 9:00am</span>
                    <h2><a href="single.html">Fitness Class Name #5</a></h2>
                    <span>By Justin Daniel</span>,
                    <span>30 minutes</span>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="tab-pane fade" id="nav-saturday" role="tabpanel" aria-labelledby="nav-saturday-tab">
            <div class="row">
              <div class="col-lg-6">
                <div class="class-item d-flex align-items-center">
                  <a href="single.html" class="class-item-thumbnail">
                    <img src="images/img_1.jpg" alt="Free website template by Free-Template.co">
                  </a>
                  <div class="class-item-text">
                    <span>Saturday 7:30am - 9:00am</span>
                    <h2><a href="single.html">Fitness Class Name #1</a></h2>
                    <span>By Justin Daniel</span>,
                    <span>30 minutes</span>
                  </div>
                </div>
                <div class="class-item d-flex align-items-center">
                  <a href="single.html" class="class-item-thumbnail">
                    <img src="images/img_2.jpg" alt="Free website template by Free-Template.co">
                  </a>
                  <div class="class-item-text">
                    <span>Saturday 7:30am - 9:00am</span>
                    <h2><a href="single.html">Fitness Class Name #2</a></h2>
                    <span>By Justin Daniel</span>,
                    <span>30 minutes</span>
                  </div>
                </div>
                
          
          
          
                <div class="class-item d-flex align-items-center">
                  <a href="single.html" class="class-item-thumbnail">
                    <img src="images/img_3.jpg" alt="Free website template by Free-Template.co">
                  </a>
                  <div class="class-item-text">
                    <span>Saturday 7:30am - 9:00am</span>
                    <h2><a href="single.html">Fitness Class Name #3</a></h2>
                    <span>By Justin Daniel</span>,
                    <span>30 minutes</span>
                  </div>
                </div>
          
                <div class="class-item d-flex align-items-center">
                  <a href="single.html" class="class-item-thumbnail">
                    <img src="images/img_4.jpg" alt="Free website template by Free-Template.co">
                  </a>
                  <div class="class-item-text">
                    <span>Saturday 7:30am - 9:00am</span>
                    <h2><a href="single.html">Fitness Class Name #4</a></h2>
                    <span>By Justin Daniel</span>,
                    <span>30 minutes</span>
                  </div>
                </div>
          
                <div class="class-item d-flex align-items-center">
                  <a href="single.html" class="class-item-thumbnail">
                    <img src="images/img_1.jpg" alt="Free website template by Free-Template.co">
                  </a>
                  <div class="class-item-text">
                    <span>Saturday 7:30am - 9:00am</span>
                    <h2><a href="single.html">Fitness Class Name #5</a></h2>
                    <span>By Justin Daniel</span>,
                    <span>30 minutes</span>
                  </div>
                </div>
          
          
              </div>
              <div class="col-lg-6">
                <div class="class-item d-flex align-items-center">
                  <a href="single.html" class="class-item-thumbnail">
                    <img src="images/img_3.jpg" alt="Free website template by Free-Template.co">
                  </a>
                  <div class="class-item-text">
                    <span>Saturday 7:30am - 9:00am</span>
                    <h2><a href="single.html">Fitness Class Name #3</a></h2>
                    <span>By Justin Daniel</span>,
                    <span>30 minutes</span>
                  </div>
                </div>
                <div class="class-item d-flex align-items-center">
                  <a href="single.html" class="class-item-thumbnail">
                    <img src="images/img_1.jpg" alt="Free website template by Free-Template.co">
                  </a>
                  <div class="class-item-text">
                    <span>Saturday 7:30am - 9:00am</span>
                    <h2><a href="single.html">Fitness Class Name #1</a></h2>
                    <span>By Justin Daniel</span>,
                    <span>30 minutes</span>
                  </div>
                </div>
          
                <div class="class-item d-flex align-items-center">
                  <a href="single.html" class="class-item-thumbnail">
                    <img src="images/img_2.jpg" alt="Free website template by Free-Template.co">
                  </a>
                  <div class="class-item-text">
                    <span>Saturday 7:30am - 9:00am</span>
                    <h2><a href="single.html">Fitness Class Name #2</a></h2>
                    <span>By Justin Daniel</span>,
                    <span>30 minutes</span>
                  </div>
                </div>
          
          
          
                <div class="class-item d-flex align-items-center">
                  <a href="single.html" class="class-item-thumbnail">
                    <img src="images/img_4.jpg" alt="Free website template by Free-Template.co">
                  </a>
                  <div class="class-item-text">
                    <span>Saturday 7:30am - 9:00am</span>
                    <h2><a href="single.html">Fitness Class Name #4</a></h2>
                    <span>By Justin Daniel</span>,
                    <span>30 minutes</span>
                  </div>
                </div>
          
                <div class="class-item d-flex align-items-center">
                  <a href="single.html" class="class-item-thumbnail">
                    <img src="images/img_1.jpg" alt="Free website template by Free-Template.co">
                  </a>
                  <div class="class-item-text">
                    <span>Saturday 7:30am - 9:00am</span>
                    <h2><a href="single.html">Fitness Class Name #5</a></h2>
                    <span>By Justin Daniel</span>,
                    <span>30 minutes</span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        
      </div>
    </div>


    <div class="bgimg" style="background-image: url('images/bg_1.jpg');" data-stellar-background-ratio="0.5">
      <div class="container">
        <div class="row align-items-center justify-content-center text-center">
          <div class="col-md-7">
            <h2 class="">Your Fitness Partner Where Ever You Are</h2>
            <p class="lead mx-auto desc mb-5">A new free template for fitness website template created with love by the fine
              folks
              at <a href="https://free-template.co" target="_blank">Free-Template.co</a></p>
          </div>
        </div>
      </div>
    </div>


    
    
    <div class="site-section" id="trainer-section">
      <div class="container">
        <div class="row justify-content-center text-center mb-5" data-aos="fade-up">
          <div class="col-md-8  section-heading">
            <span class="subheading">Trainer</span>
            <h2 class="heading mb-3">Our Trainers</h2>
            <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind
              texts.
              Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>
          </div>
        </div>

        <div class="row">
          <div class="col-lg-3 mb-4 mb-lg-0 col-md-6 text-center" data-aos="fade-up" data-aos-delay="">
            <div class="person">
              <img src="images/person_1.jpg" alt="Free website template by Free-Template.co" class="img-fluid">
              <h3>Justin Daniel</h3>
              <p class="position">Trainer</p>
              <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind
              texts.</p>
            </div>
          </div>
          <div class="col-lg-3 mb-4 mb-lg-0 col-md-6 text-center" data-aos="fade-up" data-aos-delay="100">
            <div class="person">
              <img src="images/person_3.jpg" alt="Free website template by Free-Template.co" class="img-fluid">
              <h3>Matthew Davidson</h3>
              <p class="position">Trainer</p>
              <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind
                texts.</p>
            </div>
          </div>
          <div class="col-lg-3 mb-4 mb-lg-0 col-md-6 text-center" data-aos="fade-up" data-aos-delay="200">
            <div class="person">
              <img src="images/person_2.jpg" alt="Free website template by Free-Template.co" class="img-fluid">
              <h3>Matthew Davidson</h3>
              <p class="position">Trainer</p>
              <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind
                texts.</p>
            </div>
          </div>
          <div class="col-lg-3 mb-4 mb-lg-0 col-md-6 text-center" data-aos="fade-up" data-aos-delay="300">
            <div class="person">
              <img src="images/person_4.jpg" alt="Free website template by Free-Template.co" class="img-fluid">
              <h3>Matthew Davidson</h3>
              <p class="position">Trainer</p>
              <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind
                texts.</p>
            </div>
          </div>
        
        </div>
      </div>
    </div>

    <div class="site-section" id="services-section">
      <div class="container">
        <div class="row justify-content-center text-center mb-5" data-aos="fade-up">
          <div class="col-md-8  section-heading">
            <span class="subheading">Fitness Services</span>
            <h2 class="heading mb-3">Services</h2>
            <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind
              texts.
              </p>
          </div>
        </div>

        <div class="row">
          <div class="col-lg-4 mb-4 col-md-6" data-aos="fade-up" data-aos-delay="">
            <div class="ftco-feature-1">
              <span class="icon flaticon-fit"></span>
              <div class="ftco-feature-1-text">
                <h2>Be Fit</h2>
                <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind
                  texts.</p>
              </div>
            </div>
          </div>
          <div class="col-lg-4 mb-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
            <div class="ftco-feature-1">
              <span class="icon flaticon-gym-1"></span>
              <div class="ftco-feature-1-text">
                <h2>Join Club</h2>
                <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind
                  texts.</p>
              </div>
            </div>
          </div>
          <div class="col-lg-4 mb-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
            <div class="ftco-feature-1">
              <span class="icon flaticon-gym"></span>
              <div class="ftco-feature-1-text">
                <h2>Gym Fitness</h2>
                <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind
                  texts.</p>
              </div>
            </div>
          </div>

          <div class="col-lg-4 mb-4 col-md-6" data-aos="fade-up" data-aos-delay="">
            <div class="ftco-feature-1">
              <span class="icon flaticon-vegetables"></span>
              <div class="ftco-feature-1-text">
                <h2>Eat Vegie</h2>
                <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind
                  texts.</p>
              </div>
            </div>
          </div>

          <div class="col-lg-4 mb-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
            <div class="ftco-feature-1">
              <span class="icon flaticon-fruit-juice"></span>
              <div class="ftco-feature-1-text">
                <h2>Fruit Juices</h2>
                <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind
                  texts.</p>
              </div>
            </div>
          </div>

          <div class="col-lg-4 mb-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
            <div class="ftco-feature-1">
              <span class="icon flaticon-stationary-bike"></span>
              <div class="ftco-feature-1-text">
                <h2>Body Warmup</h2>
                <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind
                  texts.</p>
              </div>
            </div>
          </div>

        </div>
      </div>
    </div>

    <div class="site-section bg-light contact-wrap" id="contact-section">
      <div class="container">
        
        <div class="row justify-content-center text-center mb-5">
          <div class="col-md-8  section-heading">
            <h2 class="heading mb-3">Lets PickleBall</h2>
            <p>Write about booking here
            </p>
          </div>
        </div>

        <div class="row justify-content-center">
          <div class="col-md-7">
            <form method="post" data-aos="fade" id="bookingForm" >
              <div class="form-group row">
                <div class="col-md-6 mb-3 mb-lg-0">
                  <input type="text" class="form-control" placeholder="Name" name="username" required>
                </div>
                <div class="col-md-6">
				                <div class="col-md-12">
                  <input type="text" class="form-control" name="phone" placeholder="Enter your phone number">
                </div>

                </div>
              </div>
    
              <div class="form-group row">
                <div class="col-md-12">
										<span class="form-label">Members</span>
										    <select class="form-control" name="members">
											<option value="2">2</option>
										    <option value="4">4</option>
										    </select>
										<span class="select-arrow"></span>
                </div>
              </div>
    
              <div class="form-group row">
                <div class="col-md-12">
                  <input class="form-control" type="date" id="date" name="date" onchange="loadDropdown()">

                </div>
              </div>

              <div class="form-group row">
                <div class="col-md-12">
				
												<span class="form-label">Available Slots</span>
												<select class="form-control" name="time" id="time">
												
												</select>
												<span class="select-arrow"></span>
                </div>
              </div>
    
              <div class="form-group row">
                <div class="col-md-6">
    
                  <input type="submit" class="btn btn-primary py-3 px-5 btn-block" name="book" value="Book Now">
                </div>
              </div>
    
            </form>
          </div>
        </div>
      </div>
    </div>

    <div class="schedule-wrap2 clearfix">
      <div class="d-md-flex align-items-center">
        <div class="hours mr-md-4 mb-4 mb-lg-0">
          <strong class="d-block">Hours</strong>
          Opening: 7:30am &mdash;
          Closing: 9:00pm
        </div>
        <div class="cta ml-auto">
          <a href="#" class="d-flex d-md-flex align-items-center btn">
            <span class="mx-auto"> <span>BOOK NOW</span> <span class="arrow icon-keyboard_arrow_right"></span></span>
          </a>
        </div>
      </div>
    </div>

    <footer class="footer-section">
      <div class="container">
        <div class="row">
          <div class="col-md-4">
            <h3 class="text-dark">About Stamina</h3>
            <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
          </div>

          <div class="col-md-3 ml-auto">
            <h3 class="text-dark">Links</h3>
            <ul class="list-unstyled footer-links">
              <li><a href="#">Home</a></li>
              <li><a href="#">Classes</a></li>
              <li><a href="#">Schedule</a></li>
              <li><a href="#">Trainer</a></li>
            </ul>
          </div>

          <div class="col-md-4">
            <h3 class="text-dark">Subscribe</h3>
            <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.
            </p>
            <form action="#">
              <div class="d-flex mb-5">
                <input type="text" class="form-control rounded-0" placeholder="Email">
                <input type="submit" class="btn btn-primary rounded-0" value="Subscribe">
              </div>
            </form>
          </div>

        </div>

        <div class="row pt-5 mt-5 text-center">
          <div class="col-md-12">
            <div class=" pt-5">
              <!-- Link back to Free-Template.co can't be removed. Template is licensed under CC BY 3.0. -->
              <p class="copyright"><small>&copy;
                  <script>document.write(new Date().getFullYear());</script> Stamina. All Rights Reserved. Design by <a
                    href="https://free-template.co" target="_blank">Free-Template.co</a></small></p>
            </div>
          </div>

        </div>
      </div>
    </footer>



  </div>
  <!-- .site-wrap -->

  <script src="js/jquery-3.3.1.min.js"></script>
  <script src="js/jquery-migrate-3.0.1.min.js"></script>
  <script src="js/jquery-ui.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.stellar.min.js"></script>
  <script src="js/jquery.countdown.min.js"></script>
  <script src="js/bootstrap-datepicker.min.js"></script>
  <script src="js/jquery.easing.1.3.js"></script>
  <script src="js/aos.js"></script>
  <script src="js/jquery.fancybox.min.js"></script>
  <script src="js/jquery.sticky.js"></script>
  <script src="js/jquery.mb.YTPlayer.min.js"></script>




  <script src="js/main.js"></script>

</body>

</html>