# PhpUnit Dashboard
This dashboard enables you to examine the output of a phpunit run by reading the report xml file.

## Local Dev Setup
The easiest way to run this project locally is to use [dde](https://dde.sh).
If you really need to, you should also be able to run it with plain `docker compose` - but this is neither tested nor supported.

## Testing

### Unit Tests
In the `tests/` directory you can find all the unit tests for this project.
You can find the testsuites in the `phpunit.xml.dist` file.
If you need to change the phpunit configuration for you, please copy the dist file to `phpunit.xml` and use that file instead.

### Test The Sending Side
The sending side of this application is located in the `file-watcher/` directory.
You may want to test this part. To do so, copy the following line into a shell of the `web` docker container:

```bash
php file-watcher/index.php /var/www/var/phpunit_output/report.xml 
```

This will execute the file-watcher and give you the output directly in your shell.

