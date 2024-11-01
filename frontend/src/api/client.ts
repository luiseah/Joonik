import axios, { AxiosHeaders, AxiosInstance, AxiosRequestConfig } from 'axios';

const apiBaseUrl = import.meta.env.VITE_API_BASE_URL;
const apiKey = import.meta.env.VITE_API_KEY;

const config: AxiosRequestConfig = {
  baseURL: apiBaseUrl,
  headers: {
    'X-API-KEY': apiKey,
  } as AxiosHeaders,
};

const client: AxiosInstance = axios.create(config);

export default client;
