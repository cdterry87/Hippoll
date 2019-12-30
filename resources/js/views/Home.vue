<template>
    <div>
        <div class="columns">
            <div class="column is-8 is-offset-2">
                <div class="columns my-1 is-mobile">
                    <div class="column is-6">
                        <h2 class="title">My Polls</h2>
                    </div>
                    <div class="column is-6 has-text-right">
                        <b-button type="is-success" icon-left="plus" @click="createPollModal = true">Create</b-button>
                    </div>
                </div>
                <div class="card">
                    <div class="card-content is-size-5">
                        <section>
                            <b-table :data="polls" striped mobile-cards paginated :per-page="resultsPerPage"
                            :current-page.sync="currentPage"
                            pagination-position="bottom"
                            default-sort-direction="desc"
                            :default-sort="['created_at', 'desc']"
                            aria-next-label="Next page"
                            aria-previous-label="Previous page"
                            aria-page-label="Page"
                            aria-current-label="Current page"
                            icon-pack="fas">
                                <template slot-scope="props">
                                    <b-table-column field="title" label="Title" sortable>
                                        {{ props.row.title }}
                                    </b-table-column>
                                    <b-table-column field="created_at" label="Date" width="120" sortable>
                                        <span class="is-hidden">{{ props.row.created_at }}</span>
                                        {{ new Date(props.row.created_at).toLocaleDateString() }}
                                    </b-table-column>
                                    <b-table-column field="actions" label="Actions" width="100" class="has-text-right">
                                        <b-button type="is-primary" tag="router-link" icon-left="eye" :to="'/poll/' + props.row.id">View</b-button>
                                    </b-table-column>
                                </template>
                                <template slot="empty">
                                    <section class="section">
                                        <div class="content has-text-grey has-text-centered">
                                            <div class="has-text-centered">
                                                <b-icon icon="frown" size="is-large"></b-icon>
                                            </div>
                                            <p class="my-1">You have not added any polls yet.</p>
                                            <p>
                                                <b-button type="is-success" icon-left="plus" @click="createPollModal = true">Create One Now!</b-button>
                                            </p>
                                        </div>
                                    </section>
                                </template>
                            </b-table>
                        </section>
                    </div>
                </div>
            </div>
        </div>

        <b-modal :active.sync="createPollModal"
                 has-modal-card
                 trap-focus
                 aria-role="dialog"
                 aria-modal>
            <CreatePollForm @pollSaved="getPolls"></CreatePollForm>
        </b-modal>
    </div>
</template>

<script>
    import CreatePollForm from './../components/PollForm'

    export default {
        name: 'Home',
        components: {
            CreatePollForm,
        },
        data() {
            return {
                polls: [],
                resultsPerPage: 5,
                currentPage: 1,
                createPollModal: false,
            }
        },
        methods: {
            getPolls() {
                axios.get('/api/polls')
                .then(response => {
                    this.polls = response.data
                })
            }
        },
        created() {
            this.getPolls()
        }
    }
</script>

<style lang="scss" scoped>
.card {
    min-height: 480px;
}
</style>
