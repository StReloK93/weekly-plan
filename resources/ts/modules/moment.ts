import moment from 'moment'
moment.locale('uz', {
    months: ["Yanvar", "Fevral", "Mart", "Aprel", "May", "Iyun", "Iyul", "Avgust", "Sentyabr", "Oktyabr", "Noyabr", "Dekabr"],
    monthsShort: ["Yan", "Fev", "Mart", "Apr", "May", "Iyun", "Iyul", "Avg", "Sen", "Okt", "Noy", "Dek"],
    relativeTime: {
        future: '%s keyin',
        past: '%s oldin',
        s: '1 sekund',
        m: '1 minut',
        mm: '%d minut',
        h: '1 soat',
        hh: '%d soat',
        d: '1 kun',
        dd: '%d kun',
        M: '1 Oy',
        MM: '%d Oy',
    }
})

moment.locale('ru', {
    months: ["Январь", "Февраль", "Март", "Апрель", "Май", "Июнь", "Июль", "Август", "Сентябрь", "Октябрь", "Ноябрь", "Декабрь"],
    monthsShort: ["Янв", "Фев", "Мар", "Апр", "Май", "Июн", "Июн", "Авг", "Сен", "Окт", "Ноя", "Дек"],
    relativeTime: {
        future: '%s keyin',
        past: '%s oldin',
        s: '1 sekund',
        m: '1 minut',
        mm: '%d minut',
        h: '1 soat',
        hh: '%d soat',
        d: '1 kun',
        dd: '%d kun',
        M: '1 Oy',
        MM: '%d Oy',
    }
})

export { moment }