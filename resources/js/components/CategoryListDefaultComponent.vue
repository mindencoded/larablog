<template>
    <ul class="list-unstyled">
        <li v-for="category in categories" :key="category.id">
            <router-link class="nav-link link-primary" :to="{ name: 'post-category', params: { category_id : category.id } }">
                {{ category.title }}
            </router-link>
        </li>
    </ul>
</template>

<script>
export default {
    name: "CategoryListDefaultComponent",
    created() {
        this.getCategories();
    },
    methods: {
        getCategories: async function () {
            return await fetch('/api/category/all')
                .then((response) => response.json())
                .then((json) => {
                    this.categories = json.data;
                });
        }
    },
    data: function () {
        return {
            categories: []
        }
    }
}
</script>

<style scoped>

</style>
