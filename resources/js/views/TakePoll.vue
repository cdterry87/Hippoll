<template>
    <div>
        Take a Poll
    </div>
</template>

<script>
    export default {
        name: 'TakePoll',
        props: ['username', 'id'],
        data() {
            return {
                key: value
            }
        },
        methods: {
            getPoll() {
                axios.get('/api/takepoll/' + this.username + '/' + this.id)
                .then(response => {
                    // this.response = response.data
                })
            }
        },
        mounted () {
            this.getPoll()
        },
    }
</script>
