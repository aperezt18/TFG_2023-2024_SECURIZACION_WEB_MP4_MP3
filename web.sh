#!/bin/bash

docker run -it --name web --network raspnetwork --mac-address 00:00:00:00:00:03 -p 80:80 --privileged aperezt/tfg:web

echo "Contenedor Web lanzado correctamente"

exit
