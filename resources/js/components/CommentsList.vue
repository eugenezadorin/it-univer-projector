<template>
    <div class="comments-list">
        <article class="message is-success" v-for="comment in comments">
            <div class="message-header">
                <p>{{ comment.author }}</p>
                <time>{{ comment.date }}</time>
            </div>
            <div class="message-body" v-html="comment.text"></div>
        </article>
    </div>
</template>

<script>
    import axios from 'axios';

    export default {
        name: 'CommentsList',
        props: ['load-url'],
        data() {
            return {
                comments: []
            }
        },
        created: function () {
            axios.get(this.loadUrl)
                .then(response => {
                    this.comments = response.data;
                })
                .catch(err => {
                    console.log(err);
                });
        }
    }
</script>

<style scoped>

</style>
