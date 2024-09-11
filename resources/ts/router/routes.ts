import { RouteRecordRaw } from 'vue-router';
import GuideTrucksPage from '@/pages/GuidePages/GuideTrucksPage.vue'
import GuideExcavatorsPage from '@/pages/GuidePages/GuideExcavatorsPage.vue'
import GuideDrillingsPage from '@/pages/GuidePages/GuideDrillingsPage.vue';
import GuideCareersPage from '@/pages/GuidePages/GuideCareersPage.vue';
import GuideNormativesPage from '@/pages/GuidePages/GuideNormativesPage.vue';
import GuideMovementPage from '@/pages/GuidePages/GuideMovementPage.vue';

import InputExcavatorFacts from '@/pages/InputPages/InputExcavatorFacts.vue';
import InputDrillingPosition from '@/pages/InputPages/InputDrillingPosition.vue';
import InputExcavatorPosition from '@/pages/InputPages/InputExcavatorPosition.vue';
import InputTimetableProduction from '@/pages/InputPages/InputTimetableProduction.vue';
import InputExplosionSchedule from '@/pages/InputPages/InputExplosionSchedule.vue';


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
                component: GuideTrucksPage,
                meta: { text: 'message.trucks', icon: 'local_shipping' }
            },
            {
                path: "excavators",
                name: 'excavators-guide',
                component: GuideExcavatorsPage,
                meta: { text: 'message.excavators', icon: 'front_loader' }
            },
            {
                path: "drillings",
                name: 'drillings-guide',
                component: GuideDrillingsPage,
                meta: { text: 'message.drillings', icon: 'architecture' }
            },
            {
                path: "careers",
                name: 'careers-guide',
                component: GuideCareersPage,
                meta: { text: 'message.careers', icon: 'layers' }
            },
            {
                path: "normatives",
                name: 'normatives-guide',
                component: GuideNormativesPage,
                meta: { text: 'message.normatives', icon: 'book' }
            },
            {
                path: "movement",
                name: 'movement-guide',
                component: GuideMovementPage,
                meta: { text: 'movement.name', icon: 'move_up' }
            },
        ]
    },
    {
        path: '/inputs',
        name: 'inputs',
        component: () => import('@/pages/InputsPage.vue'),
        redirect: { name: 'excavator-facts' },
        children: [
            {
                path: "excavator-facts",
                name: 'excavator-facts',
                component: InputExcavatorFacts,
                meta: { text: 'inputs.excavator_facts', icon: 'pix' }
            },
            {
                path: "excavator-positions",
                name: 'excavator-positions',
                component: InputExcavatorPosition,
                meta: { text: 'inputs.excavator_positions', icon: 'view_quilt' }
            },
            {
                path: "drilling-positions",
                name: 'drilling-positions',
                component: InputDrillingPosition,
                meta: { text: 'inputs.drilling_positions', icon: 'agriculture' }
            },
            {
                path: "timetable-production",
                name: 'timetable-production',
                component: InputTimetableProduction,
                meta: { text: 'inputs.timetable_production', icon: 'table_view' }
            },
            {
                path: "explosion-schedule",
                name: 'explosion-schedule',
                component: InputExplosionSchedule,
                meta: { text: 'inputs.explosion_schedule', icon: 'alarm_add' }
            },
        ]
    },
]

export default routes