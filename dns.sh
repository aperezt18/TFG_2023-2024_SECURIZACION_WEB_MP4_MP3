#!/bin/bash

docker run -it --name dns --network raspnetwork --mac-address 00:00:00:00:00:04 -port 53:53/udp --privileged aperezt/tfg:dns

echo "Contenedor DNS lanzado correctamente"

exit
