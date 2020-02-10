import Home from './views/Home'
import Poll from './views/Poll'
import Question from './views/Question'
import Response from './views/Response'
import Stats from './views/Stats'
import List from './views/List'
import UserResponse from './views/UserResponse'
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
        name: 'userresponse',
        component: UserResponse,
        props: true
    },
    {
        path: '/p/:username',
        name: 'list',
        component: List,
        props: true
    },
    {
        path: '/demo',
        name: 'demo',
        component: UserResponse,
        props: {
            username: 'demo',
            id: 1,
            demo: true
        }
    },
    {
        path: '/demo-stats',
        name: 'demoStats',
        component: Stats,
        props: {
            id: 1,
            demo: true
        }
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
