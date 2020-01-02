<template>
     <div>
        <div class="columns">
            <div class="column is-8 is-offset-2">
                <div v-if="poll">
                    <b-steps v-model="activeStep" :has-navigation="hasNavigation">
                        <b-step-item label="Intro">
                            <div class="card">
                                <div class="card-content">
                                    <div class="has-text-centered">
                                        <h1 class="title is-size-4">{{ poll.title }}</h1>
                                        <p class="my-1">
                                            {{ poll.details }}
                                        </p>
                                        <div class="buttons is-centered mt-2">
                                            <b-button tag="router-link" :to="'/poll/' + poll.id" icon-left="angle-double-left">Go Back</b-button>
                                            <button class="button is-primary" @click="activeStep++">See Responses!</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </b-step-item>
                        <b-step-item :label="'#' + (questionIndex + 1)" v-for="(question, questionIndex) in poll.questions" :key="questionIndex" icon="question-circle">
                            <div class="card" >
                                <div class="card-content">
                                    <h2 class="title is-size-5 has-text-centered">{{ question.question }}</h2>
                                </div>
                                <div class="card-footer">
                                    <a class="card-footer-item is-light" @click="activeStep--">
                                        <span class="icon is-small is-left">
                                            <i class="fas fa-angle-double-left"></i>
                                        </span>
                                        <span class="ml-1">Prev</span>
                                    </a>
                                    <a v-if="activeStep < poll.questions.length" class="card-footer-item is-success" @click="activeStep++">
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
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: 'Stats',
        props: ['id'],
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
                axios.get('/api/polls/' + this.id)
                .then(response => {
                    this.poll = response.data

                    if (_.isEmpty(this.poll)) {
                        this.poll = false
                    } else {
                        this.poll.questions.forEach(question => {
                            this.getQuestionStats(question.id)
                        });
                    }
                })
            },
            getQuestionStats(question_id) {
                axios.get('/api/stats/' + question_id)
                .then(response => {
                    this.responses[question_id] = response.data
                })
            }
        },
        mounted () {
            this.getPoll()
        },
    }
</script>
