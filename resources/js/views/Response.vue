<template>
    <div>
        <div class="columns" v-if="response">
            <div class="column is-8 is-offset-2">
                <Breadcrumbs :poll_id="(response.question ? response.question.poll_id : 0)" :question_id="response.question_id" />
                <div class="card">
                    <div class="card-content">
                        <div class="columns my-1 is-mobile">
                            <div class="column is-8">
                                <h2 class="title is-size-4">{{ response.response }}</h2>
                            </div>
                            <div class="column is-4 has-text-right">
                                <b-button type="is-primary" icon-left="edit" @click="editResponseModal = true">Edit</b-button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <b-modal :active.sync="editResponseModal"
                 has-modal-card
                 trap-focus
                 aria-role="dialog"
                 aria-modal>
            <EditResponseForm :question="response.question" :data="response" @responseSaved="getResponse"></EditResponseForm>
        </b-modal>
    </div>
</template>

<script>
    import Breadcrumbs from './../components/Breadcrumbs'
    import EditResponseForm from './../components/ResponseForm'

    export default {
        name: 'Response',
        props: ['id'],
        components: {
            Breadcrumbs,
            EditResponseForm,
        },
        data() {
            return {
                question: [],
                response: [],
                editResponseModal: false,
            }
        },
        methods: {
            getResponse() {
                axios.get('/api/responses/' + this.id)
                .then(response => {
                    this.response = response.data
                })
            },
        },
        mounted () {
            this.getResponse()
        },
    }
</script>
