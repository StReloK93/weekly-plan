import { RouteRecordRaw } from 'vue-router';
import GuideTrucksPage from '@/pages/GuideTrucksPage.vue'
import GuideExcavatorsPage from '@/pages/GuideExcavatorsPage.vue'
import GuideDrillingsPage from '@/pages/GuideDrillingsPage.vue';
import GuideCareersPage from '@/pages/GuideCareersPage.vue';
import GuideNormativesPage from '@/pages/GuideNormativesPage.vue';


const routes: Array<RouteRecordRaw> = [
    {
        path: '',
        name: 'home',
        component: () => import('@/pages/IndexPage.vue')
    },
    {
        path: '/guides',
        name: 'guides',
        component: () => import('@/pages/GuidesPage.vue'),
        redirect: { name: 'trucks-guide' },
        children: [
            {
                path: '',
                name: 'trucks-guide',
                component: GuideTrucksPage
            },
            {
                path: "excavators",
                name: 'excavators-guide',
                component: GuideExcavatorsPage
            },
            {
                path: "drillings",
                name: 'drillings-guide',
                component: GuideDrillingsPage
            },
            {
                path: "careers",
                name: 'careers-guide',
                component: GuideCareersPage
            },
            {
                path: "normatives",
                name: 'normatives-guide',
                component: GuideNormativesPage
            },
        ]
    },
]

export default routes