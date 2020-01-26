<template>
     <div>
        <div class="columns">
            <div class="column is-full-mobile is-10-tablet is-offset-1-tablet is-8-desktop is-offset-2-desktop">
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
                                        <p class="mt-2 mb-1 is-size-4">
                                            This poll is live at: 
                                        </p>
                                        <p class="my-1 is-size-3 has-text-weight-bold">
                                            <a :href="activeURL" target="_blank" id="active-url" class="has-text-weight-bold">{{ activeURL }}</a>
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
                                    <div class="my-1">
                                        <BarChart :chartData="getChartData(question.id)" style="height: 350px;" />
                                    </div>
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
    import BarChart from './../components/Charts/BarChart.vue'

    export default {
        name: 'Stats',
        props: ['id'],
        components: { BarChart },
        data() {
            return {
                poll: [],
                activeStep: 0,
                hasNavigation: false,
            }
        },
        computed: {
            chartData() {
                let questionResponses = []
                this.poll.questions.forEach(question => {
                    let question_id = question.id
                    let responses = []
                    let userresponses = []
                    question.responses.forEach(response => {
                        responses.push(response.response)
                        userresponses[response.id] = 0
                    })
                    // Count the unique instances of users responses
                    let userres = question.userresponses.reduce((acc, res) => {
                        acc[res.response_id] = acc[res.response_id] ? acc[res.response_id] + 1 : 1
                        return acc;
                    }, Object.assign(userresponses));
                    questionResponses.push({
                        question_id,
                        responses,
                        userresponses
                    })
                })
                return questionResponses
            },
            activeURL() {
                if (this.poll && this.poll.user) {
                    return window.location.origin + '/p/' + this.poll.user.username + '/' + this.poll.id
                }
            }
        },
        methods: {
            listen() {
                Echo.channel('poll' + this.poll.id).listen('UserResponded', event => {
                    this.getPoll()
                })
            },
            getPoll() {
                axios.get('/api/stats/' + this.id)
                .then(response => {
                    this.poll = response.data

                    this.listen()

                    if (_.isEmpty(this.poll)) {
                        this.poll = false
                    }
                })
            },
            getChartData(question_id) {
                let chartData = {
                    labels: this.getLabels(question_id),
                    datasets: [{
                        label: '',
                        backgroundColor: '#3D86DA',
                        data: this.getData(question_id)
                    }]
                }

                return chartData
            },
            getLabels(question_id) {
                if (this.chartData) {
                    let labels = this.chartData.find(label => {
                        return (label.question_id === question_id)
                    })
                    return labels.responses
                }
                
            },
            getData(question_id) {
                if (this.chartData) {
                    let data = this.chartData.find(data => {
                        return (data.question_id === question_id)
                    })

                    return Object.values(data.userresponses)
                }
            }
        },
        mounted () {
            this.getPoll()
        },
    }
</script>
