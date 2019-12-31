<template>
    <div class="columns" v-if="poll">
        <div class="column is-8 is-offset-2">
            <b-steps v-model="activeStep" :has-navigation="hasNavigation">
                <b-step-item label="Start">
                    <div class="card">
                        <div class="card-content">
                            <div class="has-text-centered">
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
                <b-step-item :label="'Question #' + (questionIndex + 1)" v-for="(question, questionIndex) in poll.questions" :key="questionIndex">
                    <div class="card" >
                        <div class="card-content">
                            <h2 class="title is-size-5 has-text-centered">{{ question.question }}</h2>

                            <div class="mt-2 mb-1">
                                <div class="block" v-for="(response, responseIndex) in question.responses" :key="responseIndex">
                                    <b-radio v-model="responses[question.id]" :native-value="response.id">{{ response.response }}</b-radio>
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
                            <a class="card-footer-item is-success" @click="activeStep++">
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
</template>

<script>
    export default {
        name: 'TakePoll',
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
                axios.get('/api/takepoll/' + this.username + '/' + this.id)
                .then(response => {
                    this.poll = response.data
                })
            }
        },
        mounted () {
            this.getPoll()
        },
    }
</script>
