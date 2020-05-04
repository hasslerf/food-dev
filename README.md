# foodcoopshop.docker

This repo could help you in rapidly setting up a clean, empty foodcoopshop-instance in a local Docker-Environment to start coding really fast.


## Startup

Clone Foodcoopshop-Repo and this repo into the same directory:
```
[florian@laptop git]$ ls
foodcoopshop  foodcoopshop.docker
```

Make sure, you have an empty `db`-Directory in the `.docker`-Dir. This is the place where the Database-Data is saved.

In the docker-directory run `docker-compose up -d` to start up you development-environment.

Calling `docker ps` should show you the running containers which are 
- **food-cake**: http://localhost
- **food-db**: MySQL-Server, you can connect local on Port 3306
- **food-mailhog**: Mailcatcher to catch Mails and not send them out. Set smtp-Server to `food-mailhog` with Port `1025`
- **food-adminer**: Adminer that runs on http://localhost:8080 the MySQL-Root-Password is in the `docker-compose`-file.


## Now it's time for some fun:

1. Follow the Database -Instructions from here: https://foodcoopshop.github.io/en/installation-guide#database-setup. Remember: You already have a Web-Interface to manage you database at http://localhost:8080 running!
2. Hop onto your webserver to install the dependencies. Therefore open a shell on your docker-webserver and  `docker exec -it food-cake bash` and run
   - `composer install` to install some PHP-Libraries and 
   - `npm --prefix ./webroot install ./webroot` to install JavaScript-Dependencies.
3. Follow the credentials-paragraph from the installation guide too, but set SMTP-Server to `food-mailhog` at Port `1025` with empty credentials.
4. Same with the `custom_config.php`
5. After adding a Supercustomer (use the same data as you entered in the `credentials.config`) change it's Customer-Role to `5` and set it to `1`(active). This is a good time to see the Mail-Catcher in action! Open http://localhost:8025 and see incoming mails.
6. To get the full experience out of CakePHP and the foodcoopshop your local domain should end to `.test`. Maybe you want to customize your local hosts-File and add the line `127.0.0.1	food.test`. Calling http://food.test shows the red Debug-Bar-Icon on the bottom right corner.

## It failed?

If anything does not work as expected always read the README and the installation Guide first:
- https://github.com/foodcoopshop/foodcoopshop/blob/develop/README.md
- https://foodcoopshop.github.io/en/installation-guide

There is a `helpster`-directory in this repo with some dummy-config-files you can compare with your local ones

Afterwards, and only if you expect this setup to fail, add an issue.