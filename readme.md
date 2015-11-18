##Game Community Plattform based on Laravel 5

##Documentation
copy .env.example to .env and fill the data for DB.

php artisan migrate
php artisan vendor:publish
composer install



## A vHosz can look like...

<VirtualHost *:80>
	ServerName game.local
	ServerAlias www.game.local
	DocumentRoot "C:\xampp\htdocs\game_community\public"

	<Directory "C:\xampp\htdocs\game_community\public">
		AllowOverride All
		Order allow,deny
		Allow from all
	</Directory>
</VirtualHost>

Not available


