new Vue({
    el: '#app',
    data: {
        showMessageBox: true,
        sections: ['Welcome', 'Image Collage', 'Week\'s Special', 'Feedback from customers', 'About Us'],
        currentSection: 0,
        weekSpecial: [
            {
                name: "Truffle Mushroom Risotto",
                image: "../images/weeks-special/special-dish-1.png",
                description: "Indulge in the rich and creamy flavors of our truffle-infused mushroom risotto. Arborio rice is slow-cooked with wild mushrooms, Parmesan cheese, and a hint of white truffle oil, creating a savory masterpiece.",
                price: "$18.99"
            },
            {
                name: "Grilled Salmon with Citrus Glaze",
                image: "../images/weeks-special/special-dish-2.png",
                description: "A succulent fillet of Atlantic salmon, expertly grilled to perfection and drizzled with a zesty citrus glaze. Served with a side of herb-infused quinoa and fresh sautéed vegetables.",
                price: "$12.99"
            },
            {
                name: "Tiramisu Cheesecake",
                image: "../images/weeks-special/special-dish-3.png",
                description: "For dessert lovers, our Tiramisu Cheesecake is a dream come true. Creamy layers of mascarpone and cream cheese blend perfectly with the delicate coffee-soaked ladyfingers, finished with a dusting of cocoa and a dollop of whipped cream.",
                price: "$5.99"
            }
        ]
    },
    methods: {
        redirectToReservationPage() {
            window.location.href = "reservation-form.php";
        },

        redirectToFeedback() {
            window.location.href = "feedback-form.php";
        },

        closeMessageBox() {
            this.showMessageBox = false;
        },

        navigateToSection(index) {
            this.currentSection = index;
            const sections = document.querySelectorAll('.home-page__hero, .home-page__image-collage, .home-page__weeks-special__container, .home-page__customers-feedback, .home-page__about-us');
            sections[index].scrollIntoView({ behavior: 'smooth' });
        },
    }
});