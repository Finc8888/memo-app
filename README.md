# Memo aplication

## Command for instalation
```bash
curl -s https://laravel.build/example-app | bash
```
## Run application
1. Add alias for sail
```bash
alias sail='[ -f sail ] && sh sail || sh vendor/bin/sail'
```
Extra if you are not a creator of repositorty
1.1 [Pull composer dependency](https://laravel.com/docs/10.x/sail#installing-composer-dependencies-for-existing-projects)
```bash
docker run --rm \
    -u "$(id -u):$(id -g)" \
    -v "$(pwd):/var/www/html" \
    -w /var/www/html \
    laravelsail/php82-composer:latest \
    composer install --ignore-platform-reqs
```
2. Copy .env.example like .env
2.1 Run docker using sail
```bash
sail up
```
## Integration with React
[Link](https://www.endpointdev.com/blog/2021/05/integrating-laravel-with-a-react-frontend/)
2.2 Generate API key into UI