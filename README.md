# Random Number API - pure PHP

## Endpoints
`GET /retrive/{id}`

`POST /generate`
## Access (HTTP header):
`x-authorization: x24dN2lr7LrQdssd2eOsqhqSIaUarSTdfe2AfpUy94Vv1q`

## Live demo:
http://izzsfixdij.cfolks.pl/generate

http://izzsfixdij.cfolks.pl/retrive/1

## Responses
### POST /generate (201)

![1](https://user-images.githubusercontent.com/33465063/142688945-6ff50ea5-322a-4894-851c-b63026f17534.jpg)

### GET /retrive/{id} (200)
![2,jpg](https://user-images.githubusercontent.com/33465063/142688951-33054850-a19a-450b-94be-97b04c61c024.jpg)

### Missing API key (403)
![3](https://user-images.githubusercontent.com/33465063/142688963-52aed43f-5590-43e8-be61-726be0db303d.jpg)

### Resource not found (404)
![4](https://user-images.githubusercontent.com/33465063/142688966-bb1e1c57-b6c0-45fc-b99e-825e8faac64e.jpg)
