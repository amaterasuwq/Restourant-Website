<?php
session_start();
include 'header.php';
?>

<div id="app" class="feedback-form__container">
    <div class="feedback-form__logo">
        <img src="../images/icons/logo.png" alt="logo">
    </div>
    <div class="feedback-form__title">
        <p>Please provide your feedback</p>
    </div>
    <form action="process_feedback.php" method="post" @submit.prevent="handleSubmit">
        <div class="feedback-form__form-group">
            <label class="feedback-form__label" for="name">Name:</label>
            <input class="feedback-form__input" type="text" id="name" v-model="name" name="name" required>
        </div>

        <div class="feedback-form__form-group">
            <label class="feedback-form__label" for="feedback">Feedback:</label>
            <textarea id="feedback" class="feedback-form__input" v-model="feedback" name="feedback" cols="30" rows="10" required></textarea>
        </div>

        <div class="feedback-form__form-group">
            <p>
                <label class="feedback-form__label">Rating:</label>
                <span class="star-rating">
                    <label for="rate-1" style="--i:1"><i class="fa-solid fa-star"></i></label>
                    <input type="radio" name="rating" id="rate-1" v-model="rating" value="1" checked>
                    <label for="rate-2" style="--i:2"><i class="fa-solid fa-star"></i></label>
                    <input type="radio" name="rating" id="rate-2" v-model="rating" value="2">
                    <label for="rate-3" style="--i:3"><i class="fa-solid fa-star"></i></label>
                    <input type="radio" name="rating" id="rate-3" v-model="rating" value="3">
                    <label for="rate-4" style="--i:4"><i class="fa-solid fa-star"></i></label>
                    <input type="radio" name="rating" id="rate-4" v-model="rating" value="4">
                    <label for="rate-5" style="--i:5"><i class="fa-solid fa-star"></i></label>
                    <input type="radio" name="rating" id="rate-5" v-model="rating" value="5">
                </span>
            </p>
        </div>
        <button class="feedback-form__button" type="submit">Submit</button>
    </form>
</div>

<script src="../JS/Vue/feedback-form__vue.js"></script>

</body>
</html>