
Cobol Microservices Example
Copyright (C) 2016 Gregory Coleman


docker build -t cobol-microservice-example  .

docker run -it -p 7707:7707  cobol-microservice-example  bash

docker run -it -p 7707:7707   gregcoleman/cobol-microservice-example  bash

 curl -H "Content-Type: application/json" http://127.0.0.1:7707

/usr/bin/php -S 0.0.0.0:7707

