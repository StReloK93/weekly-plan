import { createI18n } from 'vue-i18n'


const vuestic = {
	sortColumnBy: "sortColumnBy1",
	pagination: "pagination2",
	goToSpecificPage: "goToSpecificPage3",
	loading: "loading",
	select: "select",
	noOptions: "noOptions",
	progressState: "progressState",
	nextPeriod: "nextPeriod",
	toggleDropdown: "toggleDropdown",
	switchView: "switchView",
	previousPeriod: "previousPeriod",
	selectedDate: "selectedDate",
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
			level: "Уровень",
			required: "Пожалуйста заполните поля!",
			horizons: "Горизонты карьеров",
			movement: {
				name: "Перегоны",
				ekg: "Перегоны ЭКГ-5 и ЭКГ-10",
				gidro: "Перегоны гидравлики",
			},
			career: {
				add: "Добавить карьер",
				edit: "Изменить карьер",
				name: "Названия карьера",
				code: "Код карьера",
			},
			horizon: {
				add: "Добавить горизонт карьера",
				edit: "Изменить горизонт карьера",
				code: "Код горизонт карьера",
				name: "Горизонт",
			},
			inputs: {
				excavator_facts: "Факт ЭКГ",
				excavator_positions: "Расстановка ЭКГ",
				drilling_positions: "Расстановка БУ",
				timetable_production: "График добычи",
				explosion_schedule: "График взрывов",
				truck_toir: "График ТОиР АС",
				drilling_toir: "График ТОиР БУ",
				excavator_toir: "График ТОиР ЭКС",

				plan: "План",
				fact: "Факт",
			},
			results: {
				excavator_position: "План Расстановка ЭКГ",
				excavator: "План по ЭКГ",
				drilling_position: "План Расстановка Бур",
				explosion_schedule: "План взрывов",
			},
			normative: {
				reglament_normatives_po: "Нормативы на регламентированные простои ПО",
				lunch: "Обед",
				eto: "ЕТО",
				peresmenka: "Пересменка",
				techno_pereriv: "Технологический перерыв",

				reglament_normatives_ac: "Нормативы на регламентированные простои АС",
				inoil: "Заправка",
				rezerv_time: "Резерв под прочие простои",
				rezerv_time_vzriv: "Резерв под прочие простои (взрыв)",


				inner_normatives_ac_reys: "Нормативы на внутрицикловые операции АС на рейс",
				speed: "Скорость",
				install: "Установка под погрузку",
				download: "Разгрузка",
				waiting_download: "Ожидания погрузки",

				settings_ac: "Параметры автосамосвалов",
				gruzopodyomnost: "Грузоподъемность",
				zagruzka: "Загрузка базовая",
			},
			plans: {
				mining_position: "Добыча расстановка",
				excavator_truck: "ЭКГ-АС на неделю",
			},
			message: {
				search: 'Поиск',
				yes: 'Да',
				no: "Нет",
				answerdelete: "Точно хотите удалить?",
				isnotrestoration: "Удаленная информация не подлежит к восстановлению",
				select: "Выберите",
				close: "Закрыть",
				save: "Сохранить",
				trucks: "Автосамосвалы",
				excavators: "Екскаваторы",
				excavatortypes: "Типы Екскаваторов",

				careers: "Карьеры",
				normatives: "Нормативы",
				normativesedit: "Изменить нормативов",
				noDataHtml: "Нет информации",

				indexpage: "Главная",
				guidepage: "Справочники",
				inputpage: "Ввод",
				planpage: "Планирование",
				resultpage: "Результат",

				trucktype: "Тип автосамосвала",
				trucktypes: "Типы автосамосвалов",
				truckname: "Название автосамосвала",
				trucktonnage: "Тоннаж",
				garagenumber: "Гаражный номер",
				gorizontability: "Способность раб. на горизонте",
				addtruck: "Добавить автосамосвал",
				addtrucktype: "Добавить тип автосамосвала",
				edittruck: "Изменить автосамосвал",
				edittrucktype: "Изменить тип автосамосвала",


				addexcavator: "Добавить екскаватор",
				editexcavator: "Изменить екскаватор",
				addexcavatortype: "Добавить тип екскаватор",
				editexcavatortype: "Изменить тип екскаватор",

				excavatortype: "Тип екскаватора",
				excavatorvolume: "Объем ковша",
				excavatoreasytime: "В.Цикла  (Легк)",
				excavatoreasyprocent: "К.Заполнение  (Легк)",
				excavatornormaltime: "В.Цикла  (Норм)",
				excavatornormalprocent: "К.Заполнение  (Норм)",
				excavatorhardtime: "В.Цикла  (Тяж)",
				excavatorhardprocent: "К.Заполнение  (Тяж)",
				excavatorcountbucket: "Кол. ковшей для АС",


				drillings: "Буровые станки",
				adddrilling: "Добавить бурового станка",
				editdrilling: "Изменить бурового станка",

				drillingtypes: "Типы буровых станков",
				drillingname: "Имя бурового станка",
				adddrillingtype: "Добавить тип бурового станка",
				editdrillingtype: "Изменить тип бурового станка",
				speedpermin: "Скорость бурения (мин)",
				drillinginstall: "Установка на скважину",
				drillingmove: "Перегон между блоками",
				drillingmontage: "Монтаж (демонтаж) штанги",
				drill: "Бурение",
				drillupdownmast: "Подъём/отпускание мачты",
			},
			vuestic: vuestic
		},
		uz: {
			lower: 'Quyi',
			middle: "O'rta",
			upper: 'Yuqori',
			level: "Holati",
			required: "Iltimos to'ldiring!",
			horizons: "Gorizontlar",
			movement: "Ko'chirishlar",
			message: {
				search: 'Qidirish',
				yes: 'Ha',
				no: "Yo'q",
				answerdelete: "Aniq o'chirmoqchimisiz?",
				isnotrestoration: "O'chirilgan malumotni qayta tiklab bo'lmaydi",
				select: "Tanlang",
				close: "Yopish",
				save: "Saqlash",
				trucks: "Avtoag'dargichlar",
				excavators: "Ekskavatorlar",
				excavatortypes: "Ekskavator turlari",



				careers: "Karyerlar",
				normatives: "Normativlar",
				normativesedit: "Normativlarni tahrirlash",
				noDataHtml: "Malumot yo'q",

				indexpage: "Bosh sahifa",
				guidepage: "Qo'llanmalar",
				inputpage: "Kiritiladigan malumotlar",
				planpage: "Rejalashtirish",
				resultpage: "Natija",

				trucktype: "Avtoag'dargich turi",
				trucktypes: "Avtoag'dargich turlari",
				truckname: "Avtoag'dargich nomi",
				trucktonnage: "Yuk ko'tarish qobiliyati",
				garagenumber: "Garaj raqami",
				gorizontability: "Gorizontda ishlash imkoniyati",
				addtruck: "Avtoag'dargich kiritish",
				addtrucktype: "Avtoag'dargich turini kiritish",
				edittruck: "Avtoag'dargichni tahrirlash",
				edittrucktype: "Avtoag'dargich turini tahrirlash",

				addexcavator: "Ekskavator kiritish",
				editexcavator: "Ekskavatorni tahrirlash",
				addexcavatortype: "Ekskavator turini kiritish",
				editexcavatortype: "Ekskavator turini tahrirlash",

				excavatortype: "Ekskavator turi",
				excavatorvolume: "Kovush hajmi",
				excavatoreasytime: "Sikl vaqti (yengil)",
				excavatoreasyprocent: "Koef.Kovush toliqligi (yengil)",
				excavatornormaltime: "Sikl vaqti (o'rta)",
				excavatornormalprocent: "Koef.Kovush toliqligi (o'rta)",
				excavatorhardtime: "Sikl vaqti (og'ir)",
				excavatorhardprocent: "Koef.Kovush toliqligi (og'ir)",
				excavatorcountbucket: "Kovushlar soni AC",


				drillings: "Burg'ulash uskunalari",
				adddrilling: "Burg'ulash uskunasini kiritish",
				editdrilling: "Burg'ulash uskunasini tahrirlash",




				drillingtypes: "Burg'ulash uskuna turlari",
				drillingname: "Burg'ulash uskunasi nomi",
				adddrillingtype: "Burg'ulash uskunasini turini kiritish",
				editdrillingtype: "Burg'ulash uskunasini turini tahrirlash",
				speedpermin: "Burg'ulash tezligi (minutda)",
				drillinginstall: "Quduqga o'rnatish",
				drillingmove: "Siljitish",
				drillingmontage: "Montaj",
				drill: "Burg'ulash",
				drillupdownmast: "Machtani ko'tarish/tushirish",
			},
			vuestic: vuestic
		},
	}
})

export default i18n