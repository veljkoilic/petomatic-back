# Petomatic App backend code

## API specification

### Staff
#### GET - /staff - `List of all the staff` 

```
Returns:
{
    "name":string,
    "lastname": string,
    "email": string,
    "password" : string 
}
parameters - "id"

responses:
{
    "code": 200,
    "description": "Successfull request."
}

{
    "code": 400,
    "description": "Invalid id."
}
```
#### DELETE - /staff?id - `Delete a specified user`
```
parameters - "id"

responses:
{
    "code": 200,
    "description": "Deletion successfull.",
}
{
    "code": 500,
    "description": "Internal Server error.",
}

```
#### POST - /staff - `Create a new user` 

```
Requires:
{
    "name":string,
    "lastname": string,
    "email": string,
    "password" : string 
}
responses:
{
    "code": 200,
    "description": "User created.",
}
{
    "code": 400,
    "description": "Invalid information input.",
}
```

#### PUT - /staff?id - `Edit  an exsisting user` 

```
Optional:
{
    "name":string,
    "lastname": string,
    "email": string,
    "password" : string 
}
parameters - "id"

responses:
{
    "code": 200,
    "description": "Changes to the user applied.",
}
{
    "code": 400,
    "description": "Invalid information input.",
}
{
    "code": 500,
    "description": "Internal Server error.",
}

```

### Clients

#### GET - /clients - `List of all clients` 

```
Returns:
{
    "name":string,
    "lastname": string,
    "image": string
}
parameters - "id"

responses:
{
    "code": 200,
    "description": "OK."
}

{
    "code": 400,
    "description": "Invalid id."
}
```
#### POST - /clients - `Create a new client` 

```
Requires:
{
    "name":string,
    "lastname": string,
}
Optional:
{
    "image": string
}
responses:
{
    "code": 200,
    "description": "Client created.",
}
{
    "code": 400,
    "description": "Invalid information input.",
}
```
#### PUT - /client?id - `Edit  an exsisting client` 

```
Optional:
{
    "name":string,
    "lastname": string,
    "image":string
}
parameters - "id"

responses:
{
    "code": 200,
    "description": "Changes to the user applied.",
}
{
    "code": 400,
    "description": "Invalid information input.",
}
{
    "code": 500,
    "description": "Internal Server error.",
}

```
#### DELETE - /client?id - `Delete a specified client`
```
parameters - "id"

responses:
{
    "code": 200,
    "description": "Deletion successfull.",
}
{
    "code": 500,
    "description": "Internal Server error.",
}

```

### Visits
#### GET - /visits - `List of all visits` 

```
Returns:
{
    "id":int,
    "client_id":int,
    "pets_id": int,
    "staff_id":int,
    "date": date,
    "long_description": string,
    "short_description": string,
    "type": string,
    "diagnosis": string",
    "photo": string
}
parameters - "client_id", "pet_id"

responses:
{
    "code": 200,
    "description": "OK."
}

{
    "code": 400,
    "description": "Invalid id."
}
```
#### POST - /visits - `Create a new visit` 

```
Requires:
{
    "id":int,
    "client_id":int,
    "pets_id": int,
    "staff_id":int,
    "date": date,
}
Optional:
{
    "long_description": string,
    "short_description": string,
    "type": string,
    "diagnosis": string",
    "photo": string
}
responses:
{
    "code": 200,
    "description": "Visit created.",
}
{
    "code": 400,
    "description": "Invalid information input.",
}
```
#### PUT - /visit?id - `Edit  an exsisting visit` 

```
Optional:
{
    "id":int,
    "client_id":int,
    "pets_id": int,
    "staff_id":int,
    "date": date,
    "long_description": string,
    "short_description": string,
    "type": string,
    "diagnosis": string",
    "photo": string
}
parameters - "id"

responses:
{
    "code": 200,
    "description": "Changes to the visit applied.",
}
{
    "code": 400,
    "description": "Invalid information input.",
}
{
    "code": 500,
    "description": "Internal Server error.",
}

```
#### DELETE - /visit?id - `Delete a specified client`
```
parameters - "id"

responses:
{
    "code": 200,
    "description": "Deletion successfull.",
}
{
    "code": 500,
    "description": "Internal Server error.",
}

```
### Pets
#### GET - /clients/pets - `Lists all pets`
```
Returns:
{
    "id":int,
    "breeds_id": int,
    "name": string,
    "species": string,
    "photo": string
}
parameters - "id", "user_id"

responses:
{
    "code": 200,
    "description": "Successfull request."
}

{
    "code": 400,
    "description": "Invalid id."
}
```
#### POST - /clients/pets - `Create a new pet`
```
Requires:
{
    "id":int,
    "breeds_id": int,
    "name": string,
    "species": string,
    "photo": string
}
parameters - "id", "user_id"

responses:
{
    "code": 200,
    "description": "Successfull request."
}

{
    "code": 400,
    "description": "Invalid id."
}
```
#### PUT - /client/pets?id - `Edit  an exsisting visit` 

```
Optional:
{
    "id":int,
    "breeds_id": int,
    "name": string,
    "species": string,
    "photo": string
}
parameters - "id"

responses:
{
    "code": 200,
    "description": "Changes to the pet applied.",
}
{
    "code": 400,
    "description": "Invalid information input.",
}
{
    "code": 500,
    "description": "Internal Server error.",
}

```
#### DELETE - /client/pets?id - `Delete a specified pet`
```
parameters - "id"

responses:
{
    "code": 200,
    "description": "Deletion successfull.",
}
{
    "code": 500,
    "description": "Internal Server error.",
}

```
