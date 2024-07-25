<?php
session_start();
include 'header.php';
?>

<div id="app" class="reservation-form__container">
    <div class="reservation-form__logo">
        <img src="../images/icons/logo.png" alt="logo">
    </div>
    
    <h1 class="reservation-form__title">Restaurant Reservation Form</h1>
    <form class="reservation-form__form" id="reservation-form" action="process_reservation.php" method="post" @submit="handleSubmit">
        <input class="reservation-form__input" placeholder="Name" type="text" v-model="name" name="name" required>
        <input class="reservation-form__input" placeholder="Email" type="email" v-model="email" name="email" required>
        <input class="reservation-form__input" placeholder="Phone Number" type="tel" v-model="phone" name="phone" required>
        <input class="reservation-form__input" placeholder="Date" type="date" v-model="date" name="date" required>
        <input class="reservation-form__input" placeholder="Time" type="time" v-model="time" name="time" required>
        <input class="reservation-form__input" placeholder="Number of guests" type="number" max=10 v-model="guests" name="guests" min="1" required>
        <button class="reservation-form__button" type="submit">Submit Reservation</button>
    </form>

    <a class="reservation-form__link" href="view_reservations.php" v-if="reservationSubmitted">View Reservations</a>
</div>

<script src="../JS/Vue/reservation-form__vue.js"></script>
</body>
</html>