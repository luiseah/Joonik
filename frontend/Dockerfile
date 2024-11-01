# frontend/Dockerfile
FROM node:20-alpine

WORKDIR /app

# Install app dependencies
COPY package*.json ./
RUN npm install

# Copy app source code
COPY . .

# Build the app
#RUN npm run build

# Expose port
EXPOSE 80

CMD ["npm", "start"]
