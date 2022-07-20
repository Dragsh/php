use accounting_insurance_contracts;

-- Процедура 1
-- Выбирает из таблицы КЛИЕНТЫ информацию о клиентах, 
-- с заданным процентом скидки. Выполнить три вызова 
-- процедуры с разным значением параметра

-- подмена разделителя
delimiter $$ 

drop procedure if exists InfoClientsByPercent$$

create procedure InfoClientsByPercent(in persent double)
begin

select
		 surname,
         `name`,
         patronymic,
         passport,
         discount_percent
from 
		clients		
where
		discount_percent = persent;

end$$


-- Процедура 2
-- Выбирает из таблицы АГЕНТЫ, ДОГОВОРЫ, КЛИЕНТЫ 
-- информацию о страховых агентах и клиентах, 
-- заключивших договора о страховании автомобиля

drop procedure if exists InfoContractsByCar$$
create procedure InfoContractsByCar()
begin
     select
            CONCAT_WS(' ', clients.surname, clients.`name`, clients.patronymic) as Client_SNP,
            clients.passport,
            clients.discount_percent,
			CONCAT_WS(' ', agents.surname, agents.`name`, agents.patronymic) as Agent_SNP,
            agents.remuneration,
            types_insurance.`type`,
            types_insurance.tariff
            
	 from  contracts
                    JOIN agents ON agents.Id = contracts.id_agent
					JOIN clients ON clients.Id = contracts.id_client
                    JOIN types_insurance ON types_insurance.id = contracts.id_type_insurance
    where
          types_insurance.`type` like "Машина";

end$$

-- Процедура №3
-- Выбирает из таблиц КЛИЕНТЫ и ДОГОВОРЫ информацию о клиентах,
-- заключивших договоры на сумму не меньшую заданной параметром процедуры.
-- Выполнить три вызова
drop procedure if exists InfoClientsByInsurance$$
create procedure InfoClientsByInsurance(in amount double)
begin
     select
             CONCAT_WS(' ', clients.surname, clients.`name`, clients.patronymic) as Client_SNP,
             clients.passport,
             contracts.insurance_amount
      
     from
             contracts
                      JOIN clients ON clients.Id = contracts.id_client
                      JOIN types_insurance ON types_insurance.id = contracts.id_type_insurance
     where
             contracts.insurance_amount >= amount;


end$$

-- Процедура №4
-- Выбирает из таблиц КЛИЕНТЫ, ДОГОВОРЫ и АГЕНТЫ информацию обо всех договорах 
-- (ФИО клиента, Вид страхования, Сумма страхования, Дата заключения договора, ФИО агента), 
-- заключенных в некоторый заданный период времени о страховании имущества. Нижняя и верхняя 
-- границы периода задаются параметрами процедуры. Выполнить три вызова процедуры с разными значениями параметров

drop procedure if exists InfoContractsByDate$$
create procedure InfoContractsByDate(in fromDate date, toDate date)
begin
     select
            CONCAT_WS(' ', clients.surname, clients.`name`, clients.patronymic) as Client_SNP,
            types_insurance.`type`,
            contracts.insurance_amount,
            contracts.date_start,
            CONCAT_WS(' ', agents.surname, agents.`name`, agents.patronymic) as Agent_SNP

	from contracts
                  JOIN agents ON agents.Id = contracts.id_agent
                  JOIN clients ON clients.Id = contracts.id_client
				  JOIN types_insurance ON types_insurance.id = contracts.id_type_insurance
	where
           contracts.date_start between fromDate and toDate;

end$$

-- Процедура №5
-- Вычисляет для каждого договора размер комиссионного вознаграждения агента.
-- Включает поля Дата заключения договора, Фамилия агента, Имя агента, Отчество агента, 
-- Сумма страхования, Комиссионные. Сортировка по полю Дата заключения договора



drop procedure if exists CountRewardAgents$$
create procedure CountRewardAgents()
begin
     select  
           contracts.date_start,
           CONCAT_WS(' ', agents.surname, agents.`name`, agents.patronymic) as Agent_SNP,
		   contracts.insurance_amount,
           agents.remuneration*contracts.insurance_amount as Reward
           
	 from contracts

           JOIN agents ON agents.Id = contracts.id_agent
		   JOIN types_insurance ON types_insurance.id = contracts.id_type_insurance
           
     order by
             contracts.date_start;
end$$

-- Процедура №6
-- Выполняет группировку по полю Код агента в таблице ДОГОВОРЫ. 
-- Для каждой группы вычисляет максимальное и минимальное значение суммы страхования

drop procedure if exists GroupAgents$$
create procedure GroupAgents()
begin
     select
            contracts.id,
             CONCAT_WS(' ', agents.surname, agents.`name`, agents.patronymic) as Agent_SNP,
            Max(contracts.insurance_amount) as Max_Insurance,
			Min(contracts.insurance_amount) as Min_nsurance
            -- contracts.id_agent
     from contracts
          
           JOIN agents ON agents.Id = contracts.id_agent
           
     group by
              agents.id;
              
end$$

-- Процедура №7
-- Выполняет группировку по полю Дата заключения договора для договоров страхования автомобиля.
-- Для каждой группы вычисляет среднее значения по полю Сумма страхования

drop procedure if exists GroupDateContracts$$
create procedure GroupDateContracts()
begin
	 select
           contracts.date_start,
           avg(contracts.insurance_amount) as Avg_Insurance
     from
          contracts 
                   join types_insurance ON types_insurance.id = contracts.id_type_insurance
      where
            types_insurance.`type` like "Машина"
      group by 
              contracts.date_start;
end$$

delimiter ;  -- возврат разделителя






