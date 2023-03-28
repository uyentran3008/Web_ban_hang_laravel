echo "Testing PSR-2"
./vendor/bin/phpcs --standard=PSR2 app/Traits
./vendor/bin/phpcs --standard=PSR2 app/Models
./vendor/bin/phpcs --standard=PSR2 app/Http/Controllers
./vendor/bin/phpcbf --standard=PSR2 app/Traits
./vendor/bin/phpcbf --standard=PSR2 app/Models
./vendor/bin/phpcbf --standard=PSR2 app/Http/Controllers
