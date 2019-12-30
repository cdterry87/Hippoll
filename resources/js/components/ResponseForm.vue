<template>
    <form @submit.prevent="saveResponse" class="ma-1">
        <div class="modal-card">
            <div class="modal-card-body">
                <b-field label="Response">
                    <b-input type="text" v-model="response" placeholder="Response" maxlength="255" required></b-input>
                </b-field>
            </div>
            <div class="modal-card-foot">
                <b-button @click="$parent.close()" class="card-footer-item">Cancel</b-button>
                <b-button native-type="submit" type="is-primary" icon-left="check-circle" class="card-footer-item">Save</b-button>
                <b-button v-if="data" type="is-danger" icon-left="minus-circle" @click="deleteResponse" class="card-footer-item">Delete</b-button>
            </div>
        </div>
    </form>
</template>

<script>
    export default {
        name: 'ResponseForm',
        props: ['question', 'data'],
        data() {
            return {
                response: '',
            }
        },
        methods: {
            saveResponse() {
                let question_id = this.question.id
                let user_id = this.question.poll.user_id
                let response = this.response

                let method = 'post'
                let url = '/api/responses'
                if (this.data) {
                    method = 'put'
                    url = '/api/responses/' + this.data.id
                }

                let data = { response, question_id, user_id }

                axios({method, url, data})
                .then(response => {
                    this.reset()
                    this.$parent.close()
                    this.$emit('responseSaved')
                    this.$buefy.toast.open({
                        message: response.data.message,
                        type: 'is-success',
                        position: 'is-bottom'
                    })
                })
            },
            deleteResponse() {
                if (this.data) {
                    axios.delete('/api/responses/' + this.data.id)
                    .then(response => {
                        this.reset()
                        this.$parent.close()
                        this.$emit('responseSaved')
                        this.$buefy.toast.open({
                            message: response.data.message,
                            type: 'is-danger',
                            position: 'is-bottom'
                        })

                        this.$router.push('/question/' + this.data.question_id)
                    })
                }
            },
            reset() {
                this.response = ''
            }
        },
        mounted () {
            if (this.data) {
                this.response = this.data.response
            }
        },
    }
</script>
