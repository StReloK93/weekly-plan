<template>
   <td ref="column" class="max-w-20 border  p-0 h-6">
      <input type="number" v-model="model" @input="(event: any) => handleInput(event.target.value)"
         @keydown="handleKeydown"
         class="w-full outline-none bg-transparent text-sm border-transparent focus:bg-gray-200 border focus:border-blue-400 h-full text-center focus:text-left">
   </td>
</template>

<script setup lang="ts">
import { ref } from 'vue';

const model = defineModel()
const emit = defineEmits(['save'])
let typingTimer = null;
const debounceInterval = 800;
const column = ref(null)

const handleInput = (text) => {

   clearTimeout(typingTimer);
   typingTimer = setTimeout(() => {
      if (text.trim() == "") return
      emit('save', text)
   }, debounceInterval);
};



const handleKeydown = (event) => {
   if (event.key == "ArrowUp" || event.key == "ArrowDown") event.preventDefault()
   else if (event.key == "Enter") {
      event.stopPropagation()
      if(event.target){
         event.target.blur()
         event.target.parentNode.focus()
      }
   }
};

defineExpose({ column })
</script>