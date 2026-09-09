# Getting started

To get started with WordPress, I needed to install PHP. In the course, it was 
advised to install either OpenServer (for Windows) or MAMP (for MacOS).

But I am on Linux, so after googling a little and clicking the first link, 
i decided to go with this: [LAMP for Docker](https://github.com/sprintcube/docker-compose-lamp).

1. Clone the repo
```
git clone https://github.com/sprintcube/docker-compose-lamp.git
```

2. Create .env file from sample.env
```
cp sample.env .env
```

3. Customize .env file, in my case these lines
```
# If you already have the port 80 in use, you can change it (for example if you have Apache)
HOST_MACHINE_UNSECURE_HOST_PORT=5000

# If you already have the port 443 in use, you can change it (for example if you have Apache)
HOST_MACHINE_SECURE_HOST_PORT=5001
```

4. Build & run
```
docker compose up
```

5. Open http://localhost:5000 in browser, you should see a page with a blue rectangle with "LAMP STACK"
