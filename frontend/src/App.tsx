import * as React from 'react';
import Container from '@mui/material/Container';
import Typography from '@mui/material/Typography';
import Card from '@mui/material/Card';
import CardContent from '@mui/material/CardContent';
import Grid from '@mui/material/Grid';
import Box from '@mui/material/Box';
import Link from '@mui/material/Link';
import ProTip from './ProTip';

interface Location {
  id: number;
  name: string;
  description: string;
}

const locations: Location[] = [
  { id: 1, name: 'Location A', description: 'Description of Location A' },
  { id: 2, name: 'Location B', description: 'Description of Location B' },
  { id: 3, name: 'Location C', description: 'Description of Location C' },
];

const LocationCard: React.FC<{ location: Location }> = ({ location }) => {
  return (
    <Card>
      <CardContent>
        <Typography variant="h5" component="div">
          {location.name}
        </Typography>
        <Typography variant="body2" color="text.secondary">
          {location.description}
        </Typography>
      </CardContent>
    </Card>
  );
};


function Copyright() {
  return (
    <Grid container spacing={2} padding={2}>
      {locations.map((location) => (
        <Grid item xs={12} sm={6} md={4} key={location.id}>
          <LocationCard location={location} />
        </Grid>
      ))}
    </Grid>
  );
}

export default function App() {
  return (
    <Container maxWidth="sm">
      <Box sx={{ my: 4 }}>
        <Typography variant="h4" component="h1" sx={{ mb: 2 }}>
          Material UI Create React App example in TypeScript
        </Typography>
        <ProTip />
        <Copyright />
      </Box>
    </Container>
  );
}
