import TogBog from "./components/TogBog";

const App = () => {
    return (
        <>
            <h1>Hey! I'm from WP React Starter Plugin OK</h1>
            <TogBog />
        </>
);
}

import { render } from '@wordpress/element';

render(
    <App />,
    document.getElementById( 'wprsp')
);