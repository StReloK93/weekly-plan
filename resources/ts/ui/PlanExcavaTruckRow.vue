<template>
   <tr class="h-6">
      <td class="min-w-28 border py-1 bg-white text-xs px-1">
         {{ props.title }}
      </td>
      <td class="min-w-28 border py-1 bg-white text-xs px-1">
         {{ props.subTitle }}
      </td>
      <template v-for="item in data">
         <slot v-if="props.column" :item="item"></slot>
         <td v-else class="min-w-20 text-xs border border-white border-b-gray-400 text-center h-6 px-1">
            <slot :item="item"></slot>
         </td>
      </template>
   </tr>
</template>
<script setup lang="ts">
const props = defineProps(['title','subTitle','data', 'column'])
</script>