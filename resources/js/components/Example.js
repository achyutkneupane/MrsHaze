import React from 'react';
import { Link } from 'react-router-dom';

function Example() {
    return (
        <div className="container">
            <div className="flex flex-col items-center justify-center w-screen h-screen">
                <div>Example</div>
                <div>Goto <Link to='/'>Home</Link></div>
            </div>
        </div>
    );
}

export default Example;