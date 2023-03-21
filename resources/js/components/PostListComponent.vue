<template>
    <div>
        <div class="card mb-2" v-for="post in posts" :key="post.title">
            <img class="card-img-top" :src="/images/" alt="Card image cap">
            <div class="card-body">
                <h5 class="card-title">{{ post.title }}</h5>
                <p class="card-text">{{ post.content }}</p>
                <a href="#" class="btn btn-primary">Ver más</a>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "PostListComponent",
    data: function() {
        return {
            posts: [
                { title: 'Post 1', image: '92e29530133e.jpg', content: 'Next, we will create a fresh Vue application instance and attach it to the page. Then, you may begin adding components to this application or customize the JavaScript scaffolding to fit your unique needs.'},
                { title: 'Post 2', image: '92e29530133e.jpg', content: 'Next, we will create a fresh Vue application instance and attach it to the page. Then, you may begin adding components to this application or customize the JavaScript scaffolding to fit your unique needs.'},
                { title: 'Post 3', image: '92e29530133e.jpg', content: 'Next, we will create a fresh Vue application instance and attach it to the page. Then, you may begin adding components to this application or customize the JavaScript scaffolding to fit your unique needs.'},
                { title: 'Post 4', image: '92e29530133e.jpg', content: 'Next, we will create a fresh Vue application instance and attach it to the page. Then, you may begin adding components to this application or customize the JavaScript scaffolding to fit your unique needs.'},
                { title: 'Post 5', image: '92e29530133e.jpg', content: 'Next, we will create a fresh Vue application instance and attach it to the page. Then, you may begin adding components to this application or customize the JavaScript scaffolding to fit your unique needs.'}
            ]
        }
    },
}
</script>

<style scoped>

</style>
