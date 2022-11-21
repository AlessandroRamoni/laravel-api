<template>
    <div>
        <div v-if="loading">
            Waiting...
        </div>

        <div v-else-if="errorMessage.length > 0">
            {{ errorMessage }}
        </div>

        <div v-else-if="posts.length > 0">
            <div v-for="post in posts" :key="post.id">
                <span @click="showPost(post.id)">{{ post.title }}</span>
            </div>
        </div>

        <div v-else>
            Nessun post trovato, are you sure?
        </div>
    </div>

</template>

<script>


export default {
    name: 'PostsComponent',
    data() {
        return {
            posts: [],
            errorMessage: '',
            loading: true
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
                    this.loading = false;
                })
                .catch(e => {
                    console.log('errore', e);
                    this.loading = false;
                })
        }
    }

}
</script>

<style lang="scss" scoped>

</style>
