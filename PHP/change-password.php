<?php
include 'process_change-password.php';
include 'header.php';
?>

<div id="app" class="change-password__container">
    <div class="change-password__logo">
        <img src="../images/icons/logo.png" alt="logo">
    </div>
    <div class="change-password__title">
        <p>Change your password</p>
    </div>
    <form class="change-password__form" @submit.prevent="handleSubmit" method="POST">
        <fieldset id="login">
            <div :class="{ 'has-error': new_password_err }">
                <input class="change-password__input" type="password" v-model="new_password" name="new_password"
                    placeholder="New Password">
                <span>{{ new_password_err }}</span>
            </div>
            <div :class="{ 'has-error': confirm_password_err }">
                <input class="change-password__input" type="password" v-model="confirm_password" name="confirm_password"
                    placeholder="Confirm Password">
                <span>{{ confirm_password_err }}</span>
            </div>

            <div v-if="submissionMessage" class="change-password__succ-message">
                {{ submissionMessage }}
            </div>

            <div class="change-password__buttons-container">
                <button class="change-password__button" type="submit" :disabled="loading">
                    <span v-if="loading">Changing Password...</span>
                    <span v-else>Change Password</span>
                </button>

                <div class="change-password__buttons-container__cancel">
                    <span>Don't want to change password?</span><a href="home-page.php">Cancel</a>
                </div>
            </div>
        </fieldset>
    </form>
</div>

<script>
    new Vue({
        el: '#app',
        data: {
            loading: false,
            submissionMessage: '',
            new_password: '',
            confirm_password: '',
            new_password_err: '<?php echo $new_password_err; ?>',
            confirm_password_err: '<?php echo $confirm_password_err; ?>'
        },
        methods: {
            handleSubmit() {
                if (this.new_password !== this.confirm_password) {
                    this.submissionError = 'Passwords do not match';
                    return;
                }

                this.loading = true;
                this.submissionError = '';
                const formData = new FormData();
                formData.append('new_password', this.new_password);
                formData.append('confirm_password', this.confirm_password);

                fetch('process_change-password.php', {
                    method: 'POST',
                    body: formData
                })
                    .then(response => {
                        if (!response.ok) {
                            throw new Error('Network response was not ok');
                        }
                        return response.text();
                    })
                    .then(data => {
                        setTimeout(() => {
                            this.submissionMessage = 'Password changed successfully!';
                            this.new_password = '';
                            this.confirm_password = '';

                            setTimeout(() => {
                                this.loading = false;
                            }, 2000);
                        }, 2000);
                    })
                    .catch(error => {
                        console.error('There was a problem with the request:', error);
                        this.submissionError = 'An error occurred. Please try again later.';
                    });
            }
        }
    });
</script>

</body>
</html>