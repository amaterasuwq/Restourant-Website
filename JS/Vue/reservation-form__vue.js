new Vue({
    el: '#app',
    data: {
        name: '',
        email: '',
        phone: '',
        date: '',
        time: '',
        guests: 1,
        reservationSubmitted: false
    },
    methods: {
        handleSubmit(event) {
            this.reservationSubmitted = true;
            window.location.href = 'view_reservations.php';
        }
    }
});