<template>
    <div>
        <div class="columns">
            <div class="column is-8 is-offset-2">
                <Breadcrumbs />
                <div class="card">
                    <div class="card-content">
                        <b-tabs position="is-centered" class="block" expanded>
                            <b-tab-item label="Settings" icon="cog">
                                <form @submit.prevent="updateAccount" class="ma-1">
                                    <b-field label="Full Name">
                                        <b-input type="text" v-model="user.name" placeholder="Full Name" icon-left="user-circle" required></b-input>
                                    </b-field>
                                    <b-field label="Email Address">
                                        <b-input type="email" v-model="user.email" placeholder="Email Address" required></b-input>
                                    </b-field>
                                    <b-field label="Display Name" :message="'Used to create links to your polls (ex. https://hippoll.com/' + (user.username ? user.username.toLowerCase() : 'your-display-name') + '/your-poll-id)'" type="is-primary">
                                        <b-input type="text" minlength="6" maxlength="30" v-model="user.username" placeholder="Display Name" required></b-input>
                                    </b-field>
                                    <div>
                                        <b-button native-type="submit" type="is-primary" icon-left="check-circle" class="card-footer-item">Save</b-button>
                                    </div>
                                </form>
                            </b-tab-item>
                            <b-tab-item label="Security" icon="lock">
                                <Security />
                            </b-tab-item>
                        </b-tabs>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import Breadcrumbs from './../components/Breadcrumbs'

    export default {
        name: 'Account',
        components: {
            Breadcrumbs,
        },
        data() {
            return {
                user: [],
                password: '',
                password_confirmation: ''
            }
        },
        methods: {
            getUser() {
                axios.get('/api/user')
                .then(response => {
                    this.user = response.data
                })
            },
            updateAccount() {
                let name = this.user.name
                let email = this.user.email
                let username = this.user.username

                axios.post('/api/account', { name, email, username })
                .then(response => {
                    this.user = response.data.data

                    this.$buefy.toast.open({
                        message: response.data.message,
                        type: 'is-success',
                        position: 'is-bottom'
                    })
                })
                .catch(function (error) {
                    this.$buefy.toast.open({
                        message: response.data.message,
                        type: 'is-danger',
                        position: 'is-bottom'
                    })
                });
            },
        },
        mounted () {
            this.getUser()
        },
    }
</script>
