# SmartCube New Milestone
## First Time Installation Guide
1. Prepare joker project files on your own machine:
	```
	tar -zxvf joker-db.tar.gz
	git clone git@github.com:valency/joker-api.git
	git clone git@github.com:valency/joker-ui.git
	```
	You should have three directories: `joker-db`, `joker-api`, and `joker-ui`.
	
1. On deploy server, determine SmartCube container ports:
	```
	docker ps -a
	```
	For example, the ports for `smartcube-base-server1` are:
	- `8081-8082->8081-8082` for spare ports
	- `8443->8443` for API ports
	- `2223->22` for SSH ports
	- `81->8080` for UI ports
	
	Please change the ports of the following steps accordingly.

1. Connect to SmartCube container: 
	```
	ssh -p 2223 smartcube@localhost
	```
	Default password is `SmartCube`.
	
1. Create and import `joker2` project:
	```
	mkdir ~/joker2
	```
	Copy the directories of step 1 to `~/joker2`.
	```
	cd ~/joker2/joker-db/
	psql -h localhost smartcube < import-simple.script
	cd ~/joker2/joker-api/
	vim joker/settings.py
	```
	The following settings of the API server may need to be changed:
	- `SQLITE_DIR` should be `/data/var/`
	- `USER` and `PASSWORD` under `DATABASES` should be `smartcube`
	
	```
	cd ~/joker2/joker-ui/
	vim js/conf.js
	vim components/common.php
	```
	The following settings of the UI server may need to be changed:
	- `API_SERVER` in `js/conf.js` should be `"http://" + location.hostname + ":8082/"`
	- `$DOMAIN` in `components/common.php` shoud be `127.0.0.1:8080`

1. Start API server:
	```
	screen -S joker2
	cd ~/joker2/joker-api/
	python manage.py makemigrations joker_auth
	python manage.py makemigrations joker_model
	python manage.py makemigrations joker_tools
	python manage.py migrate
	python manage.py migrate --database=joker_models
	gunicorn --limit-request-line 1048576 -t 1800 -b 127.0.0.1:8082 joker.wsgi:application
	```
	Press `Ctrl + A, D` to exit screen.
	
1. Start UI server:
	```
	cd ~/local/var/www/html/
	ln -s /home/smartcube/joker2/joker-ui joker2
	```

1. You can test the new system via: `http://xxx/joker2/`, username and password are same as the original system.
	