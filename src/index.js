import { render } from '@wordpress/element';

const App = () => {
    return (
        <h1>Hey! I'm from WP React Starter Plugin OK</h1>
    );
}

render(
    <App />,
    document.getElementById( 'wprsp')
);