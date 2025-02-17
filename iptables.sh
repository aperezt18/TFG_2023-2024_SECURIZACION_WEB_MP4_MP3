#!/bin/bash

sudo iptables -t nat -A PREROUTING -p tcp --dport 80 -j DNAT --to-destination 192.168.1.3:80
sudo iptables -t nat -A PREROUTING -p udp --dport 53 -j DNAT --to-destination 192.168.1.4:53
sudo iptables -t nat -A PREROUTING -p udp --dport 67 -j DNAT --to-destination 192.168.1.2:67
sudo iptables -t nat -A PREROUTING -p udp --dport 68 -j DNAT --to-destination 192.168.1.2:68

sudo iptables -A FORWARD -p tcp --dport 80 -j ACCEPT
sudo iptables -A FORWARD -p udp --dport 53 -j ACCEPT
sudo iptables -A FORWARD -p udp --dport 67 -j ACCEPT
sudo iptables -A FORWARD -p udp --dport 68 -j ACCEPT

sudo iptables -A INPUT -p tcp --dport 22 -j ACCEPT  # Permitir SSH
sudo iptables -A INPUT -p tcp --dport 80 -j ACCEPT  # Permitir HTTP
sudo iptables -A INPUT -p udp --dport 53 -j ACCEPT  # Permitir DNS
sudo iptables -A INPUT -p udp --dport 67 -j ACCEPT  # Permitir DHCP
sudo iptables -A INPUT -p udp --dport 68 -j ACCEPT  # Permitir DHCP
sudo iptables -A INPUT -p icmp -j ACCEPT  # Permitir ping
sudo iptables -P INPUT DROP  # Bloquear todo lo demás
sudo iptables -P FORWARD DROP  # Bloquear todo lo demás
sudo iptables -P OUTPUT ACCEPT  # Permitir todo el tráfico saliente

