<?php
session_start();
include 'db_connection.php';
include "header.php";
?>

<div id="app">
    <h1 class="reservations__title">Reservations</h1>
    <div class="reservations__table">
        <table border="1">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Date</th>
                    <th>Time</th>
                    <th>Guests</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="reservation in reservations">
                    <td>{{ reservation.name }}</td>
                    <td>{{ reservation.email }}</td>
                    <td>{{ reservation.phone }}</td>
                    <td>{{ reservation.date }}</td>
                    <td>{{ reservation.time }}</td>
                    <td>{{ reservation.guests }}</td>
                </tr>
            </tbody>
        </table>
    </div>

    <div class="mobile__view-reservations">
    <div class="reservations__list">
        <div v-for="reservation in reservations" class="reservation__card">
            <div class="reservation__info">
                <strong>Name:</strong> {{ reservation.name }} <br>
                <strong>Email:</strong> {{ reservation.email }} <br>
                <strong>Phone:</strong> {{ reservation.phone }} <br>
                <strong>Date:</strong> {{ reservation.date }} <br>
                <strong>Time:</strong> {{ reservation.time }} <br>
                <strong>Guests:</strong> {{ reservation.guests }} <br>
            </div>
        </div>
    </div>
</div>
</div>

<script src="../JS/Vue/reservations__vue.js"></script>

</body>
</html>