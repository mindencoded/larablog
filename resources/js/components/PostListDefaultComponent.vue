<template>
    <div>
        <div class="card mb-2" v-for="post in posts" :key="post.title">
            <img class="card-img-top" :src="'/images/posts/' + post.image" alt="Card image cap">
            <div class="card-body">
                <h5 class="card-title">{{ post.title }}</h5>
                <p class="card-text">{{ post.content }}</p>
                <router-link class="btn btn-primary" :to="{ name: 'detail', params: { id: post.id } }">
                    View Detail
                </router-link>
            </div>
        </div>
        <v-pagination v-if="totalPages" class="mt-3" v-model="currentPage" :page-count="totalPages" :classes="bootstrapPaginationClasses" :labels="paginationAnchorTexts"></v-pagination>
        <post-modal-component :post="postSelected"></post-modal-component>
    </div>
</template>

<script>
import vPagination from 'vue-plain-pagination'

export default {
    components: {vPagination},
    props: ['posts', 'totalPages', 'pCurrentPage'],
    name: "PostListDefaultComponent",
    created() {
        this.currentPage = this.pCurrentPage;
    },
    methods: {
        postClick: function (p) {
            this.postSelected = p;
        }
    },
    data: function () {
        return {
            postSelected: null,
            currentPage: 1,
            bootstrapPaginationClasses: {
                ul: 'pagination',
                li: 'page-item',
                liActive: 'active',
                liDisable: 'disabled',
                button: 'page-link'
            },
            paginationAnchorTexts: {
                first: '',
                prev: '&laquo;',
                next: '&raquo;',
                last: ''
            }
        }
    },
    watch: {
        currentPage: function(currentPage) {
            this.$emit('getCurrentPage' , currentPage)
        }
    }
}
</script>

<style scoped>

</style>

