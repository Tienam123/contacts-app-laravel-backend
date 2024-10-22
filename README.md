<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>


## О проекте

ContactsApp — это удобное приложение для управления вашими контактами с простым и интуитивно понятным интерфейсом. Мы стремимся сделать процесс организации ваших контактов быстрым и легким, предоставляя вам инструменты, которые делают управление контактами удобным и эффективным. В нашем приложении реализованы такие функции, как:

- Простая и быстрая система добавления и редактирования контактов
- Возможность группировки контактов для упрощенного поиска и организации
- Удобный поиск с помощью фильтров и тегов
- Надежная защита данных
- Встроенная возможность быстрой отправки сообщений или вызовов прямо из приложения.

Мы стремимся создать идеальный инструмент для поддержания ваших деловых и личных связей!

# Запуск  

- Для того что бы запустить проект вам необходимо настроить конфигурацию веб сервера
- Перед началом работы с API необходимо послать запрос на `http://имя сервера/sanctum/csrf-cookie ` и вам будут установлены cookie для подальшей работы. 
- Затем вам необходимо добавить эту cookie в headers перед отправкой запроса.

## Routes :

- `GET` `contacts.hws.dp.ua/api/user` - return current user
```javascript
{
    "id": 2,
        "name": "Maksim",
        "email": "dr.tienam1234@gmail.com",
        "image": null,
        "email_verified_at": null,
        "created_at": "2024-10-22T15:21:45.000000Z",
        "updated_at": "2024-10-22T15:21:45.000000Z"
}
```

- `POST` `contacts.hws.dp.ua/login` - login user
```javascript
{
    "status": true,
        "message": "Login Successful",
        "name": {
        "id": 2,
            "name": "Maksim",
            "email": "dr.tienam1234@gmail.com",
            "image": null,
            "email_verified_at": null,
            "created_at": "2024-10-22T15:21:45.000000Z",
            "updated_at": "2024-10-22T15:21:45.000000Z"
    },
    "token": "3|AvkbGdGKhRM9KCTrZzROAogTP0gzuTZc8WsQ8v7w64fdba2b"
}
```
-  `POST`  `contacts.hws.dp.ua/register` - register user
```javascript
{
    "user": {
        "name": "Maksim",
            "email": "dr.tienam12345@gmail.com",
            "updated_at": "2024-10-22T15:52:06.000000Z",
            "created_at": "2024-10-22T15:52:06.000000Z",
            "id": 3
    },
    "message": "User registered successfully. Please check your email for a verification link."
}
```

- `GET` `contacts.hws.dp.ua/api/contacts` -  get all contacts
```javascript

{
    "data": [
    {
        "id": 2,
        "name": "Vladyslav",
        "surname": null,
        "phone": "+39752323",
        "email": "dr.tienam23@gmail.com",
        "image": "",
        "is_favorite": 0
    }
],
    "meta": {
    "current_page": 1,
        "last_page": 1,
        "per_page": 5,
        "total": 1
},
    "links": {
    "first_page_url": "http:\/\/contacts.hws.dp.ua\/api\/contacts?page=1",
        "last_page_url": "http:\/\/contacts.hws.dp.ua\/api\/contacts?page=1",
        "prev_page_url": null,
        "next_page_url": null
}
}
```


- `GET` `contacts.hws.dp.ua/api/contacts/id` -  get contact by ID
```javascript
{
    "id": 1,
        "name": "Vladyslav",
        "surname": null,
        "phone": "+39752323",
        "email": "dr.tienam23@gmail.com",
        "image": "",
        "is_favorite": 0
}
```


- `POST` `contacts.hws.dp.ua/api/contacts/` -  create contact
```javascript
{
    "id": 3,
        "name": "Vladyslav",
        "surname": null,
        "phone": "+39752323",
        "email": "dr.tienam23@gmail.com",
        "image": "",
        "is_favorite": false
}
```
