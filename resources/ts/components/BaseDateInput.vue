<template>
   <VaDateInput v-model="model" @update:modelValue="(event) => emit('change', event)" :monthNames="months"
      firstWeekday="Monday" :weekdayNames="weeks" class="bg-white" />
</template>

<script setup lang="ts">
import moment from 'moment'
const emit = defineEmits(['change'])
//@ts-ignore
const months = moment()._locale.monthsShort()
const weeks = ['ВС', 'ПН', 'ВТ', 'СР', 'ЧТ', 'ПТ', 'СБ']

const model = defineModel()
</script>