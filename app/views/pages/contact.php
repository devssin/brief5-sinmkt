<?php require APPROOT . "/views/inc/header.php"; ?>
<section class="banner-title">
    <div class="container">
        <div class="titles">
            <h1>Contact</h1>
            <p>
                Lorem ipsum dolor sit, amet consectetur adipisicing elit. Sequi,
                praesentium fugit. Ab, ipsa. Corporis, officia?
            </p>
        </div>
    </div>
</section>

<section class="contact-section">
    <div class="container">
        <div class="contact">
            <div class="contact-left">
                <h3>We are happy to hear from You</h3>
                <p>
                    send us a message to order a product or to report if something
                    went wrong on the site
                </p>

                <form>
                    <div class="fullname">
                        <input type="text" name="fullName" placeholder="Full Name" />
                        <input type="text" name="company" placeholder="Company" />
                    </div>
                    <input type="email" name="email" placeholder="Email" />
                    <textarea name="subject" id="" cols="10" rows="10" placeholder="Subject"></textarea>
                    <div class="cta-container">
                        <button type="submit" class="cta">Send Message</button>
                    </div>
                </form>

                <div class="social-links">
                    <h3>Social Links</h3>
                    <p>
                        <i class="fa-brands fa-instagram"></i>
                        <i class="fa-brands fa-facebook"></i>
                        <i class="fa-brands fa-linkedin"></i>
                        <i class="fa-brands fa-pinterest"></i>
                        <i class="fa-brands fa-behance"></i>
                    </p>
                </div>
            </div>

            <div class="contact-right">
                <div class="location">
                    <h3>Our Location in the map</h3>
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3078.029609250995!2d-84.39789048554242!3d39.51382141797964!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x88405d81d06ef6db%3A0x36239e379c71555c!2s1634%20Central%20Ave%2C%20Middletown%2C%20OH%2045044%2C%20%C3%89tats-Unis!5e0!3m2!1sfr!2sma!4v1666347280966!5m2!1sfr!2sma" width="400" height="300" style="border: 0" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
                <div class="contact-info">
                    <h3>Contact Infos</h3>
                    <p>
                        <i class="fa-solid fa-location-dot"></i>
                        1634 Central Ave Middletown, Ohio(OH),
                    </p>
                    <p>
                        <i class="fa-solid fa-envelope"></i>
                        contact@sinmkt.com
                    </p>

                    <p>
                        <i class="fa-solid fa-phone"></i>
                        567-414-2699
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>
<?php require APPROOT . "/views/inc/footer.php"; ?>