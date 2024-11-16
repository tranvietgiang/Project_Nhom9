<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Thiết kế Footer</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet" />
    <style>
    .footer {
        background-color: #333;
        padding: 30px 50px;
        display: flex;
        justify-content: space-between;
        color: #bbb;
    }

    .footer-section {
        width: 25%;
    }

    .footer-section h3 {
        font-size: 1em;
        color: #aaa;
        text-transform: uppercase;
        border-bottom: 1px solid #555;
        padding-bottom: 10px;
        margin-bottom: 15px;
    }

    .footer-section p,
    .footer-section a {
        color: #bbb;
        font-size: 0.9em;
        line-height: 1.6;
        text-decoration: none;
    }

    .footer-section .contact-info,
    .footer-section .tweets,
    .footer-section ul {
        margin-top: 15px;
    }

    .contact-info div {
        display: flex;
        align-items: center;
        margin-bottom: 10px;
        background-color: #444;
        padding: 5px 10px;
        border-radius: 5px;
    }

    .contact-info div::before {
        content: "📞";
        margin-right: 10px;
    }

    .contact-info div.email::before {
        content: "✉️";
    }

    .tweets img {
        width: 30px;
        height: 30px;
        margin-right: 10px;
        vertical-align: middle;
    }

    .tweets div {
        display: flex;
        align-items: center;
        margin-bottom: 10px;
    }

    .tweets a {
        color: #e74c3c;
    }

    .footer-section ul {
        list-style-type: none;
        padding: 0;
    }

    .footer-section ul li {
        margin-bottom: 10px;
    }

    .footer-bottom {
        background-color: #222;
        padding: 15px 50px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        font-size: 0.8em;
        color: #aaa;
    }

    .footer-bottom a {
        color: #e74c3c;
        text-decoration: none;
    }

    .social-icons img {
        width: 150px;
        margin-right: 10px;
    }
    </style>
</head>

<body>
    <footer class="footer">
        <!-- Logo và Thông tin Liên hệ -->
        <div class="footer-section">
            <div class="social-icons">
                <img src="https://htmldemo.net/james/james/img/logo-white.png" alt="logo-white" />
            </div>
            <p>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed diam
                nonummy nibh euismod tincidunt.
            </p>
            <div class="contact-info">
                <div>(800) 123 456 789</div>
                <div>(800) 123 456 789</div>
                <div class="email">admin@bootexperts.com</div>
            </div>
        </div>

        <!-- Phần Tweet Mới Nhất -->
        <div class="footer-section">
            <h3>Latest Tweets</h3>
            <div class="tweets">
                <div>
                    <img src="https://htmldemo.net/james/james/img/twitter/twitter-1.png" alt="Twitter Logo" />
                    <span>Raboda Fashion #Magento #Theme comes up with pure white and grey,
                        which great show your products. Check it:
                        <a href="#" target="_blank">https://t.co/iuO0YBwt8</a><br />16h
                    </span>
                </div>
                <div>
                    <img src="https://htmldemo.net/james/james/img/twitter/twitter-1.png" alt="Twitter Logo" />
                    <span>Raboda Fashion #Magento #Theme comes up with pure white and grey,
                        which great show your products. Check it:
                        <a href="#" target="_blank">https://t.co/iuO0YBwt8</a><br />16h
                    </span>
                </div>
            </div>
        </div>

        <!-- Phần Hỗ Trợ -->
        <div class="footer-section">
            <h3>Our Support</h3>
            <ul>
                <li><a href="#">Sitemap</a></li>
                <li><a href="#">Privacy Policy</a></li>
                <li><a href="#">Your Account</a></li>
                <li><a href="#">Advanced Search</a></li>
                <li><a href="#">Contact Us</a></li>
            </ul>
        </div>

        <!-- Phần Thông Tin -->
        <div class="footer-section">
            <h3>Our Information</h3>
            <ul>
                <li><a href="#">About Us</a></li>
                <li><a href="#">Customer Service</a></li>
                <li><a href="#">Privacy Policy</a></li>
                <li><a href="#">Orders and Returns</a></li>
                <li><a href="#">Site Map</a></li>
            </ul>
        </div>
    </footer>

    <!-- Phần Footer Cuối -->
    <div class="footer-bottom">
        <p>Copyright © 2022 <a href="#">Bootexperts</a>. All rights reserved</p>
        <div class="social-icons">
            <img src="https://htmldemo.net/james/james/img/payment.png" alt="Payment Methods" />
        </div>
    </div>
</body>

</html>