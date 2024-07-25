new Vue({
    el: '#app',
    data: {
        name: '',
        description: '',
        price: '',
        section: 'appetizers',
        image: null
    },
    methods: {
        handleFileUpload(event) {
            this.image = event.target.files[0];
        },
        
        handleSubmit() {
            let formData = new FormData();
            formData.append('name', this.name);
            formData.append('description', this.description);
            formData.append('price', this.price);
            formData.append('section', this.section);
            formData.append('image', this.image);

            fetch('insert_menu_item.php', {
                method: 'POST',
                body: formData
            })
            .then(response => response.text()) 
            .then(data => {
                window.location.href = 'menu.php';
            })
            .catch(error => {
                console.error('Error:', error);
                alert('There was an error adding the dish.');
            });
        }
    }
});