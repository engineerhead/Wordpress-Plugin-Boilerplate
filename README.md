The boilerplate includes React for building UI in wordpress admin dashboard, Composer to take advantage PHP ecosystem, and Docker to launch Wordpress easily.

### Prerequistes
Make sure that Nodejs and Docker are installed on your system


1. Clone the git repository.
```
$ git clone https://github.com/engineerhead/Wordpress-Plugin-Boilerplate.git
```

2. You can change the Plugin Name, Namespace for PHP package and other details in `rename.conf.json`. After changing values, execute following in the cloned directory
```
$ node install.js --yes
```
### OR
Simply execute the following command and provide the details on command prompt
```
$ node install.js
```

3. Use the following command to launch the docker compose stack
```
$ docker compose up -d --build
```

4. Once the docker command is finished, access the Wordpress instance at `http://localhost`, setup wordpress.

5. After the Wordpress is setup, acccess it at `localhost:3000` to take advantage of live reload made possible by `Browser Sync` 

## Why Use Docker, Composer, and React Stack to Build a WordPress Plugin

### Docker
- **Environment Consistency:** Ensures the plugin runs identically across all development, testing, and production environments.
- **Isolation:** Keeps dependencies and services separated, reducing conflicts with other projects.
- **Easy Setup:** Simplifies onboarding for new developers with a single command to start the environment.

### Composer
- **Dependency Management:** Handles PHP library dependencies efficiently, ensuring compatibility and easy updates.
- **Autoloading:** Provides PSR-4 autoloading, reducing manual includes and improving code organization.
- **Community Packages:** Access to a vast ecosystem of reusable PHP packages.

### React
- **Modern UI:** Enables building fast, interactive, and dynamic admin interfaces for plugins.
- **Component-Based Architecture:** Promotes code reuse and easier maintenance.
- **Ecosystem Integration:** Leverages modern JavaScript tooling and libraries for enhanced user experiences.

### Combined Stack Benefits
- **Streamlined Development:** Each tool addresses a specific aspect of plugin development, from environment setup to dependency management and UI creation.
- **Scalability:** Facilitates building more complex, maintainable, and scalable plugins.
- **Collaboration:** Makes it easier for teams to collaborate, test, and deploy plugins efficiently.