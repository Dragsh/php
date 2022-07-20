USE care_rental;

-- Запрос № 1
-- Выбирает из таблицы АВТОМОБИЛИ информацию об автомобилях,
--  стоимость одного дня проката которых меньше 1900
select *
from cars
where
     cost_day_rental < 1900;
     
-- Запрос № 2
-- Выбирает из таблицы АВТОМОБИЛИ информацию об автомобилях,
-- страховая стоимость которых находится в диапазоне от 100 000 до 300 000

select *
from cars
where
     insurable_value between 100000 and  300000;
     
-- Запрос № 3
-- Выбирает из таблиц КЛИЕНТЫ, АВТОМОБИЛИ и ПРОКАТ информацию о клиентах, 
-- серия-номер паспорта которых начинается с цифры «2». Включает поля Код клиента, 
-- Паспорт, Дата начала проката, Количество дней проката, Модель автомобиля
     
  select 
          clients.id, 
          clients.surname,
          clients.passport,
          rentals.date_start,
          rentals.rental_days,
          cars.model
          
from rentals
     JOIN cars ON cars.Id = rentals.id_car
     JOIN clients ON clients.Id = rentals.id_client
where 
      clients.passport REGEXP '^2';
      
-- Запрос № 4
-- Выбирает из таблицы КЛИЕНТЫ и ПРОКАТ информацию о клиентах,
-- бравших автомобиль напрокат в некоторый определенный день. 

 select 
          clients.id, 
          clients.surname ,
          clients.`name`,
          clients.patronymic,
          clients.passport,
          rentals.date_start,
          rentals.rental_days,
          cars.model
          
from rentals
     JOIN cars ON cars.Id = rentals.id_car
     JOIN clients ON clients.Id = rentals.id_client
where 
      rentals.date_start = '2020-12-05';
      
-- Запрос № 5
-- Выбирает из таблицы АВТОМОБИЛИ информацию обо всех автомобилях, 
-- для которых значение в поле Страховая стоимость автомобиля попадает
-- в некоторый заданный интервал. 

select *
from cars
where insurable_value between 100000 and  300000;

-- Запрос № 6
-- Вычисляет для каждого автомобиля величину выплачиваемого страхового взноса.
--  Включает поля Госномер автомобиля, Модель автомобиля, Год выпуска автомобиля,
-- Страховая стоимость автомобиля, Страховой взнос. Сортировка по полю Год выпуска автомобиля 

select 
      id,
      model,
      color,
      `year`,
      `number`,
      insurable_value,
      cost_day_rental,
	  insurable_value * 1.1 as insurable_value_percent
from  cars
order by `year`;

-- Запрос № 7
-- Выполняет группировку по полю Модель автомобиля. 
-- Для каждой модели вычисляет минимальную страховую стоимость автомобиля.

select 
      id,
      model,
      color,
      `year`,
      `number`,
      insurable_value,
      cost_day_rental,
	  insurable_value, 
      COUNT(*) AS ModelsCount,
      min(insurable_value) AS min_insur_value
from  cars
GROUP BY model;

-- Запрос № 8
-- Выполняет группировку по полю Код клиента. Для каждого клиента вычисляет минимальное
-- и максимальное значения по полю Количество дней проката

select
      clients.id,
      clients.surname,
      clients.`name`,
      clients.patronymic,
      clients.passport,
	  min(rentals.rental_days) AS min_rental_days,
      max(rentals.rental_days) AS max_rental_days
from rentals
      JOIN cars ON cars.Id = rentals.id_car
      JOIN clients ON clients.Id = rentals.id_client
group by 
       clients.id;
      
-- Запрос № 9
-- Создает таблицу ДОРОГИЕ_АВТОМОБИЛИ, содержащую информацию об автомобилях, 
-- стоимость одного дня проката которых больше 2000
 
 CREATE TABLE expensive_cars 
 SELECT * 
 FROM cars
 Where
     cars.cost_day_rental > 2000
 ;
 
 -- Запрос № 10
-- Создает копию таблицы АВТОМОБИЛИ с именем КОПИЯ_АВТОМОБИЛИ

-- создание копии таблицы без данных
CREATE TABLE copy_cars
LIKE cars;
-- копирование таблицы вместе с данными
CREATE TABLE copy_cars
SELECT *
FROM cars;

-- второй вариант

CREATE TABLE copy_cars
LIKE cars;
INSERT INTO copy_cars
SELECT *
FROM cars;
 
-- Запрос № 11
-- Удаляет из таблицы КОПИЯ_АВТОМОБИЛИ записи, 
-- в которых значение в поле Стоимость одного дня проката меньше 500

DELETE FROM copy_cars
WHERE cost_day_rental < 500;

-- Запрос № 12
-- Уменьшает значение в поле Страховая стоимость автомобиля 
-- таблицы КОПИЯ_АВТОМОБИЛИ на 10 процентов для автомобилей, изготовленных до 2015 года
UPDATE copy_cars
SET insurable_value = insurable_value - (insurable_value * 10 /100)
WHERE `year` < 2015;







      
      
      
