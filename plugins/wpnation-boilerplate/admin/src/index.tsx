import { createRoot } from '@wordpress/element';
import App from './components/app';

const root = document.getElementById('wpnboilerplate-admin-root');

createRoot(root).render(<App />);

