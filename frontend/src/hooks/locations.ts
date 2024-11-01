// src/hooks/useFetchLocations.ts
import { useEffect, useState } from 'react';
import { getLocations, Location } from '../api/services/locationService';


const useFetchLocations = () => {
  const [locations, setLocations] = useState<Location[]>([]);
  const [error, setError] = useState<Error | null>(null);

  useEffect(() => {
    const fetchLocations = async () => {
      try {
        const data = await getLocations();
        setLocations(data);
      } catch (err) {
        console.error('Error fetching locations:', err);
        setError(err as Error);
      }
    };

    fetchLocations();
  }, []);

  return { locations, error };
};

export default useFetchLocations;
