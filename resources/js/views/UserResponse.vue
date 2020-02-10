<template>
    <div>
        <div class="columns">
            <div class="column is-8 is-offset-2">
                <div v-if="poll">
                    <div class="card" v-if="poll.questions && activeStep > poll.questions.length">
                        <div class="card-content">
                            <div class="has-text-centered">
                                <h2 class="title is-size-4">
                                    You have successfully completed this poll.
                                </h2>
                                <h2 class="title is-size-5">
                                    Thank you for participating!
                                </h2>
                            </div>
                        </div>
                    </div>
                    <b-steps v-model="activeStep" :has-navigation="hasNavigation" v-else>
                        <b-step-item label="Start">
                            <div class="card">
                                <div class="card-content">
                                    <div class="has-text-centered">
                                        <p class="mb-1" v-if="demo">
                                            <b-message type="is-info" has-icon>
                                                <strong>NOTE:</strong> 
                                                You can watch the stats for this poll in real-time by viewing the 
                                                <strong>
                                                    <a href="/demo-stats" target="_blank">
                                                        <span class="icon">
                                                            <i class="fas fa-chart-pie"></i>
                                                        </span>
                                                        Demo Stats
                                                    </a>
                                                </strong> 
                                                page in another window/tab and watching as you answer the poll questions here.
                                            </b-message>
                                        </p>
                                        <h1 class="title is-size-4">{{ poll.title }}</h1>
                                        <p class="my-1">
                                            {{ poll.details }}
                                        </p>
                                        <p class="mt-2">
                                            <button class="button is-primary" @click="activeStep++">Begin Poll</button>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </b-step-item>
                        <b-step-item :label="'#' + (questionIndex + 1)" v-for="(question, questionIndex) in poll.questions" :key="questionIndex" icon="question-circle">
                            <div class="card" >
                                <div class="card-content">
                                    <h2 class="title is-size-5 has-text-centered">{{ question.question }}</h2>

                                    <div class="mt-2 mb-1">
                                        <div class="block" v-for="(response, responseIndex) in question.responses" :key="responseIndex">
                                            <b-radio @input="responseSelected(question.id, response.id)" v-model="responses[question.id]" :native-value="response.id">{{ response.response }}</b-radio>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <a class="card-footer-item is-light" @click="activeStep--">
                                        <span class="icon is-small is-left">
                                            <i class="fas fa-angle-double-left"></i>
                                        </span>
                                        <span class="ml-1">Prev</span>
                                    </a>
                                    <a class="card-footer-item is-success" @click="(responses[question.id]) ? activeStep++ : responseError()">
                                        <span class="mr-1">Next</span>
                                        <span class="icon is-small is-right">
                                            <i class="fas fa-angle-double-right"></i>
                                        </span>
                                    </a>
                                </div>
                            </div>
                        </b-step-item>
                    </b-steps>
                </div>
                <div v-else>
                    <div class="card">
                        <div class="card-content">
                            <div class="has-text-centered">
                                <h2 class="title is-size-4">
                                    Sorry, this poll could not be found.
                                </h2>
                                <h2 class="is-size-5">
                                    Please check your link and try again.
                                </h2>
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
        name: 'UserResponse',
        props: ['username', 'id'],
        data() {
            return {
                poll: [],
                responses: [],
                activeStep: 0,
                hasNavigation: false,
            }
        },
        methods: {
            getPoll() {
                axios.get('/api/userresponse/' + this.username + '/' + this.id)
                .then(response => {
                    this.poll = response.data

                    if (_.isEmpty(this.poll)) {
                        this.poll = false
                    }
                })
            },
            responseSelected(question_id, response_id) {
                let poll_id = this.poll.id

                axios.post('/api/selectresponse', { question_id, response_id, poll_id })
                .then(response => {
                    // Save responses to local storage
                })
            },
            responseError() {
                this.$buefy.toast.open({
                    message: 'You must select a response to continue to the next question.',
                    type: 'is-danger',
                    position: 'is-bottom'
                })
            }
        },
        mounted () {
            this.getPoll()
            // Load responses from localstorage so they can automatically be selected if user has already responded
        },
    }
</script>
