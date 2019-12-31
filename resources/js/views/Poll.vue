<template>
    <div>
        <div class="columns" v-if="poll">
            <div class="column is-8 is-offset-2">
                <Breadcrumbs />
                <div class="card">
                    <div class="card-content">
                        <div class="field">
                            <b-switch v-model="poll.active" @input="changeStatus" type="is-success">
                                Active
                            </b-switch>
                            <p v-if="!poll.active" class="help is-primary">Toggle this switch to allow others to view/take your poll.</p>
                        </div>
                        <div class="columns my-1 is-mobile">
                            <div class="column is-8">
                                <h2 class="title is-size-4">{{ poll.title }}</h2>
                            </div>
                            <div class="column is-4 has-text-right">
                                <b-button type="is-primary" icon-left="edit" @click="editPollModal = true">Edit</b-button>
                            </div>
                        </div>
                        <div>
                            {{ poll.details }}
                        </div>
                        <hr>
                        <div class="columns my-1 is-mobile">
                            <div class="column is-6">
                                <h3 class="title is-size-5">Questions</h3>
                            </div>
                            <div class="column is-6 has-text-right">
                                <b-button type="is-success" icon-left="plus" @click="addQuestionModal = true">Add</b-button>
                            </div>
                        </div>
                        <div class="columns is-multiline">
                            <div class="column is-full" v-for="(question, index) in poll.questions" :key="question.id">
                                <article class="media">
                                    <div class="media-content">
                                        <div class="content">
                                            {{ index + 1 }}. {{ question.question }}
                                        </div>
                                    </div>
                                    <div class="media-right">
                                        <b-button tag="router-link" :to="'/question/' + question.id" type="is-primary" class="is-small" icon-left="eye">View</b-button>
                                    </div>
                                </article>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <b-modal :active.sync="editPollModal"
                 has-modal-card
                 trap-focus
                 aria-role="dialog"
                 aria-modal>
            <EditPollForm :poll="poll" @pollSaved="getPoll"></EditPollForm>
        </b-modal>

        <b-modal :active.sync="addQuestionModal"
                 has-modal-card
                 trap-focus
                 aria-role="dialog"
                 aria-modal>
            <AddQuestionForm :poll="poll" @questionSaved="getPoll"></AddQuestionForm>
        </b-modal>
    </div>
</template>

<script>
    import Breadcrumbs from './../components/Breadcrumbs'
    import EditPollForm from './../components/PollForm'
    import AddQuestionForm from './../components/QuestionForm'

    export default {
        name: 'Poll',
        props: ['id'],
        components: {
            Breadcrumbs,
            EditPollForm,
            AddQuestionForm,
        },
        data() {
            return {
                poll: [],
                editPollModal: false,
                addQuestionModal: false,
            }
        },
        methods: {
            getPoll() {
                axios.get('/api/polls/' + this.id)
                .then(response => {
                    this.poll = response.data

                    if (this.poll.active) {
                        this.poll.active = true
                    }
                })
            },
            changeStatus() {
                let active = this.poll.active
                let user_id = this.poll.user_id

                axios.post('/api/status/' + this.id, { active, user_id })
                .then(response => {
                    this.$buefy.toast.open({
                        message: response.data.message,
                        type: 'is-success',
                        position: 'is-bottom'
                    })
                })
            }
        },
        mounted () {
            this.getPoll()
        },
    }
</script>
