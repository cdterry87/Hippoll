<template>
    <div>
        <div class="columns has-text-centered">
            <div class="column is-8 is-offset-2">
                <div class="card">
                    <div class="card-content is-size-5">
                        <section>
                            <h1 class="is-size-2">Sorry, Page Not Found</h1>
                            <h2 class="is-size-5 mt-1">Please double-check your link or try again later.</h2>

                            <b-button type="is-primary" class="mt-2 is-medium" tag="router-link" icon-left="home" to="/home/">Return Home</b-button>
                        </section>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: 'NotFound'
    }
</script>