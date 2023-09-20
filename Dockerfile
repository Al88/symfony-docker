# Usa la imagen oficial de Node.js como base
FROM node:14

# Establece el directorio de trabajo dentro del contenedor
WORKDIR /app

# Copia el resto de los archivos de la aplicación desde /frontend-react
COPY /frontend-react .
# Instala las dependencias del proyecto
RUN npm install

# Compila la aplicación (o ajusta esto según tus necesidades)
#RUN npm run build

# Expone el puerto en el que se ejecutará la aplicación (si es necesario)
EXPOSE 5173

# Comando para iniciar la aplicación React
CMD ["npm", "run","dev"]