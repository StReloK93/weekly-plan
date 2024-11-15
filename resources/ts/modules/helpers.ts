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
    for (let i = -days; i <= days - 1; i++) {
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

export function createToirModels(days, transports, main_array, key) {
    const result = {}
    transports.forEach(transport => {
        days.forEach(day => {
            const selectOne = main_array.find((expo) => expo.day == day && expo[key] == transport.id && expo.change == 1)
            result[`${transport.id}_${day}_1`] = selectOne?.value
        });


        days.forEach(day => {
            const selectOne = main_array.find((expo) => expo.day == day && expo[key] == transport.id && expo.change == 2)
            result[`${transport.id}_${day}_2`] = selectOne?.value
        });
    });

    return result
}

export function createExcavatorPositionModels(days, excavators, excavator_position) {
    const result = {}
    excavators.forEach((excavator) => {
        days.forEach((day) => {
            const selectOne = excavator_position.find((fact) => fact.day == day && fact.excavator_id == excavator.id && fact.change == 1)
            result[`${excavator.id}_${day}_1`] = {
                career_id: selectOne?.career_id,
                download: selectOne?.download,
                type_material: selectOne?.type_material,
                distance: selectOne?.distance,
                massa: selectOne?.massa,
            }
        })

        days.forEach((day) => {
            const selectOne = excavator_position.find((fact) => fact.day == day && fact.excavator_id == excavator.id && fact.change == 2)
            result[`${excavator.id}_${day}_2`] = {
                career_id: selectOne?.career_id,
                download: selectOne?.download,
                type_material: selectOne?.type_material,
                distance: selectOne?.distance,
                massa: selectOne?.massa,
            }
        })
    })
    return result
}

export function createTimetableModels(days, timetable, main) {
    const result = {}
    for (const key in timetable) {
        timetable[key].forEach((table) => {
            days.forEach((day) => {
                const selectOne = main.find((fact) => fact.day == day && fact.horizon_id == table.id)
                result[`${table.id}_${day}`] = {
                    first: selectOne?.first,
                    second: selectOne?.second,
                }
            })
        })
    }
    return result

}

export function numberToArray(number) {
    const array = []
    for (let index = 0; index < number; index++) {
        array.push(index + 1)
    }
    return array
}

export function celebrate(array, key, change){
    const distances = {}
    array.forEach(position => {
        if(position.change != change) return
        distances[`${position.excavator_id}_${position.day}`] = position[key]
    });
    return distances
}

export function celebrateChanges(array, key){
    const distances = {}
    array.forEach(position => {
        distances[`${position.excavator_id}_${position.day}`] = position[key]
    });
    return distances
}

export function changeExcavatorMassa(array, day, change, excavator_id, value){
    const selected = array.find((position) => position.excavator_id == excavator_id && position.change == change && position.day == day)
    selected.massa = value
}

// 5978130 Boshliq sharqiy