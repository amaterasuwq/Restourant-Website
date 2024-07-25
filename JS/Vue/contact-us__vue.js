new Vue({
    el: '#app',
    data: {
        showContactForm: true,
        contactForm: {
            name: '',
            email: '',
            message: ''
        },
        errors: {
            name: '',
            email: '',
            message: ''
        },
        submissionMessage: '',
        submissionSuccess: false,
        newsletterEmail: '',
        subscriptionMessage: '',
        subscriptionSuccess: false,
        loading: false,
        faq: {
            1: false,
            2: false,
            3: false
        },
    },
    methods: {
        validateForm() {
            this.errors = {
                name: '',
                email: '',
                message: ''
            };

            if (!this.contactForm.name) {
                this.errors.name = 'Name is required';
            }
            if (!this.contactForm.email) {
                this.errors.email = 'Email is required';
            } else if (!this.validEmail(this.contactForm.email)) {
                this.errors.email = 'Valid email is required';
            }
            if (!this.contactForm.message) {
                this.errors.message = 'Message is required';
            }

            return !this.errors.name && !this.errors.email && !this.errors.message;
        },
        validEmail(email) {
            var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@(([^<>()[\]\.,;:\s@"]+\.)+[^<>()[\]\.,;:\s@"]{2,})$/i;
            return re.test(email);
        },

        async submitContactForm() {
            if (!this.validateForm()) {
                return;
            }
            this.loading = true;
            try {
                await new Promise(resolve => setTimeout(resolve, 2000));
                this.submissionMessage = 'Message sent successfully!';
                this.submissionSuccess = true;
                this.contactForm.name = '';
                this.contactForm.email = '';
                this.contactForm.message = '';
            } catch (error) {
                this.submissionMessage = 'Failed to send message. Please try again.';
                this.submissionSuccess = false;
            }
            this.loading = false;
        },

        async subscribeNewsletter() {
            if (!this.validEmail(this.newsletterEmail)) {
                this.subscriptionMessage = 'Valid email is required';
                this.subscriptionSuccess = false;
                return;
            }
            this.loading = true;
            try {
                await new Promise(resolve => setTimeout(resolve, 2000));
                this.subscriptionMessage = 'Subscribed successfully!';
                this.subscriptionSuccess = true;
                this.newsletterEmail = '';
            } catch (error) {
                this.subscriptionMessage = 'Failed to subscribe. Please try again.';
                this.subscriptionSuccess = false;
            }
            this.loading = false;
        },

        toggleFaq(index) {
            this.$set(this.faq, index, !this.faq[index]);
        },

        redirectToReservationPage() {
            window.location.href = 'reservation-form.php';
        },
        
        redirectToPrivacyPolicy() {
            window.location.href = 'privacy-policy.php'; 
        }
    }
});