import { render } from '@wordpress/element';
import "tailwindcss/tailwind.css";
import Example from "./components/Example";
const App = () => {
    return (
        <>
            <h1>Hey! I'm from WP React Starter Plugin With Tailwind CSS with JIT setup.</h1>
            <Example />
        </>
    );
}

render(
    <App />,
    document.getElementById( 'wprsp')
);