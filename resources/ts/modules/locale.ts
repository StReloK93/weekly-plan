import { createI18n } from 'vue-i18n'


const vuestic = {
    sortColumnBy: "sortColumnBy1",
    pagination: "pagination2",
    goToSpecificPage: "goToSpecificPage3",
    loading: "loading",
    select: "select",
    noOptions: "noOptions",
    progressState: "progressState",
}

const i18n = createI18n({
    locale: 'uz',
    legacy: false,
    allowComposition: true,
    fallbackLocale: 'ru',
    messages: {
        ru: {
            lower: 'Нижний',
            middle: 'Средний',
            upper: 'Верхний',
            required: "Пожалуйста заполните поля!",
            message: {
                yes: 'Да',
                no: "Нет",
                answerdelete: "Точно хотите удалить?",
                isnotrestoration: "Удаленная информация не подлежит к восстановлению",
                select: "Выберите",
                close: "Закрыть",
                save: "Сохранить",
                trucks: "Автосамосвалы",
                excavators: "Екскаваторы",
                drillings: "Буровые станки",
                careers: "Карьеры",
                normatives: "Нормативы",
                noDataHtml: "Нет информации",

                indexpage: "Главная",
                guidepage: "Справочники",
                inputpage: "Ввод",
                planpage: "Планирование",
                resultpage: "Результат",

                trucktype: "Тип автосамосвала",
                truckname: "Название автосамосвала",
                trucktonnage: "Тоннаж",
                garagenumber: "Гаражный номер",
                gorizontability: "Способность раб. на горизонте",
                addtruck: "Добавить автосамосвал",
                addtrucktype: "Добавить тип автосамосвала",
                edittruck: "Изменить автосамосвал",
                edittrucktype: "Изменить тип автосамосвала",

            },
            vuestic: vuestic
        },
        uz: {
            lower: 'Quyi',
            middle: "O'rta",
            upper: 'Yuqori',
            required: "Iltimos to'ldiring!",
            message: {
                yes: 'Ha',
                no: "Yo'q",
                answerdelete: "Aniq o'chirmoqchimisiz?",
                isnotrestoration: "O'chirilgan malumotni qayta tiklab bo'lmaydi",
                select: "Tanlang",
                close: "Yopish",
                save: "Saqlash",
                trucks: "Avtoag'dargichlar",
                excavators: "Ekskavatorlar",
                drillings: "Burg'ulash uskunalari",
                careers: "Karyerlar",
                normatives: "Normativlar",
                noDataHtml: "Malumot yo'q",

                indexpage: "Bosh sahifa",
                guidepage: "Qo'llanmalar",
                inputpage: "Kiritiladigan malumotlar",
                planpage: "Rejalashtirish",
                resultpage: "Natija",

                trucktype: "Avtoag'dargich turi",
                truckname: "Avtoag'dargich nomi",
                trucktonnage: "Yuk ko'tarish qobiliyati",
                garagenumber: "Garaj raqami",
                gorizontability: "Gorizontda ishlash imkoniyati",
                addtruck: "Avtoag'dargich kiritish",
                addtrucktype: "Avtoag'dargich turini kiritish",
                edittruck: "Avtoag'dargichni tahrirlash",
                edittrucktype: "Avtoag'dargich turini tahrirlash",
            },
            vuestic: vuestic
        },
        // ruz: {
        //     message: {
        //         trucks: "Автоагдаргичлар",
        //         excavators: "Екскаваторлар",
        //         drillings: "Бургулаш ускуналари",
        //         careers: "Карьерлар",
        //         normatives: "Нормативлар",
        //         noDataHtml: "Малумот йок",

        //         indexpage: "Бош сахифа",
        //         guidepage: "Кулланмалар",
        //         inputpage: "Киритиладиган малумотлар",
        //         planpage: "Режалаштириш",
        //         resultpage: "Натижа",
        //     },
        //     vuestic: vuestic
        // }
    }
})

export default i18n