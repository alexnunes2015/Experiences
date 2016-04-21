#!/bin/sh

################################################################
# Script para instalar e configurar Github no Ubuntu           #
#                                                              #
# Escrito por: Alexandre Nunes (alexandrenunes1331@gmail.com)  #
################################################################

clear

email=""
username=""

while [ "$username" = "" ]
do
	echo -n "Introduza seu nome:"
	read username
	if [ "$username" = "" ]
	then
		clear
		echo "\n\nO nome não pode ficar vazio\n\n"
	fi
done

while [ "$email" = "" ]
do
	echo -n "Introduza seu e-mail:"
	read email
	if [ "$email" = "" ]
	then
		clear
		echo "\n\nE-maul invalido\n\n"
	fi
done

clear
echo "A instalar dependencias do git..."
sudo apt-get install libcurl4-gnutls-dev git-sh libexpat1-dev gettext libz-dev libssl-dev build-essential -y 2>&1 | grep -i "failed\|error"

echo "A descarregar Git..."
sudo apt-get install git-core -y > /dev/nulll
wget https://git-core.googlecode.com/files/git-1.8.1.2.tar.gz 2>&1 | grep -i "failed\|error"
echo "A instalar Git..."
tar -zxf git-1.8.1.2.tar.gz
cd git-1.8.1.2
make prefix=/usr/local all 2>&1 | grep -i "failed\|error"
make prefix=/usr/local install 2>&1 | grep -i "failed\|error"

clear
echo "A configurar... "
git config --global user.name "$username"
git config --global user.email $email
cd ..
rm -r git-1.8.1.2
cd ~/.ssh
clear
sudo ssh-keygen -t rsa -C “$email”
ssh-add id_rsa
sudo apt-get install geomview -y 2>&1 | grep -i "failed\|error"
clear
echo "Agora selecione e copie o seguinte codigo para a area de transferencia"
echo "================================================================================"
cat id_rsa.pub
echo "================================================================================"
echo "e cole na ssh-key em https://github.com/settings/ssh\n\n"
echo "Pressione em ENTER para continuar..."
read tecla
clear
echo "Parabens :) o git esta configurado em seu computador."
echo "Boa programação!"
echo "\n\nEscrito por: Alexandre Nunes\nEmail:alexandrenunes1331@gmail.com"





