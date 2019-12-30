<template>
    <div class="card mb-1">
        <div class="card-content">
            <nav class="breadcrumb" aria-label="breadcrumbs">
                <ul>
                    <li>
                        <router-link to="/home">
                            <a>
                                <span class="icon is-small">
                                    <i class="fas fa-home" aria-hidden="true"></i>
                                </span>
                                <span>Home</span>
                            </a>
                        </router-link>
                    </li>
                    <li v-if="poll_id && ($router.currentRoute.name == 'response' || $router.currentRoute.name == 'question')">
                        <router-link :to="'/poll/' + poll_id">
                            <a>
                                <span class="icon is-small">
                                    <i class="fas fa-poll" aria-hidden="true"></i>
                                </span>
                                <span>Poll</span>
                            </a>
                        </router-link>
                    </li>
                    <li v-if="question_id && $router.currentRoute.name == 'response'">
                        <router-link :to="'/question/' + question_id">
                            <a>
                                <span class="icon is-small">
                                    <i class="fas fa-question-circle" aria-hidden="true"></i>
                                </span>
                                <span>Question</span>
                            </a>
                        </router-link>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</template>

<script>
    export default {
        name: 'Breadcrumbs',
        props: ['poll_id', 'question_id']
    }
</script>
