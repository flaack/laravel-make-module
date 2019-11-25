# Resources / References

[Developing Laravel Packages with Local Composer Dependencies](https://laravel-news.com/developing-laravel-packages-with-local-composer-dependencies)
 by: Paul Redmond on Laravel-news

> I am going to walk you through creating a quick Composer package from scratch and adding a service provider. I know a couple of package developers that use a boilerplate repository as a starting point for PHP and Laravel packages (see Spatie’s PHP Skeleton for inspiration).

---

[Bash Alias: composer-link - Require Local Folders as Composer deps](https://calebporzio.com/bash-alias-composer-link-use-local-folders-as-composer-dependancies/)
 by: Caleb Porzio

tl;dr:
```zsh
composer-link() {  
    composer config repositories.local '{"type": "path", "url": "'$1'"}' --file composer.json
}
```

---
