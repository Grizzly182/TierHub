# Инструкция по развёртыванию приложения

## Требования

- **PHP 8.3.4 (находится в соответствующей папке)**
- **Нода v18.14.2**
- **npm ver. 9.5.0**
- **Composer version 2.4.4**
- **MySql 8+**

## Инструкция

1. Установить все необходимые компоненты, указанные в требованиях;
2. Импортировать дамп базы данных; (файл tierhub.sql)
3. Создать папку в произвольном месте на компьютере (не рекомендуется в системные папки);
4. Разархивировать архив diploma.rar в созданную папку;
5. В папке с проектом в файле .env прописать данные для соединения с MySql;
6. Запустить командную строку (можно и в vs code) и перейти в папку с проектом "cd {Полный_путь_к_папке}"
7. Прописать в командной строке команды (понадобится несколько терминалов):
   - composer install
   - npm i
   - npm run dev (первый терминал)
   - php artisan serve (второй терминал)
8. Поздравляю, проект запущен.

### Если всё пошло через одно место, пишите мне в телеграм - @mikhailb0, разберёмся xD
