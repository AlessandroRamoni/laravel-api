<template>
    <div>
        <div v-if="posts.length > 0">
            <div style="margin-bottom: 20px" v-for="post in posts" :key="post.id">
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
    name: 'PostListComponent',
    props: {
        posts: Array
    },
    methods: {
        showPost(id) {
            console.log('ciao');
            this.$emit('clickedPost', id);

        }
    }

}
</script>

<style lang="scss" scoped>

</style>
