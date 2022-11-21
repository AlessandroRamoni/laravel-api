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
    name: 'PostComponent',
    props: {
        post: String
    }
}
</script>

<style lang="scss" scoped>

</style>
