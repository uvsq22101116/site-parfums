# Utilise une image de base légère d'un serveur web
FROM nginx:alpine

# Définit le répertoire de travail à l'intérieur du conteneur
WORKDIR /usr/share/nginx/html

# Copie tout le contenu de ton dossier public vers le serveur web dans le conteneur
COPY ./public /usr/share/nginx/html

# Le port sur lequel Nginx écoute
EXPOSE 80