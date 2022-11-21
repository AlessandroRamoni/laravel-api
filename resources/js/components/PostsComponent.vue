<template>
    <div>
        <div v-if="loading">
            Waiting...
        </div>

        <div v-else-if="errorMessage.length > 0">
            {{ errorMessage }}
        </div>

        <PostListComponent v-else-if="!detail" :posts="posts" @clickedPost="showPost" />

        <div v-else>
            <PostComponent :post="detail" />
            <button @click="showList = undefined">Indietro</button>

        </div>

        <!-- <div v-else-if="posts.length > 0">
            <div v-for="post in posts" :key="post.id">
                <span @click="showPost(post.id)">{{ post.title }}</span>
            </div>
        </div>

        <div v-else>
            Nessun post trovato, are you sure?
        </div> -->
    </div>

</template>

<script>

import PostComponent from './PostComponent.vue'
import PostListComponent from './PostListComponent.vue'

export default {
    name: 'PostsComponent',
    components: {
        PostComponent,
        PostListComponent
    },
    data() {
        return {
            posts: [],
            errorMessage: '',
            loading: true,
            detail: undefined
        }

    },
    mounted() {
        console.log('PostsComponent presente');

        axios.get('/api/posts').then(({ data }) => {
            if (data.success) {
                this.posts = data.results;
            } else {
                this.errorMessage = data.error;
            }
            this.loading = false
        })
    },
    methods: {
        showPost(id) {
            console.log(id);
            this.loading = true;
            axios.get('api/post/' + id)
                .then(response => {
                    console.log(response);
                    this.detail = response.data.success ? response.data.results : undefined;
                    this.loading = false;
                })
                .catch(e => {
                    console.log('errore', e);
                    this.loading = false;
                })
        },
        showList() {
            this.detail = undefined
        }
    }

}
</script>

<style lang="scss" scoped>

</style>
