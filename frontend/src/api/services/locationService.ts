// src/services/locationService.ts
import api from '../client.ts';

export interface Location {
  id: string;
  name: string;
  image: string;
  created_at: string;
}

export const getLocations = async (): Promise<Location[]> => {
  const response = await api.get<Location[]>('/locations');

  console.log({response});

  return response.data.data;
};
