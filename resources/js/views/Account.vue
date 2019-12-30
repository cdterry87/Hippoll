<template>
    <div>
        <div class="columns">
            <div class="column is-8 is-offset-2">
                <Breadcrumbs />
                <div class="card">
                    <div class="card-content">
                        <b-tabs position="is-centered" class="block">
                            <b-tab-item label="Settings" icon="cog"></b-tab-item>
                            <b-tab-item label="Security" icon="lock"></b-tab-item>
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
    }
</script>
