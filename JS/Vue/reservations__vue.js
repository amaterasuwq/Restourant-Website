new Vue({
    el: '#app',
    data: {
        reservations: []
    },
    mounted() {
        this.fetchReservations();
    },
    methods: {
        fetchReservations() {
            fetch('fetch_reservations.php')
                .then(response => response.json())
                .then(data => {
                    this.reservations = data;
                })
                .catch(error => {
                    console.error('Error fetching reservations:', error);
                });
        }
    }
});