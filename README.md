# Blog
# 1 Перейдите по ссылке https://github.com/yulygf/Blog.git и скачайте архив с проектом. Clone or download/Download Zip.
# 2 Разархивируйте скачанные файлы в каталог, который в файле httpd.conf вашего Apache прописан как DocumentRoot. У меня это каталог "c:/Server/data/htdocs/".
# 3 Необходимо скачать phpMyAdmin, если его нет, по ссылке https://www.phpmyadmin.net/ и разархивировать скачанный каталог в каталог к проекту "c:/Server/data/htdocs/" и переименовать его в phpMyAdmin.
# 4 Далее нужно импортировать БД blog.sql из каталога с проектом в phpMyAdmin. Для этого необходимо зайти в Брайзер, в адресной строке написать http://localhost/phpMyAdmin/ , войти в phpMyAdmin и в меню слева добавить новую БД нажав New. В поле Database name пишем blog и нажимаем Create. Теперь выбираем на созданную БД и нажимаем Import, далее выбираем на файл blog.sql и нажимаем Go.
# 5 Если в вашем phpMyAdmin установлен пароль на вход, то необходимо прописать логин и ваш пароль в первой строке файла config.php из каталога проекта иначе будет выдавать ошибку подключения к БД.
# 6 Для входа в блог в адресной строке написать http://localhost/index.php/ .
# 7 Для роли writer установлен Email: writer@example.com и пароль: Writer123 .
