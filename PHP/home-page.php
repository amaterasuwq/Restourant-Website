<?php
session_start();
include 'header.php';
?>

<div id="app">
    <nav class="home-page__navigation-menu">
        <div v-for="(section, index) in sections" :key="index">
            <a @click="navigateToSection(index)">{{ section }}</a>
        </div>
    </nav>

    <section class="home-page__hero">
        <div class="home-page__hero-text">
            <h2>Welcome to Urban Harvest House</h2>
            <p>Discover the finest dining experience.</p>
        </div>
    </section>

    <div class="home-page__image-collage">
        <img src="../images/interier/interier1.png">
        <img src="../images/interier/interier2.png">
        <img src="../images/interier/interier3.png">
        <img src="../images/interier/interier4.png">
        <img src="../images/interier/interier5.png">
    </div>

    <div class="home-page__message-box" v-show="showMessageBox">
        <i class="fa-solid fa-xmark" @click="closeMessageBox"></i>
        <div class="home-page__message-box__elements">
            <p>Want to book a table?</p>
            <button @click="redirectToReservationPage">Book Now</button>
        </div>
    </div>

    <section class="home-page__weeks-special__container">
        <div class="home-page__weeks-special__title-subtitle">
            <span class="home-page__weeks-special__title">Week's Special</span>
            <span class="home-page__weeks-special__subtitle">
                Here you can see special dishes that our chef is cooking only this week. Don't miss your opportunity and
                come to our restaurant to taste the best dishes from around the world!
            </span>
        </div>

        <div class="home-page__weeks-special__boxes">
            <div class="home-page__weeks-special__dish-box" v-for="dish in weekSpecial">
                <div class="home-page__weeks-special__dish-box__title">
                    <p>{{ dish.name }}</p>
                </div>

                <div class="home-page__weeks-special__dish-box__image">
                    <img :src="dish.image">
                </div>

                <div class="home-page__weeks-special__dish-box__description">
                    <p>{{ dish.description }}</p>
                </div>

                <div class="home-page__weeks-special__dish-box__price">
                    <p>Price: {{ dish.price }}</p>
                </div>
            </div>
        </div>
    </section>

    <div class="home-page__feedbacks-about-us__row">
        <div class="home-page__customers-feedback">
            <div class="home-page__customers-feedback__logo">
                <img src="../images/icons/logo.png" alt="logo">
            </div>

            <div class="home-page__customers-feedback__title">
                Customers Feedback about our restourant
            </div>

            <div class="home-page__customers-feedback__redirect">
                <p>Want to give your feedback?</p>
                <button class="home-page__customers-feedback__relocate__button" onclick="RedirectToFeedback()">Click here!</button>
            </div>

            <div class="home-page__customers-feedback__form">
                <?php
                include 'db_connection.php';
                $sql = "SELECT * FROM feedbacks ORDER BY created_at DESC";
                $result = mysqli_query($conn, $sql);

                if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                        echo "<div class= home-page__customers-feedback__data>";
                                echo "<div class=home-page__customers-feedback__data__row>";
                                        echo "<h2>{$row['name']}</h2>";
                                        echo "<p>Time: {$row['created_at']}</p>";
                                echo "</div>";
                                echo "<p>Rating: {$row['rating']}/5</p>";
                                echo "<p>Comment: {$row['feedback']}</p>";
                        echo "</div>";
                }
                }       
                else {
                        echo "<p>No feedbacks yet.</p>";
                }
                mysqli_close($conn);
                ?>
            </div>
        </div>


        <section class="home-page__about-us">
            <h1>About Us</h1>
            <div class="home-page__about-us__logo">
                <img src="../images/icons/logo.png" alt="logo">
            </div>

            <div class="home-page__about-us__text">
                <p>Urban Harvest House, the place where we strive to provide the finest dining experience for our
                    customers.
                    Our restaurant is dedicated to serving fresh, locally-sourced ingredients prepared with care and
                    attention to detail.</p>
                <p>At Urban Harvest House, we believe in creating dishes that not only taste delicious but also support
                    local farmers and producers. Our menu features a diverse selection of dishes inspired by seasonal
                    ingredients, ensuring that every visit is a unique culinary experience.</p>
                <p>Whether you're joining us for a casual meal with friends or a special celebration, our friendly staff
                    and
                    inviting atmosphere will make you feel right at home. We look forward to welcoming you to Urban
                    Harvest
                    House and sharing our passion for great food with you.</p>
            </div>

            <div class="home-page__about-us__creators">
                <div class="home-page__about-us__creators__title">
                    <p>Web site created by:</p>
                </div>

                <div class="home-page__about-us__creators__peoples">
                    <p>Mykhailo Chuprun 59588</p>
                    <p>Gleb Holodinskiy 59389</p>
                </div>

                <div class="home-page__about-us__creators__peoples">
                    Elizaveta Strugach 57959
                </div>
            </div>
        </section>
    </div>

</div>

<script src="../JS/scripts.js"></script>
<script src="../JS/Vue/home-page__vue.js"></script>

</body>
<html>