##AKTUALIZACJA SYSTEMU
sudo apt update
sudo apt upgrade


##INSTALACJA NGINX
sudo apt install nginx


##INSTALACJA PHP Z REPOZYTORIUM PPA:ONDREJ (VER 8.1)
sudo add-apt-repository ppa:ondrej/php
sudo apt-get update
sudo apt install php8.1-common php8.1-cli
sudo apt install php8.1-{bz2,curl,intl,mysql,mbstring,readline,xml}
sudo apt install php8.1-fpm
sudo apt install zip unzip php-zip


##INSTALACJA MYSQL (VER 8)
cd /tmp
wget https://dev.mysql.com/get/mysql-apt-config_0.8.19-1_all.deb
sudo dpkg -i mysql-apt-config_0.8.19-1_all.deb
sudo apt update
sudo apt install mysql-server


##TYLKO NA SRODOWISKU PROD DODANIE SWAPA JELI ZA MALO RAM!!!!
dd if=/dev/zero of=/swapfile bs=1M count=1024
mkswap /swapfile
swapon /swapfile
ponownie
sudo apt install mysql-server


##DODANIE USERA DO BAZY (DODAJ SWOJEGO I ZMIEN WARTOSC W .ENV.EXAMPLE)
logowanie do mysql shell
mysql -u root
konsola mysql


CREATE USER 'marek'@'localhost' IDENTIFIED BY 'haslo';
GRANT ALL PRIVILEGES ON *.* TO 'marek'@'localhost' WITH GRANT OPTION;
FLUSH PRIVILEGES;
exit


##LOGOWANIE NA NOWYM USER
mysql -u marek -p


##TWORZENIE BAZY 
CREATE DATABASE bizman;


##INSTALACJA COMPOSER (PACKAGE MANAGER PHP)
curl -sS https://getcomposer.org/installer -o composer-setup.php
php composer-setup.php --install-dir=/usr/local/bin --filename=composer
composer --version


##KLONOWANIE REPO
cd /var/www
git clone https://github.com/MarekBawolski/bizman.git
logowanie do githuba (kazdy ma swojego usera)


##INSTALACJA NVM NODE I NPM
curl -o- https://raw.githubusercontent.com/nvm-sh/nvm/v0.38.0/install.sh
curl -o- https://raw.githubusercontent.com/nvm-sh/nvm/v0.38.0/install.sh | bash
source ~/.bashrc
nvm list-remote
nvm install v16.14.2


##INSTALACJA APLIKACJI (PHP DEPENDENCIES)
composer install


##TWORZENIE PLIKU KONFIGURACJI .ENV
cp .env.example .env


##MIGRACJA TABEL W BAZIE DANYCH
php artisan migrate


##POBRANIE JS DEPENDENCIES PRZEZ NPM
npm install
npm run dev


##DODANIE PLIKU KONFIGURACJI NGINX
cp nginx.conf.sample /etc/nginx/sites-available/bizman


##SYMLINK NGINX
cd /etc/nginx/sites-enabled
sudo ln -s ../sites-available/bizman .
ls -l


##DODANIE WPISU DO PLIKU ETC/HOSTS (NP POD LOCALHOST)
nano /etc/hosts
127.0.0.1 bizman.pl


##RESTART NGINX
systemctl restart nginx


##KONFIGURACJA DOSTEPOW DLA GRUPY NGINX
cd /var/www/bizman
sudo chown -R $USER:www-data storage
sudo chown -R $USER:www-data bootstrap/cache


##ZMIANA UPRAWNIEN DLA KATALOGOW
chmod -R 775 storage
chmod -R 775 bootstrap/cache
