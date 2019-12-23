import Home from './views/Home'
import NotFound from './components/NotFound'

export default [
    {
        path: '/home',
        name: 'home',
        component: Home,
    },
    {
        path: '*',
        component: NotFound
    }
];
