/// <reference types="vite/client" />

interface ImportMetaEnv {
  readonly VITE_API_BASE_URL: string;
  readonly VITE_API_KEY: string;
  // Otras variables de entorno...
}

interface ImportMeta {
  readonly env: ImportMetaEnv;
}