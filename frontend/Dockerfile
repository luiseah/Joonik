# frontend/Dockerfile
FROM node:20-alpine

WORKDIR /app

# Install app dependencies
COPY package*.json ./
RUN npm install

# Copy app source code
COPY . .

COPY .env.example .env

# Build the app
#RUN npm run build

# Expose port
EXPOSE 3000

CMD ["npm", "run", "dev"]
