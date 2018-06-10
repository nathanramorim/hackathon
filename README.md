### UTILIZANDO A API ###

Podem ser testados os REQUEST a partir do software Postman (https://www.getpostman.com)

OS métodos utilizado de RESQUEST são:

* POST
  - /agentes/location : recebe do dispositivo móvel através de um JSON as informações da localização do agente

  - corpo do JSON a ser enviado
  ´´´´
  {
        "location": {
        	"latitude":"-19.916220357029424",
        	"longitude": "-43.93930030000001"
        }
  }
  ´´´´