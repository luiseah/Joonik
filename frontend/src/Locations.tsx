import { useEffect, useState } from 'react';
import { Card, CardContent, CardMedia, Grid2 as Grid, Typography } from '@mui/material';
import { getLocations, Location } from './api/services/locationService';
import useFetchLocations from './hooks/locations';

const Locations: React.FC = () => {
  const { locations, error } = useFetchLocations();

  if (error) {
    return <p>Error loading locations: {error.message}</p>;
  }

  return (
    <Grid container spacing={{ xs: 2, md: 3 }} columns={{ xs: 4, sm: 8, md: 12 }} justifyContent="center">
      {locations.map((location) => (
        <Grid item xs={12} sm={6} md={4} key={location.id}>
          <Card style={{ width: 400, height: 300, display: 'flex', flexDirection: 'column' }}>
            <CardMedia component="img" height="250" image={location.image} alt={location.name}/>
            <CardContent>
              <Typography variant="h5">#{location.id} - {location.name}</Typography>
              <Typography variant="body2" color="textSecondary">
                Creado: {new Date(location.created_at).toLocaleDateString()}
              </Typography>
            </CardContent>
          </Card>
        </Grid>
      ))}
    </Grid>
  );
};

export default Locations;
