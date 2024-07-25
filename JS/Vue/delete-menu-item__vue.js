new Vue({
    el: '#app',
    data: {
        dishName: ''
    },
    methods: {
        deleteItem() {
            fetch('delete_menu_item_process.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                },
                body: `dish_name=${encodeURIComponent(this.dishName)}`
            })
                .then(response => {
                    if (response.ok) {
                        window.location.href = 'menu.php';
                    } else {
                        console.error('Error deleting item:', response.statusText);
                    }
                })
                .catch(error => {
                    console.error('Error deleting item:', error);
                });
        }
    }
});