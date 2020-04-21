<template>
    <div class="comments-list">
        <Loading v-if="loading"></Loading>
        <Comment :comment="comment" :key="comment.id" v-for="comment in comments"></Comment>
    </div>
</template>

<script>
    import axios from 'axios';
    import Comment from "./Comment";
    import Loading from "./Loading";

    export default {
        name: 'CommentsList',
        props: ['load-url'],
        components: {
            Comment,
            Loading
        },
        data() {
            return {
                comments: [],
                loading: true
            }
        },
        created() {
            setTimeout(() => {
                axios.get(this.loadUrl)
                    .then(response => {
                        this.comments = response.data;
                        this.loading = false;
                    })
                    .catch(err => {
                        console.log(err);
                        this.loading = false;
                    });
            }, 3000);
        }
    }
</script>

<style scoped>

</style>
