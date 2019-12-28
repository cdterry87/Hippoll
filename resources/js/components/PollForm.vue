<template>
    <form @submit.prevent="savePoll" class="ma-1">
        <div class="modal-card">
            <div class="modal-card-body">
                <b-field label="Title">
                    <b-input type="text" v-model="title" placeholder="Poll Title" required></b-input>
                </b-field>
                <b-field label="Details">
                    <b-input type="textarea" v-model="details" placeholder="Details"></b-input>
                </b-field>
            </div>
            <div class="modal-card-foot">
                <b-button @click="$parent.close()" class="card-footer-item">Cancel</b-button>
                <b-button native-type="submit" type="is-primary" icon-left="check-circle" class="card-footer-item">Save</b-button>
                <b-button v-if="poll" type="is-danger" icon-left="minus-circle" @click="deletePoll" class="card-footer-item">Delete</b-button>
            </div>
        </div>
    </form>
</template>

<script>
    export default {
        name: 'PollForm',
        props: ['poll'],
        data() {
            return {
                title: '',
                details: '',
                user_id: ''
            }
        },
        methods: {
            savePoll() {
                let title = this.title
                let details = this.details
                let user_id = this.user_id

                let method = 'post'
                let url = '/api/polls'
                if (this.poll) {
                    method = 'put'
                    url = '/api/polls/' + this.poll.id
                    user_id = this.user_id = this.poll.user_id
                }

                let data = { title, details, user_id }

                axios({method, url, data})
                .then(response => {
                    this.reset()
                    this.$parent.close()
                    this.$emit('pollSaved')
                    this.$buefy.toast.open({
                        message: response.data.message,
                        type: 'is-success',
                        position: 'is-bottom'
                    })
                })
            },
            deletePoll() {
                if (this.poll) {
                    axios.delete('/api/polls/' + this.poll.id)
                    .then(response => {
                        this.reset()
                        this.$parent.close()
                        this.$emit('pollSaved')
                        this.$buefy.toast.open({
                            message: response.data.message,
                            type: 'is-danger',
                            position: 'is-bottom'
                        })

                        this.$router.push('/home')
                    })
                }
            },
            reset() {
                this.title = ''
                this.details = ''
            }
        },
        mounted () {
            if (this.poll) {
                this.title = this.poll.title
                this.details = this.poll.details
            }
        },
    }
</script>
