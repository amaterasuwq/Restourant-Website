<?php
    session_start();
    include 'header.php';
?>

<div id="app">
    <div class="contact-us__container">
        <div class="contact-us__contact-form" v-show="showContactForm">
            <i class="fa-solid fa-xmark" @click="showContactForm = false"></i>
            <h2>Contact Form</h2>
            <form @submit.prevent="submitContactForm">
                <input type="text" v-model="contactForm.name" placeholder="Your Name" required>
                <span v-if="errors.name" class="error-message">{{ errors.name }}</span>
                <input type="email" v-model="contactForm.email" placeholder="Your Email" required>
                <span v-if="errors.email" class="error-message">{{ errors.email }}</span>
                <textarea class="contact-us__textarea" v-model="contactForm.message" placeholder="Your Message"
                    required></textarea>
                <span v-if="errors.message" class="error-message">{{ errors.message }}</span>
                <button class="contact-us__button" type="submit" :disabled="loading">
                    <span v-if="loading">Sending...</span>
                    <span v-else>Send Message</span>
                </button>
            </form>
            <div v-if="submissionMessage" class="contact-us__succ-message">
                {{ submissionMessage }}
            </div>
        </div>

        <div class="contact-us__info">
            <div class="contact-info">
                <h2>Contact Information:</h2>
                <p><span class="bold-text">Address:</span> Stoklosy 3, Warsaw, Poland</p>
                <p><span class="bold-text">Phone:</span> +48 201 252 698</p>
                <p><span class="bold-text">Email:</span> harvesthouse@gmail.com</p>
            </div>

            <div class="social-media">
                <h2>Social Media:</h2>
                <div class="contact-us__social-media__links">
                    <a href="https://twitter.com/"><i class="fa-brands fa-twitter"></i></a>
                    <a href="https://facebook.com/"><i class="fa-brands fa-facebook-f"></i></a>
                    <a href="https://www.instagram.com/"><i class="fa-brands fa-instagram"></i></a>
                </div>
            </div>

            <div class="contact-us__info__map">
                <h2>Location:</h2>
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2447.653379946578!2d21.031771777662968!
                    3d52.1588130719687!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4719328f89315b6d%3A0x56321377b41fea8!2z0KPQ
                    vdGW0LLQtdGA0YHQuNGC0LXRgiDQktGW0YHRgtGD0LvQsA!5e0!3m2!1suk!2spl!4v1698268785441!5m2!1suk!2spl"
                    width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade">
                </iframe>
            </div>
        </div>

        <div class="contact-us__info">
            <div class="contact-us__info__hours">
                <h2>Operating Hours:</h2>
                <p><span class="bold-text">Monday-Friday:</span> 8:00 - 23:00</p>
                <p><span class="bold-text">Saturday:</span> 9:00 - 1:00</p>
                <p><span class="bold-text">Sunday:</span> 11:00 - 22:00</p>
            </div>

            <div class="contact-us__2box__faq">
                <h2>Frequently Asked Questions</h2>
                <h3 @click="toggleFaq(1)">Q: Do you offer vegetarian options? <span class="contact_us_faq-plus">{{
                        faq[1] ? '-' : '+' }}</span></h3>
                <p v-show="faq[1]">A: Yes, we have a variety of vegetarian dishes available on our menu. Please ask your
                    server for recommendations.</p>
                <h3 @click="toggleFaq(2)">Q: Is parking available? <span class="contact_us_faq-plus">{{ faq[2] ? '-' :
                        '+' }}</span></h3>
                <p v-show="faq[2]">A: Yes, we have parking facilities available for our customers.</p>
                <h3 @click="toggleFaq(3)">Q: Do you offer catering services? <span class="contact_us_faq-plus">{{ faq[3]
                        ? '-' : '+' }}</span></h3>
                <p v-show="faq[3]">A: Yes, we offer catering services for events and special occasions. Please contact
                    us for more information and to discuss your catering needs.</p>
            </div>

            <div class="contact-us__2box__privacy-policy">
                <h2>Privacy Policy:</h2>
                <button class="contact-us__button" @click="redirectToPrivacyPolicy">Click here!</button>
            </div>

            <div class="contact-us__2box__newsletter">
                <h2>Subscribe to Our Newsletter</h2>
                <form @submit.prevent="subscribeNewsletter">
                    <input type="email" v-model="newsletterEmail" placeholder="Your Email" required>
                    <button class="contact-us__button" type="submit" :disabled="loading">
                        <span v-if="loading">Subscribing...</span>
                        <span v-else>Subscribe</span>
                    </button>
                </form>
                <div v-if="subscriptionMessage" class="contact-us__succ-message">
                    {{ subscriptionMessage }}
                </div>
            </div>
        </div>
    </div>
</div>

<script src="../JS/Vue/contact-us__vue.js"></script>

</body>
</html>