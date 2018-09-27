# UB Clinica Virtual


> Description of the project in one line

- [API Live DEMO](https://www.ubclinicavirtual.tk/api/v1) - An operating DEMO of the api

## Table of contents

- [Features](#features)
- [Getting started](#getting-started)
- [Methods](#methods)
- [Contributing](#contributing)
- [Versioning](#versioning)
- [License](#license)

## Features

- Register through gmail api

## Getting started

### Installation

#### Installation on windows ( mysql + php + IIS)
- Get IIS
- Get PHP 7
- Get MySQL
- Get Composer
- Configure IIS
- Download from github
- Configure .env file
- Install google api via Composer(to rework)


### Usage

## Methods

### Register with gmail

- uri: /register
- method: `'POST'`
- headers:
  - `Accept`: `application/json`
  - `Content-Type`: `application/json`
- body:
```json
{
	"access_token":"VALID_GMAIL_ACCESS_TOKEN"
}
```

- response:
```json
{
    "data": {
        "id": 6,
        "name": "walter ub",
        "email": "ubelarga@gmail.com",
        "email_verified_at": null,
        "created_at": "2018-09-20 17:30:52",
        "updated_at": "2018-09-27 15:06:20",
        "api_token": "HoFcCOSgtjyfD5GELBuyQ3xHZasPiBSyqGsFeDsYLXj4BewYcIEOvyqAn0iZ",
        "active": 1
    },
    "gmail": {
        "name": "walter ub",
        "email": "ubelarga@gmail.com"
    }
}
```
  
### Login with gmail

- uri: /login
- method: `'POST'`
- headers:
  - `Accept`: `application/json`
  - `Content-Type`: `application/json`
- body:
```json
{
	"access_token":"VALID_GMAIL_ACCESS_TOKEN"
}
```

- response:
```json
{
    "data": {
        "id": 6,
        "name": "walter ub",
        "email": "ubelarga@gmail.com",
        "email_verified_at": null,
        "created_at": "2018-09-20 17:30:52",
        "updated_at": "2018-09-27 15:06:20",
        "api_token": "HoFcCOSgtjyfD5GELBuyQ3xHZasPiBSyqGsFeDsYLXj4BewYcIEOvyqAn0iZ",
        "active": 1
    },
    "gmail": {
        "name": "walter ub",
        "email": "ubelarga@gmail.com"
    }
}
```  

### Get the general user information based in the api_token

- uri: /user
- method: `'GET'`
- headers:
  - `Accept`: `application/json`
  - `Content-Type`: `application/json`
  - `Authorization`: `Bearer AN_API_TOKEN`
- body:
```json
{}
```

- response:
```json
{
    "id": 6,
    "name": "walter ub",
    "email": "ubelarga@gmail.com",
    "email_verified_at": null,
    "created_at": "2018-09-20 17:30:52",
    "updated_at": "2018-09-27 15:06:20",
    "api_token": "HoFcCOSgtjyfD5GELBuyQ3xHZasPiBSyqGsFeDsYLXj4BewYcIEOvyqAn0iZ",
    "active": 1
}
```

### Logout with an api_token

- uri: /logout
- method: `'POST'`
- headers:
  - `Accept`: `application/json`
  - `Content-Type`: `application/json`
  - `Authorization`: `Bearer AN_API_TOKEN`
- body:
```json
{}
```

- response:
```json
{
    "data": "User logged out."
}
```

### Deactivate a user's account with an api_token
> This method deactivates the full user's account, so you cant operate as patient, hpc or clinic anymore.

- uri: /deactivate
- method: `'POST'`
- headers:
  - `Accept`: `application/json`
  - `Content-Type`: `application/json`
  - `Authorization`: `Bearer AN_API_TOKEN`
- body:
```json
{}
```

- response:
```json
{
    "data": "User deactivated."
}
```

### Add the clinic profile to the user's account with an api_token

- uri: /user/clinic
- method: `'POST'`
- headers:
  - `Accept`: `application/json`
  - `Content-Type`: `application/json`
  - `Authorization`: `Bearer AN_API_TOKEN`
- body:
```json
{
	"business_name": "clinica san martin"
}
```

- response:
```json
{
    "clinic": {
        "id": 6,
        "business_name": "clinica san martin",
        "created_at": "2018-09-26 13:04:57",
        "updated_at": "2018-09-27 15:11:09"
    }
}
```

### Search a clinic by likely business_name

- uri: /clinic/search
- method: `'POST'`
- headers:
  - `Accept`: `application/json`
  - `Content-Type`: `application/json`
  - `Authorization`: `Bearer AN_API_TOKEN`
- body:
```json
{
	"business_name": "martin"
}
```

- response:
```json
{
    "clinics": [
        {
            "id": 6,
            "business_name": "clinica san martin",
            "created_at": "2018-09-26 13:04:57",
            "updated_at": "2018-09-26 13:04:57"
        }
    ]
}
```

### Add the patient profile to the user's account with an api_token

- uri: /user/patient
- method: `'POST'`
- headers:
  - `Accept`: `application/json`
  - `Content-Type`: `application/json`
  - `Authorization`: `Bearer AN_API_TOKEN`
- body:
```json
{
}
```

- response:
```json
{
    "clinic": {
        "id": 6,
        "created_at": "2018-09-26 13:04:57",
        "updated_at": "2018-09-27 15:11:09"
    }
}
```

### Search a patient

- uri: /patient/search
- method: `'POST'`
- headers:
  - `Accept`: `application/json`
  - `Content-Type`: `application/json`
  - `Authorization`: `Bearer AN_API_TOKEN`
- body:
```json
{
    "msg": "unimplemented method"
}
```

- response:
```json
{
    "clinics": [
        {
            "id": 6,
            "business_name": "clinica san martin",
            "created_at": "2018-09-26 13:04:57",
            "updated_at": "2018-09-26 13:04:57"
        }
    ]
}
```

[? back to top](#table-of-contents)

## Contributing

Please read through our [contributing guidelines](.github/CONTRIBUTING.md).

## Versioning

Maintained under the [Semantic Versioning guidelines](https://semver.org/).

## License

[MIT](https://opensource.org/licenses/MIT) � ???

[? back to top](#table-of-contents)