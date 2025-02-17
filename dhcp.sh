#!/bin/bash

docker run -it --name dhcp --network raspnetwork --privileged aperezt/tfg:dhcp

echo "Contenedor DHCP lanzado correctamente"

exit
