# Conda Test Project

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

# Caveats

Frontend may have trouble building with docker.
In that case run `npm run build` and then run docker;