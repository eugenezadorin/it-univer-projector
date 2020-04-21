<template>
    <article class="message is-danger">
        <div class="message-header">
            <p>{{ author }}</p>
            <time>{{ date }}</time>
        </div>
        <div class="message-body" v-html="text"></div>
    </article>
</template>

<script>
    export default {
        name: "Comment",
        props: ["author", "date", "text"]
    }
</script>

<style scoped>

</style>
