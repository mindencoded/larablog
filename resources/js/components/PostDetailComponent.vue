<template>
    <div>
        <div v-if="post">
            <div class="card mb-2">
                <div class="card-header">
                    <img class="card-img-top" :src="'/images/posts/' + post.post_images[0].image" alt="Post image">
                </div>
                <div class="card-body">
                    <h5 class="card-title">{{ post.title }}</h5>
                    <p class="card-text">{{ post.content }}</p>
                    <router-link class="btn btn-primary btn-sm" :to="{ name: 'post-category', params: { category_id : post.category.id } }">
                        {{ post.category.title }}
                    </router-link>
                </div>
            </div>
        </div>
        <div v-else>
            <div class="text-center">Post Not Found</div>
        </div>
    </div>
</template>

<script>
export default {
    name: "PostDetailComponent",
    created() {
       this.getPost();
    },
    methods: {
         getPost: async function() {
            return await fetch('/api/post/' + this.$route.params.id)
                .then((response) => response.json())
                .then((json) => this.post = json.data);
        }
    },
    data: function() {
        return {
            post: null
        }
    }
}
</script>

<style scoped>

</style>
