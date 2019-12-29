import Home from './views/Home'
import Poll from './views/Poll'
import Question from './views/Question'
import NotFound from './components/NotFound'

export default [
    {
        path: '/home',
        name: 'home',
        component: Home,
    },
    {
        path: '/poll/:id',
        name: 'poll',
        component: Poll,
        props: true
    },
    {
        path: '/question/:id',
        name: 'question',
        component: Question,
        props: true
    },
    {
        path: '*',
        component: NotFound
    }
];
