<template>
    <div>
        <div class="has-text-centered mb-2">
            <h1 class="is-size-3">
                Polls by {{ polls[0].name }}
            </h1>
        </div>
        <div class="columns">
            <div class="column is-8 is-offset-2">
                <div class="columns is-multiline">
                    <div class="column is-half" v-for="(poll, index) in polls" :key="index">
                        <div class="card">
                            <div class="card-content has-text-centered">
                                <h2 class="is-size-4">{{ poll.title }}</h2>
                                <p class="mt-1 is-size-6">
                                    {{ poll.details }}
                                </p>
                                <hr>
                                <div class="mt-1">
                                    <b-button type="is-primary" tag="router-link" :to="'/p/' + username + '/' + poll.id">Take Poll!</b-button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: 'List',
        props: ['username'],
        data() {
            return {
                polls: ''
            }
        },
        methods: {
            getPolls() {
                axios.get('/api/list', {
                    params: {
                        'username': this.username
                    }
                })
                .then(response => {
                    this.polls = response.data
                })
                .catch(function (error) {
                })
            },
        },
        mounted () {
            this.getPolls()
        },
    }
</script>
