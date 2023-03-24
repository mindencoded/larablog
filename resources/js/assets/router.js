import Vue from 'vue';
import VueRouter from 'vue-router';
import PostListComponent from "../components/PostListComponent.vue";
import PostDetailComponent from "../components/PostDetailComponent.vue";
import PostCategoryComponent from "../components/PostCategoryComponent.vue";
import ContactComponent from "../components/ContactComponent.vue";
import CategoryListDefaultComponent from "../components/CategoryListDefaultComponent.vue";

Vue.use(VueRouter);
export default new VueRouter({
    mode: 'history',
    routes: [
        { path: '/', component: PostListComponent, name: 'list' },
        { path: '/detail/:id', component: PostDetailComponent, name: 'detail' },
        { path: '/post-category/:category_id', component: PostCategoryComponent, name: 'post-category' },
        { path: '/contact', component: ContactComponent, name: 'contact' },
        { path: '/categories', component: CategoryListDefaultComponent, name: 'categories' },
    ]
});
