import moment from "moment"
export const rule = (text) => [(value) => {
    if (isPlainObject(value)) return true
    if (typeof value == 'number') return true
    else return (value && value.length > 0) || text
}]


export function isPlainObject(value: any): value is object {
    return Object.prototype.toString.call(value) === '[object Object]';
}


export function getDaysInCurrentMonth() {
    const date = new Date();
    const year = date.getFullYear();
    const month = date.getMonth(); // 0 - январь, 11 - декабрь

    // Получаем количество дней в текущем месяце
    const daysInMonth = new Date(year, month + 1, 0).getDate();

    // Создаем массив с днями
    const daysArray = Array.from({ length: daysInMonth }, (_, i) => i + 1);

    return daysArray;
}

export function getSurroundingDates(selectedDate, days) {
    const result = [];

    // Добавляем 10 дней до выбранного дня
    for (let i = -days; i <= days; i++) {
        const currentDate = new Date(selectedDate);
        currentDate.setDate(selectedDate.getDate() + i);
        result.push(moment(currentDate).format('YYYY-MM-DD')); // Добавляем копию объекта Date
    }

    return result;
}

export function convertIndex(index, add = 0) {
    return index * 2 + add
}

export function createExcavatorFactsModels(excavators, daysList, facts: Array<any>) {
    const result = {}
    excavators.forEach((excavator) => {
        daysList.forEach((day) => {
            const selectOne = facts.find((fact) => fact.day == day && fact.excavator_id == excavator.id)
            result[`${excavator.id}_${day}`] = {
                plan: selectOne?.plan,
                fact: selectOne?.fact,
            }
        })
    })
    return result
}

export function createExplosionModels(days, numbers, explosions) {
    const result = {}
    numbers.forEach(num => {
        days.forEach(day => {
            const selectOne = explosions.find((expo) => expo.day == day && expo.number == num)
            result[`${num}_${day}`] = selectOne?.career_id
        });
    });

    return result
}

export function createDrillingPositionModels(days, drillings, drilling_positions) {
    const result = {}
    drillings.forEach(drilling => {
        
        days.forEach(day => {
            const selectOne = drilling_positions.find((expo) => expo.day == day && expo.drilling_id == drilling.id && expo.change == 1)
            result[`${drilling.id}_${day}_1`] = selectOne?.career_id
        });


        days.forEach(day => {
            const selectOne = drilling_positions.find((expo) => expo.day == day && expo.drilling_id == drilling.id && expo.change == 2)
            result[`${drilling.id}_${day}_2`] = selectOne?.career_id
        });

        
    });

    return result
}



export function numberToArray(number) {
    const array = []
    for (let index = 0; index < number; index++) {
        array.push(index + 1)
    }

    return array
}