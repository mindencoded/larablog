<template>
    <div>
        <h1 v-if="category">{{ category.title }}</h1>
        <post-list-default-component
            :key="currentPage"
            @getCurrentPage="getCurrentPage"
            :posts="posts"
            :totalPages="totalPages"
            :pCurrentPage="currentPage"></post-list-default-component>
    </div>
</template>

<script>
export default {
    name: "PostCategoryComponent",
    created() {
        this.getPosts();
    },
    methods: {
        postClick: function (p) {
            this.postSelected = p;
        },
        async getPosts() {
            return await fetch('/api/post/' + this.$route.params.category_id + '/category?page=' + this.currentPage)
                .then((response) => response.json())
                .then((json) => {
                    this.posts = json.data.posts.data;
                    this.totalPages = json.data.posts.last_page;
                    this.category = json.data.category;
                });
        },
        getCurrentPage: function (currentPage) {
            this.currentPage = currentPage;
            this.getPosts();
        }
    },
    data: function () {
        return {
            postSelected: null,
            posts: [],
            totalPages: 0,
            currentPage: 1,
            category: null
        }
    },
}
</script>

<style scoped>

</style>
