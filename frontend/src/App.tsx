import './App.css'
import Locations from './Locations';
import { Container, Typography } from '@mui/material';
function App() {
  return (
    <>
      <Container>
        <Typography variant="h4" component="h1" gutterBottom>
          List of Locations
        </Typography>
        <Locations />
      </Container>
    </>
  )
}

export default App
