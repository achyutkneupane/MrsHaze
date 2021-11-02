import React from 'react';
import { Link } from 'react-router-dom';

function Example() {
    return (
        <div className="container">
            <div className="flex flex-col w-screen h-screen justify-center items-center">
                <div>Example</div>
                <div>Goto <Link to='/'>Home</Link></div>
            </div>
        </div>
    );
}

export default Example;