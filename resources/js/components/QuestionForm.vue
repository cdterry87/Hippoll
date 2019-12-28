<template>
    <form @submit.prevent="saveQuestion" class="ma-1">
        <div class="modal-card">
            <div class="modal-card-body">
                <b-field label="Question">
                    <b-input type="text" v-model="question" placeholder="Question" maxlength="255" required></b-input>
                </b-field>
            </div>
            <div class="modal-card-foot">
                <b-button @click="$parent.close()" class="card-footer-item">Cancel</b-button>
                <b-button native-type="submit" type="is-primary" icon-left="check-circle" class="card-footer-item">Save</b-button>
                <b-button v-if="data" type="is-danger" icon-left="minus-circle" @click="deletePoll" class="card-footer-item">Delete</b-button>
            </div>
        </div>
    </form>
</template>

<script>
    export default {
        name: 'QuestionForm',
        props: ['poll', 'data'],
        data() {
            return {
                question: '',
            }
        },
        methods: {
            saveQuestion() {
                let question = this.question
                let poll_id = this.poll.id
                let user_id = this.poll.user_id

                let method = 'post'
                let url = '/api/questions'
                if (this.data) {
                    method = 'put'
                    url = '/api/questions/' + this.question.id
                }

                let data = { question, poll_id, user_id }

                axios({method, url, data})
                .then(response => {
                    this.reset()
                    this.$parent.close()
                    this.$emit('questionSaved')
                    this.$buefy.toast.open({
                        message: response.data.message,
                        type: 'is-success',
                        position: 'is-bottom'
                    })
                })
            },
            deleteQuestion() {
                if (this.data) {
                    axios.delete('/api/polls/' + this.data.id)
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
                this.question = ''
            }
        },
        mounted () {
            if (this.data) {
                this.question = this.question.question
            }
        },
    }
</script>
