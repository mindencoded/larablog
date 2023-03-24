<template>
   <post-list-default-component :key="currentPage" @getCurrentPage="getCurrentPage" :posts="posts" :totalPages="totalPages" :pCurrentPage="currentPage"></post-list-default-component>
</template>

<script>
export default {
    name: "PostListComponent",
    created() {
        this.getPosts();
    },
    methods: {
        postClick: function (p) {
            this.postSelected = p;
        },
        async getPosts() {
            return await fetch('/api/post?page=' + this.currentPage)
                .then((response) => response.json())
                .then((json) => {
                    this.posts = json.data.data;
                    this.totalPages = json.data.last_page;
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
            currentPage: 1
        }
    },
}
</script>

<style scoped>

</style>
