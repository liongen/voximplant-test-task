init project:

```
composer install
```

run server:

```
php bin/console server:run
```

test math calculation:

```
curl 'http://127.0.0.1:8000/(256*1024)/128'
// will output: 2048

curl 'http://127.0.0.1:8000/3/0'
// will output: Division by zero.

curl 'http://127.0.0.1:8000/(0.4+0.1)'
// will output: 0.5

curl 'http://127.0.0.1:8000/((0.4+0.1)'
// will output: Unable to match delimiters
```

run tests:

```
php bin/phpunit
```