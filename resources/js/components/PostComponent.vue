<template>
    <div>
        <h2>{{ post.title }}</h2>
        <div>
            <p>{{ post.content }}</p>
        </div>
    </div>
</template>

<script>
export default {
    name: 'PostController',
    props: {
        post: Object
    },

    // mounted() {
    //     console.log(this.post)
    // }
}
</script>

<style lang="scss" scoped>

</style>
