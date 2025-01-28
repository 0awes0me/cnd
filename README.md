# Conda Test Project

# Setup

Update hosts file to contain following two lines

```
127.0.0.1 cnd_vue
127.0.0.1 cnd_laravel
```

### Hosts file location

#### macOS

`/etc/hosts`

#### Windows

`c:\Windows\System32\Drivers\etc\hosts.`


# Run the project

RUN `docker-compose up --build`

Frontend url : [http://cnd_vue.test](http://cnd_vue.test)

Backend url : [http://cnd_vue.test](http://cnd_vue.test)

# Access

## [Application admin](http://cnd_laravel.test/admin)

Username and password can be found in  `cnd_laravel/database/seeders/DatabaseSeeder.php`

# Backend

Unusual laravel project architecture; Instead of controllers we use Actions inside domains;

Domain file structure:

    - Domains  
        - DomainName
            - Actions
                - GetItems
                - DeleteItem
            - Models
                - ItemModel
            - ETC

