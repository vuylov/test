--
-- Скрипт сгенерирован Devart dbForge Studio for MySQL, Версия 6.2.280.0
-- Домашняя страница продукта: http://www.devart.com/ru/dbforge/mysql/studio
-- Дата скрипта: 05.12.2014 14:50:36
-- Версия сервера: 5.5.38-log
-- Версия клиента: 4.1
--


SET NAMES 'utf8';

INSERT INTO yii2.builder(id, name, description) VALUES
(1, 'Ахтуба Сити Парка', 'Самый большой застройщик в Волгограде');

INSERT INTO yii2.category(id, name) VALUES
(1, 'В новых домах');
INSERT INTO yii2.category(id, name) VALUES
(2, 'Вторичный фонд');
INSERT INTO yii2.category(id, name) VALUES
(3, 'В строящихся');

INSERT INTO yii2.commercetype(id, name) VALUES
(1, 'Офис');
INSERT INTO yii2.commercetype(id, name) VALUES
(2, 'Магазин');
INSERT INTO yii2.commercetype(id, name) VALUES
(3, 'База');
INSERT INTO yii2.commercetype(id, name) VALUES
(4, 'Склад');
INSERT INTO yii2.commercetype(id, name) VALUES
(5, 'Помещение');
INSERT INTO yii2.commercetype(id, name) VALUES
(6, 'Участок');
INSERT INTO yii2.commercetype(id, name) VALUES
(7, 'Гостиница');

INSERT INTO yii2.earthtype(id, name) VALUES
(1, 'Поселений (ИЖС)');
INSERT INTO yii2.earthtype(id, name) VALUES
(2, 'Сельхозназначения (СНТ, ДНП)');
INSERT INTO yii2.earthtype(id, name) VALUES
(3, 'Промназначения');


INSERT INTO yii2.furnish(id, name) VALUES
(1, 'Без отделки');
INSERT INTO yii2.furnish(id, name) VALUES
(2, 'Требует ремонта');
INSERT INTO yii2.furnish(id, name) VALUES
(3, 'Удовлитворительное');
INSERT INTO yii2.furnish(id, name) VALUES
(4, 'Нормальное');
INSERT INTO yii2.furnish(id, name) VALUES
(5, 'Хорошее');
INSERT INTO yii2.furnish(id, name) VALUES
(6, 'Отличное');
INSERT INTO yii2.furnish(id, name) VALUES
(7, 'Евроотделка');
INSERT INTO yii2.furnish(id, name) VALUES
(8, 'Дизайнерский ремонт');

INSERT INTO yii2.housetype(id, name) VALUES
(1, 'Дом');
INSERT INTO yii2.housetype(id, name) VALUES
(2, 'Коттедж');
INSERT INTO yii2.housetype(id, name) VALUES
(3, 'Таунхаус');
INSERT INTO yii2.housetype(id, name) VALUES
(4, 'Дача');

INSERT INTO yii2.layout(id, name) VALUES
(1, 'Общежитие');
INSERT INTO yii2.layout(id, name) VALUES
(2, 'Хрущевка');
INSERT INTO yii2.layout(id, name) VALUES
(3, 'Брежневка');
INSERT INTO yii2.layout(id, name) VALUES
(4, 'Сталинка');
INSERT INTO yii2.layout(id, name) VALUES
(5, 'Улучшенная');
INSERT INTO yii2.layout(id, name) VALUES
(6, 'Элитная');
INSERT INTO yii2.layout(id, name) VALUES
(7, 'Малометражка');
INSERT INTO yii2.layout(id, name) VALUES
(8, 'Чешская');

INSERT INTO yii2.realty(id, type_id, user_id, region_id, builder_id, room_id, layout_id, category_id, housetype_id, furnish_id, earthtype_id, commercetype_id, square, square_plot, price, address, detail, status, owner, create_time, deactivate_time) VALUES
(1, 1, 2, 9, NULL, 5, NULL, 1, NULL, 2, NULL, NULL, '80м2', '', 5, 'ул. Голубева д.16', 'Квартира в старом убитом доме', 1, 'Иванов Иван Петрович. Тел.: 89275222342', '2013-01-09 00:00:00', '0000-00-00 00:00:00');
INSERT INTO yii2.realty(id, type_id, user_id, region_id, builder_id, room_id, layout_id, category_id, housetype_id, furnish_id, earthtype_id, commercetype_id, square, square_plot, price, address, detail, status, owner, create_time, deactivate_time) VALUES
(2, 1, 2, 10, NULL, NULL, NULL, 3, NULL, NULL, NULL, NULL, '150 квадратов счастья!!!', NULL, 25, 'пр.Ленина, 50', '', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO yii2.realty(id, type_id, user_id, region_id, builder_id, room_id, layout_id, category_id, housetype_id, furnish_id, earthtype_id, commercetype_id, square, square_plot, price, address, detail, status, owner, create_time, deactivate_time) VALUES
(3, 2, 2, 12, NULL, 2, 2, NULL, NULL, NULL, NULL, NULL, '80м2', NULL, 15000, 'пр Героев Сталинграда', '', 1, 'Петрова Анна Владимировна. Тел.: 699728', '2014-12-04 11:41:38', '0000-00-00 00:00:00');
INSERT INTO yii2.realty(id, type_id, user_id, region_id, builder_id, room_id, layout_id, category_id, housetype_id, furnish_id, earthtype_id, commercetype_id, square, square_plot, price, address, detail, status, owner, create_time, deactivate_time) VALUES
(4, 3, 1, 12, 1, 2, NULL, 2, NULL, 5, NULL, NULL, '50м2', NULL, 10000, 'Бульвар Энгельса', 'Тут какие-то детали', 1, 'Михайлов Петр Владимирович', '2014-12-04 13:43:46', '0000-00-00 00:00:00');
INSERT INTO yii2.realty(id, type_id, user_id, region_id, builder_id, room_id, layout_id, category_id, housetype_id, furnish_id, earthtype_id, commercetype_id, square, square_plot, price, address, detail, status, owner, create_time, deactivate_time) VALUES
(5, 6, 2, 11, NULL, NULL, NULL, NULL, 2, 8, NULL, NULL, 'С приусаденбым участком', NULL, 100000, 'ул. 2-ая Снайпера Пассара', 'Много цветоффф', 1, 'Иванов Андрей Николаевич', '2014-12-04 15:02:52', '0000-00-00 00:00:00');

INSERT INTO yii2.region(id, name) VALUES
(9, 'Ворошиловский');
INSERT INTO yii2.region(id, name) VALUES
(10, 'Дзержинский');
INSERT INTO yii2.region(id, name) VALUES
(11, 'Кировский');
INSERT INTO yii2.region(id, name) VALUES
(12, 'Красноармейский');
INSERT INTO yii2.region(id, name) VALUES
(13, 'Краснооктябрьский');
INSERT INTO yii2.region(id, name) VALUES
(14, 'Советский');
INSERT INTO yii2.region(id, name) VALUES
(15, 'Тракторозаводский');
INSERT INTO yii2.region(id, name) VALUES
(16, 'Центральный');

INSERT INTO yii2.role(id, name) VALUES
(1, 'Администратор');
INSERT INTO yii2.role(id, name) VALUES
(2, 'Риэлтор');

INSERT INTO yii2.room(id, name, number) VALUES
(1, '1-комнатная', 1);
INSERT INTO yii2.room(id, name, number) VALUES
(2, '2-комнатная', 2);
INSERT INTO yii2.room(id, name, number) VALUES
(3, '3-комнатная', 3);
INSERT INTO yii2.room(id, name, number) VALUES
(4, '4-комнатная', 4);
INSERT INTO yii2.room(id, name, number) VALUES
(5, '5-комнатная', 5);
INSERT INTO yii2.room(id, name, number) VALUES
(6, '6-комнатная', 6);

INSERT INTO yii2.type(id, name, model) VALUES
(1, 'Квартира', 'appartment');
INSERT INTO yii2.type(id, name, model) VALUES
(2, 'Аренда жилья', 'liverent');
INSERT INTO yii2.type(id, name, model) VALUES
(3, 'Подселение', 'share');
INSERT INTO yii2.type(id, name, model) VALUES
(4, 'Дома, коттедж, таунхаус, дачи', 'house');
INSERT INTO yii2.type(id, name, model) VALUES
(6, 'Земельные участки', 'earth');
INSERT INTO yii2.type(id, name, model) VALUES
(7, 'Гаражи, парковки', 'garage');
INSERT INTO yii2.type(id, name, model) VALUES
(8, 'Продажа', 'sell');
INSERT INTO yii2.type(id, name, model) VALUES
(9, 'Аренда', 'rent');

INSERT INTO yii2.user(id, role_id, email, password, surname, firstname, phone, status, create_time, lastvisit_time, deactivate_time) VALUES
(1, 1, 'vuylov@gmail.com', '12345', 'Вуйлов', 'Дмитрий', '899999', 1, '2014-12-04 11:38:34', '0000-00-00 00:00:00', NULL);
INSERT INTO yii2.user(id, role_id, email, password, surname, firstname, phone, status, create_time, lastvisit_time, deactivate_time) VALUES
(2, 2, 'test@test.ru', '12345', 'Тест', 'Тест', '8999889', 1, '2014-12-04 11:39:48', '0000-00-00 00:00:00', NULL);