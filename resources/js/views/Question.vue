<template>
    <div>
        <div class="columns" v-if="question">
            <div class="column is-8 is-offset-2">
                <div class="card">
                    <div class="card-content">
                        <div class="columns my-1 is-mobile">
                            <div class="column is-6">
                                <h2 class="title">{{ question.question }}</h2>
                            </div>
                            <div class="column is-6 has-text-right">
                                <b-button type="is-primary" icon-left="edit" @click="editQuestionModal = true">Edit</b-button>
                            </div>
                        </div>
                        <hr>
                        <div class="columns my-1 is-mobile">
                            <div class="column is-6">
                                <h3 class="is-size-4">Responses</h3>
                            </div>
                            <div class="column is-6 has-text-right">
                                <b-button type="is-success" icon-left="plus" @click="addResponseModal = true">Add</b-button>
                            </div>
                        </div>
                        <div class="columns is-multiline">
                            <div class="column is-full" v-for="(response, index) in question.responses" :key="response.id">
                                <article class="media">
                                    <div class="media-content">
                                        <div class="content">
                                            {{ index + 1 }}. {{ response.response }}
                                        </div>
                                    </div>
                                    <div class="media-right">
                                        <b-button tag="router-link" :to="'/response/' + response.id" type="is-primary" class="is-small" icon-left="eye">View</b-button>
                                    </div>
                                </article>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <b-modal :active.sync="editQuestionModal"
                 has-modal-card
                 trap-focus
                 aria-role="dialog"
                 aria-modal>
            <EditQuestionForm :data="question" @questionSaved="getQuestion"></EditQuestionForm>
        </b-modal>
    </div>
</template>

<script>
    import EditQuestionForm from './../components/QuestionForm'

    export default {
        name: 'Question',
        props: ['id'],
        components: {
            EditQuestionForm,
        },
        data() {
            return {
                poll: [],
                question: [],
                editQuestionModal: false,
            }
        },
        methods: {
            getQuestion() {
                axios.get('/api/questions/' + this.id)
                .then(response => {
                    this.question = response.data
                })
            },
        },
        mounted () {
            this.getQuestion()
        },
    }
</script>
