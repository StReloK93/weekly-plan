<template>
   <td class="min-w-20 border p-0 h-6">
      <section
         class="flex flex-col justify-center relative h-full border border-transparent cursor-pointer hover:bg-gray-100"
         :class="{ '!border-gray-500': inputFocus }" ref="menuContainer" @click="openSelectForm">
         <main class="flex px-1.5">
            <main class="w-full h-full">
               <p v-if="selected" class="h-full text-sm"> {{ props.renderer(selected) }} </p>
               <p v-else class="opacity-0">I</p>
            </main>

            <main v-if="inputFocus" :class="[position ? 'top-full translate-y-px' : 'bottom-full -translate-y-px']"
               class="absolute  left-0 text-sm w-full bg-white z-50">

               <input v-model="filterText" class="bg-transparent outline-none w-full p-1.5 border-b" placeholder="Qidirish">

               <aside class="overflow-y-auto shadow max-h-52 thin-scroll">
                  <div @click="onSelect(null)" class="p-1.5 cursor-pointer hover:bg-gray-200">
                     <span class="opacity-0">Tozalash</span>
                  </div>
                  <div @click="onSelect(option[picker])" v-for="option in optionsFiltered"
                     class="p-1.5 cursor-pointer hover:bg-gray-200">
                     {{ props.renderer(option) }}
                  </div>
               </aside>

            </main>
         </main>
      </section>
   </td>
</template>

<script setup lang="ts">
import { computed, ref, watch, onMounted, onUnmounted } from 'vue'
const props = defineProps(['options', 'renderer', 'picker'])
const model = defineModel()
const menuContainer = ref()
const filterText = ref(null)
const inputFocus = ref(false)

const position = ref(false)


const emit = defineEmits(['save'])

const optionsFiltered = computed(() => {
   return props.options.filter((option) => {
      if (['', null].includes(filterText.value)) return true
      else {
         const fullText = props.renderer(option).toLowerCase()
         return fullText.includes(filterText.value.toLowerCase())
      }
   })
})



function openSelectForm(event) {
   window.innerHeight > event.pageY + 270 ? position.value = true : position.value = false
   inputFocus.value = true
}


function onSelect(option_id) {
   model.value = option_id
   inputFocus.value = false
}

const selected = computed(() => props.options.find((option) => option.id == model.value))

const handleClickOutside = (event) => {
   if (!menuContainer.value.contains(event.target)) {
      inputFocus.value = false;
      filterText.value = null
   }
};

onMounted(() => {
   document.addEventListener('click', handleClickOutside);
});

onUnmounted(() => {
   document.removeEventListener('click', handleClickOutside);
});

watch(() => model.value, (current) => {
   emit('save', current)
})
</script>