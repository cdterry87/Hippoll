import Home from './views/Home'
import Poll from './views/Poll'
import Question from './views/Question'
import Response from './views/Response'
import Stats from './views/Stats'
import TakePoll from './views/TakePoll'
import Account from './views/Account'
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
        path: '/response/:id',
        name: 'response',
        component: Response,
        props: true
    },
    {
        path: '/stats/:id',
        name: 'stats',
        component: Stats,
        props: true
    },
    {
        path: '/p/:username/:id',
        name: 'takepoll',
        component: TakePoll,
        props: true
    },
    {
        path: '/account',
        name: 'account',
        component: Account,
    },
    {
        path: '*',
        component: NotFound
    }
];
