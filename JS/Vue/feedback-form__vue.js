new Vue({
    el: '#app',
    data: {
        name: '',
        feedback: '',
        rating: 1
    },
    methods: {
        handleSubmit() {
            let form = document.createElement('form');
            form.action = 'process_feedback.php';
            form.method = 'post';

            for (let key in this.$data) {
                let input = document.createElement('input');
                input.type = 'hidden';
                input.name = key;
                input.value = this.$data[key];
                form.appendChild(input);
            }

            document.body.appendChild(form);
            form.submit();
        }
    }
});