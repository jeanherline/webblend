<?php
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
require 'PHPMailer/src/Exception.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if (isset($_POST['submit'])) {
  $name = isset($_POST['name']) ? $_POST['name'] : '';
  $email = isset($_POST['email']) ? $_POST['email'] : '';
  $message = isset($_POST['message']) ? $_POST['message'] : '';

  $mail = new PHPMailer(true);

  $mail->SMTPDebug = 0;
  $mail->isSMTP();
  $mail->Host = 'smtp.gmail.com';
  $mail->SMTPAuth = true;
  $mail->Username = 'webblendsolutions@gmail.com';
  $mail->Password = 'euyscjbkznlnytos';
  $mail->SMTPSecure = 'tls';
  $mail->Port = 587;

  $mail->setFrom('webblendsolutions@gmail.com', 'WebBlend Global Solutions');
  $mail->addAddress($email, $name);
  $mail->addCustomHeader('X-Priority', '1');
  $mail->addCustomHeader('Importance', 'High');
  $mail->isHTML(true);
  $mail->Subject = 'Thank you for contacting us!';
  $mail->Body = "
                    <html>
                        <head>
                            <style>
                                body {
                                    font-family: Arial, sans-serif;
                                    font-size: 16px;
                                    line-height: 1.5;
                                    color: #333;
                                    background-color: #f7f7f7;
                                }
                                h1 {
                                    font-size: 24px;
                                    color: #444;
                                    margin-bottom: 20px;
                                }
                                p {
                                    margin-bottom: 15px;
                                }
                                ul {
                                    list-style-type: none;
                                    padding: 0;
                                    margin-bottom: 15px;
                                }
                                li {
                                    margin-bottom: 5px;
                                }
                                .container {
                                    max-width: 600px;
                                    margin: 0 auto;
                                    padding: 20px;
                                    background-color: #fff;
                                    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
                                }
                                .signature {
                                    margin-top: 30px;
                                }
                                .signature p {
                                    margin-bottom: 0;
                                }
                                .website-link {
                                    color: #3e75f7;
                                    text-decoration: none;
                                }
                            </style>
                        </head>
                        <body>
                            <div class='container'>
                                <h1>Thank you for contacting us!</h1>
                                <p>We appreciate your message and will get back to you as soon as possible.</p>
                                <p>Here are the details you provided:</p>
                                <ul>
                                    <li><strong>Name:</strong> $name</li>
                                    <li><strong>Email:</strong> $email</li>
                                    <li><strong>Message:</strong> $message</li>
                                </ul>
                                <p>Thank you again for reaching out to us. We look forward to assisting you.</p>
                                <div class='signature'>
                                    <p>WebBlend Global Solutions</p>
                                    <p>Visit our website: <a href='https://www.webblendsolutions.com' class='website-link'>www.webblendsolutions.com</a></p>
                                </div>
                            </div>
                        </body>
                    </html>
                ";
  if ($mail->send()) {
    $mail = new PHPMailer(true);

    $mail->SMTPDebug = 0;
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'webblendsolutions@gmail.com';
    $mail->Password = 'euyscjbkznlnytos';
    $mail->SMTPSecure = 'tls';
    $mail->Port = 587;

    $mail->setFrom($email, $name);
    $mail->addAddress('webblendsolutions@gmail.com', 'WebBlend Global Solutions');
    $mail->addCustomHeader('X-Priority', '1');
    $mail->addCustomHeader('Importance', 'High');
    $mail->isHTML(true);
    $mail->Subject = 'New Contact Form Submission';
    $mail->Body = "
                    <html>
                        <head>
                            <style>
                                body {
                                    font-family: Arial, sans-serif;
                                    font-size: 16px;
                                    line-height: 1.5;
                                    color: #333;
                                    background-color: #f7f7f7;
                                }
                                h1 {
                                    font-size: 24px;
                                    color: #444;
                                    margin-bottom: 20px;
                                }
                                p {
                                    margin-bottom: 15px;
                                }
                                ul {
                                    list-style-type: none;
                                    padding: 0;
                                    margin-bottom: 15px;
                                }
                                li {
                                    margin-bottom: 5px;
                                }
                                .container {
                                    max-width: 600px;
                                    margin: 0 auto;
                                    padding: 20px;
                                    background-color: #fff;
                                    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
                                }
                                .signature {
                                    margin-top: 30px;
                                }
                                .signature p {
                                    margin-bottom: 0;
                                }
                                .website-link {
                                    color: #3e75f7;
                                    text-decoration: none;
                                }
                            </style>
                        </head>
                        <body>
                            <div class='container'>
                                <h1>New Contact Form Submission</h1>
                                <p>A new contact form submission has been received. Here are the details:</p>
                                <ul>
                                    <li><strong>Name:</strong> $name</li>
                                    <li><strong>Email:</strong> $email</li>
                                    <li><strong>Message:</strong> $message</li>
                                </ul>
                                <p>Please respond to the inquiry as soon as possible.</p>
                                <div class='signature'>
                                    <p>WebBlend Global Solutions</p>
                                    <p>Visit our website: <a href='https://www.webblendsolutions.com' class='website-link'>www.webblendsolutions.com</a></p>
                                </div>
                            </div>
                        </body>
                    </html>
                ";
    if ($mail->send()) {
      $successMessage = "Email sent successfully! We will get back to you soon.";
    } else {
      $errorMessage = "Error sending email: " . $mail->ErrorInfo;
    }
    if (isset($successMessage)) {
      echo '<p style="text-align: center; background-color: #0652E9; color: white; padding: 10px; margin: 0;">' . $successMessage . '</p>';
    } elseif (isset($errorMessage)) {
      echo '<p style="text-align: center; background-color: #0652E9; color: white; padding: 10px; margin: 0;">' . $errorMessage . '</p>';
    }
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title> WebBlend Global Solutions</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta charset="utf-8" />
  <meta property="twitter:card" content="summary_large_image" />
  <link rel="icon" href="public/Branding/icon.png" type="images" />

  <style data-tag="reset-style-sheet">
    html {
      line-height: 1.15;
    }

    body {
      margin: 0;
    }

    * {
      box-sizing: border-box;
      border-width: 0;
      border-style: solid;
    }

    p,
    li,
    ul,
    pre,
    div,
    h1,
    h2,
    h3,
    h4,
    h5,
    h6,
    figure,
    blockquote,
    figcaption {
      margin: 0;
      padding: 0;
    }

    button {
      background-color: transparent;
    }

    button,
    input,
    optgroup,
    select,
    textarea {
      font-family: inherit;
      font-size: 100%;
      line-height: 1.15;
      margin: 0;
    }

    button,
    select {
      text-transform: none;
    }

    button,
    [type="button"],
    [type="reset"],
    [type="submit"] {
      -webkit-appearance: button;
    }

    button::-moz-focus-inner,
    [type="button"]::-moz-focus-inner,
    [type="reset"]::-moz-focus-inner,
    [type="submit"]::-moz-focus-inner {
      border-style: none;
      padding: 0;
    }

    button:-moz-focus,
    [type="button"]:-moz-focus,
    [type="reset"]:-moz-focus,
    [type="submit"]:-moz-focus {
      outline: 1px dotted ButtonText;
    }

    a {
      color: inherit;
      text-decoration: inherit;
    }

    input {
      padding: 2px 4px;
    }

    img {
      display: block;
    }

    html {
      scroll-behavior: smooth
    }
  </style>
  <style data-tag="default-style-sheet">
    html {
      font-family: Inter;
      font-size: 16px;
    }

    body {
      font-weight: 400;
      font-style: normal;
      text-decoration: none;
      text-transform: none;
      letter-spacing: normal;
      line-height: 1.15;
      color: var(--dl-color-gray-black);
      background-color: var(--dl-color-gray-white);

    }
  </style>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&amp;display=swap" data-tag="font" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap" data-tag="font" />
  <link rel="stylesheet" href="./style.css" />
</head>

<body>

  <div>
    <script type="text/javascript" src="https://unpkg.com/dangerous-html/dist/default/lib.umd.js"></script>
    <link href="./home.css" rel="stylesheet" />

    <div class="home-container">

      <nav class="navbar-navbar navbar-root-class-name">
        <img alt="Planical7012" src="public/Branding/icon.png" class="navbar-branding-logo" width="70px" />
        <div class="navbar-nav-content">
          <div class="navbar-nav-links">
            <span class="navbar-link nav-link"><a href="#features">Features</a></span>
            <span class="nav-link"><a href="#why">Why us</a></span>
            <span class="nav-link"><a href="#pricing">Prices</a></span>
            <span class="nav-link"><a href="#contact">Contact</a></span>
          </div>
          <div class="get-started navbar-get-started">
            <a href="https://calendly.com/webblendsolutions/consultation" target="_blank"><span class="navbar-text">Get
                started</span></a>
          </div>
          <div id="open-mobile-menu" class="navbar-hamburger get-started">
            <img alt="image" src="public/Icons/hamburger-200h.png" class="navbar-image" />
          </div>
        </div>
        <div id="mobile-menu" class="navbar-mobile-menu">
          <div class="navbar-branding">
            <img alt="image" src="public/Branding/logo.png" class="navbar-image1" />
            <div id="close-mobile-menu" class="navbar-container">
              <svg viewBox="0 0 1024 1024" class="navbar-icon">
                <path d="M225.835 286.165l225.835 225.835-225.835 225.835c-16.683 16.683-16.683 43.691 0 60.331s43.691 16.683 60.331 0l225.835-225.835 225.835 225.835c16.683 16.683 43.691 16.683 60.331 0s16.683-43.691 0-60.331l-225.835-225.835 225.835-225.835c16.683-16.683 16.683-43.691 0-60.331s-43.691-16.683-60.331 0l-225.835 225.835-225.835-225.835c-16.683-16.683-43.691-16.683-60.331 0s-16.683 43.691 0 60.331z">
                </path>
              </svg>
            </div>
          </div>
          <div class="navbar-nav-links1">
            <span class="navbar-link nav-link"><a href="#features">Features</a></span>
            <span class="nav-link"><a href="#why">Why us</a></span>
            <span class="nav-link"><a href="#pricing">Prices</a></span>
            <span class="nav-link"><a href="#contact">Contact</a></span>
          </div>
          <div class="get-started">
            <a href="https://calendly.com/webblendsolutions/consultation" target="_blank"><span class="navbar-text1">Get
                started</span></a>
          </div>

        </div>
        <div>
          <dangerous-html html="<script>
    /*
Mobile menu - Code Embed
*/

/* listenForUrlChangesMobileMenu() makes sure that if you changes pages inside your app, 
the mobile menu will still work*/

const listenForUrlChangesMobileMenu = () => {
    let url = location.href;
    document.body.addEventListener('click', () => {
        requestAnimationFrame(() => {
            if (url !== location.href) {
                runMobileMenuCodeEmbed();
                url = location.href;
            }
        });
    },
    true
    );
};

const runMobileMenuCodeEmbed = () => {
    // Mobile menu
    const mobileMenu = document.querySelector('#mobile-menu')

    // Buttons
    const closeButton = document.querySelector('#close-mobile-menu')
    const openButton = document.querySelector('#open-mobile-menu')

    // On openButton click, set the mobileMenu position left to -100vw
    openButton &amp;&amp; openButton.addEventListener('click', function() {
        mobileMenu.style.transform = 'translateX(0%)'
    })

    // On closeButton click, set the mobileMenu position to 0vw
    closeButton &amp;&amp; closeButton.addEventListener('click', function() {
        mobileMenu.style.transform = 'translateX(100%)'
    })
}

runMobileMenuCodeEmbed()
listenForUrlChangesMobileMenu()
</script>"></dangerous-html>
        </div>
      </nav>

      <section class="home-section">
        <div class="home-hero">
          <div class="home-content">
            <main class="home-main">
              <header class="home-header">
                <h1 class="home-heading">
                  Unlock Your Digital Potential with WebBlend
                </h1>
                <span class="home-caption">
                  Affordable, feature-rich websites. We provide static & informative website options, seamless CMS integration, and
                  powerful e-commerce functionality.
                </span>
              </header>
              <div class="home-buttons">
                <div class="home-get-started button">
                  <a href="https://calendly.com/webblendsolutions/consultation" target="_blank"><span class="home-text">Book a Demo</span></a>
                </div>
                <div class="home-get-started1 button">
                  <span class="home-text01"><a href="#pricing">View Pricing</a></span>
                </div>
              </div>
            </main>
            <div class="home-highlight">
              <div class="home-avatars">
                <img alt="image" src="https://images.unsplash.com/photo-1552234994-66ba234fd567?ixid=Mnw5MTMyMXwwfDF8c2VhcmNofDN8fHBvdHJhaXR8ZW58MHx8fHwxNjY3MjQ0ODcx&amp;ixlib=rb-4.0.3&amp;w=200" class="home-image avatar" />
                <img alt="image" src="https://images.unsplash.com/photo-1610276198568-eb6d0ff53e48?ixid=Mnw5MTMyMXwwfDF8c2VhcmNofDF8fHBvdHJhaXR8ZW58MHx8fHwxNjY3MjQ0ODcx&amp;ixlib=rb-4.0.3&amp;w=200" class="home-image01 avatar" />
                <img alt="image" src="https://images.unsplash.com/photo-1618151313441-bc79b11e5090?ixid=Mnw5MTMyMXwwfDF8c2VhcmNofDEzfHxwb3RyYWl0fGVufDB8fHx8MTY2NzI0NDg3MQ&amp;ixlib=rb-4.0.3&amp;w=200" class="home-image02 avatar" />
              </div>
              <label class="home-caption1">
                Loved by 1,000+ people like you.
              </label>
            </div>
          </div>
          <div class="home-image03">
            <img alt="image" src="public/SectionImages/heroimage-1500h.png" class="home-image04" />
          </div>
          <div class="home-image05">
            <img alt="image" src="public/SectionImages/heroimage-1500h.png" class="home-image06" />
          </div>
        </div>
      </section>

      <section class="home-section01" id="why">
        <!-- <h2 class="home-text02">
          Our web developers are here, 24/7.
        </h2>
        <div class="home-features">
          <header class="feature feature-active home-feature">
            <h3 class="home-text03">Urgent Care</h3>
            <p class="home-text04">Doloremque laudantium</p>
          </header>
          <header class="feature home-feature1">
            <h3 class="home-text05">Chronic Care</h3>
            <p class="home-text06">Doloremque laudantium</p>
          </header>
          <header class="feature home-feature2">
            <h3 class="home-text07">Mental Health</h3>
            <p class="home-text08">Doloremque laudantium</p>
          </header>
        </div> -->
        <div class="home-note">
          <div class="home-content1">
            <main class="home-main1">
              <h2 class="home-heading01">
                Why Choose WebBlend Global Solutions?
              </h2>
              <p class="home-paragraph">
                <span>
                  At WebBlend Global Solutions, we stand out for our expertise, dedication to excellence, and
                  exceptional
                  results. Choose us for cutting-edge, tailored web solutions at affordable prices. With seamless CMS
                  integration and powerful e-commerce functionality, we help unlock your digital potential. Experience
                  excellence with WebBlend Global Solutions.
                </span>
                <!-- <br />
                <br />
                <span>
                  Doloremque laudantium, totam rem aperiam, eaque ipsa quae ab
                  illo inventore veritatis et quasi architecto beatae.
                </span> -->
                <br />
              </p>
            </main>
            <div class="home-explore-more">
              <a href="https://www.facebook.com/webblendsolutions" target="_blank">
                <p class="home-text14">Visit our Page
                  -&gt;</p>
              </a>
            </div>
          </div>
          <div class="home-image07">
            <img alt="image" src="public/SectionImages/group%201490-1200w.png" width="550px" class="home-image08" />
          </div>
        </div>
      </section>
      <section class="home-section02">
        <header class="home-header01">
          <h2 class="home-text15">Why Do You Need a Website?</h2>
          <span class="home-text16">
            With a professionally designed website, you can showcase your products or services, engage with customers, and create a seamless user experience. Stay ahead of the competition and tap into the endless possibilities of the digital world by investing in a website that empowers your business growth and drives success.
          </span>
        </header>
        <!-- <section class="home-note1">
          <div class="home-image09">
            <img alt="image" src="public/SectionImages/group%201428-1200w.png" class="home-image10" />
          </div>
          <div class="home-content2">
            <div class="home-main2">
              <div class="home-caption2">
                <span class="section-head">Tempor incididunt</span>
              </div>
              <div class="home-heading02">
                <h2 class="section-heading">
                  We provide compassionate care from start to finish.
                </h2>
                <p class="section-description">
                  Sed ut perspiciatis unde omnis iste natus error sit
                  voluptatem accusantium doloremque laudantium, totam rem
                  aperiam, eaque ipsa quae ab illo inventore veritatis et
                  quasi architecto beatae.
                </p>
              </div>
            </div>
            <div class="home-get-started2 button">
              <span class="home-text17">Get started</span>
            </div>
          </div>
        </section> -->
        <section class="home-note2" id="features">
          <div class="home-image11">
            <img alt="image" src="public/SectionImages/group%201449-1200w.png" width="550px" class="home-image12" />
          </div>
          <div class="home-content3">
            <main class="home-main3">
              <header class="home-caption3">
                <span class="home-section04 section-head">
                  Essential Business Website
                </span>
              </header>
              <main class="home-heading04">
                <header class="home-header02">
                  <h2 class="section-heading">
                    Accelerate Your Digital Growth with Our Expert Web Development Solutions
                  </h2>
                  <p class="section-description">
                    When you choose WebBlend Global Solutions, you're choosing a team of experienced professionals who
                    are
                    committed to delivering exceptional websites tailored to your unique needs.
                  </p>
                </header>
                <div class="home-checkmarks">
                  <div class="mark-mark">
                    <div class="mark-icon">
                      <svg viewBox="0 0 1024 1024" class="mark-icon1">
                        <path d="M384 690l452-452 60 60-512 512-238-238 60-60z"></path>
                      </svg>
                    </div>
                    <p class="mark-label">
                      <span>One Time Payment & No Monthly Fees!</span>
                    </p>
                  </div>
                  <div class="mark-mark">
                    <div class="mark-icon">
                      <svg viewBox="0 0 1024 1024" class="mark-icon1">
                        <path d="M384 690l452-452 60 60-512 512-238-238 60-60z"></path>
                      </svg>
                    </div>
                    <p class="mark-label">
                      <span>Lowest Renewal Price in the Market</span>
                    </p>
                  </div>
                  <div class="mark-mark">
                    <div class="mark-icon">
                      <svg viewBox="0 0 1024 1024" class="mark-icon1">
                        <path d="M384 690l452-452 60 60-512 512-238-238 60-60z"></path>
                      </svg>
                    </div>
                    <p class="mark-label">
                      <span>FREE Domain & Hosting with SSL Certificate (1 year)</span>
                    </p>
                  </div>
                  <div class="mark-mark">
                    <div class="mark-icon">
                      <svg viewBox="0 0 1024 1024" class="mark-icon1">
                        <path d="M384 690l452-452 60 60-512 512-238-238 60-60z"></path>
                      </svg>
                    </div>
                    <p class="mark-label">
                      <span>FREE Business Email Account via Webmail</span>
                    </p>
                  </div>
                  <div class="mark-mark">
                    <div class="mark-icon">
                      <svg viewBox="0 0 1024 1024" class="mark-icon1">
                        <path d="M384 690l452-452 60 60-512 512-238-238 60-60z"></path>
                      </svg>
                    </div>
                    <p class="mark-label">
                      <span>FREE Basic SEO Optimization</span>
                    </p>
                  </div>
                  <div class="mark-mark">
                    <div class="mark-icon">
                      <svg viewBox="0 0 1024 1024" class="mark-icon1">
                        <path d="M384 690l452-452 60 60-512 512-238-238 60-60z"></path>
                      </svg>
                    </div>
                    <p class="mark-label">
                      <span>FREE Social Media Marketing Guide</span>
                    </p>
                  </div>
                  <div class="mark-mark">
                    <div class="mark-icon">
                      <svg viewBox="0 0 1024 1024" class="mark-icon1">
                        <path d="M384 690l452-452 60 60-512 512-238-238 60-60z"></path>
                      </svg>
                    </div>
                    <p class="mark-label">
                      <span>FREE Monthly Maintenance</span>
                    </p>
                  </div>
                  <div class="mark-mark">
                    <div class="mark-icon">
                      <svg viewBox="0 0 1024 1024" class="mark-icon1">
                        <path d="M384 690l452-452 60 60-512 512-238-238 60-60z"></path>
                      </svg>
                    </div>
                    <p class="mark-label">
                      <span>Premium & Responsive Design, and more!</span>
                    </p>
                  </div>
              </main>
            </main>
          </div>
        </section>
      </section>
      <!-- <section class="home-section05">
        <header class="home-header03">
          <header class="home-left">
            <span class="section-head">Tempor incididunt</span>
            <h2 class="section-heading">
              <span>Meet our network</span>
              <br />
              <span>of licensed providers</span>
            </h2>
          </header>
          <div class="home-right">
            <p class="home-paragraph3 section-description">
              Sed ut perspiciatis unde omnis iste natus error sit voluptatem
              accusantium doloremque laudantium, totam rem aperiam.
            </p>
          </div>
        </header>
        <main class="home-cards">
          <section class="card-card card-root-class-name">
            <div class="card-icon">
              <img alt="image" src="public/Icons/group%201316-200w.png" class="card-icon1" />
            </div>
            <main class="card-content">
              <h1 class="card-header"><span>Sima Mosbacher</span></h1>
              <p class="card-description">
                <span>
                  Sed ut perspiciatis unde omnis iste natus error sit
                  voluptatem accusantium
                </span>
              </p>
            </main>
          </section>
          <section class="card-card card-root-class-name1">
            <div class="card-icon">
              <img alt="image" src="public/Icons/group%201314-200h.png" class="card-icon1" />
            </div>
            <main class="card-content">
              <h1 class="card-header"><span>Sima Mosbacher</span></h1>
              <p class="card-description">
                <span>
                  Sed ut perspiciatis unde omnis iste natus error sit
                  voluptatem accusantium
                </span>
              </p>
            </main>
          </section>
          <section class="card-card card-root-class-name2">
            <div class="card-icon">
              <img alt="image" src="public/Icons/group%201317-200h.png" class="card-icon1" />
            </div>
            <main class="card-content">
              <h1 class="card-header"><span>Sima Mosbacher</span></h1>
              <p class="card-description">
                <span>
                  Sed ut perspiciatis unde omnis iste natus error sit
                  voluptatem accusantium
                </span>
              </p>
            </main>
          </section>
        </main>
      </section> -->
      <!-- <section class="home-section07">
        <div class="home-note3">
          <div class="home-image13">
            <img alt="image" src="public/SectionImages/iphone%2014%20pro%20max-1200w.png" class="home-image14" />
          </div>
          <div class="home-content4">
            <div class="home-caption4">
              <span class="section-head">Tempor incididunt</span>
            </div>
            <div class="home-heading07">
              <div class="home-header04">
                <h2 class="section-heading">
                  Tips to get care, answers and advice faster
                </h2>
              </div>
              <div class="accordion-accordion accordion-root-class-name">
                <div data-role="accordion-container" class="accordion-element">
                  <div class="accordion-details">
                    <span class="accordion-text">
                      <span>Aliquam quaerat voluptatem</span>
                    </span>
                    <span data-role="accordion-content" class="accordion-text1">
                      <span>
                        Sed do eiusmod tempor incididunt ut labore et dolore
                        magna aliquat enim ad minim veniam, quis nostrud
                      </span>
                    </span>
                  </div>
                  <svg viewBox="0 0 1024 1024" data-role="accordion-icon" class="accordion-icon">
                    <path d="M366 708l196-196-196-196 60-60 256 256-256 256z"></path>
                  </svg>
                </div>
                <div data-role="accordion-container" class="accordion-element1 accordion-element">
                  <div class="accordion-details1">
                    <span class="accordion-text2">
                      <span>Nemo enim ipsam voluptatem quia voluptas</span>
                    </span>
                    <span data-role="accordion-content" class="accordion-text3">
                      <span>
                        Sed do eiusmod tempor incididunt ut labore et dolore
                        magna aliquat enim ad minim veniam, quis nostrud
                      </span>
                    </span>
                  </div>
                  <svg viewBox="0 0 1024 1024" data-role="accordion-icon" class="accordion-icon2">
                    <path d="M366 708l196-196-196-196 60-60 256 256-256 256z"></path>
                  </svg>
                </div>
                <div data-role="accordion-container" class="accordion-element2 accordion-element">
                  <div class="accordion-details2">
                    <span class="accordion-text4">
                      <span>Magnam aliquam quaerat voluptatem</span>
                    </span>
                    <span data-role="accordion-content" class="accordion-text5">
                      <span>
                        Sed do eiusmod tempor incididunt ut labore et dolore
                        magna aliquat enim ad minim veniam, quis nostrud
                      </span>
                    </span>
                  </div>
                  <svg viewBox="0 0 1024 1024" data-role="accordion-icon" class="accordion-icon4">
                    <path d="M366 708l196-196-196-196 60-60 256 256-256 256z"></path>
                  </svg>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section> -->
      <section class="home-section09">
        <div class="home-cube">
          <div class="home-top side"></div>
          <div class="home-front side"></div>
          <div class="home-left1 side"></div>
        </div>
        <main class="home-banner">
          <div class="home-header05">
            <h2 class="section-heading">
              Unleash Your Business' Potential
            </h2>
            <p class="home-description section-description">
              Discover how our website development solutions can elevate your online presence, attract customers, and
              drive growth. Schedule a demo today to unlock your business' full potential.
            </p>
          </div>
          <div class="home-buttons1">
            <div class="home-get-started4 button">
              <span class="home-text22"><a href="https://calendly.com/webblendsolutions/consultation" target="_blank">Book
                  a Demo</a></span>
            </div>
          </div>
        </main>
      </section>
      <section id="pricing" class="home-section10">
        <div class="home-cube1">
          <div class="home-top1 side"></div>
          <div class="home-front1 side"></div>
          <div class="home-left2 side"></div>
        </div>
        <main class="home-pricing">
          <header class="home-header06">
            <header class="home-left3">
              <span class="section-head">Pricing</span>
              <h2 class="section-heading home-heading10">
                Start small, think big
              </h2>
            </header>
            <div class="home-right1">
              <p class="home-paragraph4 section-description">
                Tailored Website Packages for Your Needs
              </p>
            </div>
          </header>
          <div class="home-plans-container">
            <!-- <div class="home-switch">
                <div class="switch">
                  <label class="home-text24">Monthly</label>
                </div>
                <div class="home-switch2 switch">
                  <label class="home-text25">Yearly</label>
                </div>
              </div> -->
            <main class="home-plans">
              <div class="home-plan">
                <div class="home-details">
                  <div class="home-header07">
                    <label class="home-name">Static Website</label>
                    <div class="home-pricing1">
                      <h1 class="home-price">₱ 7,999</h1>
                    </div>
                    <span class="home-duration">Before: ₱ 10,000</span>
                  </div>
                  <p class="home-description1">
                    Create a simple and elegant online presence with a one-page website. Our team will work closely with
                    you to deliver a visually appealing and informative website that showcases your brand effectively.
                    Estimated timeline for completion is 1-2 months.
                  </p>
                </div>
              </div>
              <div class="home-plan">
                <div class="home-details">
                  <div class="home-header07">
                    <label class="home-name">Informative Website</label>
                    <div class="home-pricing1">
                      <h1 class="home-price">₱ 11,999</h1>
                    </div>
                    <span class="home-duration">Before: ₱ 15,000</span>
                  </div>
                  <p class="home-description1">
                    Take your online presence to the next level with a comprehensive seven-page website. Our experienced
                    team will craft a professional website that highlights your products, services, and company
                    information. Expect a timeline of 2-3 months for completion.
                  </p>
                </div>
              </div>
              <div class="home-plan1">
                <div class="home-details1">
                  <div class="home-header08">
                    <label class="home-name1">Dynamic Website</label>
                    <div class="home-pricing2">
                      <h1 class="home-price">₱ 15,999</h1>
                    </div>
                    <span class="home-duration">Before: ₱ 20,000</span>
                  </div>
                  <p class="home-description2">
                    Experience the power of a dynamic website that allows for unlimited pages and seamless content
                    management. Our team will develop a customized website tailored to your specific needs, ensuring
                    flexibility and scalability. The estimated timeline for completion is 3-6 months.
                  </p>
                </div>
                <div class="home-buy-details1">
                  <!-- <div class="home-buy1 button">
                      <span class="home-text29">
                        <span>Start Professional</span>
                        <br />
                      </span>
                    </div> -->
                </div>
              </div>
              <div class="home-plan2">
                <div class="home-details2">
                  <div class="home-header09">
                    <label class="home-name2">E-commerce Website</label>
                    <div class="home-pricing3">
                      <h1 class="home-price">₱ 39,999</h1>
                    </div>
                    <span class="home-duration">Before: ₱ 50,000</span>
                  </div>
                  <p class="home-description3">
                    Establish your online store and tap into the growing world of e-commerce. Our team will create a
                    robust platform that enables secure transactions, product showcasing, and inventory management.
                    Expect a timeline of 6-9 months for the completion of your fully functional e-commerce website.
                  </p>
                </div>
                <div class="home-buy-details2">
                  <!-- <div class="home-buy2 button">
                      <span class="home-text32">
                        <span>Start Enterprise</span>
                        <br />
                      </span>
                    </div> -->
                </div>
              </div>
            </main>
          </div>
        </main>
        <div class="home-help">
          <span class="home-text35">
            <span>Need any help?</span>
            <br />
          </span>
          <div class="home-contact-support">
            <p class="home-text38"><a href="mailto:webblendsolutions@gmail.com">Contact support -&gt;</a></p>
          </div>
        </div>
      </section>
      <section class="home-section12">
        <header class="home-header10">
          <header class="home-left4">
            <span class="section-head">Testimonials</span>
            <h2 class="home-heading14 section-heading">
              What clients say about us
            </h2>
          </header>
          <div class="home-right2">
            <p class="home-paragraph5 section-description">
              Gain insights from our esteemed clients as they share their gratifying experiences collaborating with our team.
            </p>
          </div>
        </header>
        <main class="home-cards1">
          <div class="home-container1">
            <section class="review-card review-root-class-name">
              <div class="review-stars">
                <svg viewBox="0 0 1024 1024" class="review-icon">
                  <path d="M512 736l-264 160 70-300-232-202 306-26 120-282 120 282 306 26-232 202 70 300z"></path>
                </svg><svg viewBox="0 0 1024 1024" class="review-icon02">
                  <path d="M512 736l-264 160 70-300-232-202 306-26 120-282 120 282 306 26-232 202 70 300z"></path>
                </svg><svg viewBox="0 0 1024 1024" class="review-icon04">
                  <path d="M512 736l-264 160 70-300-232-202 306-26 120-282 120 282 306 26-232 202 70 300z"></path>
                </svg><svg viewBox="0 0 1024 1024" class="review-icon06">
                  <path d="M512 736l-264 160 70-300-232-202 306-26 120-282 120 282 306 26-232 202 70 300z"></path>
                </svg><svg viewBox="0 0 1024 1024" class="review-icon08">
                  <path d="M512 736l-264 160 70-300-232-202 306-26 120-282 120 282 306 26-232 202 70 300z"></path>
                </svg>
              </div>
              <main class="review-content">
                <p class="review-quote">
                  <span>
                    “Working with WebBlend Global Solutions was an absolute pleasure. Their team's professionalism,
                    attention to
                    detail, and expertise in web development exceeded our expectations. They delivered a stunning
                    website that perfectly represents our brand. Highly recommended!”
                  </span>
                </p>
              </main>
            </section>
            <section class="review-card review-root-class-name">
              <div class="review-stars">
                <svg viewBox="0 0 1024 1024" class="review-icon">
                  <path d="M512 736l-264 160 70-300-232-202 306-26 120-282 120 282 306 26-232 202 70 300z"></path>
                </svg><svg viewBox="0 0 1024 1024" class="review-icon02">
                  <path d="M512 736l-264 160 70-300-232-202 306-26 120-282 120 282 306 26-232 202 70 300z"></path>
                </svg><svg viewBox="0 0 1024 1024" class="review-icon04">
                  <path d="M512 736l-264 160 70-300-232-202 306-26 120-282 120 282 306 26-232 202 70 300z"></path>
                </svg><svg viewBox="0 0 1024 1024" class="review-icon06">
                  <path d="M512 736l-264 160 70-300-232-202 306-26 120-282 120 282 306 26-232 202 70 300z"></path>
                </svg><svg viewBox="0 0 1024 1024" class="review-icon08">
                  <path d="M512 736l-264 160 70-300-232-202 306-26 120-282 120 282 306 26-232 202 70 300z"></path>
                </svg>
              </div>
              <main class="review-content">
                <p class="review-quote">
                  <span>
                    “I couldn't be happier with the results achieved by WebBlend Global Solutions. They listened to our
                    needs,
                    understood our vision, and created a website that truly captures the essence of our business. The
                    level of communication and support throughout the process was exceptional. Thank you!”
                  </span>
                </p>
              </main>
            </section>
          </div>
          <div class="home-container3">
            <section class="review-card review-root-class-name">
              <div class="review-stars">
                <svg viewBox="0 0 1024 1024" class="review-icon">
                  <path d="M512 736l-264 160 70-300-232-202 306-26 120-282 120 282 306 26-232 202 70 300z"></path>
                </svg><svg viewBox="0 0 1024 1024" class="review-icon02">
                  <path d="M512 736l-264 160 70-300-232-202 306-26 120-282 120 282 306 26-232 202 70 300z"></path>
                </svg><svg viewBox="0 0 1024 1024" class="review-icon04">
                  <path d="M512 736l-264 160 70-300-232-202 306-26 120-282 120 282 306 26-232 202 70 300z"></path>
                </svg><svg viewBox="0 0 1024 1024" class="review-icon06">
                  <path d="M512 736l-264 160 70-300-232-202 306-26 120-282 120 282 306 26-232 202 70 300z"></path>
                </svg><svg viewBox="0 0 1024 1024" class="review-icon08">
                  <path d="M512 736l-264 160 70-300-232-202 306-26 120-282 120 282 306 26-232 202 70 300z"></path>
                </svg>
              </div>
              <main class="review-content">
                <p class="review-quote">
                  <span>
                    “WebBlend Global Solutions transformed our online presence with their top-notch web development
                    services.
                    Their team's creativity and technical skills brought our website to life, making it user-friendly
                    and visually appealing. We're thrilled with the outcome and the positive impact it has had on our
                    business.”
                  </span>
                </p>
              </main>
            </section>
            <section class="review-card review-root-class-name">
              <div class="review-stars">
                <svg viewBox="0 0 1024 1024" class="review-icon">
                  <path d="M512 736l-264 160 70-300-232-202 306-26 120-282 120 282 306 26-232 202 70 300z"></path>
                </svg><svg viewBox="0 0 1024 1024" class="review-icon02">
                  <path d="M512 736l-264 160 70-300-232-202 306-26 120-282 120 282 306 26-232 202 70 300z"></path>
                </svg><svg viewBox="0 0 1024 1024" class="review-icon04">
                  <path d="M512 736l-264 160 70-300-232-202 306-26 120-282 120 282 306 26-232 202 70 300z"></path>
                </svg><svg viewBox="0 0 1024 1024" class="review-icon06">
                  <path d="M512 736l-264 160 70-300-232-202 306-26 120-282 120 282 306 26-232 202 70 300z"></path>
                </svg><svg viewBox="0 0 1024 1024" class="review-icon08">
                  <path d="M512 736l-264 160 70-300-232-202 306-26 120-282 120 282 306 26-232 202 70 300z"></path>
                </svg>
              </div>
              <main class="review-content">
                <p class="review-quote">
                  <span>
                    “Choosing WebBlend Global Solutions for our website development was the best decision we made. Their
                    team's
                    professionalism, expertise, and attention to detail were evident throughout the entire process. The
                    website they created for us not only looks stunning but also functions seamlessly. We highly
                    recommend their services!”
                  </span>
                </p>
              </main>
            </section>
          </div>
        </main>
        <!-- <div class="home-view-more">
          <p class="home-text39">View more</p>
        </div> -->
      </section>
      <!-- <section class="home-section14">
        <header class="home-header11">
          <span class="section-head">Articles about us</span>
          <h2 class="home-heading15 section-heading">
            We’re the app on everyone’s lips
          </h2>
        </header>
        <main class="home-cards2">
          <section class="article-card article-root-class-name">
            <main class="article-content">
              <header class="article-header">
                <h1 class="article-header1"><span>TechCrunch</span></h1>
              </header>
              <p class="article-description">
                <span>
                  Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed
                  do eiusmod tempor.
                </span>
              </p>
              <div class="article-button">
                <a href="" target="_blank" rel="noreferrer noopener" class="article-link">
                  <p class="article-text"><span>Read -&gt;</span></p>
                </a>
              </div>
            </main>
          </section>
          <section class="article-card article-root-class-name">
            <main class="article-content">
              <header class="article-header">
                <h1 class="article-header1"><span>techeu</span></h1>
              </header>
              <p class="article-description">
                <span>
                  Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed
                  do eiusmod tempor.
                </span>
              </p>
              <div class="article-button">
                <a href="" target="_blank" rel="noreferrer noopener" class="article-link">
                  <p class="article-text"><span>Read -&gt;</span></p>
                </a>
              </div>
            </main>
          </section>
          <section class="article-card article-root-class-name">
            <main class="article-content">
              <header class="article-header">
                <h1 class="article-header1"><span>sifted/</span></h1>
              </header>
              <p class="article-description">
                <span>
                  Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed
                  do eiusmod tempor.
                </span>
              </p>
              <div class="article-button">
                <a href="" target="_blank" rel="noreferrer noopener" class="article-link">
                  <p class="article-text"><span>Read -&gt;</span></p>
                </a>
              </div>
            </main>
          </section> -->
      </main>
      </section>
      <section class="home-section16">
        <header class="home-header12">
          <span class="section-head">FAQ</span>
          <h2 class="home-heading16 section-heading">
            Frequently asked questions
          </h2>
        </header>
        <main class="home-accordion">
          <div class="faq-accordion faq-root-class-name">
            <div data-role="accordion-container" class="faq-element accordion-element">
              <div class="faq-details">
                <span class="faq-text">
                  Can WebBlend Global Solutions create custom website designs?
                </span>
                <span data-role="accordion-content" class="faq-text01">
                  Yes, WebBlend Global Solutions specializes in creating custom website designs that are tailored to
                  meet the
                  unique needs and branding of each client. We work closely with our clients to ensure their vision is
                  brought to life.
                </span>
              </div>
              <div data-role="accordion-icon">
                <svg viewBox="0 0 1024 1024" class="faq-icon">
                  <path d="M366 708l196-196-196-196 60-60 256 256-256 256z"></path>
                </svg>
              </div>
            </div>
            <div data-role="accordion-container" class="faq-element1 accordion-element">
              <div class="faq-details1">
                <span class="faq-text02">
                  How long does it take to complete a website project with WebBlend Global Solutions?
                </span>
                <span data-role="accordion-content" class="faq-text03">
                  The timeline for a website project can vary depending on the complexity and requirements of the
                  project. We work closely with our clients to establish project timelines and ensure timely delivery of
                  high-quality websites.
                </span>
              </div>
              <div data-role="accordion-icon">
                <svg viewBox="0 0 1024 1024" class="faq-icon02">
                  <path d="M366 708l196-196-196-196 60-60 256 256-256 256z"></path>
                </svg>
              </div>
            </div>

            <div data-role="accordion-container" class="faq-element5 accordion-element">
              <div class="faq-details5">
                <span class="faq-text10">
                  How can I contact WebBlend Global Solutions for more information or to get started on a project?
                </span>
                <span data-role="accordion-content" class="faq-text11">
                  You can contact WebBlend Global Solutions by visiting our website at www.webblendsolutions.com or by
                  calling our
                  dedicated customer support line at +63 970 736 2596. Our team will be happy to assist you with any
                  inquiries or discuss your project requirements.
                </span>
              </div>
              <div data-role="accordion-icon">
                <svg viewBox="0 0 1024 1024" class="faq-icon10">
                  <path d="M366 708l196-196-196-196 60-60 256 256-256 256z"></path>
                </svg>
              </div>
            </div>
          </div>
        </main>
      </section>
      <!-- <section class="home-section18">
        <main class="home-content5">
          <header class="home-header13">
            <h2 class="home-heading17 section-heading">
              Stop searching online for medications and use Planical app!
            </h2>
            <div class="home-buttons2">
              <div class="home-ios button">
                <img alt="image" src="public/Icons/apple-200w.png" class="home-icon" />
                <span class="home-text40">Download for iOS</span>
              </div>
              <div class="home-android button">
                <img alt="image" src="public/Icons/android-200h.png" class="home-icon1" />
                <span class="home-text41">Download for Android</span>
              </div>
            </div>
          </header>
          <img alt="image" src="public/SectionImages/group%201505-1200w.png" class="home-image15" />
        </main>
      </section> -->
      <footer class="home-footer">
        <div class="home-content6">
          <main class="home-main-content">
            <div class="home-content7">
              <header class="home-main4">
                <div class="home-header14">
                  <img alt="image" src="public/Branding/logo.png" class="home-branding" />
                  <span class="home-text42">
                    Stunning websites,<br>unforgettable experiences.
                  </span>
                </div>
                <div class="home-socials">
                  <a href="https://facebook.com/webblendsolutions" target="_blank" rel="noreferrer noopener" class="home-link">
                    <img alt="image" src="public/Icons/facebook-200h.png" class="social" />
                  </a>
                  <a href="https://example.com" target="_blank" rel="noreferrer noopener" class="home-link1">
                    <img alt="image" src="public/Icons/instagram-200h.png" class="social" />
                  </a>
                  <a href="https://example.com" target="_blank" rel="noreferrer noopener" class="home-link2">
                    <img alt="image" src="public/Icons/twitter-200h.png" class="social" />
                  </a>
                </div>
              </header>
              <header class="home-categories">
                <div class="home-category">
                  <div class="home-header15">
                    <span class="footer-header">Solutions</span>
                  </div>
                  <div class="home-links">
                    <span class="footer-link">Web Design and Development</span>
                    <span class="footer-link">E-commerce Solutions</span>
                    <span class="footer-link">Content Management Systems (CMS)</span>
                    <span class="footer-link">Hosting and Domain Registration</span>
                    <span class="footer-link">Website Security</span>
                  </div>
                </div>

              </header>
            </div>
            <section class="home-copyright">
              <span class="home-text56">
                © 2023 WebBlend Global Solutions. All Rights Reserved.
              </span>
            </section>
          </main>
          <section id="contact">
            <main class="home-contact">
              <h1 class="home-heading18">Contact Us</h1>
              <br>
              <form method="POST">
                <div class="home-box">
                  <input type="text" placeholder="Name" class="home-textinput input" id="name" name="name" />
                </div>
                <div class="home-box">
                  <input type="email" placeholder="Email" class="home-textinput input" id="email" name="email" />
                </div>
                <div class="home-box">
                  <textarea placeholder="Message" class="home-textinput input textarea" id="message" name="message"></textarea>
                </div>

                <div class="home-box">
                  <button class="home-buy3 send-button" id="submit" name="submit">Send</button>
                </div>
              </form>
              <p class="home-notice">
                By contacting us, you agree to our Privacy Policy.
              </p>
            </main>

          </section>
          <style>
            .home-box input {
              padding: 15px;
            }

            .home-box textarea {
              padding-bottom: 50px;
            }

            .home-box {
              display: flex;
              margin-bottom: 20px;
            }

            .home-textinput {
              flex: 1;
              border: 1px solid white;
              border-radius: 5px;
              padding: 10px;
              color: white;
              background-color: transparent;
            }

            .send-button {
              border: none;
              border-radius: 5px;
              padding: 10px 20px;
              background-color: #3e75f7;
              color: white;
              font-weight: bold;
              cursor: pointer;
            }

            .home-notice {
              margin-top: 20px;
              font-size: 14px;
              color: #999;
            }
          </style>
          <section class="home-copyright1">
            <span class="home-text61">
              © 2022 WebBlend Global Solutions. All Rights Reserved.
            </span>
          </section>
        </div>
      </footer>
      <div>
        <dangerous-html html="<script>
    /*
Accordion - Code Embed
*/

/* listenForUrlChangesAccordion() makes sure that if you changes pages inside your app,
the Accordions will still work*/

const listenForUrlChangesAccordion = () => {
      let url = location.href;
      document.body.addEventListener(
        'click',
        () => {
          requestAnimationFrame(() => {
            if (url !== location.href) {
              runAccordionCodeEmbed();
              url = location.href;
            }
          });
        },
        true
      );
    };


const runAccordionCodeEmbed = () => {
    const accordionContainers = document.querySelectorAll('[data-role='accordion-container']'); // All accordion containers
    const accordionContents = document.querySelectorAll('[data-role='accordion-content']'); // All accordion content
    const accordionIcons = document.querySelectorAll('[data-role='accordion-icon']'); // All accordion icons

    accordionContents.forEach((accordionContent) => {
        accordionContent.style.display = 'none'; //Hides all accordion contents
    });

    accordionContainers.forEach((accordionContainer, index) => {
        accordionContainer.addEventListener('click', () => {
            accordionContents.forEach((accordionContent) => {
            accordionContent.style.display = 'none'; //Hides all accordion contents
            });

            accordionIcons.forEach((accordionIcon) => {
                accordionIcon.style.transform = 'rotate(0deg)'; // Resets all icon transforms to 0deg (default)
            });

            accordionContents[index].style.display = 'flex'; // Shows accordion content
            accordionIcons[index].style.transform = 'rotate(180deg)'; // Rotates accordion icon 180deg
        });
    });
}

runAccordionCodeEmbed()
listenForUrlChangesAccordion()

/*
Here's what the above is doing:
    1. Selects all accordion containers, contents, and icons
    2. Hides all accordion contents
    3. Adds an event listener to each accordion container
    4. When an accordion container is clicked, it:
        - Hides all accordion contents
        - Resets all icon transforms to 0deg (default)
        - Checks if this container has class 'accordion-open'
            - If it does, it removes class 'accordion-open'
            - If it doesn't, it:
                - Removes class 'accordion-open' from all containers
                - Adds class 'accordion-open' to this container
                - Shows accordion content
                - Rotates accordion icon 180deg
*/
</script>"></dangerous-html>
      </div>
    </div>
  </div>
  <!-- Modal -->
  <div id="promoModal" class="modal">
    <div class="modal-content">
      <span class="close">&times;</span>
      <h2>Grand Opening Promo!</h2><br>
      <p>Get your 20% discount on static, informative, dynamic, and e-commerce (business) websites!</p>
      <p>Hurry, limited time offer.</p><br>
      <a href="https://calendly.com/webblendsolutions/consultation" target="_blank"><button class="consultation-button">Book a Free Consultation</button></a>
    </div>
  </div>

  <style>
    .modal {
      display: none;
      position: fixed;
      z-index: 9999;
      left: 0;
      top: 0;
      width: 100%;
      height: 100%;
      overflow: auto;
      background-color: rgba(0, 0, 0, 0.8);
    }

    .modal-content {
      background-color: #fff;
      margin: 15% auto;
      padding: 30px;
      border-radius: 10px;
      box-shadow: 0 0 20px rgba(0, 0, 0, 0.3);
      width: 80%;
      max-width: 400px;
      text-align: center;
    }

    .close {
      color: #aaa;
      position: absolute;
      top: 10px;
      right: 10px;
      font-size: 28px;
      font-weight: bold;
      cursor: pointer;
      transition: color 0.3s ease;
    }

    .close:hover,
    .close:focus {
      color: #555;
    }

    h2 {
      font-size: 30px;
      color: #333;
      margin-top: 0;
    }

    p {
      font-size: 18px;
      color: #666;
      margin-bottom: 10px;
    }

    .promo-details {
      margin-top: 20px;
    }

    .promo-details p {
      font-weight: bold;
    }

    .promo-details ul {
      list-style-type: disc;
      margin-left: 20px;
    }

    .promo-details li {
      margin-bottom: 5px;
    }

    .consultation-button {
      background-color: #3e75f7;
      color: #fff;
      padding: 10px 20px;
      border-radius: 4px;
      border: none;
      font-size: 16px;
      cursor: pointer;
      transition: background-color 0.3s ease;
    }

    .consultation-button:hover {
      background-color: #2657c0;
    }
  </style>
  <script>
    // Check if the modal has already been displayed in the current session
    if (!localStorage.getItem("modalDisplayed")) {
      // Open the modal
      window.onload = function() {
        var modal = document.getElementById("promoModal");
        modal.style.display = "block";
      };

      // Close the modal when the close button is clicked
      var closeBtn = document.getElementsByClassName("close")[0];
      closeBtn.onclick = function() {
        var modal = document.getElementById("promoModal");
        modal.style.display = "none";
        // Set the flag in localStorage to indicate that the modal has been displayed
        localStorage.setItem("modalDisplayed", true);
      };

      // Close the modal when the user clicks outside the modal
      window.onclick = function(event) {
        var modal = document.getElementById("promoModal");
        if (event.target == modal) {
          modal.style.display = "none";
          // Set the flag in localStorage to indicate that the modal has been displayed
          localStorage.setItem("modalDisplayed", true);
        }
      };
    }
  </script>
  <!-- Messenger Chat Plugin Code -->
  <div id="fb-root"></div>

  <!-- Your Chat Plugin code -->
  <div id="fb-customer-chat" class="fb-customerchat">
  </div>

  <script>
    var chatbox = document.getElementById('fb-customer-chat');
    chatbox.setAttribute("page_id", "101302776354916");
    chatbox.setAttribute("attribution", "biz_inbox");
  </script>

  <!-- Your SDK code -->
  <script>
    window.fbAsyncInit = function() {
      FB.init({
        xfbml: true,
        version: 'v17.0'
      });
    };

    (function(d, s, id) {
      var js, fjs = d.getElementsByTagName(s)[0];
      if (d.getElementById(id)) return;
      js = d.createElement(s);
      js.id = id;
      js.src = 'https://connect.facebook.net/en_US/sdk/xfbml.customerchat.js';
      fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
  </script>
</body>

</html>