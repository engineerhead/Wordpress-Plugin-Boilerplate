import { createRoot } from '@wordpress/element';
import App from './components/app';

const root = document.getElementById('ClouduskBoilerplate-admin-root');

if (root) {
    createRoot(root).render(<App />);
}

