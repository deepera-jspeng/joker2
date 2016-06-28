To set up the system:
```
psql -h localhost -U postgres postgres -c "CREATE DATABASE smartcube;"
psql -h localhost -U postgres smartcube -c "CREATE SCHEMA joker2;"
python manage.py migrate
python manage.py migrate --database=joker_models
gunicorn --limit-request-line 1048576 -t 1800 -b 127.0.0.1:9002 joker.wsgi:application
```

The following settings of the API server may need to be changed:
- `SQLITE_DIR` (`/data/var/`) in `joker/settings.py`
- `USER` (`smartcube`) under `DATABASES` in `joker/settings.py`
- `DATA_PATH` (`/home/smartcube/local/...`) in `joker_common/views.py`

The following settings of the UI server may need to be changed:
- `API_PORT` (`443`), `API_PROTOCOL` (`https`) in `js/conf.js`
- `$DOMAIN` (`127.0.0.1:8080`) in `components/common.php`
- `chmod a+w` for `data`, `validation`, and `validation/ground-truth`
