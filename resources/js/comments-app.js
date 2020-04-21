import Vue from 'vue';
import axios from 'axios';

new Vue({
    el: '#comments-list-app',
    data: {
        comments: []
    },
    created: function () {
        axios.get(window.location.href + '/comments')
            .then(response => {
                this.comments = response.data;
            })
            .catch(err => {
                console.log(err);
            });
    }
});
