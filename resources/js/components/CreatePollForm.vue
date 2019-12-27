<template>
    <form @submit.prevent="savePoll" class="ma-1">
        <div class="modal-card">
            <div class="modal-card-head">
                <div class="modal-card-title">Create Poll</div>
            </div>
            <div class="modal-card-body">
                <b-field label="Title">
                    <b-input type="text" v-model="title" placeholder="Poll Title" required></b-input>
                </b-field>
                <b-field label="Details">
                    <b-input type="textarea" v-model="details" placeholder="Details"></b-input>
                </b-field>
            </div>
            <div class="modal-card-foot">
                <b-button @click="$parent.close()">Cancel</b-button>
                <b-button native-type="submit" type="is-primary" icon-left="check-circle">Save</b-button>
            </div>
        </div>
    </form>
</template>

<script>
    export default {
        name: 'CreatePollForm',
        props: ['user_id'],
        data() {
            return {
                title: '',
                details: ''
            }
        },
        methods: {
            savePoll() {
                let title = this.title
                let details = this.details
                let user_id = this.user_id

                axios.post('/api/polls', { title, details, user_id })
                    .then(response => {
                        this.reset()
                        this.$parent.close()

                        this.$emit('pollCreated')

                        this.$buefy.toast.open({
                            message: response.data.message,
                            type: 'is-success',
                            position: 'is-bottom'
                        })
                    })
            },
            reset() {
                this.title = ''
                this.details = ''
            }
        },
    }
</script>
