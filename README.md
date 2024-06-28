## Deployment

To deploy this project run

Copy `env` to `.env`. Set the value according to your setup

```bash
  CI_ENVIRONMENT = development

  app.baseURL = 'http://localhost:8080/'

  database.default.hostname = localhost
  database.default.database = yourdatabase
  database.default.username = yourusername
  database.default.password = yourpassword
  database.default.DBDriver = MySQLi
  database.default.DBPrefix =
  database.default.port = 3306
```

Run the migration

```bash
  php spark migrate
```

Run the Database Seeder

```bash
  php spark db:seed
```

Serve the app

```bash
  php spark serve
```

You can login with default account

```bash
  username: admin1
  password: password123
```
