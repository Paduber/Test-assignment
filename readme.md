Общие положения
	В рамках тестового задания необходимо выполнить создание сценария PHP, который будет успешно запускаться на версиях интерпретатора 5.x - 7.x. Сценарий должен открывать файл XML в текущей папке, разбирать его и выводить в другой файл сценарий SQL, который успешно вставит в заданную таблицу БД значения полей из распознанного XML-файла.
 Результатом выполнения задания (артефактами) являются:
Сценарий на PHP
SQL-файл, созданный сценарием

	Результаты выполнения (файлы) необходимо направить на электронную почту s.sokolko@gmail.com В случае, если возникли вопросы, либо получилось выполнить только часть задания, также можно обращаться по данному электронному адресу.
Описание задачи
	На сайте ЦБ РФ в открытом доступе находится реестр банков (http://www.cbr.ru/s/newbik). Это исходный XML-файл. Нужно написать сценарий, который разбирает записи данного файла и выводит сценарий SQL, который успешно заполнит таблицу bnkseek в БД CRM (описание полей и пример записи таблицы ниже):
	Код следует оформлять максимально в объектно-ориентированном стиле с использованием принципов ООП.

mysql> select * from bnkseek limit 10;
+------+------------------+-----------------------------------------+----------+------------------------------------------------------------+----------------------------------------------------------------------------+----------+----------------------+
| id   | NNP              | ADR                                     | RKC      | NAMEN                                                      | NAMEP                                                                      | NEWNUM   | KSNP                 |
+------+------------------+-----------------------------------------+----------+------------------------------------------------------------+----------------------------------------------------------------------------+----------+----------------------+
| 5035 |                  | П/П 03148                               | 44525000 | БАНКА РОССИИ N 03148                                       | ПУ БАНКА РОССИИ N 03148                                                    | 40012002 |                      |
| 5036 |                  | П/П 83604                               | 44525000 | БАНКА РОССИИ N 83604                                       | ПУ БАНКА РОССИИ N 83604                                                    | 40021002 |                      |
| 5037 |                  | П/П 83524                               | 44525000 | БАНКА РОССИИ N 83524                                       | ПУ БАНКА РОССИИ N 83524                                                    | 40031002 |                      |
| 5038 | БАЙКОНУР         | П/П 25631                               | 44525000 | БАНКА РОССИИ N 25631                                       | ПУ БАНКА РОССИИ N 25631                                                    | 40037002 |                      |
| 5039 |                  | П/П 10513                               | 44525000 | БАНКА РОССИИ N 10513                                       | ПУ БАНКА РОССИИ N 10513                                                    | 40041002 |                      |
| 5040 |                  | П/П 64106                               | 44525000 | БАНКА РОССИИ N 64106                                       | ПУ БАНКА РОССИИ N 64106                                                    | 40047002 |                      |
| 5041 | БИЙСК            | УЛ.ЛЕНИНА,127                           | 40173001 | БИЙСК                                                      | РКЦ БИЙСК                                                                  | 40147000 |                      |
| 5042 | КОСТРОМА         | УЛ.СВЕРДЛОВА,25А                        | 43469001 | МОДУЛЬБАНК                                                 | АО КБ "МОДУЛЬБАНК"                                                         | 43469751 | 30101810800000000751 |
| 5043 | БИЙСК            | УЛ.СОЦИАЛИСТИЧЕСКАЯ,1                   | 40147000 | НАРОДНЫЙ ЗЕМЕЛЬНО-ПРОМЫШЛЕННЫЙ                             | АО "НАРОДНЫЙ ЗЕМЕЛЬНО-ПРОМЫШЛЕННЫЙ БАНК"                                   | 40147781 | 30101810700000000781 |
| 5044 | БАРНАУЛ          | УЛ.Л.ТОЛСТОГО,38А                       | 40173001 | АЛТАЙКАПИТАЛБАНК                                           | ООО КБ "АЛТАЙКАПИТАЛБАНК"                                                  | 40173771 | 30101810900000000771 |
+------+------------------+-----------------------------------------+----------+------------------------------------------------------------+----------------------------------------------------------------------------+----------+----------------------+
10 rows in set (0.00 sec)

mysql> describe bnkseek;
+--------+------------------+------+-----+---------+----------------+
| Field  | Type             | Null | Key | Default | Extra          |
+--------+------------------+------+-----+---------+----------------+
| id     | int(10) unsigned | NO   | PRI | NULL    | auto_increment |
| NNP    | varchar(100)     | YES  |     | NULL    |                |
| ADR    | varchar(255)     | YES  |     | NULL    |                |
| RKC    | int(10) unsigned | YES  |     | NULL    |                |
| NAMEN  | varchar(255)     | YES  |     | NULL    |                |
| NAMEP  | varchar(255)     | YES  |     | NULL    |                |
| NEWNUM | int(10) unsigned | YES  | MUL | NULL    |                |
| KSNP   | varchar(100)     | YES  |     | NULL    |                |
+--------+------------------+------+-----+---------+----------------+
8 rows in set (0.00 sec)

	Здесь id - суррогатный ключ. NEWNUM-БИК (фактически идентифицирует банк).

	Полученный сценарий SQL должен содержать строки вида “INSERT INTO bnkseek ...” (можно по одной строке на одну запись о банке из исходного XML).
	При решении задачи допускается пользоваться библиотеками, которые не требуют установки дополнительных расширений на стандартную версию интерпретатора PHP для Linux (и запустятся на любом хостинге PHP),


