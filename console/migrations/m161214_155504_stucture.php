<?php

use yii\db\Migration;

class m161214_155504_stucture extends Migration
{
    public function up()
    {
		$hash=  '$2y$13$xmbulraCa243W5l/vRsooOmGNm0XPj8EaVPio2c8.TA8Pfluw.9y6';
		this->execute("INSERT INTO `user` (`id`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `status`, `created_at`, `updated_at`) VALUES
(1, 'sale', 'sD8Ys5-y6y_uMcRIdvlYxamZhgtkbfW3', '$hash', NULL, 'sale@mail.ru', 10, 1481458377, 1481458377);");
		this->execute("
		--
		-- Структура таблицы `client`
		--
		
		CREATE TABLE IF NOT EXISTS `client` (
  `ID_client` int(11) NOT NULL,
  `last_name_client` text NOT NULL,
  `first_name_client` text NOT NULL,
  `patronimic_name_client` text NOT NULL,
  `date_birth` date NOT NULL,
  `address` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `client`
--

INSERT INTO `client` (`ID_client`, `last_name_client`, `first_name_client`, `patronimic_name_client`, `date_birth`, `address`) VALUES
(1, 'Иванов', 'Иван', 'Иванович', '1996-12-01', 'ул.Ленина 2-33'),
(2, 'Петров', 'Петр', 'Петрович', '2016-12-02', 'Романова 23-39'),
(3, 'Сидоров', 'Сидор', 'Сидорович', '2016-12-03', 'Орджоникидзе 12-65'),
(4, 'Витальев', 'Виталий', 'Витальевич', '1995-12-01', 'Макаренко 34-91'),
(6, 'Максимов', 'Максим', 'Максимович', '2014-12-11', 'Титова 11-55'),
(7, 'Сергеев', 'Сергей', 'Сергеевич', '1965-11-12', 'Катодная 16-82');

-- --------------------------------------------------------

--
-- Структура таблицы `goods`
--

CREATE TABLE IF NOT EXISTS `goods` (
  `ID_goods` int(11) NOT NULL,
  `name_goods` text NOT NULL,
  `weight_goods` int(11) NOT NULL,
  `price_goods` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `goods`
--

INSERT INTO `goods` (`ID_goods`, `name_goods`, `weight_goods`, `price_goods`) VALUES
(1, 'Морфин', 100, 210),
(2, 'Тизанидин', 50, 135),
(3, 'Кетопрофен', 150, 200),
(5, 'Лоратадин', 300, 300),
(6, 'Фенитоин', 500, 500);


-- --------------------------------------------------------

--
-- Структура таблицы `order`
--

CREATE TABLE IF NOT EXISTS `order` (
  `ID_order` int(11) NOT NULL,
  `ID_client` int(11) NOT NULL,
  `ID_goods` int(11) NOT NULL,
  `quantity_goods` int(11) NOT NULL,
  `status_order` tinyint(4) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `order`
--

INSERT INTO `order` (`ID_order`, `ID_client`, `ID_goods`, `quantity_goods`, `status_order`) VALUES
(1, 1, 1, 2, 0),
(2, 3, 3, 4, 1),
(3, 2, 3, 1, 0),
(5, 1, 2, 21, 1),
(6, 4, 2, 5, 0),
(7, 6, 5, 34, 0);


--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`ID_client`);

--
-- Индексы таблицы `goods`
--
ALTER TABLE `goods`
  ADD PRIMARY KEY (`ID_goods`);


--
-- Индексы таблицы `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`ID_order`),
  ADD KEY `ID_client` (`ID_client`),
  ADD KEY `ID_goods` (`ID_goods`);


--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `client`
--
ALTER TABLE `client`
  MODIFY `ID_client` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT для таблицы `goods`
--
ALTER TABLE `goods`
  MODIFY `ID_goods` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT для таблицы `order`
--
ALTER TABLE `order`
  MODIFY `ID_order` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `order_ibfk_1` FOREIGN KEY (`ID_client`) REFERENCES `client` (`ID_client`),
  ADD CONSTRAINT `order_ibfk_2` FOREIGN KEY (`ID_goods`) REFERENCES `goods` (`ID_goods`);
")
    }

    public function down()
    {
        echo "m161214_155504_stucture cannot be reverted.\n";

        return false;
    }

    /*
    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
    }

    public function safeDown()
    {
    }
    */
}
