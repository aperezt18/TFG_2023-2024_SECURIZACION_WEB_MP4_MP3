#!/bin/bash

# Actualizar el sistema
sudo apt-get update && sudo apt-get upgrade -y

# Instalar Docker si no está instalado
if ! command -v docker &> /dev/null; then
    echo "Docker no está instalado. Instalando Docker..."
    sudo apt-get install -y apt-transport-https ca-certificates curl gnupg lsb-release
    curl -fsSL https://download.docker.com/linux/ubuntu/gpg | sudo gpg --dearmor -o /usr/share/keyrings/docker-archive-keyring.gpg
    echo "deb [arch=$(dpkg --print-architecture) signed-by=/usr/share/keyrings/docker-archive-keyring.gpg] https://download.docker.com/linux/ubuntu $(lsb_release -cs) stable" | sudo tee /etc/apt/sources.list.d/docker.list > /dev/null
    sudo apt-get update
    sudo apt-get install -y docker-ce docker-ce-cli containerd.io
    sudo usermod -aG docker $USER
    echo "Docker instalado correctamente. Por favor, cierra sesión y vuelve a iniciarla para aplicar los cambios de grupo."
    exit 0
else
    echo "Docker ya está instalado."
fi

#Instalar Fail2Ban
if ! command -v fail2ban &> /dev/null; then
    echo "Fail2Ban no está instalado. Instalando..."
    sudo apt-get install -y fail2ban
    echo "Fail2Ban instalado correctemente"
    sudo cp /etc/fail2ban/jail.conf /etc/fail2ban/jail.local
else
    echo "Fail2Ban ya está instalado."
fi


# Descargar las imágenes de DockerHub
docker pull aperezt/tfg:web
docker pull aperezt/tfg:dhcp
docker pull aperezt/tfg:dns

# Crear la red
docker network create --driver bridge --subnet 192.168.1.0/29 raspnetwork

echo "Todos los contenedores han sido descargados correctamente."

exit
