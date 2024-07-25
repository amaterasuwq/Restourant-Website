<?php
session_start();
include 'header.php';
?>

<div id="app" class="delete-dish__container">
    <img src="../images/icons/logo.png" alt="logo">
    <h1>Delete Dish from Menu</h1>
    <form @submit.prevent="deleteItem">
        <label for="dish_name">Dish Name:</label><br>
        <input type="text" v-model="dishName" id="dish_name" name="dish_name" required><br><br>
        <button type="submit">Delete</button>
    </form>
</div>

<script src="../JS/Vue/delete-menu-item__vue.js"></script>

</body>
</html>