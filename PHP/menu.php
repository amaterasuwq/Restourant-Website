<?php
session_start();
if(isset($_SERVER['PHP_SELF'])){
    $_SESSION["filename"] = $_SERVER['PHP_SELF'];
}
include 'header.php';
include 'db_connection.php';

$query = "SELECT * FROM menu_items";
$result = mysqli_query($conn, $query);
$menu_items = [];
while ($row = mysqli_fetch_assoc($result)) {
    $menu_items[] = $row;
}
mysqli_close($conn);
?>

<div id="app" class="menu__container">
    <h1>Restaurant Menu</h1>
    
    <div class="menu__filter-sorter">
        <input type="text" v-model="searchQuery" placeholder="Search a dish">

        <select v-model="sortBy">
            <option value="name">Sort by Name</option>
            <option value="priceLow">Sort by Price (Lowest first)</option>
            <option value="priceHigh">Sort by Price (Highest first)</option>
            <option value="random">Random Order</option>
        </select>
    </div>

    <div v-for="(section, index) in sectionsWithItems" :key="index" class="menu__sections">
        <p v-if="sectionHasItems(section)" class="menu__title-sections">{{ section.title }}</p>
        <div class="menu__dishes">
            <div v-for="item in filteredItems(section.items)" :key="item.id" class="menu__dish-container">
                <div class="menu__dishes__dish-title">
                    <p>{{ item.name }}</p>
                </div>
                <div class="menu__dishes__dish-image">
                    <img :src="item.image" :alt="item.name">
                </div>
                <div class="menu__dishes__dish-description">
                    <p>{{ item.description }}</p>
                </div>
                <div class="menu__dishes__dish-price">
                    <p>Price: {{ item.price }}$</p>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    new Vue({
        el: '#app',
        data: {
            searchQuery: '',
            sortBy: 'name',
            sections: [
                { title: 'Appetizers', items: [] },
                { title: 'Main Courses', items: [] },
                { title: 'Soups', items: [] },
                { title: 'Salads', items: [] },
                { title: 'Desserts', items: [] },
                { title: 'Drinks', items: [] },
                { title: 'Alcohol Drinks', items: [] }
            ]
        },
        computed: {
            sectionsWithItems() {
                return this.sections.filter(section => this.filteredItems(section.items).length > 0);
            }
        },
        methods: {
            sectionHasItems(section) {
                return this.filteredItems(section.items).length > 0;
            },
            // Function to filter menu items based on search query
            filteredItems(items) {
                return items.filter(item => {
                    return item.name.toLowerCase().includes(this.searchQuery.toLowerCase());
                }).sort((a, b) => {
                    // Sorting based on selected option
                    if (this.sortBy === 'name') {
                        return a.name.localeCompare(b.name);
                    } else if (this.sortBy === 'priceLow') {
                        return a.price - b.price;
                    } else if (this.sortBy === 'priceHigh') {
                        return b.price - a.price;
                    } else if (this.sortBy === 'random') {
                        return Math.random() - 0.5;
                    }
                });
            }
        },
        mounted() {
            <?php foreach ($menu_items as $item): ?>
                <?php if ($item['section'] === 'appetizers'): ?>
                    this.sections[0].items.push(<?php echo json_encode($item); ?>);
                <?php elseif ($item['section'] === 'main-courses'): ?>
                    this.sections[1].items.push(<?php echo json_encode($item); ?>);
                <?php elseif ($item['section'] === 'soups'): ?>
                    this.sections[2].items.push(<?php echo json_encode($item); ?>);
                <?php elseif ($item['section'] === 'salads'): ?>
                    this.sections[3].items.push(<?php echo json_encode($item); ?>);
                <?php elseif ($item['section'] === 'desserts'): ?>
                    this.sections[4].items.push(<?php echo json_encode($item); ?>);
                <?php elseif ($item['section'] === 'drinks'): ?>
                    this.sections[5].items.push(<?php echo json_encode($item); ?>);
                <?php elseif ($item['section'] === 'alcohole-drinks'): ?>
                    this.sections[6].items.push(<?php echo json_encode($item); ?>);
                <?php endif; ?>
            <?php endforeach; ?>
        }
    });

</script>
</body>
</html>
