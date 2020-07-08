import { render, Component } from '@wordpress/element';

class App extends Component {
    render() {
        return (
            <h1>Hey! I'm from WP React Starter Plugin</h1>
        );
    }
}

render(
    <App />,
    document.getElementById( 'wprsp')
);