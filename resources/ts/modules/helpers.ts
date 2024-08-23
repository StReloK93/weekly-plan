export const rule = (text) => [(value) => {
    if (isPlainObject(value)) return true
    if(typeof value  == 'number') return true
    else return (value && value.length > 0) || text
}]


export function isPlainObject(value: any): value is object {
    return Object.prototype.toString.call(value) === '[object Object]';
}
