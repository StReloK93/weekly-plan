import { ref } from 'vue'
import Column from '@/ui/CustomColumn.vue';
import SelectColumn from '@/ui/SelectColumn.vue';
export function useTableActions() {
   const columnsRefs = ref([]);

   function handleKeydown(rowIndex, colIndex, event) {
      if (event.key == "ArrowUp") focusCell(colIndex, rowIndex - 1)
      else if (event.key == "ArrowDown") focusCell(colIndex, rowIndex + 1)
      else if (event.key == "ArrowLeft") focusCell(colIndex - 1, rowIndex)
      else if (event.key == "ArrowRight") focusCell(colIndex + 1, rowIndex)

      if (event.key == 'Enter') columnsRefs.value[colIndex][rowIndex].children[0].focus()
   }

   function focusCell(rowIndex, colIndex) {
      if (columnsRefs.value[rowIndex] && columnsRefs.value[rowIndex][colIndex]) {
         columnsRefs.value[rowIndex][colIndex].focus()
      }
   }

   const setColumnRef = (elem, colIndex, rowIndex) => {
      if (columnsRefs.value[rowIndex] == null) {
         columnsRefs.value[rowIndex] = [];
      }
      if (elem && elem.column) columnsRefs.value[rowIndex][colIndex] = elem.column;
   }

   return { columnsRefs, handleKeydown, focusCell, setColumnRef, Column, SelectColumn }
}