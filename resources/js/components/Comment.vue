<template>
    <article class="message is-info">
        <div class="message-header">
            <p>{{ comment.author }}</p>
            <time>{{ comment.date }}</time>
        </div>
        <div class="message-body" v-html="comment.text"></div>
    </article>
</template>

<script>
    export default {
        name: "Comment",
        props: ["comment"]
    }
</script>

<style scoped>

</style>
