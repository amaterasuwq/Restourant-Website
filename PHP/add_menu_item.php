<?php
session_start();
include 'header.php';
?>

<div id="app" class="add-dish__container">
    <img src="../images/icons/logo.png" alt="logo">
    <h1>Add Dish to Menu</h1>
    <form @submit.prevent="handleSubmit" enctype="multipart/form-data">
        <label for="name">Dish title:</label><br>
        <input type="text" id="name" v-model="name" name="name" required><br>
        <label for="description">Description:</label><br>
        <textarea id="description" v-model="description" name="description"></textarea><br>
        <label for="price">Price:</label><br>
        <input type="text" id="price" v-model="price" name="price" required><br>
        <label for="section">Section:</label><br>
        <select id="section" v-model="section" name="section" required>
            <option value="appetizers">Appetizers</option>
            <option value="main-courses">Main Courses</option>
            <option value="soups">Soups</option>
            <option value="salads">Salads</option>
            <option value="desserts">Desserts</option>
            <option value="drinks">Drinks</option>
            <option value="alcohol-drinks">Alcohol Drinks</option>
        </select><br>
        <label for="image">Image:</label><br>
        <input type="file" id="image" @change="handleFileUpload" accept="image/*" required><br><br>
        <button type="submit">Add</button>
    </form>
</div>

<script src="../JS/Vue/add-menu-item__vue.js"></script>
</body>
</html>