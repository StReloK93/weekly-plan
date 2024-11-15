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
import InputTruckToir from '@/pages/InputPages/InputTruckToir.vue';
import InputDrillingToir from '@/pages/InputPages/InputDrillingToir.vue';
import InputExcavatorToir from '@/pages/InputPages/InputExcavatorToir.vue';


import PlanMiningPosition from '@/pages/PlanPages/PlanMiningPosition.vue';
import PlanExcavatorTruck from '@/pages/PlanPages/PlanExcavatorTruck.vue';

import ResultExcavatorPosition from '@/pages/ResultPages/ResultExcavatorPosition.vue';
import ResultExcavator from '@/pages/ResultPages/ResultExcavator.vue';
import ResultDrillingPosition from '@/pages/ResultPages/ResultDrillingPosition.vue';
import ResultExplosionSchedule from '@/pages/ResultPages/ResultExplosionSchedule.vue';

const routes: Array<RouteRecordRaw> = [
    {
        path: '',
        name: 'home',
        redirect: {name: 'guides' }
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
            {
                path: "truck-toir",
                name: 'truck-toir',
                component: InputTruckToir,
                meta: { text: 'inputs.truck_toir', icon: 'blur_on' }
            },
            {
                path: "drilling-toir",
                name: 'drilling-toir',
                component: InputDrillingToir,
                meta: { text: 'inputs.drilling_toir', icon: 'blur_on' }
            },
            {
                path: "excavator-toir",
                name: 'excavator-toir',
                component: InputExcavatorToir,
                meta: { text: 'inputs.excavator_toir', icon: 'blur_on' }
            },
        ]
    },

    {
        path: '/plans',
        name: 'plans',
        component: () => import('@/pages/PlansPage.vue'),
        redirect: { name: 'mining-position' },
        children: [
            {
                path: "mining-position",
                name: 'mining-position',
                component: PlanMiningPosition,
                meta: { text: 'plans.mining_position', icon: 'pix' }
            },
            {
                path: "excavator-truck",
                name: 'excavator-truck',
                component: PlanExcavatorTruck,
                meta: { text: 'plans.excavator_truck', icon: 'pix' }
            },
        ]
    },
    {
        path: '/results',
        name: 'results',
        component: () => import('@/pages/ResultsPage.vue'),
        redirect: { name: 'result-excavator-position' },
        children: [
            {
                path: "result-excavator-position",
                name: 'result-excavator-position',
                component: ResultExcavatorPosition,
                meta: { text: 'results.excavator_position' }
            },
            {
                path: "result-excavator",
                name: 'result-excavator',
                component: ResultExcavator,
                meta: { text: 'results.excavator' }
            },
            {
                path: "result-drilling-position",
                name: 'result-drilling-position',
                component: ResultDrillingPosition,
                meta: { text: 'results.drilling_position' }
            },
            {
                path: "result-explosion-schedule",
                name: 'result-explosion-schedule',
                component: ResultExplosionSchedule,
                meta: { text: 'results.explosion_schedule' }
            },
        ]
    },
]

export default routes