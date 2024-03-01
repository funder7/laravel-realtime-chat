# Laravel realtime chat

This project was created to verify if:

- Websocket can be used in a regular Laravel app 
- Socket.io (Node) can be used as a replacement for Pusher
- [Laravel Broadcasting documentation](https://laravel.com/docs/10.x/broadcasting) can be used as is
- Check if websocket communication is compatible with the current authentication setup


### Project dependencies

- Laravel 10.x (php 8.1)
- [`composer: beyondcode/laravel-websockets`](https://github.com/beyondcode/laravel-websockets)
- [`composer: pusher/pusher-php-server`]()
- [`npm: laravel-echo`](https://www.npmjs.com/package/laravel-echo)
- [`npm: socket.io`](https://www.npmjs.com/package/socket.io)


- [`composer: laravel/sail`](https://laravel.com/docs/10.x/sail) (optional) configure a ready-to-go environment


## Install

```shell
# add sail as shell command

alias sail='sh $([ -f sail ] && echo sail || echo vendor/bin/sail)'
```

```shell
composer install

sail up -d

sail npm install
```

## Usage

1. `sail npm run dev` -> launch the client (where messages/notifications are received)
2. `sail artisan chat:public-message` -> send public messages to any client listening

## Server configuration

- [**nginx**](https://docs.soketi.app/getting-started/backend-configuration/nginx-configuration)

## Links

- [Stackoverflow: laravel + authenticated pusher client](https://stackoverflow.com/questions/54966575/real-time-react-web-app-with-pusher-and-laravel)


### Credits

https://medium.com/@lfoster49203/building-real-time-applications-with-laravel-and-websockets-1f0e4465ef3a